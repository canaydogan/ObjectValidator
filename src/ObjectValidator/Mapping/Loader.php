<?php

namespace ObjectValidator\Mapping;

use ObjectValidator\Mapping\AbstractMetadata;

interface Loader
{

    public function loadClassMetadata(AbstractMetadata $metadata);

}