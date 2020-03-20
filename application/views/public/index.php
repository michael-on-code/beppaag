<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 31/10/2019
 * Time: 11:40
 */
//var_dump($options);exit;
if (isset ($sliders) && !empty($sliders) && isset ($slidersElements) && !empty($slidersElements)) {

	?>
	<div class="main-slider wf100">
		<div id="home-slider" class="owl-carousel owl-theme">
			<!--Item Start-->
			<?php
			$sliderCounts = count($sliders);
			$imageIndex = 0;
			foreach ($slidersElements as $key=> $element) {
				if($imageIndex >= $sliderCounts ){
					$imageIndex=0;
				}
				?>
				<!--Item Start-->
				<div class="item">
					<div class="h3-slider-caption">
						<div class="container">
							<ul class="banner-tags">
								<li><?= $element['type'] ?></li>
							</ul>
							<a class="slider-text" href="<?= $element['link'] ?>"><strong><?= $element['title'] ?></strong></a>
							<a class="slider-button" href="<?= $element['link'] ?>">Découvrir</a></div>
					</div>
					<img src="<?= getUploadedImageBySize($sliders[$imageIndex], '1920x700') ?>" alt=""></div>
				<!--Item End-->
				<?php
				$imageIndex++;
			}
			?>
		</div>
	</div>
	<?php
}
?>


