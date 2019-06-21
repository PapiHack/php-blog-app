<?php

/**
 * 
 * @author P@piHack3R
 * @since  06/19
 * @version 1.0.0
 * 
 * Classe représentant le gestionnaire d'un commentaire. Elle gére les opérations C.R.U.D 
 * d'un ou des commentaires.
 * 
 */
class CommentaireManager 
{

    private $db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function getDb($db)
    {
        return $this->db;
    }

    private function setDb($db)
    {
        $this->db = $db;
    }

    public function add(Commentaire $commentaire)
    {
        $request = $this->db->prepare('INSERT INTO commentaire (contenu, article, auteur, date) 
                            VALUES(:contenu, :article, :auteur, :date)');
        
        return $request->execute([
            'contenu' => $commentaire->getContenu(),
            'article' => $commentaire->getArticle()->getId(),
            'auteur'  => $commentaire->getAuteur()->getId(),
            'date'    => $commentaire->getDate()
        ]);
    }

    public function remove(Commentaire $commentaire)
    {
        return $this->db->exec('DELETE FROM commentaire WHERE id = '. $commentaire->getId());
    }

    public function getAll()
    {
        $commentaires = array();

        $request = $this->db->query('SELECT * FROM commentaire');

        while($data = $request->fetch(PDO::FETCH_ASSOC))
        {
            $commentaires [] = new Commentaire($data);
        }

        return $commentaires;
    }

    public function getAllByArticle(Article $article)
    {
        $commentaires = array();

        $request = $this->db->query('SELECT * FROM commentaire WHERE article = '.$article->getId());

        while($data = $request->fetch(PDO::FETCH_ASSOC))
        {
            $commentaires [] = new Commentaire($data);
        }

        return $commentaires;
    }

    public function get($id)
    {
        $id = (int) $id;

        $request = $this->db->query('SELECT * FROM commentaire WHERE id = '.$id);
        $data = $request->fetch(PDO::FETCH_ASSOC);

        return new Commentaire($data);
    }

    public function update(Commentaire $commentaire)
    {
        $request = $this->db->prepare('UPDATE commentaire SET contenu = :contenu, date = :date WHERE id = :id');

        return $request->execute([
            'contenu' => $commentaire->getContenu(),
            'id'      => $commentaire->getId()
        ]);
    }
}