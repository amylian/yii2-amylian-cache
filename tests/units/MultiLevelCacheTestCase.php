<?php

/*
 * Copyright 2018 Andreas Prucha, Abexto - Helicon Software Development.
 */

namespace abexto\amylian\yii\cache\tests\units;

/**
 * Description of FileCacheTestCase
 *
 * @author Andreas Prucha, Abexto - Helicon Software Development
 */
class MultiLevelCacheTestCase extends AbstractCacheTestCase
{

    public function getYiiTestConfiguration()
    {
        return [
            'components' => [
                'cache' => [
                    'class'  => \abexto\amylian\yii\cache\MultiLevelCache::class,
                    'caches' => [
                        ['class'       => \abexto\amylian\yii\cache\ArrayCache::class,
                            'maxItemSize' => 0xFF],
                        ['class'       => \abexto\amylian\yii\cache\FileCache::class,
                            'maxItemSize' => null],
                    ]
                ]
            ]
        ];
    }

}
