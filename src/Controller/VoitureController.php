<?php

namespace App\Controller;

use App\Entity\TicketPeage;
use App\Entity\Voiture;
use App\Form\TestType;
use App\Form\TicketType;
use App\Repository\TicketPeageRepository;
use App\Repository\VoitureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VoitureController extends AbstractController
{
    /**
     * @Route("/voiture", name="voiture")
     */
    public function index(): Response
    {
        return $this->render('voiture/index.html.twig', [
            'controller_name' => 'VoitureController',
        ]);
    }
     /**
     * @Route("/show", name="show")
     */
    public function fetchCars(VoitureRepository $repo,EntityManagerInterface $em): Response
    {
      // $em=$this->getDoctrine()->getRepository(Voiture::class);
       $result=$repo->findAll();
       $nbv=$repo->nbCars($em);
      // dd($nbv);
        return $this->render('voiture/show.html.twig', [
            'res'=>$result,
            'nb'=>$nbv
        ]);
    }


    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function removeCar($id,VoitureRepository $repo): Response
    { $car=$repo->find($id);
      $em=$this->getDoctrine()->getManager();
      $em->remove($car);
      $em->flush();
        return $this->redirectToRoute('show');
      
      
    }

    /**
     * @Route("/addticket", name="addticket")
     */
    public function addticket(Request $req): Response
    {
        $ticket=new TicketPeage();
        $form=$this->createForm(TicketType::class,$ticket);
        $form->handleRequest($req);
        if ($form->isSubmitted()) {
            $ticket->setPrix('1200');
            $ticket->setDateTicket(new \DateTime('now'));
            $em=$this->getDoctrine()->getManager();
            $em->persist($ticket);
            $em->flush();
        }
        return $this->render('voiture/addticket.html.twig', [
            'f' => $form->createView(),
        ]);
    }

    /**
     * @Route("/geticket", name="geticket")
     */
    public function geticket(TicketPeageRepository $repo): Response
    {
      // $em=$this->getDoctrine()->getRepository(Voiture::class);
       $result=$repo->findAll();
       
        return $this->render('voiture/ticket.html.twig', [
            'res'=>$result
        ]);
    }
    /**
     * @Route("/updateticket/{id}", name="updateticket")
     */
    public function updateticket(Request $req,TicketPeageRepository $repo,$id): Response
    {
        $ticket=$repo->find($id);
        $form=$this->createForm(TicketType::class,$ticket);
        $form->handleRequest($req);
        if ($form->isSubmitted()) {
            $ticket->setPrix('1200');
            $ticket->setDateTicket(new \DateTime('now'));
            $em=$this->getDoctrine()->getManager();
            //$em->persist($ticket);
            $em->flush();
            return $this->redirectToRoute('geticket');
        }
        return $this->render('voiture/updateticket.html.twig', [
            'f' => $form->createView(),
        ]);
    }

    /**
     * @Route("/stat", name="stat")
     */
    public function stat(TicketPeageRepository $repo): Response
    {
      // $em=$this->getDoctrine()->getRepository(Voiture::class);
       $result=$repo->findAll();
       
        return $this->render('voiture/stat.html.twig', [
            'res'=>$result
        ]);
    }


     /**
     * @Route("/stat2", name="stat2")
     */
    public function stat2(TicketPeageRepository $repo,EntityManagerInterface $em): Response
    {
       $sql=$em->createQuery("SELECT v FROM App\Entity\Voiture v JOIN v.ticketpeage t where t.nomPeage='morneg'");
       $result=$sql->getResult();
       //dd($result);
        return $this->render('voiture/stat2.html.twig', [
            'res'=>$result
        ]);
    }



    /**
     * @Route("/updateticket2/{id}", name="updateticket2")
     */
    public function updateticket2(Request $req,TicketPeageRepository $repo,$id): Response
    {
        $ticket=$repo->find($id);
        $form=$this->createForm(TestType::class,$ticket);
        $form->handleRequest($req);
        if ($form->isSubmitted()) {
            $em=$this->getDoctrine()->getManager();
            //$em->persist($ticket);
            $em->flush();
            return $this->redirectToRoute('geticket');
        }
        return $this->render('voiture/updateticket2.html.twig', [
            'f' => $form->createView(),
        ]);
    }
}
