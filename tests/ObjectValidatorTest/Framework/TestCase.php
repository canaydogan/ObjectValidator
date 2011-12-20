<?php

namespace ObjectValidatorTest\Framework;

use Zend\Validator\NotEmpty,
    ObjectValidatorTest\Assets\Classes\AnnotatedClass,
    Doctrine\Common\Annotations\AnnotationReader,
    ObjectValidator\Mapping\ClassMetadata;

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

    public function getAnnotationReader()
    {
        $annotationReader = new AnnotationReader();

        return $annotationReader;
    }

    public function getAnnotatedClassMetadata()
    {
        $annotatedClass = $this->getAnnotatedClass();
        $className = get_class($annotatedClass);
        $classMetadata = new ClassMetadata($className);

        return $classMetadata;
    }

}