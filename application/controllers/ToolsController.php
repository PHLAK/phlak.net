<?php

class ToolsController extends Zend_Controller_Action
{

    public function init()
    {
        $this->view->tab = 'tools';
    }

    public function indexAction()
    {
        $this->view->title = 'Tools';
    }

    public function externalIpAction()
    {
        $this->view->title = 'External IP';
        
        $this->view->ip = $_SERVER['REMOTE_ADDR'];
    }


}

