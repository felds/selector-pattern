<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Pizza;
use App\Form\PizzaType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/pizza")
 */
class PizzaController extends AbstractController
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
        $entities = $this->em->getRepository(Pizza::class)->findAll();

        return $this->render('Pizza/index.html.twig', [
            'entities' => $entities,
        ]);
    }

    /**
     * @Route("/new")
     */
    public function new(Request $request)
    {
        $entity = new Pizza();
        $form = $this->createForm(PizzaType::class, $entity);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($entity);
            $this->em->flush();

            return $this->redirectToRoute('app_pizza_index');
        }

        return $this->render('Pizza/form.html.twig', [
            'entity' => $entity,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/select")
     */
    public function select(Request $request)
    {

    }
}