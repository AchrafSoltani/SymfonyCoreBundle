<?php
/**
 * Base Controller
 *
 * a collection of helper methods to store data and manage basic services
 *
 * @package     SymfonyCoreBundle
 * @subpackage  Controller
 * @category    Controller
 * @author      Achraf Soltani <soltani.achraf@gmail.com>
 * @link        http://www.achrafsoltani.com
 * @date        1/25/16
 * @file        Controller.php
 */

namespace SymfonyCoreBundle\Controller\Base;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as SFController;

class Controller extends SFController
{
    protected $data;

    protected $warnings;
    protected $successes;
    protected $notices;
    protected $errors;

    protected $request;
    protected $session;
    protected $rootPath;

    protected function init()
    {
        $this->data = array();

        $this->warnings = array();
        $this->successes = array();
        $this->notices = array();
        $this->errors = array();

        $this->rootPath = $this->get('kernel')->getRootDir() . '/../';
        $this->request = $this->container->get('request_stack')->getCurrentRequest();
        $this->session = $this->container->get('session');
    }

    ////////////////
    //  Meta
    ////////////////

    protected function getRootPath()
    {
        return $this->rootPath;
    }

    protected function hasErrors()
    {
        return count($this->errors) > 0;
    }

    protected function hasWarnings()
    {
        return count($this->warnings) > 0;
    }

    ////////////////
    //  Data
    ////////////////

    protected function addData(Array $data)
    {
        if(is_array($data) && !empty($data))
        {
            foreach($data as $label => $value)
            {
                $this->data[$label] = $value;
            }
        }
    }

    protected function getData($key = null)
    {
        if($key)
            return $this->data[$key];
        else
            return $this->data;
    }

    ////////////////
    //  Messages
    ////////////////

    protected function addSuccesses(Array $successes)
    {
        if(is_array($successes) && !empty($successes))
        {
            foreach($successes as $success)
            {
                $this->get('session')->getFlashBag()->add('success', $success);
            }
        }
    }

    protected function addSuccess($success)
    {
        if(!empty($success))
            $this->get('session')->getFlashBag()->add('success', $success);
    }

    protected function addErrors(Array $errors)
    {
        if(is_array($errors) && !empty($errors))
        {
            foreach($errors as $error)
            {
                $this->errors[] = $error;
                $this->get('session')->getFlashBag()->add('error', $error);
            }
        }
    }

    protected function addError($error)
    {
        if(!empty($errors))
        {
            $this->errors[] = $error;
            $this->get('session')->getFlashBag()->add('error', $error);
        }
    }

    protected function addWarnings(Array $warnings)
    {
        if(is_array($warnings) && !empty($warnings))
        {
            foreach($warnings as $warning)
            {
                $this->get('session')->getFlashBag()->add('warning', $warning);
            }
        }
    }

    protected function addWarning($warning)
    {
        if(!empty($warning))
        {
            $this->warnings[] = $warning;
            $this->get('session')->getFlashBag()->add('warning', $warning);
        }
    }

    protected function addNotices(Array $notices)
    {
        if(is_array($notices) && !empty($notices))
        {
            foreach($notices as $notice)
            {
                $this->get('session')->getFlashBag()->add('notice', $notice);
            }
        }
    }

    protected function addNotice($notice)
    {
        if(!empty($notice))
            $this->get('session')->getFlashBag()->add('notice', $notice);
    }
}