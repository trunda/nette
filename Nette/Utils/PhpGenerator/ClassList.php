<?php

/**
 * This file is part of the Nette Framework (http://nette.org)
 *
 * Copyright (c) 2004 David Grudl (http://davidgrudl.com)
 *
 * For the full copyright and license information, please view
 * the file license.txt that was distributed with this source code.
 */

namespace Nette\Utils\PhpGenerator;

use Nette;



/**
 * description.
 *
 * @author     Jakub Truneček
 */
class ClassList extends Nette\Object implements \ArrayAccess
{
    private $classes = array();

    public function addClass(ClassType $class)
    {
        $this->classes = $class;
    }
    
    public function __toString()
    {
        $result = "";
        foreach ($this->classes as $class) {
            $result .= (string) $class . "\n";
        }
        return $result;
    }

    
    /* ********* ArrayAccess ********* */
    
    /**
     * @param mixes $offset
     * @return boolean 
     */
    public function offsetExists($offset)
    {
        return isset($this->classes[$offset]);
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->classes[$offset];
    }

    /**
     * @param mixed $offset
     * @param mixed $value 
     */
    public function offsetSet($offset, $value)
    {
        if (!$value instanceof ClassType) {
            throw new Nette\InvalidArgumentException("Item have to be Nette\Utils\PhpGenerator\ClassType instance");
        }
        $this->classes[$offset] = $value;
    }

    /**
     * @param mixed $offset 
     */
    public function offsetUnset($offset)
    {
        unset($this->classes[$offset]);
    }
}
