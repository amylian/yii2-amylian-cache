<?php

/*
 * Copyright 2018 Andreas Prucha, Abexto - Helicon Software Development.
 */

namespace abexto\amylian\yii\cache\tests\classes;

/**
 * Description of newPHPClass
 *
 * @author Andreas Prucha, Abexto - Helicon Software Development
 */
class TestData extends \yii\base\Object
{
    
    public $f1 = null;
    private $_f2 = null;
    
    public function __construct($value)
    {
        $this->f1 = $value;
        $this->_f2 = $value;
    }
    
    public function setF2($value)
    {
        $this->_f2 = $value;
    }
    
    public function getF2()
    {
        return $this->_f2;
    }
}
