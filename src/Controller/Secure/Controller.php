<?php
/**
 * Secure Controller
 *
 * A base controller for secured areas with access to the security context
 *
 * @package     SymfonyCoreBundle
 * @subpackage  Controller
 * @category    Controller
 * @author      Achraf Soltani <soltani.achraf@gmail.com>
 * @link        http://www.achrafsoltani.com
 * @date        1/25/16
 * @file        Controller.php
 */

namespace SymfonyCoreBundle\Controller\Secure;

use SymfonyCoreBundle\Controller\Base\Controller as BaseController;

class Controller extends BaseController
{
    protected $user;

    protected function init()
    {
        parent::init();
        $this->user = $this->get('security.token_storage')->getToken()->getUser();
    }
}