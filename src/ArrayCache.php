<?php

/*
 * Copyright 2018 Andreas Prucha, Abexto - Helicon Software Development.
 */

namespace abexto\amylian\yii\cache;

/**
 * Description of ArrayCache
 *
 * @author Andreas Prucha, Abexto - Helicon Software Development
 */
class ArrayCache extends \yii\caching\ArrayCache implements common\CacheInterface
{
    use common\CacheTrait;
    use common\CacheDefaultOverrideTrait;
}
