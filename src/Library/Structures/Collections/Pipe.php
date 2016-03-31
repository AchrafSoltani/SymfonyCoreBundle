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
 * @file        Pipe.php
 */

namespace SymfonyCoreBundle\Library\Structures\Collections;

class Pipe
{
    protected $_data;
    protected $_size;
    protected $_items;

    public function __construct($size = 3)
    {
        $this->_data = array();
        $this->_size = $size;
        $this->_items = 0;

        for($i = $this->_size - 1; $i >= 0; $i--)
        {
            $this->_data[$i] = null;
        }
    }

    public function push($new_data)
    {
        for($i = $this->_size - 1; $i > 0; $i--)
        {
            $this->_data[$i] = $this->_data[$i - 1];
        }

        $this->_data[0] = $new_data;
        $this->_items++;
    }

    public function getData()
    {
        $result = array();

        foreach($this->_data as $data)
        {
            if($data != null && !empty($data))
                $result[] = $data;
        }

        return $result;
    }

    public function getItemsCount()
    {
        return $this->_items;
    }
}