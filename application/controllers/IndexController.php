<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        $this->view->tab = 'home';
    }

    public function indexAction()
    {
        $this->view->title = 'Welcome to PHLAK.NET';
    }


}

