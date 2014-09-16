<?php

/**
 *
 * (c) Nicolas LUDOVIC <nicolas.ludovic@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * A field has some contraints apply on it
 *
 * @author nicolas
 */
namespace Ifendirh\Validator;

class FieldConstraint {
    /**
     * Name of the field
     * 
     * @var string 
     */
    private $fieldName;
    /**
     * name of the constraint or lit of constraints
     * 
     * @var mixed (string or array) 
     */
    private $constraint;
    
    /**
     * the value of the field from the form
     * 
     * @var string 
     */
    private $fieldValue;
    
    public function __construct($fieldName, $fieldValue, $constaint) {
        $this->fieldName = $fieldName;
        $this->fieldValue = $fieldValue;
        $this->constraint = $constaint;
    }
    public function getFieldName() {
        return $this->fieldName;
    }

    public function getConstraint() {
        return $this->constraint;
    }

    public function getFieldValue() {
        return $this->fieldValue;
    }

    public function setFieldName($fieldName) {
        $this->fieldName = $fieldName;
    }

    public function setConstraint($constraint) {
        $this->constraint = $constraint;
    }

    public function setFieldValue($fieldValue) {
        $this->fieldValue = $fieldValue;
    }


}
