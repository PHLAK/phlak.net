<?php

class ToolsController extends Zend_Controller_Action
{

    public function init()
    {
        $this->view->css = array();
        $this->view->js = array();
        $this->view->seo = array();
        
        $this->view->tab = 'tools';
        
        $this->view->subMenu = array();
        
        $this->view->subMenu[] = array(
            'title' => 'Secure Password Generator',
            'link'  => '/tools/secure-password-generator'
        );
        
        $this->view->subMenu[] = array(
            'title' => 'External IP',
            'link'  => '/tools/external-ip'
        );
    }

    public function indexAction()
    {
        $this->view->title = 'Tools';
    }
    
    public function securePasswordGeneratorAction()
    {
        $this->view->title = 'Secure Password Generator';
        
        $this->view->js = 'passGen.js';
    }
    
    public function securePasswordGeneratorPostAction()
    {
        // Disable layout
        // $this->_helper->layout->disableLayout();
        
        // Get the variables
        $length = trim($_POST['length']);
        
        // Generate the random string
        $string = PHLAKNET_ToolBox::makeSalt($length, true);
        
        // Return the string
        die($string);
    }

    public function externalIpAction()
    {
        $this->view->title = 'External IP';
        
        $this->view->ip = $_SERVER['REMOTE_ADDR'];
    }

}

