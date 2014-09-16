<?php

/**
 *
 * (c) Nicolas LUDOVIC <nicolas.ludovic@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Description of FormValidatorTest
 *
 * @author nicolas
 */
use Ifendirh\Validator\FormValidator;
use Ifendirh\Validator\FieldConstraint;

class FormValidatorTest extends PHPUnit_Framework_TestCase{
    public function testAddValidation(){
        $validator = new FormValidator();
        
        $expected = array('email'=>new FieldConstraint('email', 'nicolas@mail.com', 'Email'));
        $validator->addValidation('email', 'nicolas@mail.com','Email');
        
        $listValidation = $validator->getQueueValidations();
        
        $this->assertEquals($expected,$listValidation,'wrong listValidation');
        
    }
    
    public function testAllFieldValid(){
        
        $validator = new FormValidator();
        $validator->addValidation('nom', 'Mon nom',array('NotBlank'));
        $validator->addValidation('email', 'nicolas@mail.com',array('Email'));
        $this->assertTrue($validator->isAllValid(),'All fields are not valid.');
    }
    
    public function testOneFieldInvalid(){
        $validator = new FormValidator();
        $validator->addValidation('email', 'nicolas@ç mail.com',array('Email'));
        $validator->addValidation('nom', '',array('NotBlank'));
        $this->assertFalse($validator->isAllValid(),'At least one field should not be valid.');
    }
}
