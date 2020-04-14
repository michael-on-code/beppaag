<div class="main-content">
	<?php getAdminBreadcrump([
		'title' => $pageTitle,
	]) ?>
	<div class="card">
		<div class="card-body">
			<h4><?= $pageTitle ?></h4>
			<p>Le formulaire ci-dessous permet de modifier le contenu de la page d'à propos
			</p>
			<div class="m-t-25">
				<?= form_open('', [
					'id' => 'form-validation'
				]) ?>
				<div class="row">
					<div class="col-md-5 my-account-border-right">
						<h4>Mot du directeur</h4>
						<div class="form-group">
							<?php
							echo form_label($title = "Nom du Directeur", $id = 'site_director_name');
							echo form_input([
								'name' => $name = "about[$id]",
								'placeholder' => $title,
								'class' => 'form-control',
								'id' => $id,
								'required' => '',
								'value' => set_value($name, maybe_null_or_empty($options, $id), false)
							]);
							echo get_form_error($name);
							?>
						</div>
						<div class="form-group">
							<?php
							echo form_label($title = "Mot du directeur", $id = 'site_director_phrase');
							echo form_textarea([
								'name' => $name = "about[$id]",
								'class' => 'my-summernote',
								'id' => $id,
								'required' => '',
								'data-summernote-height' => 250,
								'value' => set_value($name, maybe_null_or_empty($options, $id), false)
							]);
							echo get_form_error($name);
							?>
						</div>
						<div class="form-group ">
							<?php echo form_label($title="Attacher la photo du directeur");
							$target ='site_director_photo';
							$file = set_value($name="about[$target]", maybe_null_or_empty($options, $target, true));
							?>
							<a class="my-file-preview-btn"
							   data-toggle="tooltip" <?= $file ? '' : 'style="display:none;"' ?>
							   data-placement="top" title="Visualiser la photo du directeur" target="_blank"
							   href="<?= $file ? $uploadPath . $file : '#' ?>"> <span
									class="anticon anticon-cloud-upload"></span></a>
							<?php
							$data = [
								'name' => '',
								'attributes' => [
									'data-target' => $target,
									'data-target-name' => $name,
								],
								'title' => $title,
							];
							if ($file) {
								$data['value'] = $uploadPath . $file;
							} else {
								$data['value'] = '';
							}
							echo form_hidden($name, set_value($name, $file));
							get_form_upload($data, $extensions = 'jpg jpeg png', '1M', true, 'auto-upload');
							echo get_form_error($name);
							getFieldInfo('Dimensions recommandées : 445x350 Format : JPG|PNG|JPEG Taille Max : 1M');
							?>
						</div>
					</div>
					<div class="col-md-7">
						<h4>Mission du bureau</h4>
						<div class="form-group">
							<?php
							echo form_label($title = "Mission du bureau", $id = 'site_mission');
							echo form_textarea([
								'name' => $name = "about[$id]",
								'class' => 'my-summernote',
								'id' => $id,
								'data-summernote-height' => 650,
								'value' => set_value($name, maybe_null_or_empty($options, $id), false)
							]);
							echo get_form_error($name);
							?>
						</div>
					</div>
					<div class="col-md-12 mt-5">
						<h4>L'équipe</h4>
						<?php
						$teams = set_value('site_team', maybe_null_or_empty($options, 'site_team', true), false);
						$teamsNotEmpty = !empty($teams);
						?>
						<div class="my-evaluation-questions-repeater <?= $teamsNotEmpty ? 'not-empty' : '' ?>"
							 delete-message="Etes-vous sûr de vouloir supprimer ce membre ?">
							<div class="row" data-repeater-list="about[site_team]">
								<div class="form-group col-md-12 button-container">
									<button title="Ajouter nouveau membre" type="button"
											data-repeater-create
											class="btn btn-primary mail-open-compose real-btn-primary">
										<i class="anticon anticon-plus"></i>
										<span class="m-l-5">Ajouter nouveau membre</span>
										<span class="badge badge-indicator badge-danger my-repeater-badge"><?= $teamsNotEmpty ? count($teams) : 1 ?></span>
									</button>
								</div>
								<?php
								//Default first one
								getTeamRepeater([], 'first-one', ($teamsNotEmpty ? 'ignore-completely' : ''), $uploadPath);
								if ($teamsNotEmpty) {
									foreach ($teams as $key => $team) {
										getTeamRepeater($team, '', '', $uploadPath);
									}
								}
								?>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<?php getFormSubmit('Modifier', 'pull-right') ?>
					</div>
				</div>
				<?= form_close() ?>
			</div>
		</div>
	</div>
</div>
<script>
    var validationRules = {}
</script>
