<?php

namespace App\Controller;

use App\Entity\Citoyen;
use App\Repository\CitoyenRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/citoyens')]
class CitoyenController extends AbstractController
{
    #[Route('/', name: 'citoyen_list')]
    public function list(CitoyenRepository $repo): Response
    {
        $citoyens = $repo->findAll();
        return $this->render('citoyen/list.html.twig', ['citoyens' => $citoyens]);
    }

    #[Route('/nouveau', name: 'citoyen_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        if ($request->isMethod('POST')) {
            $citoyen = new Citoyen();
            $citoyen->setNom($request->request->get('nom'));
            $citoyen->setEmail($request->request->get('email'));
            
            $em->persist($citoyen);
            $em->flush();
            
            return $this->redirectToRoute('citoyen_list');
        }

        return $this->render('citoyen/new.html.twig');
    }

    #[Route('/{id}/edit', name: 'citoyen_edit', methods: ['GET', 'POST'])]
    public function edit(Citoyen $citoyen, Request $request, EntityManagerInterface $em): Response
    {
        if ($request->isMethod('POST')) {
            $citoyen->setNom($request->request->get('nom'));
            $citoyen->setEmail($request->request->get('email'));
            
            $em->flush();
            
            return $this->redirectToRoute('citoyen_list');
        }

        return $this->render('citoyen/edit.html.twig', ['citoyen' => $citoyen]);
    }

    #[Route('/{id}/delete', name: 'citoyen_delete', methods: ['POST'])]
    public function delete(Citoyen $citoyen, EntityManagerInterface $em): Response
    {
        $em->remove($citoyen);
        $em->flush();

        return $this->redirectToRoute('citoyen_list');
    }
}
