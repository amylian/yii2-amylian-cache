<?php

/*
 * Copyright 2018 Andreas Prucha, Abexto - Helicon Software Development.
 */

namespace amylian\yii\cache\common;

/**
 *
 * @author Andreas Prucha, Abexto - Helicon Software Development
 * 
 * @property int|null $maxItemSize Max size of a cache entry.
 * @property bool|null $active Determines if cache is active
 */
interface CacheInterface
{
    public function getMaxItemSize();
    
    public function setMaxItemSize($aValue);
}
