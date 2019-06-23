<?php

/**
 * 
 * @author P@piHack3R
 * @since  06/19
 * @version 1.0.0
 * 
 * Classe représentant le gestionnaire d'un auteur. Elle gére les opérations C.R.U.D 
 * d'un ou des auteurs.
 * 
 */
class AuteurManager
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

    public function add(Auteur $auteur)
    {
        $request = $this->db->prepare('INSERT INTO auteur (nom, prenom, pseudo, mail) 
                        VALUES(:nom, :prenom, :pseudo, :mail)');

        return $request->execute([
            'nom'    => $auteur->getNom(),
            'prenom' => $auteur->getPrenom(),
            'pseudo' => $auteur->getPseudo(),
            'mail'   => $auteur->getMail()
        ]);
    }

    public function remove(Auteur $auteur)
    {
        return $this->db->exec('DELETE FROM auteur WHERE id = '. $auteur->getId());
    }

    public function getAll()
    {
        $auteurs = array();

        $request = $this->db->query('SELECT * FROM auteur');

        while($data = $request->fetch(PDO::FETCH_ASSOC))
        {
            $auteurs [] = new Auteur($data);
        }

        return $auteurs;
    }

    public function get($id)
    {
        $id = (int) $id;

        $request = $this->db->query('SELECT * FROM auteur WHERE id = '.$id);
        $data = $request->fetch(PDO::FETCH_ASSOC);

        return new Auteur($data);
    }

    public function update(Auteur $auteur)
    {
        $request = $this->db->prepare('UPDATE auteur SET nom = :nom, prenom = :prenom, pseudo = :pseudo, 
                                mail = :mail WHERE id = :id');

        return $request->execute([
            'nom'    => $auteur->getNom(),
            'prenom' => $auteur->getPrenom(),
            'pseudo' => $auteur->getPseudo(),
            'mail'   => $auteur->getMail(),
            'id'     => $auteur->getId()
        ]);
    }

    public function pseudo_exist($pseudo)
    {
        $request = $this->db->prepare('SELECT * FROM auteur WHERE pseudo = :pseudo');
        $request->execute(['pseudo' => $pseudo]);
        return count($request->fetchAll());
    }

    public function mail_exist($mail)
    {
        $request = $this->db->prepare('SELECT * FROM auteur WHERE mail = :mail');
        $request->execute(['mail' => $mail]);
        return count($request->fetchAll());
    }

    public function getByPseudo($pseudo)
    {

        $request = $this->db->prepare('SELECT * FROM auteur WHERE pseudo = :pseudo');
        $request->execute(['pseudo' => $pseudo]);
        $data = $request->fetch(PDO::FETCH_ASSOC);

        return new Auteur($data);
    }
}