<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/articles')]
class ArticleController extends AbstractController
{
    #[Route('/', name: 'article_list')]
    public function list(ArticleRepository $repo): Response
    {
        $articles = $repo->findAll();
        return $this->render('article/list.html.twig', ['articles' => $articles]);
    }

    #[Route('/nouveau', name: 'article_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        if ($request->isMethod('POST')) {
            $article = new Article();
            $article->setTitre($request->request->get('titre'));
            $article->setContenu($request->request->get('contenu'));
            
            $em->persist($article);
            $em->flush();
            
            return $this->redirectToRoute('article_list');
        }

        return $this->render('article/new.html.twig');
    }

    #[Route('/{id}/edit', name: 'article_edit', methods: ['GET', 'POST'])]
    public function edit(Article $article, Request $request, EntityManagerInterface $em): Response
    {
        if ($request->isMethod('POST')) {
            $article->setTitre($request->request->get('titre'));
            $article->setContenu($request->request->get('contenu'));
            
            $em->flush();
            
            return $this->redirectToRoute('article_list');
        }

        return $this->render('article/edit.html.twig', ['article' => $article]);
    }

    #[Route('/{id}/delete', name: 'article_delete', methods: ['POST'])]
    public function delete(Article $article, EntityManagerInterface $em): Response
    {
        $em->remove($article);
        $em->flush();

        return $this->redirectToRoute('article_list');
    }
}
