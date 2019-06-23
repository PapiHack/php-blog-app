<div class="col-lg-4 col-md-12">

    <div class="single-post info-area ">

        <div class="about-area">
            <h4 class="title"><b>A Propos du <code>blog du hacker</code></b></h4>
            <p>Petit blog créé par un jeune passionné de programmation, de developpement et de 
             sécurité informatique en particulier le <code>Ethical Hacking</code>.
             Nous partegerons avec vous des sujets qui parlent essentiellement de sécurité : 
             techniques, exploits, tuto, etc.
             </p>
        </div>

        <div class="subscribe-area">

            <h4 class="title"><b>S'abonner</b></h4>
            <div class="input-area">
                <form>
                    <input class="email-input" type="text" placeholder="Votre adresse email">
                    <button class="submit-btn" type="submit"><i class="ion-ios-email-outline"></i></button>
                </form>
            </div>

        </div><!-- subscribe-area -->

        <div class="tag-area">

            <h4 class="title"><b>CATEGORIES</b></h4>
            <ul>
                <?php foreach($this->allCategories as $category){
                    ?>
                    <li><a href="index.php?action=articlesByCategory&category=<?= $category->getId()?>"><?= $category->getLibelle() ?></a></li>
                <?php } ?>
            </ul>

        </div><!-- subscribe-area -->

    </div><!-- info-area -->

</div><!-- col-lg-4 col-md-12 -->