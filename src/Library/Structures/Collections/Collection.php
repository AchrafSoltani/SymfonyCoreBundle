<?php
/**
 * Title
 *
 * Description
 *
 * @package     SymfonyCoreBundle
 * @subpackage  Library
 * @category    Structures
 * @author      Achraf Soltani <soltani.achraf@gmail.com>
 * @link        http://www.achrafsoltani.com
 * @date        3/31/16
 * @file        Collection.php
 */

namespace SymfonyCoreBundle\Library\Structures\Collections;

class Collection
{
    protected $_data;
    protected $_items;

    public function __construct()
    {
        $this->_data = array();
        $this->_items = 0;
    }

    public function push($new_item, $index)
    {
        if ($index)
            $this->_data[$index] = $new_item;
        else
            $this->_data[] = $new_item;
        $this->_items++;
    }

    public function pull($index)
    {
        return $this->_data[$index];
    }

    public function pullData()
    {
        return $this->_data;
    }

    public function replace($new_item, $index)
    {
        $this->_data[$index] = $new_item;
    }

    public function remove($index)
    {
        //array_splice($this->_data, $index, 1);
        $new_array = array();
        foreach($this->_data as $key => $value)
        {
            if($key != $index)
            {
                $new_array[$key] = $value;
            }
        }
        $this->_data = $new_array;
        $this->_items--;
    }

    public function getCount()
    {
        return $this->_items;
    }
}