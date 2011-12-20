<?php

namespace ObjectValidator\Mapping;

use ObjectValidator\Mapping\ClassMetadata;

interface Loader
{

    public function loadClassMetadata(ClassMetadata $metadata);

}