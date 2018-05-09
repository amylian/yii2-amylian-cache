<?php

/*
 * Copyright 2018 Andreas Prucha, Abexto - Helicon Software Development.
 */

namespace amylian\yii\cache\tests\units;

/**
 * Description of FileCacheTestCase
 *
 * @author Andreas Prucha, Abexto - Helicon Software Development
 */
class ApcCacheTest extends AbstractCacheTest
{
    public function getYiiTestConfiguration()
    {
        return [
            'components' => [
                'cache' => [
                    'class' => \amylian\yii\cache\ApcCache::class,
                    'useApcu' => true,
                    'active' => null
                ]
            ]
        ];
    }

}
