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
class FileCacheTest extends AbstractCacheTest
{
    public function getYiiTestConfiguration()
    {
        return [
            'components' => [
                'cache' => [
                    'class' => \amylian\yii\cache\FileCache::class
                ]
            ]
        ];
    }

}
