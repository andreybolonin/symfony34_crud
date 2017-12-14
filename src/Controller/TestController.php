<?php
/**
 * Created by PhpStorm.
 * User: andreybolonin
 * Date: 12/14/17
 * Time: 8:17 PM
 */

namespace App\Controller;

use App\Form\Product;
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
        $product = new \App\Entity\Product();
        $form = $this->createForm(Product::class, $product);
        $form->remove('name');

        $em = $this->getDoctrine()->getManager();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $product->setName('12312');
            $em->persist($product);
            $em->flush();
        }

        return $this->render('index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}