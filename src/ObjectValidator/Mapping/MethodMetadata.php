<?php

namespace ObjectValidator\Mapping;

use InvalidArgumentException,
    ObjectValidator\Mapping\AbstractMemberMetadata,
    ReflectionMethod;

class MethodMetadata extends  AbstractMemberMetadata
{

    public function __construct($className, $name)
    {
        if (!method_exists($className, $name)) {
            throw new InvalidArgumentException(
                sprintf('Method %s does not exists in class %s', $name, $className)
            );
        }
        parent::__construct($className, $name, $name);
    }

    public function newReflectionMember()
    {
        $member = new ReflectionMethod($this->getClassName(), $this->getName());

        return $member;
    }

    public function getValue($object)
    {
        return $this->getReflectionMember()->invoke($object);
    }

}
