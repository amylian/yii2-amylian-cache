<?php

/*
 * Copyright 2018 Andreas Prucha, Abexto - Helicon Software Development.
 */

namespace abexto\amylian\yii\cache\tests\uits;

/**
 * Description of FileCacheTestCase
 *
 * @author Andreas Prucha, Abexto - Helicon Software Development
 */
class FileCacheTestCase extends \abexto\amylian\yii\phpunit\AbstractYiiTestCase
{

    protected $_initialSetupDone = false;
    
    protected $_initialData = [];

    protected function initialSetup($config = [])
    {
        static::mockYiiConsoleApplication(\yii\helpers\ArrayHelper::merge(['components' => ['cache' => [
                    'class' => \abexto\amylian\yii\cache\FileCache::class
        ]]], $config));
        \Yii::$app->cache->flush();
        for ($n = 0; $n < 10; $n++) {
            $k = 'key'.$n;
            $this->_initialData[$k] = new \abexto\amylian\yii\cache\tests\classes\TestData($n);
            \Yii::$app->cache->add($k, $this->_initialData[$k]);
        }
    }

    protected function setUp()
    {
        parent::setUp();
        if (!$this->_initialSetupDone) {
            $this->initialSetup();
        }
    }

    public function testGet()
    {
        $getResult    = \Yii::$app->cache->get('key1');
        $this->assertSame(serialize($getResult), serialize($this->_initialData['key1']));
    }

    public function testAddDuplicate()
    {
        $addResult    = \Yii::$app->cache->add('key1', $this->_initialData['key1']);
        $this->assertFalse($addResult);
    }

}
