<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 30/11/2019
 * Time: 06:10
 */
getBreadcrump([
	'title' => $pageTitle,
], $options, 'evaluation')
?>
<style type="text/css">


</style>
<div class="main-content p80 evaluation-single">
	<!--News Details Page Start-->
	<div class="news-details">
		<div class="container-fluid">
			<div class="row evaluation-section">
				<!--Content Col Start-->
				<div class="col-md-3 pos-relative">
					<div class="evaluation-sidebar-container evaluation-sidebar sidebar">
						<div class="widget">
							<div class="evaluation-sidebar-content" data-scroll-nav="1">
								<h6>Informations générales</h6>
							</div>
							<div class="evaluation-sidebar-content" data-scroll-nav="2">
								<h6>Objectifs et Résultats attendus</h6>
							</div>
							<div class="evaluation-sidebar-content" data-scroll-nav="3">
								<h6>Description sommaire</h6>
							</div>
							<div class="evaluation-sidebar-content" data-scroll-nav="4">
								<h6>Approche méthodologique</h6>
							</div>
							<div class="evaluation-sidebar-content" data-scroll-nav="5">
								<h6>Questions évaluatives</h6>
							</div>
							<div class="evaluation-sidebar-content" data-scroll-nav="6">
								<h6>Recommandations</h6>
							</div>
							<div class="evaluation-sidebar-content">
								<a download="" href="<?= $uploadPath . $evaluation['evaluation_file'] ?>"
								   class="my-download-btn">
									<h6>Rapport complet <img class="symbol-icon"
															 data-src="<?= $assetsUrl ?>public/images/pdf.png" alt="">
									</h6>
								</a>
							</div>
							<?php
							if ($evaluation['annexe_file_1'] && $evaluation['annexe_file_1'] != "") {
								?>
								<div class="evaluation-sidebar-content">
									<a class="my-download-btn" download=""
									   href="<?= $uploadPath . $evaluation['annexe_file_1'] ?>">
										<h6>Annexe 1 <img class="symbol-icon"
														  data-src="<?= $assetsUrl ?>public/images/pdf.png" alt=""></h6>
									</a>
								</div>
								<?php
							}
							if ($evaluation['annexe_file_2'] && $evaluation['annexe_file_2'] != "") {
								?>
								<div class="evaluation-sidebar-content">
									<a download="" href="<?= $uploadPath . $evaluation['annexe_file_1'] ?>">
										<h6>Annexe 2 <img class="symbol-icon"
														  data-src="<?= $assetsUrl ?>public/images/pdf.png" alt=""></h6>
									</a>
								</div>
								<?php
							}

							?>
							<div class="evaluation-sidebar-content">
								<h6 class="recommendations">Résumé de recommandation <img class="symbol-icon"
																						  data-src="<?= $assetsUrl ?>public/images/pdf.png"
																						  alt=""></h6>
							</div>
							<div class="evaluation-sidebar-content">
								<h6>Télécharger tout <img class="symbol-icon"
														  data-src="<?= $assetsUrl ?>public/images/zip.png" alt=""></h6>
							</div>
							<div class="evaluation-sidebar-content">
								<a href="<?= site_url('evaluations') ?>"><h6><i class="fas fa-long-arrow-left"></i>
										Retour</h6></a>
							</div>


						</div>

					</div>
				</div>
				<div class="col-md-9 evaluation-start">
					<div class="row">
						<div class="col-md-9 evaluation-box">
							<div class="news-box">
								<div class="text-center">
									<img style="width: auto;"
										 data-src="<?= getUploadedImageBySize($evaluation['cover_photo'], '360x420') ?>"
										 alt="<?= $evaluation['title'] ?>">
								</div>
								<?php
								$permalink = site_url("evaluations/{$evaluation['id']}")
								?>
								<div class="share-post-single"><strong>Partager l'évaluation sur :</strong> <a <?= getSharerAttributes($permalink, $evaluation['title'], 'facebook') ?> class="fb"> <i
											class="fab fa-facebook-f"></i></a> <a <?= getSharerAttributes($permalink, $evaluation['title'], 'twitter') ?> class="tw"> <i
											class="fab fa-twitter"></i></a> <a <?= getSharerAttributes($permalink, $evaluation['title'], 'linkedin') ?> class="linked"> <i
											class="fab fa-linkedin-in"></i></a> <a <?= getSharerAttributes($permalink, $evaluation['title'], 'whatsapp') ?> class="whatsapp"> <i
											class="fab fa-whatsapp"></i></a> </div>
							</div>
							<div class="bs-example">
								<div class="panel-group" id="accordion">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Informations
													générales</a>
											</h4>
										</div>
										<div data-scroll-index="1" id="collapseOne" class="panel-collapse collapse in">
											<div class="panel-body">

												<div class="row myRow">
													<div class="col-sm-6">
														<label for="">Titre :</label>
														<p><?= $evaluation['title'] ?></p>
													</div>
													<div class="col-sm-6">
														<label for="">Année :</label>
														<p><?= $evaluation['year'] ?></p>
													</div>
												</div>
												<div class="row myRow">
													<div class="col-sm-6">
														<label for="">Authorité contractante :</label>
														<p><?= $evaluation['contracting_authority'] ?>
															: <?= $evaluation['contracting_authority_desc'] ?></p>
													</div>
													<div class="col-sm-6">
														<label for="">Structure ayant conduit l'évaluation :</label>
														<p><?= $evaluation['leading_authority'] ?>
															: <?= $evaluation['leading_authority_desc'] ?></p>
													</div>
												</div>
												<div class="row myRow">
													<div class="col-sm-6">
														<label for="">Type d'évaluation :</label>
														<p><?= $evaluation['type'] ?> </p>
													</div>
													<div class="col-sm-6">
														<label for="">Objet de l'évaluation :</label>
														<p><?= $evaluation['object'] ?></p>
													</div>
												</div>
												<div class="row myRow">
													<div class="col-sm-6">
														<label for="">Thématiques transversales traitées :</label>
														<p><?= $evaluation['thematic_id'] ?> </p>
													</div>
													<div class="col-sm-6">
														<label for="">Secteur concerné :</label>
														<p><?= $evaluation['sector_id'] ?></p>
													</div>
												</div>


											</div>
										</div>
									</div>
									<div data-scroll-index="2" class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Objectifs
													et résultats attendus</a>
											</h4>
										</div>
										<div id="collapseTwo" class="panel-collapse collapse in">
											<div class="panel-body">
												<?= $evaluation['objective'] ?>
											</div>
										</div>
									</div>
									<div data-scroll-index="3" class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a data-toggle="collapse" data-parent="#accordion"
												   href="#collapseThree">Description sommaire</a>
											</h4>
										</div>
										<div id="collapseThree" class="panel-collapse collapse in">
											<div class="panel-body">
												<?= $evaluation['description'] ?>
											</div>
										</div>
									</div>
									<div data-scroll-index="4" class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Approche
													méthodologique</a>
											</h4>
										</div>
										<div id="collapseFour" class="panel-collapse collapse in">
											<div class="panel-body">
												<?= $evaluation['methodological_approach'] ?>
											</div>
										</div>
									</div>
									<div data-scroll-index="5">
										<div class="panel panel-default questions-heading">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion"
													   href="#collapseFive">Questions
														évaluatives</a>
												</h4>
											</div>
										</div>
										<?php
										if (!empty($evaluation['questions'])) {
											foreach ($evaluation['questions'] as $question) {
												?>
												<div class="panel panel-default">
													<div id="collapseFive" class="panel-collapse collapse in questions">
														<div class="panel-body">
															<div class="each-question">
																<label for=""><?= $question['title'] ?></label>
																<?= $question['explanation'] ?>
															</div>
														</div>
													</div>
												</div>
												<?php
											}
										}
										?>

									</div>
									<div data-scroll-index="6">
										<div class="panel panel-default questions-heading">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion"
													   href="#collapseFive">Recommandations</a>
												</h4>
											</div>
										</div>
										<?php
										if (!empty($evaluation['recommendations'])) {
											foreach ($evaluation['recommendations'] as $recommendation) {
												?>
												<div class="panel panel-default">
													<div id="collapseFive"
														 class="panel-collapse collapse in recommendations">
														<div class="panel-body">
															<div class="each-recommendation">
																<label for="">
																	<?= $recommendation['title'] ?>
																</label>
																<div class="other-content">
																	<p>
																		<span>Destinataires : </span> <?= $recommendation['recipient'] ?>
																	</p>
																	<p>
																		<span>Niveau d'exécution : </span> <?= getExecutionLevelByRecommendationsFromActivitiesArray(maybe_null_or_empty($recommendation, 'activities')) ?>
																	</p>
																</div>
															</div>
														</div>
													</div>
												</div>
												<?php
											}
										}
										?>

									</div>

								</div>
							</div>
						</div>
						<?php
						$this->load->view('public/evaluations/sidebar'); ?>
					</div>

				</div>

				<!--Content Col End-->
				<!--Sidebar Start-->
				<!--Sidebar End-->
			</div>
		</div>
	</div>
	<!--News Details Page End-->
</div>
