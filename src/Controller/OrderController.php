<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Order;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/order")
 */
class OrderController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        $entities = $this->getDoctrine()->getRepository(Order::class)->findAll();

        return $this->render('Order/index.html.twig', [
            'entities' => $entities,
        ]);
    }

    public function new(Request $request)
    {

    }
}