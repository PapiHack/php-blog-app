<?php

require_once('../config/autoloader.php');

/**
 * 
 * @author P@piHack3R
 * @since  06/19
 * @version 1.0.0
 * 
 * Classe chargée de rendre les différentes vues.
 * 
 */
class View 
{
    private $db;
    private $articleManager;
    private $auteurManager;
    private $categorieManager;
    private $commentaireManager;
    private $allCategories;
    private $allArticles;

    public function __construct()
    {
        $this->db = Connexion::getConnexion();
        $this->articleManager = new ArticleManager($this->db);
        $this->auteurManager = new AuteurManager($this->db);
        $this->categorieManager = new CategorieManager($this->db);
        $this->commentaireManager = new CommentaireManager($this->db);
        $this->allCategories = $this->categorieManager->getAll();
        $this->allArticles = $this->articleManager->getAll();
    }

    public function getAllCategories()
    {
        return $this->allCategories;
    }

    public function index()
    {
        //$articles = $articleManager->getAll();
        require_once('../templates/blog/index.php');
    }

    public function newArticle()
    {
        require_once('../templates/blog/addArticle.php');
    }

    public function newCategory()
    {
        require_once('../templates/blog/addCategory.php');
    }

    public function storeCategory()
    {
        if(!$this->categorieManager->is_exist($_POST['libelle']))
        {
            $this->categorieManager->add(new Categorie(['id' => '', 'libelle' => $_POST['libelle']]));
            $success = 'Catégorie bien ajoutée !';
            require_once('../templates/blog/addCategory.php');
        }
        else
        {
            $error = 'Cette catégorie existe déjà !';
            require_once('../templates/blog/addCategory.php');
        }
    }

    public function storeArticle()
    {
        if(!$this->auteurManager->pseudo_exist($_POST['pseudo']))
        {
            if(!$this->auteurManager->mail_exist($_POST['mail']))
            {
                $auteur = new Auteur([
                    'id'     => '',
                    'nom'    => $_POST['nom'],
                    'prenom' => $_POST['prenom'],
                    'pseudo' => $_POST['pseudo'],
                    'mail'   => $_POST['mail']
                ]);

                if($this->uploadFile($_FILES['image']))
                {
                    $this->auteurManager->add($auteur);

                    $article = new Article([
                        'id'        => '',
                        'titre'     => $_POST['titre'],
                        'contenu'   => $_POST['contenu'],
                        'categorie' => $this->categorieManager->get($_POST['categorie'])->getId(),
                        'auteur'    => $this->auteurManager->getByPseudo($auteur->getPseudo())->getId(),
                        'image'     => basename($_FILES['image']['name']),
                    ]);

                    $this->articleManager->add($article);

                    $success = 'Cet article a bien été ajouté !';
                    require_once('../templates/blog/addArticle.php');
                }
            }
            else
            {
                $error = 'Cette adresse email existe déjà !';
                require_once('../templates/blog/addArticle.php');
            }
        }
        else
        {
            $error = 'Ce pseudo existe déjà !';
            require_once('../templates/blog/addArticle.php');
        }
    }

    private function uploadFile($file)
    {
        if (isset($file) AND $file['error'] == 0)
        {

            if ($file['size'] <= 1000000)
            {

                $infosfichier = pathinfo($file['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');

                if (in_array($extension_upload, $extensions_autorisees))
                {
                    move_uploaded_file($file['tmp_name'], '../public/uploads/'.basename($file['name']));
                    return true;
                }
            }
        }
    }
}