<?php
/**
 * Cart
 *
 * A simple wrapping class for E-commerce usage
 *
 * @package     SymfonyCoreBundle
 * @subpackage  Library
 * @category    Components
 * @author      Achraf Soltani <soltani.achraf@gmail.com>
 * @link        http://www.achrafsoltani.com
 * @date        3/31/16
 * @file        Cart.php
 */

namespace SymfonyCoreBundle\Library\Components\Ecommerce\Cart;

use SymfonyCoreBundle\Library\Structures\Collections\Collection;

class Cart extends Collection
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add($product)
    {
        $rowid = $this->generateId();
        $this->push($product, $rowid);
        return $rowid;
    }

    public function update($product, $rowid)
    {
        $this->replace($product, $rowid);
    }

    public function delete($rowid)
    {
        $this->remove($rowid);
    }

    public function get($rowid)
    {
        return $this->pull($rowid);
    }

    public function getAll()
    {
        return $this->pullData();
    }

    public function totalItems()
    {
        return $this->getCount();
    }

    private function generateId()
    {
        return md5(rand(0, time()) + time());
    }
}