<!--Slider End-->
<!--Main Content Start-->
<div class="main-content">
	<section class="wf100 p80 h2-local-brands depart-info">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h2>Parcourir & Découvrir</h2>
						<p class="black-color font-size-21-big-screen">Découvrez les pages essentielles de notre
							plateforme de Gestion des Processus Evaluatifs au
							Bénin à partir desquelles vous retrouverez toutes les informations
							relatives aux évaluations au Bénin
						</p>
					</div>
					<div class="row">
						<!--Local Box Start-->
						<!--						<div class="col-md-1"></div>-->
						<div class="col-md-4 col-sm-4 col-xs-6">
							<div class="deprt-icon-box">
								<a href="<?= site_url('evaluations') ?>">
									<img data-src="<?= $assetsUrl ?>public/images/report-symbol.png" alt="">
								</a>

								<h6><a href="<?= site_url('evaluations') ?>">Evaluations</a></h6>
								<a class="rm" href="<?= site_url('evaluations') ?>">Découvrir</a>
							</div>
						</div>
						<!--Local Box End-->
						<!--Local Box Start-->
						<div class="col-md-4 col-sm-4 col-xs-6">
							<div class="deprt-icon-box">
								<a href="<?= site_url('events') ?>">
									<img data-src="<?= $assetsUrl ?>public/images/calendar-symbol.png" alt="">
								</a>

								<h6><a href="<?= site_url('events') ?>">Evènements</a></h6>
								<a class="rm" href="<?= site_url('events') ?>">Découvrir</a>
							</div>
						</div>
						<!--Local Box End-->
						<!--Local Box Start-->
						<div class="col-md-4 col-sm-4 col-xs-6">
							<div class="deprt-icon-box">
								<a href="<?= site_url('blog') ?>">
									<img data-src="<?= $assetsUrl ?>public/images/brochure-symbol.png" alt="">
								</a>
								<h6><a href="<?= site_url('blog') ?>">Actualités</a></h6>
								<a class="rm" href="<?= site_url('blog') ?>">Découvrir</a>
							</div>
						</div>
						<!--Local Box End-->
						<!--Local Box Start-->
						<div class="col-md-4 col-sm-4 col-xs-6">
							<div class="deprt-icon-box">
								<a href="<?= site_url('evaluations') ?>">
									<img data-src="<?= $assetsUrl ?>public/images/agreement.png" alt="">
								</a>
								<h6><a href="<?= site_url('evaluations') ?>">Coopération en évaluation</a>
								</h6>
								<a class="rm" href="<?= site_url('evaluations') ?>">Découvrir</a>
							</div>
						</div>
						<!--Local Box End-->
						<!--Local Box Start-->
						<div class="col-md-4 col-sm-4 col-xs-6">
							<div class="deprt-icon-box">
								<a data-scroll-nav="1" href="<?= site_url('/') ?>">
									<img data-src="<?= $assetsUrl ?>public/images/analysis-symbol.png" alt="">
								</a>
								<h6><a data-scroll-nav="1" href="<?= site_url('/') ?>">Statistiques</a>
								</h6>
								<a class="rm" data-scroll-nav="1" href="<?= site_url('/') ?>">Découvrir</a>
							</div>
						</div>
						<!--Local Box End-->
						<!--Local Box Start-->
						<div class="col-md-4 col-sm-4 col-xs-6">
							<div class="deprt-icon-box">
								<a href="<?= site_url() ?>">
									<img data-src="<?= $assetsUrl ?>public/images/about.png" alt="">
								</a>
								<h6><a href="<?= site_url() ?>">A propos du BEPPAAG</a>
								</h6>
								<a class="rm" href="<?= site_url() ?>">Découvrir</a>
							</div>
						</div>
						<!--Local Box End-->

					</div>
				</div>
				<?php
				/*if ($options['site_director_name'] && $options['site_director_photo'] && $options['site_director_phrase']) {
					*/ ?><!--
					<div class="col-md-4">
						<div class="Mayor-msg">
							<div class="Mayor-thumb"><img
									data-src="<? /*= getUploadedImageBySize($options['site_director_photo'], '445x350') */ ?>"
									alt="<? /*= $options['site_director_name'] */ ?>"></div>
							<div class="Mayor-text"><span>Le mot du Directeur</span>
								<h5><? /*= $options['site_director_name'] */ ?></h5>
								<p> <? /*= $options['site_director_phrase'] */ ?></p>
								</div>
						</div>
					</div>
					--><?php
				/*				}*/
				?>

			</div>

		</div>
	</section>
	<!--Local Boards & Services End-->
	<!--Event Festivals & News Articles Start-->
	<?php
	if (!empty($latestPosts)) {
		?>
		<section class="wf100 city-news p75">
			<div class="container">
				<div class="title-style-3">
					<div class="row">
						<div class="col-md-10 col-sm-6">
							<h3>Nos dernières actualités & publications</h3>
						</div>
						<div class="col-md-2 col-sm-6 title-style-2">
							<a href="<?= site_url('blog') ?>">Voir tout</a>
						</div>
					</div>
					<p>Restez au courant de nos dernières actualiés & publications en rapport avec la gestion des
						processus évaluatifs</p>
				</div>
				<div class="row">
					<!--News Box Start-->
					<?php
					foreach ($latestPosts as $post) {
						getPostTemplatePreview($post, $options);
					} ?>


				</div>
			</div>
		</section>
		<?php
	}
	if (!empty($eventsToCome)) {
		?>
		<section class="wf100 p80 news-event">
			<div class="container">
				<div class="row">
					<div class="title-style-2 wf100">
						<div class="col-md-4 col-sm-6 m-b-20">
							<h2>Evènements à venir</h2>
						</div>
						<div class="col-md-6 col-sm-6 outerTitleDescription">
							<p class="innerTitleDescription">Retrouvez les évènements à venir organisés par la BEPPAAG
								au sujet de la gestion des processus evaluatifs</p>
						</div>
						<div class="col-md-2 "><a class="mg-t-17" href="<?= site_url('events') ?>">Voir tout</a></div>
					</div>
				</div>
				<div class="row">
					<?php
					foreach ($eventsToCome as $event) {
						getEventTemplatePreview($event);
					}
					?>
				</div>
			</div>
		</section>
		<?php
	}if (!empty($latestEvents)) {
		?>
		<section class="wf100 p80 news-event">
			<div class="container">
				<div class="row">
					<div class="title-style-2 wf100">
						<div class="col-md-4 col-sm-6 m-b-20">
							<h2>Derniers évènements</h2>
						</div>
						<div class="col-md-6 col-sm-6 outerTitleDescription">
							<p class="innerTitleDescription">Retrouvez les derniers évènements organisés par la BEPPAAG
								au sujet de la gestion des processus evaluatifs</p>
						</div>
						<div class="col-md-2 "><a class="mg-t-17" href="<?= site_url('events') ?>">Voir tout</a></div>
					</div>
				</div>
				<div class="row">
					<?php
					foreach ($latestEvents as $event) {
						getEventTemplatePreview($event);
					}
					?>
				</div>
			</div>
		</section>
		<?php
	}
	?>
	<style>
		.fact-newsletter {
			background: url(<?= $assetsUrl ?>public/images/etoile-rouge1.jpg) no-repeat;
			background-size: cover;
		}
	</style>
	<section class="wf100 p80 fact-newsletter" data-scroll-index="1">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="title-style-1 white">
						<h2>Nos chiffres</h2>
					</div>
					<div class="row">
						<ul class="counter">
							<li class="col-md-4 col-sm-4">
								<div class="fact-box"><i><img
											data-src="<?= $assetsUrl ?>public/images/report-symbol.png" alt=""></i>
									<strong><?= $totalEvaluations ?></strong> <span>Evaluations publiées</span>
								</div>
							</li>
							<li class="col-md-4 col-sm-4">
								<div class="fact-box"><i><img data-src="<?= $assetsUrl ?>public/images/calendar.png"
															  alt=""></i> <strong><?= $totalEvents ?></strong> <span>Evènements organisés</span>
								</div>
							</li>
							<li class="col-md-4 col-sm-4">
								<div class="fact-box"><i><img data-src="<?= $assetsUrl ?>public/images/brochure.png"
															  alt=""></i> <strong><?= $totalPosts ?></strong> <span>Articles publiés</span>
								</div>
							</li>
							<li class="col-md-4 col-sm-4">
								<div class="fact-box"><i><img data-src="<?= $assetsUrl ?>public/images/visibility.png"
															  alt=""></i>
									<strong><?= (int) maybe_null_or_empty($options, 'total_view_count') ?></strong>
									<span>Total vues du site</span></div>
							</li>
							<li class="col-md-4 col-sm-4">
								<div class="fact-box"><i><img data-src="<?= $assetsUrl ?>public/images/eval-views.png"
															  alt=""></i>
									<strong><?= (int) maybe_null_or_empty($options, 'total_evaluation_view_count') ?></strong>
									<span>Total vues évaluations</span>
								</div>
							</li>
							<li class="col-md-4 col-sm-4">
								<div class="fact-box"><i><img data-src="<?= $assetsUrl ?>public/images/download-icon.png"
															  alt=""></i>
									<strong><?= $totalNonExecutedRecommendation ?></strong>
									<span>Total téléchargements</span></div>
							</li>


						</ul>
					</div>
				</div>
				<div class="col-md-4">
					<!--Stay Connected Start-->
					<div class="stay-connected">
						<h5>Restez connectés</h5>
						<p>Restez au courant de nos dernières évaluations, actualités & evènements en souscrivant à
							notre Newsletter</p>
						<?php
						echo form_open('', [
							'id' => 'newsletter_form'
						]);
						?>
						<div class="alert alert-dismissable" style="display: none">

						</div>
						<ul>
							<li>
								<?= form_input([
									'name' => 'fullname',
									'class' => 'form-control',
									'placeholder' => 'Saisissez votre nom',
									'required' => '',
								]) ?>
							</li>
							<li>
								<?= form_input([
									'name' => 'email',
									'class' => 'form-control',
									'placeholder' => 'Saisissez votre email',
									'required' => '',
									'type' => 'email',
								]) ?>
							</li>
							<li>
								<button type="submit">Soumettre</button>
							</li>
						</ul>
						<?php
						echo form_close();
						?>
					</div>
					<!--Stay Connected End-->
				</div>
			</div>
		</div>
	</section>
</div>
