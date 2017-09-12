<?php

namespace BlogBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends Controller
{
    /**
     * @return \BlogBundle\BlogRepository
     */
    public function getBlogRepository(){
        return $this->get('doctrine_mongodb')->getRepository('BlogBundle:Blog');
    }
    /**
     * @param string $action
     * @param string $value
     */
    protected function setFlash($action, $value)
    {
        $this->get('session')->setFlash($action, $value);
    }
}