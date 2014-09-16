<?php

/**
 *
 * (c) Nicolas LUDOVIC <nicolas.ludovic@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ifendirh\Validator;

use Symfony\Component\Validator\Validation;
use Mailchimp\Mailchimp;

/**
 * This will validate the data from the form.
 * For the moment only contraints without params work 
 * e.g. NotBlank, Email
 *
 * @author nicolas
 */
class FormValidator {

    /**
     * List of all validations for the form
     * 
     * @var Array 
     */
    private $queueValidations;

    /**
     * the validator object
     * @var Object 
     */
    private $validator;
    
    /**
     * the base namespace of the assertions
     * @var string default : 'Symfony\\Component\\Validator\\Constraints\\'
     */
    private $assertNamespace;

    /**
     * Error message if field is not valid
     * 
     * @var String 
     */
    private $errorMsg;

    /**
     * 
     * @param Object $newValidator Change de default validator object
     */
    public function __construct($newValidator = null,$assertNamespace = 'Symfony\\Component\\Validator\\Constraints\\') {
        if ($newValidator != null) {
            $this->validator = $newValidator;
        } else {
            $this->validator = Validation::createValidator();
        }
        $this->assertNamespace = $assertNamespace;
    }

    /**
     * Add a validation
     * 
     * @param string $field the name of the field
     * @param mixed $constraints the name of the constraint or an array of constraints
     */
    public function addValidation($field, $fieldValue, $constraint) {
        $this->queueValidations[$field] = new FieldConstraint($field, $fieldValue, $constraint);

        return $this;
    }

    /**
     * Get the list of all validation
     * 
     * @return array
     */
    public function getQueueValidations() {
        return $this->queueValidations;
    }

    /**
     * Test if all the fields that are in the queue validation are valid
     * 
     * @retunr boolean true if all the field is valid false otherwise
     */
    public function isAllValid() {
        if (count($this->queueValidations) > 0) {
            foreach ($this->queueValidations as $fieldConstraints) {
                //a fieldConstraint can have several constraints
                foreach ($fieldConstraints->getConstraint() as $constraint) {
                    $classConstraint = $this->assertNamespace . $constraint;
                    if (class_exists($classConstraint)) {
                        $violations = $this->validator->validateValue($fieldConstraints->getFieldValue(), new $classConstraint());
                        if ($violations->count() > 0) {
                            $this->setErrorMsg($violations);
                            return false;
                        }
                    }else{
                        throw new \Exception('Assertion not exists : '.$classConstraint);
                    }
                }
            }
        }
        return true;
    }

    public function getErrorMsg() {
        return var_dump($this->errorMsg);
    }

    public function setErrorMsg($errorMsg) {
        $this->errorMsg = $errorMsg;
        return $this;
    }

}
