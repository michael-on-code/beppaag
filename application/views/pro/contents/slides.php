<div class="main-content">
	<?php getAdminBreadcrump([
		'title' => $pageTitle,
	]) ?>
	<div class="card">
		<div class="card-body">
			<h4><?= $pageTitle ?></h4>
			<p>Le formulaire ci-dessous permet de modifier les slides présents sur la page d'accueil
			</p>
			<div class="m-t-25">
				<?= form_open_multipart('', [
					'id' => 'form-validation'
				]) ?>

				<div class="row">
					<div class="form-group col-md-4 d-flex align-items-center">
						<div class="switch m-r-10">
							<?= form_checkbox('slides[show_latest_evaluations]', 1, maybe_null_or_empty($options, 'show_latest_evaluations', false, true), [
								'id' => 'switcher'
							]) ?>
							<label for="switcher"></label>
						</div>
						<label>Afficher les dernières évaluations</label>

					</div>
					<div class="form-group col-md-4 d-flex align-items-center">
						<div class="switch m-r-10">
							<?= form_checkbox('slides[show_latest_posts]', 1, maybe_null_or_empty($options, 'show_latest_posts', false, false), [
								'id' => 'switcher1'
							]) ?>
							<label for="switcher1"></label>
						</div>
						<label>Afficher les dernières actualités</label>

					</div>
					<div class="form-group col-md-4 d-flex align-items-center">
						<div class="switch m-r-10">
							<?= form_checkbox('slides[show_latest_events]', 1, maybe_null_or_empty($options, 'show_latest_events', false, false), [
								'id' => 'switcher2'
							]) ?>
							<label for="switcher2"></label>
						</div>
						<label>Afficher les dernièrs évenèments</label>

					</div>
					<?php
					for ($i=1; $i<=12; $i++){
						?>
						<div class="form-group col-md-6">
							<?php echo form_label($title = "Slide $i");
							$target = "home_slide_$i";
							$file = set_value($name = "slides[$target]", maybe_null_or_empty($options, $target, true));
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
									'data-min-width' => '1919',
									'data-max-width' => '1921',
									'data-min-height' => '699',
									'data-max-height' => '701',
									'data-control-height-width' => '1',
								],
								'title' => $title,
							];
							if ($file) {
								$data['value'] = $uploadPath . $file;
							} else {
								$data['value'] = '';
							}
							echo form_hidden($name, set_value($name, $file));
							get_form_upload($data, $extensions = 'jpg jpeg png', '2M', false, 'auto-upload ignore');
							echo get_form_error($name);
							getFieldInfo('Dimensions recommandées : 1920x700 Format : JPG|PNG|JPEG Taille Max : 2M');
							?>
						</div>
						<?php
					}
					?>

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
