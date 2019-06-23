<?php $title = 'Le blog du hacker'; 
require_once('../src/core/helpers/resourceLoader.php');
?>

<?php ob_start(); ?>

<section class="blog-area section">
		<div class="container">

			<div class="row">

				<div class="col-lg-8 col-md-12">
					<div class="row">
						<?php foreach($this->allArticles as $article) { 
							
							if($article->getImage()) {
							
							?>
							
						<div class="col-md-6 col-sm-12">
							<div class="card h-100">
								<div class="single-post post-style-1">

									<div class="blog-image"><img src="<?= assetUpload($article->getImage()) ?>" alt="Blog Image"></div>

									<a class="avatar" href="#"><img src="<?= asset('images/icons8-team-355979.jpg')?>" alt="Profile Image"></a>

									<div class="blog-info">

										<h4 class="title"><a href="#"><b> <?= $article->getContenu() ?> </b></a></h4>

										<ul class="post-footer">
											<li><a href="#"><i class="ion-heart"></i>57</a></li>
											<li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
											<li><a href="#"><i class="ion-eye"></i>138</a></li>
										</ul>

									</div><!-- blog-info -->
								</div><!-- single-post -->
							</div><!-- card -->
						</div><!-- col-md-6 col-sm-12 -->
						<?php }
							else 
							{ ?>
								
								<div class="col-md-6 col-sm-12">
									<div class="card h-100">

										<div class="single-post post-style-2 post-style-3">

											<div class="blog-info">

												<h6 class="pre-title"><a href="#"><b>HEALTH</b></a></h6>

												<h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
													Concepts in Physics?</b></a></h4>

												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
													ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>

												<div class="avatar-area">
													<a class="avatar" href="#"><img src="<?= asset('images/icons8-team-355979.jpg') ?>" alt="Profile Image"></a>
													<div class="right-area">
														<a class="name" href="#"><b>Lora Plamer</b></a>
														<h6 class="date" href="#">on Sep 29, 2017 at 9:48am</h6>
													</div>
												</div>

												<ul class="post-footer">
													<li><a href="#"><i class="ion-heart"></i>57</a></li>
													<li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
													<li><a href="#"><i class="ion-eye"></i>138</a></li>
												</ul>

											</div><!-- blog-right -->

										</div><!-- single-post extra-blog -->

									</div><!-- card -->
								</div><!-- col-md-6 col-sm-12 -->

							<?php
							} 
						}
						?>

					</div><!-- row -->

					<a class="load-more-btn" href="#"><b>LOAD MORE</b></a>

				</div><!-- col-lg-8 col-md-12 -->

                <?php require_once('../templates/shared/sidebar.php'); ?>

			</div><!-- row -->

		</div><!-- container -->
	</section><!-- section -->

<?php $content = ob_get_clean(); 

require_once('../templates/layout.php');

?>