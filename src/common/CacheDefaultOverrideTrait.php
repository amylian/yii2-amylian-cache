<?php

/*
 * Copyright 2018 Andreas Prucha, Abexto - Helicon Software Development.
 */

namespace abexto\amylian\yii\cache\common;

/**
 * Default method overrides for standard Yii2 Cache components 
 * 
 * @author Andreas Prucha, Abexto - Helicon Software Development
 */
trait CacheDefaultOverrideTrait
{
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
