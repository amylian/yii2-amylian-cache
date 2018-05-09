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
class DbCacheTest extends AbstractCacheTest
{
    
    protected function initialMockApplication($overrideConfig)
    {
        parent::initialMockApplication($overrideConfig);
        \Yii::$app->db->createCommand('
            CREATE TABLE IF NOT EXISTS cache (
                id char(128) NOT NULL,
                expire int(11) DEFAULT NULL,
                data LONGBLOB,
                PRIMARY KEY (id),
                KEY expire (expire)
            );
        ')->execute();
    }
    
    public function getYiiTestConfiguration()
    {
        return [
            'components' => [
                'db' => [
                    'class' => \yii\db\Connection::class,
                    'dsn' => $_ENV['db_type'].':host='.$_ENV['db_host'].';dbname='.$_ENV['db_name'],
                    'username' => $_ENV['db_username'],
                    'password' => $_ENV['db_password'],
                ],
                'cache' => [
                    'class' => \amylian\yii\cache\DbCache::class
                ]
            ]
        ];
    }

}
