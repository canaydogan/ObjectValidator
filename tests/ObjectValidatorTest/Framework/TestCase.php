<?php

namespace ObjectValidatorTest\Framework;

use Zend\Validator\NotEmpty;

class TestCase extends \PHPUnit_Framework_TestCase
{

    public function getNotEmptyValidator()
    {
        return new NotEmpty();
    }

}