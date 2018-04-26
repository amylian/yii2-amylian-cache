<?php

/*
 * Copyright 2018 Andreas Prucha, Abexto - Helicon Software Development.
 */

namespace abexto\amylian\yii\cache\common;

/**
 *
 * @author Andreas Prucha, Abexto - Helicon Software Development
 * 
 * @property int|null $maxItemSize Max size of a cache entry.
 */
interface CacheInterface
{
    public function getMaxItemSize();
    
    public function setMaxItemSize($aValue);
}
