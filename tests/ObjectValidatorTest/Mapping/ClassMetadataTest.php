<?php

namespace ObjectValidatorTest\Mapping;

use ObjectValidator\Mapping\ClassMetadata,
    ObjectValidatorTest\Framework\TestCase,
    ObjectValidator\Mapping\PropertyMetadata;

class ClassMetadataTest extends TestCase
{

    protected $_classMetadata;
    protected $_annotatedClass;

    public function setUp()
    {
        parent::setUp();

        $this->_annotatedClass = $this->getAnnotatedClass();
        $className = get_class($this->_annotatedClass);
        $this->_classMetadata = new ClassMetadata($className);
    }

    public function testAddMemberMetadataWithNoExistProperty()
    {
        $reflectionClass = $this->_classMetadata->getReflectionClass();
        $properties = $reflectionClass->getProperties();
        $property = $properties[0];
        $propertyName = $property->getName();

        $memberMetadata = new PropertyMetadata($reflectionClass->getName(), $propertyName);

        $this->_classMetadata->addMemberMetadata($memberMetadata);

        $_memberMetadata = $this->_classMetadata->getMemberMetadatas($propertyName);
        $this->assertEquals(1, count($_memberMetadata));
        $this->assertEquals(
            $memberMetadata->getName(),
            $_memberMetadata[0]->getName()
        );
    }

    public function testAddMemberMetadataWithExistProperty()
    {
        $reflectionClass = $this->_classMetadata->getReflectionClass();
        $properties = $reflectionClass->getProperties();
        $property = $properties[0];
        $propertyName = $property->getName();

        $memberMetadata = new PropertyMetadata($reflectionClass->getName(), $propertyName);

        $this->_classMetadata->addMemberMetadata($memberMetadata);
        $this->_classMetadata->addMemberMetadata($memberMetadata);

        $_memberMetadata = $this->_classMetadata->getMemberMetadatas($propertyName);
        $this->assertEquals(2, count($_memberMetadata));
    }

    public function testHasMemberMetadatasWithNoMember()
    {
        $this->assertFalse($this->_classMetadata->hasMemberMetadatas('noexistmember'));
    }

    public function testHasMemberMetadatasWithMember()
    {
        $reflectionClass = $this->_classMetadata->getReflectionClass();
        $properties = $reflectionClass->getProperties();
        $property = $properties[0];
        $propertyName = $property->getName();

        $memberMetadata = new PropertyMetadata($reflectionClass->getName(), $propertyName);

        $this->_classMetadata->addMemberMetadata($memberMetadata);

        $this->assertTrue($this->_classMetadata->hasMemberMetadatas($propertyName));
    }

}
