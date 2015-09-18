<?php

namespace Blog\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT a
            FROM BlogArticleBundle:Article a
            ORDER BY a.article_date DESC');
        $articles = $query->getResult();

        return $this->render('BlogArticleBundle:Article:index.html.twig', array('articles' => $articles));
    }

    public function postAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $article = $em->getRepository('BlogArticleBundle:Article')->find($id);
        if ( !$article ) {
            return $this->redirect($this->generateUrl('article_homepage'));
        }
//        dump($article);die;
        return $this->render('BlogArticleBundle:Article:post.html.twig', array('article' => $article));

    }
}
