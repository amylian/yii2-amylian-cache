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
abstract class AbstractCacheTest extends \amylian\yii\phpunit\AbstractYiiTestCase
{

    protected $_initialSetupDone = false;
    protected $_initialData      = [];
    
    protected function initialMockApplication($overrideConfig)
    {
        static::mockYiiConsoleApplication(\yii\helpers\ArrayHelper::merge(['components' => ['cache' => ['maxItemSize' => 0xFFFF
                        ]]], $overrideConfig));
    }
    
    protected function generateTestCacheEntries()
    {
        \Yii::$app->cache->flush();
        for ($n = 0; $n < 10; $n++) {
            $k                      = 'key' . $n;
            $this->_initialData[$k] = new \amylian\yii\cache\tests\classes\TestData($n);
            \Yii::$app->cache->add($k, $this->_initialData[$k]);
        }
    }

    
    protected function initialSetup($overrideConfig)
    {
        $this->initialMockApplication($overrideConfig);
        $this->generateTestCacheEntries();
    }

    abstract function getYiiTestConfiguration();

    protected function setUp()
    {
        parent::setUp();
        if (!$this->_initialSetupDone) {
            $this->initialSetup($this->getYiiTestConfiguration());
            $this->_initialSetupDone = true;
        }
    }
    
    public function testAddGet()
    {
        $testData = new \amylian\yii\cache\tests\classes\TestData('AddGet');
        $addResult = \Yii::$app->cache->add('testAddGet', $testData);
        $getResult = \Yii::$app->cache->get('testAddGet');
        $this->assertTrue($addResult);
        $this->assertSame(serialize($testData), serialize($getResult));
    }
    

    public function testGet()
    {
        $getResult = \Yii::$app->cache->get('key1');
        $this->assertSame(serialize($getResult), serialize($this->_initialData['key1']));
    }

    public function testAddDuplicate()
    {
        $addResult = \Yii::$app->cache->add('key1', $this->_initialData['key1']);
        $this->assertFalse($addResult);
    }

    public function testNotExceedingLimit()
    {
        $testData  = new \amylian\yii\cache\tests\classes\TestData(str_pad('', 0xFFF, 'x'));
        $setResult = \Yii::$app->cache->set('keyHuge', $testData);
        $getResult = \Yii::$app->cache->get('keyHuge');
        $this->assertTrue($setResult);
        $this->assertSame(serialize($getResult), serialize($testData));
    }

    public function testSetExceedingLimit()
    {
        $setResult = \Yii::$app->cache->set('keyHuge',
                                            new \amylian\yii\cache\tests\classes\TestData(str_pad('', 0xFFFF + 1, 'x')));
        $this->assertFalse($setResult);
    }

}
