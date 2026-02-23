<?php

namespace App\Controller;

use App\Entity\Signalement;
use App\Repository\SignalementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/signalements')]
class SignalementController extends AbstractController
{
    #[Route('/', name: 'signalement_list')]
    public function list(SignalementRepository $repo): Response
    {
        $signalements = $repo->findAll();
        return $this->render('signalement/list.html.twig', ['signalements' => $signalements]);
    }

    #[Route('/nouveau', name: 'signalement_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        if ($request->isMethod('POST')) {
            $signalement = new Signalement();
            $signalement->setTitre($request->request->get('titre'));
            $signalement->setDescription($request->request->get('description'));
            $signalement->setStatut($request->request->get('statut') ?? 'nouveau');
            
            $em->persist($signalement);
            $em->flush();
            
            return $this->redirectToRoute('signalement_list');
        }

        return $this->render('signalement/new.html.twig');
    }

    #[Route('/{id}/edit', name: 'signalement_edit', methods: ['GET', 'POST'])]
    public function edit(Signalement $signalement, Request $request, EntityManagerInterface $em): Response
    {
        if ($request->isMethod('POST')) {
            $signalement->setTitre($request->request->get('titre'));
            $signalement->setDescription($request->request->get('description'));
            $signalement->setStatut($request->request->get('statut'));
            
            $em->flush();
            
            return $this->redirectToRoute('signalement_list');
        }

        return $this->render('signalement/edit.html.twig', ['signalement' => $signalement]);
    }

    #[Route('/{id}/delete', name: 'signalement_delete', methods: ['POST'])]
    public function delete(Signalement $signalement, EntityManagerInterface $em): Response
    {
        $em->remove($signalement);
        $em->flush();

        return $this->redirectToRoute('signalement_list');
    }
}
