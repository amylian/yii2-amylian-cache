<?php

/*
 * Copyright 2018 Andreas Prucha, Abexto - Helicon Software Development.
 */

namespace abexto\amylian\yii\cache\common;

/**
 *
 * @author Andreas Prucha, Abexto - Helicon Software Development
 */
trait CacheTrait
{

    private $_maxItemSize = null;

    public function getMaxItemSize()
    {
        return $this->_maxItemSize;
    }

    public function setMaxItemSize($aValue)
    {
        $this->_maxItemSize = $aValue;
    }

    protected function canSave($value)
    {
        if (is_string($value) && $this-> $this->_maxItemSize !== null) {
            return strlen($value) <= $this->_maxItemSize;
        } else {
            return true;
        }
    }

    protected function setValue($key, $value, $duration)
    {
        if (!$this->canSave($value)) {
            $this->delete($key); // Make sure no old data is stored
            return false; // ===> FALSE & EXIT
        }
        return parent::setValue($key, $value, $duration);
    }

    protected function addValue($key, $value, $duration)
    {
        if (!$this->canSave($value)) {
            $this->delete($key); // Make sure no old data is stored
            return false; // ===> FALSE & EXIT
        }
        return parent::addValue($key, $value, $duration);
    }

}
