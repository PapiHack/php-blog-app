<div class="col-lg-4 col-md-12">

    <div class="single-post info-area ">

        <div class="about-area">
            <h4 class="title"><b>A Propos du <code>blog du hacker</code></b></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur
                Ut enim ad minim veniam</p>
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
                    <li><a href="#"><?= $category->getLibelle() ?></a></li>
                <?php } ?>
            </ul>

        </div><!-- subscribe-area -->

    </div><!-- info-area -->

</div><!-- col-lg-4 col-md-12 -->