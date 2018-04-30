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

    /**
     *
     * @var type ̍@var bool Use file_exists before reading the cache file
     */
    public $saveMode = true;
    
    protected function fileExists($key)
    {
        return file_exists($this->getCacheFile($key));
    }
    
    /**
     * @inheritDoc
     */
    public function exists($key)
    {
        if (!$this->saveMode || $this->fileExists($key)) {
            return parent::exists($key);
        } else {
            return false;
        }
    }
    
    protected function getValue($key)
    {
        if (!$this->saveMode || $this->fileExists($key)) {
            return parent::getValue($key);
        } else {
            return false;
        }
    }
    
}
