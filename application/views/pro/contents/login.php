<div class="main-content">
	<?php getAdminBreadcrump([
		'title'=>$pageTitle,
	]) ?>
	<div class="card">
		<div class="card-body">
			<h4><?= $pageTitle ?></h4>
			<p>Le formulaire ci-dessous permet de modifier le contenu général de la page de connexion
			</p>
			<div class="m-t-25">
				<?= form_open('', [
					'id' => 'form-validation'
				]) ?>
				<div class="row">
					<div class="col-md-8">
						<div class="form-group">
							<?php
							echo form_label($title = "Titre de la page", $id = 'site_login_title');
							echo form_input([
								'name' => $name = "content[$id]",
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
							echo form_label($title = "Description de la page", $id = 'site_login_description');
							echo form_textarea([
								'name' => $name = "content[$id]",
								'placeholder' => $title,
								'class' => 'form-control',
								'id' => $id,
								'required' => '',
								'rows' => 4,
								'value' => set_value($name, maybe_null_or_empty($options, $id), false)
							]);
							echo get_form_error($name);
							?>
						</div>
						<div class="form-group ">
							<?php echo form_label($title="Attacher l'image d'arriere plan de la page");
							$target ='site_login_bg_image';
							$file = set_value($name="content[$target]", maybe_null_or_empty($options, $target, true));
							?>
							<a class="my-file-preview-btn"
							   data-toggle="tooltip" <?= $file ? '' : 'style="display:none;"' ?>
							   data-placement="top" title="Visualiser l'image" target="_blank"
							   href="<?= $file ? $uploadPath . $file : '#' ?>"> <span
									class="anticon anticon-cloud-upload"></span></a>
							<?php
							$data = [
								'name' => '',
								'attributes' => [
									'data-target' => $target,
									'data-target-name' => $name,
									'data-min-height' => '939',
									'data-min-width' => '639',
								],
								'title' => $title,
							];
							if ($file) {
								$data['value'] = $uploadPath . $file;
							} else {
								$data['value'] = '';
							}
							echo form_hidden($name, set_value($name, $file));
							get_form_upload($data, $extensions = 'jpg jpeg png', '2M', true, 'auto-upload');
							echo get_form_error($name);
							getFieldInfo('Dimensions recommandées : 640x940 Format : JPG|PNG|JPEG Taille Max : 2M');
							?>
						</div>
						<div class="form-group">
							<?php getFormSubmit('Enregistrer', 'pull-right') ?>
						</div>

					</div>
				</div>



				<?= form_close() ?>
			</div>
		</div>
	</div>
</div>
<script>
    var validationRules = {

    }
</script>
