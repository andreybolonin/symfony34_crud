<?php
/**
 * Created by PhpStorm.
 * User: andreybolonin
 * Date: 12/14/17
 * Time: 8:17 PM
 */

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class TestController extends Controller
{

    /**
     * @Route("/homepage", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        return $this->render('index.html.twig', []);
    }

}