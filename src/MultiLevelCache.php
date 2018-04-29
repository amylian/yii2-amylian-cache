<?php

/*
 * Copyright 2018 Andreas Prucha, Abexto - Helicon Software Development.
 */

namespace abexto\amylian\yii\cache;

/**
 * Description of MultiLevelCache
 *
 * @author Andreas Prucha, Abexto - Helicon Software Development
 */
class MultiLevelCache extends \yii\caching\Cache implements \abexto\amylian\yii\cache\common\CacheInterface
{

    use \abexto\amylian\yii\cache\common\CacheTrait;

    /**
     * @var Array Array of cache components
     */
    protected $_caches = [
        [
            'class' => ArrayCache::class,
            'maxItemSize' => 0xffffff
        ],
        [
            'class' => FileCache::class
        ]
    ];

    /**
     * @inheritDoc
     */
    public function init()
    {
        parent::init();
        foreach ($this->_caches as $k => $o) {
            $this->_caches[$k] = \yii\di\Instance::ensure($o);
            if ($this->serializer !== false)
                $this->_caches[$k]->serializer = false;
        }
    }
    
    public function setCaches($caches){
        $this->_caches = $caches;
    }
    
    public function getCaches()
    {
        return $this->_caches;
    }

    /**
     * @inheritDoc;
     */
    protected function addValue($key, $value, $duration)
    {
        if (!$this->canSave($value))
            return false; 
        $result = false;
        foreach ($this->_caches as $i => $o) {
            if ($o->add($key, $value, $duration)) {
                $result = true;
            }
        }
        return $result;
    }

    /**
     * @inheritDoc;
     */
    protected function deleteValue($key)
    {
        $result = true;
        foreach ($this->_caches as $i => $o) {
            if ($o->exists($key)) {
                if (!$o->delete($key)) {
                    $result = false;
                }
            }
        }
        return $result;
    }

    /**
     * @inheritDoc;
     */
    protected function flushValues()
    {
        $result = true;
        foreach ($this->_caches as $i => $o) {
            if (!$o->flush()) {
                $result = false;
            }
        }
        return $result;
    }

    /**
     * @inheritDoc;
     */
    protected function getValue($key)
    {
        foreach ($this->_caches as $i => $o) {
            $result = $o->get($key);
            if ($result !== FALSE)
                return $result; // found ===> RETURN & EXIT
        }
        return false;
    }

    /**
     * @inheritDoc;
     */
    protected function setValue($key, $value, $duration)
    {
        if (!$this->canSave($value))
            return false; 
        $result = false;
        foreach ($this->_caches as $i => $o) {
            if ($o->set($key, $value, $duration)) {
                $result = true;
            }
        }
        return $result;
    }

}
