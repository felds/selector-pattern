<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Order;
use App\Form\OrderType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/order")
 */
class OrderController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/")
     */
    public function index()
    {
        $entities = $this->em->getRepository(Order::class)->findAll();

        return $this->render('Order/index.html.twig', [
            'entities' => $entities,
        ]);
    }

    /**
     * @Route("/new")
     */
    public function new(Request $request)
    {
        $entity = new Order();  // ♬ Every time I see you falling
                                // I get down on my knees and pray... ♬
        $form = $this->createForm(OrderType::class, $entity);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($entity);
            $this->em->flush();

            return $this->redirectToRoute('app_order_index');
        }

        return $this->render('Order/form.html.twig', [
            'entity' => $entity,
            'form' => $form->createView(),
        ]);
    }
}