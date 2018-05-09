<?php

/*
 * Copyright 2018 Andreas Prucha, Abexto - Helicon Software Development.
 */

namespace amylian\yii\cache;

/**
 * Description of FileCache
 *
 * @author Andreas Prucha, Abexto - Helicon Software Development
 */
class MemCache extends \yii\caching\MemCache implements common\CacheInterface
{
    use common\CacheTrait;
    use common\CacheDefaultOverrideTrait;
}
