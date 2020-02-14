<div class="main-content">
	<?php getAdminBreadcrump([
		'title' => $pageTitle,
	]) ?>
	<div class="card">
		<div class="card-body">
			<h4><?= $pageTitle ?></h4>
			<p>Le formulaire ci-dessous permet de modifier le contenu de la page d'accueil
			</p>
			<div class="m-t-25">
				<?= form_open('', [
					'id' => 'form-validation'
				]) ?>
				<div class="row">
					<div class="col-md-6">
						<h4>Mot du directeur</h4>
						<div class="form-group">
							<?php
							echo form_label($title = "Nom du Directeur", $id = 'site_director_name');
							echo form_input([
								'name' => $name = "home[$id]",
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
								'name' => $name = "home[$id]",
								'class' => 'form-control',
								'placeholder' => $title,
								'id' => $id,
								'required' => '',
								'row' => 4,
								'value' => set_value($name, maybe_null_or_empty($options, $id), false)
							]);
							echo get_form_error($name);
							?>
						</div>
						<div class="form-group ">
							<?php echo form_label($title="Attacher la photo du directeur");
							$target ='site_director_photo';
							$file = set_value($name="home[$target]", maybe_null_or_empty($options, $target, true));
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

						<div class="form-group col-md-12">
							<?php getFormSubmit('Modifier', 'pull-right') ?>
						</div>
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
