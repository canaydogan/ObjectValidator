<?php
return array(
    'di' => array(
        'instance' => array(
            'alias' => array(
                'object_validator_reader' => 'Doctrine\Common\Annotations\AnnotationReader',
                'object_validator_cache' => 'Doctrine\Common\Cache\ArrayCache',
                'object_validator_loader' => 'ObjectValidator\Mapping\Loader\AnnotationLoader',
                'object_validator_factory' => 'ObjectValidator\Mapping\ClassMetadataFactory\Standard',
                'object_validator' => 'ObjectValidator\ObjectValidator'
            ),
            'object_validator_loader' => array(
                'parameters' => array(
                    'reader' => 'object_validator_reader'
                )
            ),
            'object_validator_factory' => array(
                'parameters' => array(
                    'loader' => 'object_validator_loader',
                    'cache' => 'object_validator_cache'
                )
            ),
            'object_validator' => array(
                'parameters' => array(
                    'classMetadataFactory' => 'object_validator_factory'
                )
            )
        )
    )
);