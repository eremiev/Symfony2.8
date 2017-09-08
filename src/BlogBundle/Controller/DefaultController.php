<?php

namespace BlogBundle\Controller;

use BlogBundle\Document\Product;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BlogBundle:Default:index.html.twig');
    }

    public function createAction()
	{
	    $product = new Product();
	    $product->setName('A Foo Bar');
	    $product->setPrice('19.99');

	    $dm = $this->get('doctrine_mongodb')->getManager();
	    $dm->persist($product);
	    $dm->flush();

	    return new Response('Created product id '.$product->getId());
	}
}
