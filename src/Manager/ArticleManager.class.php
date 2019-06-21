<?php

/**
 * 
 * @author P@piHack3R
 * @since  06/19
 * @version 1.0.0
 * 
 * Classe représentant le gestionnaire d'un article. Elle gére les opérations C.R.U.D 
 * d'un ou des articles.
 * 
 */
class ArticleManager
{
    private $db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function getDb()
    {
        return $this->db;
    }

    private function setDb($db)
    {
        $this->db = $db;
    }

    public function add(Article $article)
    {
        $request = $this->db->prepare('INSERT INTO article (titre, contenu, categorie, image, auteur, date) 
                    VALUES(:titre, :contenu, :categorie, :image, :auteur, :date)');

        return $request->execute([
            'titre'     => $article->getTitre(),
            'contenu'   => $article->getContenu(),
            'categorie' => $article->getCategorie()->getId(),
            'image'     => $article->getImage(),
            'auteur'    => $article->getAuteur()->getId(),
            'date'      => $article->getDate()
        ]);
    }

    public function remove(Article $article)
    {
        return $this->db->exec('DELETE FROM article WHERE id = '. $article->getId());
    }

    public function getAll()
    {
        $articles = array();

        $request = $this->db->query('SELECT * FROM article');

        while($data = $request->fetch(PDO::FETCH_ASSOC))
        {
            $articles [] = new Article($data);
        }

        return $articles;
    }

    public function get($id)
    {
        $id = (int) $id;

        $request = $this->db->query('SELECT * FROM artice WHERE id = '.$id);
        $data = $request->fetch(PDO::FETCH_ASSOC);

        return new Article($data);
    }

    public function update(Article $article)
    {
        $request = $this->db->prepare('UPDATE article SET contenu = :contenu, categorie = :categorie, image = :image,
                                    auteur = :auteur, date = :date WHERE id = :id');
        
        return $request->execute([
            'titre'     => $article->getTitre(),
            'contenu'   => $article->getContenu(),
            'categorie' => $article->getCategorie()->getId(),
            'image'     => $article->getImage(),
            'auteur'    => $article->getAuteur()->getId(),
            'date'      => $article->getDate(),
            'id'        => $article->getId()
        ]);
    }

}