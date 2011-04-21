<?php

class ImageGalleryController extends Zend_Controller_Action
{

    public function init()
    {
        $this->view->tab = 'gallery';
    }

    public function indexAction()
    {
        $this->view->title = 'Image Gallery';
    }


}

