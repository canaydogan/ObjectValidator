<?php

namespace ObjectValidatorTest\Framework;

use Zend\Validator\NotEmpty,
    ObjectValidatorTest\Assets\Classes\AnnotatedClass;

class TestCase extends \PHPUnit_Framework_TestCase
{

    public function getNotEmptyValidator()
    {
        return new NotEmpty();
    }

    public function getAnnotatedClass()
    {
        $annotatedClass = new AnnotatedClass();

        return $annotatedClass;
    }

}