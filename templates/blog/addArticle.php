<?php $title = 'Le blog du hacker - Nouvel article'; 
require_once('../src/core/helpers/resourceLoader.php');
?>

<?php ob_start(); ?>

<section class="blog-area section">
		<div class="container">

        <?php if(isset($success)) { ?>
            <div class="row">
                <div class="col-lg-6 alert alert-success alert-dismissable">
                    <p style="color: green"> <?= $success ?> </p>
                </div>
            </div>
        <?php } ?>

        <?php if(isset($error)) { ?>
            <div class="row">
                <div class="col-lg-6 alert alert-danger alert-dismissable">
                    <p style="color:red"> <?= $error ?> </p>
                </div>
            </div>
        <?php } ?>

			<div class="row">

                <div class="col-lg-8 col-sm-12">
                    <form action="index.php?action=storeArticle" method="POST" enctype="multipart/form-data">
                            <fieldset>
                                <legend>Informations de l'article</legend>

                                <div class="form-group">
                                    <label for="titre">Titre</label>
                                    <input type="text" required id="titre" name="titre" placeholder="Le titre de l'article" class="form-control"/>
                                </div>

                                <div class="form-group">
                                    <label for="contenu">Contenu</label>
                                    <textarea name="contenu" required id="contenu" class="form-control" cols="30" rows="10">Le contenu de l'article.</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="categorie">Catégorie</label>
                                    <select name="categorie" required id="categorie" class="form-control">
                                        <?php foreach($this->allCategories as $category){ ?>
                                        <option value="<?= $category->getId() ?>"><?= $category->getLibelle() ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="image">Image descriptive</label>
                                    <input type="file" name="image" id="image" class="form-control"/>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>Informations de l'auteur</legend>

                                <div class="form-group">
                                    <label for="nom">Nom</label>
                                    <input type="text" id="nom" required name="nom" placeholder="Votre nom" class="form-control"/>
                                </div>

                                <div class="form-group">
                                    <label for="prenom">Prénom</label>
                                    <input type="text" id="prenom" required name="prenom" placeholder="Votre prénom" class="form-control"/>
                                </div>

                                <div class="form-group">
                                    <label for="pseudo">Pseudo</label>
                                    <input type="text" id="pseudo" required name="pseudo" placeholder="Votre pseudo" class="form-control"/>
                                </div>

                                <div class="form-group">
                                    <label for="mail">Adresse email</label>
                                    <input type="text" id="mail" required name="mail" placeholder="Votre adresse email" class="form-control"/>
                                </div>
                            </fieldset>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-paper-plane"></i> Publier</button>
                            <a href="index.php" class="btn btn-danger">Annuler</a>
                        </div>
                    </form>
                </div>

                <?php require_once('../templates/shared/sidebar.php'); ?>

			</div><!-- row -->

		</div><!-- container -->
	</section><!-- section -->

<?php $content = ob_get_clean(); 

require_once('../templates/layout.php');

?>