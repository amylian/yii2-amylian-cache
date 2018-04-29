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
class ApcCache extends \yii\caching\ApcCache implements common\CacheInterface
{
    use common\CacheTrait;
    use common\CacheDefaultOverrideTrait;
}
