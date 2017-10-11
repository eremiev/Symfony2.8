<?php

namespace BlogBundle\Controller;

use BlogBundle\Document\Blog;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    public function indexAction()
    {
    	//59b673ce087866e803000029
    	 $dm = $this->get('doctrine_mongodb')->getManager();

    	 //How to do it
    	 $dm->createQueryBuilder('Blog')->find("59b673ce087866e803000029");
    	 $posts = $dm->find("Blog", "59b673ce087866e803000029");

		dump($posts);

        return $this->render('BlogBundle:Blog:index.html.twig', array(
            'posts' => $posts,
        ));
    }

 	public function createAction()
    {
    	$blog = new Blog();
	    $blog->setName('My first Blog!');
	    $blog->setComments(0);

	    $dm = $this->get('doctrine_mongodb')->getManager();
	    $dm->persist($blog);
	    $dm->flush();

	    return new Response('Created product id '.$blog->getId());

    }
}
