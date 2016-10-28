<?php
/**
 * Created by PhpStorm.
 * User: AnCat
 * Date: 26/10/2016
 * Time: 15:47
 */

namespace BlogBundle\Controller;

use BlogBundle\Service\CommentairesManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class BlogController extends Controller
{
    /**
     * Page d'accueil du site avec affichage des articles
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
     * Page d'affichage d'un article
     * @Route("article/{id}", name="article", requirements={"page": "\d+"})
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
            ->findBy(array('idArticle' => $article));

        return array('article' => $article,
            'commentaires' => $commentaire
        );
    }


    /**
     * Page d'affichage des membres
     * @Route("membres", name="membres")
     * @Template("Blog/membres.html.twig")
     */
    public function viewMemberAction()
    {
        $users = $this->getDoctrine()
            ->getManager()
            ->getRepository('BlogBundle:Membres')
            ->findAll();

        return array('users' => $users);
    }


    /**
     * Page d'affichage d'un utilisateur
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