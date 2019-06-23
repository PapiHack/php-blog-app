<?php $title = 'Le blog du hacker - Nouvelle catégorie'; 
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
                    <form action="index.php?action=storeCategory" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="libelle">Libellé de la catégorie</label>
                                <input type="text" required id="libelle" name="libelle" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-plus-square-o"></i> Ajouter</button>
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