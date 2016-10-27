<?php
/**
 * Created by PhpStorm.
 * User: AnCat
 * Date: 26/10/2016
 * Time: 15:47
 */

namespace BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class BlogController extends Controller
{
    /**
     * @Route("/", name="blog")
     * @Template("Blog/index.html.twig")
     */
    public function indexAction()
    {
        $article = $this->getDoctrine()
            ->getManager()
            ->getRepository('BlogBundle:Articles')
            ->findAll();

        return array('articles' => $article);
    }

    /**
     * @Route("article/{id}", name="article")
     * @Template("Blog/article.html.twig")
     */
    public function viewArticleAction($id)
    {
        $article = $this->getDoctrine()
            ->getManager()
            ->getRepository('BlogBundle:Articles')
            ->find($id);

        $commentaire = $this->getDoctrine()
            ->getManager()
            ->getRepository('BlogBundle:Commentaires')
            ->find($id);

        dump($commentaire);

        return array('article' => $article, 'commentaires' => $commentaire);
    }


    /**
     * @Route("membres", name="membres")
     * @Template("Blog/membres.html.twig")
     */
    public function viewMemberAction()
    {
        $users = $this->getDoctrine()->getManager()->getRepository('BlogBundle:Membres')->findAll();

        return array('users' => $users);
    }


    /**
     * @Route("commentaires", name="commentaires")
     * @Template("Blog/commentaires.html.twig")
     */
    public function viewCommentaireAction()
    {
        $commentaire = $this->getDoctrine()->getManager()->getRepository('BlogBundle:Commentaires')->findAll();

        return array('commentaires' => $commentaire);
    }

    /**
     * @Route("profil/{id}", name="profil")
     * @Template("Blog/profil.html.twig")
     */
    public function viewProfilAction($id)
    {
        $profil = $this->getDoctrine()
            ->getManager()
            ->getRepository('BlogBundle:Membres')
            ->find($id);

        return array('profil' => $profil);
    }
}