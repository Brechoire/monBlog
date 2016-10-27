<?php
/**
 * Created by PhpStorm.
 * User: AnCat
 * Date: 24/10/2016
 * Time: 18:29
 */

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class AnnonceController extends Controller
{
    /**
     * @Route("oc", name="home-page")
     * @Template("default/index.html.twig")
     */
    public function indexAction()
    {

    }

    /**
     * @param $id
     * @return Response
     * @Route("Annonce/{id}", name="Annonce")
     * @Template("default/view.html.twig")
     */
    public function viewAction($id, Request $request)
    {
        // On récupère notre paramètre tag
        $tag = $request->query->get('tag');

        return array(
            'id'  => $id,
            'tag' => $tag,
        );
    }

}