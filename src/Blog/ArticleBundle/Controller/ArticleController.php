<?php

namespace Blog\ArticleBundle\Controller;

use Blog\ArticleBundle\Entity\Article;
use Blog\ArticleBundle\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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

    public function createAction(Request $request)
    {
        $article = new Article();

        $article->setArticleDate(new \DateTime('now'));
        $article->setArticleIspublished(true);

        $form = $this->createForm(new ArticleType(), $article);
        $form->add("submit", "submit", array(
            "label" => "Создать статью"));

        $form->handleRequest($request);
        if ($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();
            return $this->redirect($this->generateUrl('article_homepage'));
        }

        return $this->render('BlogArticleBundle:Article:create.html.twig', array(
            'article' => $article,
            'createform' => $form->createView(),
        ));


    }
}
