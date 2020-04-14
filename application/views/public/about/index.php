<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 31/10/2019
 * Time: 14:41
 */
getBreadcrump([
    'title' => $pageTitle,
], $options);
$assetsUrl=base_url('assets/public/');
?>
<div class="main-content">
	<!--Local Boards & Services-->
	<?php if($options['site_director_name'] && $options['site_director_photo'] && $options['site_director_phrase'] ){
		?>
		<section class="wf100 p80-0">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="h2-Mayor-msg">
							<div class="Mayor-img"> <img src="<?= getUploadedImageBySize($options['site_director_photo'], '445x350') ?>" alt="<?= $options['site_director_name'] ?>"></div>
							<div class="Mayor-txt"> <strong>Le mot du chef de bureau</strong>
								<h4><?= $options['site_director_name'] ?></h4>
								<div class="word-of-director"><?= $options['site_director_phrase'] ?></div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
	if(!empty($options['site_team'])){
		?>
		<div class="team-grid official-members p80-0">
			<div class="container">
				<div class="row">
					<?php
					foreach ($options['site_team'] as $team){
						?>
						<!--Team Box Start-->
						<div class="col-md-4 col-sm-6">
							<div class="h3-team-box">
								<div class="team-info">
									<h5><?= $userName = maybe_null_or_empty($team, 'fullname') ?></h5>
									<strong><?= maybe_null_or_empty($team, 'role') ?></strong>
									<p> <?= maybe_null_or_empty($team, 'bio') ?> </p>
									<?php
									if(maybe_null_or_empty($team, 'facebook_url') ||
									maybe_null_or_empty($team, 'twitter_url') ||
									maybe_null_or_empty($team, 'linkedin_url') ||
									maybe_null_or_empty($team, 'other_url')
									){
										?>
										<ul>
											<li><strong>Réseaux sociaux :</strong></li>
											<?php
											if($socialUrl = maybe_null_or_empty($team, 'facebook_url')){
												?>
												<li><a target="_blank" href="<?= $socialUrl ?>"><i class="fab fa-facebook-f"></i></a></li>
												<?php
											}
											if($socialUrl = maybe_null_or_empty($team, 'twitter_url')){
												?>
												<li><a target="_blank" href="<?= $socialUrl ?>"><i class="fab fa-twitter"></i></a></li>
												<?php
											}
											if($socialUrl = maybe_null_or_empty($team, 'linkedin_url')){
												?>
												<li><a target="_blank" href="<?= $socialUrl ?>"><i class="fab fa-linkedin-in"></i></a></li>
												<?php
											}
											if($socialUrl = maybe_null_or_empty($team, 'other_url')){
												?>
												<li><a target="_blank" href="<?= $socialUrl ?>"><i class="fa fa-globe"></i></a></li>
												<?php
											}

											?>
										</ul>
										<?php
									}
									?>

								</div>
								<?php
								if($photo = maybe_null_or_empty($team, 'photo')){
									?>
									<img src="<?= getUploadedImageBySize($photo, '360x420') ?>" alt="<?= $userName ?>">
									<?php
								}
								?>

							</div>
						</div>
						<!--Team Box End-->
						<?php
					}
					?>
				</div>
			</div>
			<!--Team End-->
		</div>
		<?php
	}
	?>

</div>
