<?php
/**
 * Created by PhpStorm.
 * User: AnCat
 * Date: 28/10/2016
 * Time: 09:34
 */

namespace BlogBundle\Service;


class CommentairesManager
{

    /**
     * Compte le nombre de commentaire pour un article
     * @param $id
     * @return mixed
     */
    public function countCommentaires($id)
    {
        
        return $this->query('SELECT COUNT(*) FROM commentaires WHERE id_article = ' . $id)->fetchColumn();
    }

}