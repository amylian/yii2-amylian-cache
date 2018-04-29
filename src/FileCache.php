<?php

/*
 * Copyright 2018 Andreas Prucha, Abexto - Helicon Software Development.
 */

namespace abexto\amylian\yii\cache;

/**
 * Description of FileCache
 *
 * @author Andreas Prucha, Abexto - Helicon Software Development
 */
class FileCache extends \yii\caching\FileCache implements common\CacheInterface
{
    use common\CacheTrait;
    use common\CacheDefaultOverrideTrait;
}
