<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 31/10/2019
 * Time: 11:41
 */
getBreadcrump([
	'title' => $pageTitle
], $options, 'contact')
?>
<script type="text/javascript">
    var verifyCallback = function (response) {
        if ($('form input[name=g-recaptcha-response]')) {
            $('form input[name=g-recaptcha-response]').val(response);
            $('form input[type=submit]').removeAttr('disabled');
        }
    };
    var verifyExpireCallback = function (response) {
        alert('in');
        $('form input[type=submit]').attr('disabled', '');
    };
    var verifyErrorCallback = function (response) {
        $('form input[type=submit]').attr('disabled', '');
    };
    var onloadCallback = function () {
        grecaptcha.render(/*HTML ID*/'my_google_recaptcha', {
            'sitekey': '<?= maybe_null_or_empty($options, 'googleRecaptchaPublicKey') ?>',
            'data-expired-callback': verifyExpireCallback,
            'data-error-callback': verifyErrorCallback,
            'callback': verifyCallback,
        });
    };
</script>
<!--Sub Header End-->
<!--Main Content Start-->
<div class="main-content">
	<!--Contact Us Start-->
	<div class="contact-details  p80 pagebg2">
		<div class="container">
			<div class="row">
				<?php
				if ($contactInfos = maybe_null_or_empty($options, 'contact_infos')) {
					?>
					<div class="col-md-8 col-md-offset-2">
						<div class="col-md-12">
							<h3 class="stitle">Information de contact</h3>
						</div>
						<div class="row">
							<?php
							foreach ($contactInfos as $info) {
								?>
								<div class="col-md-6 col-sm-4">
									<div class="add-box">
										<h5><?= $info['label'] ?></h5>
										<ul>
											<li><i class="fas fa-phone"></i>
												<strong>Téléphone:</strong> <?= $info['phone'] ?></li>
											<li><i class="fas fa-building"></i> <strong>Adresse:</strong>
												<?= $info['adress'] ?>
											</li>
											<li><i class="far fa-envelope"></i><strong>
													Email:</strong> <?= $info['email'] ?></li>
										</ul>
									</div>
								</div>
								<?php
							}
							?>
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
	<!--Contact Us Start-->
	<!-- Google Map with Contact Form -->
	<div class="map-form p80">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-5">
					<h3 class="stitle">Nous envoyer un message</h3>
					<div class="contact-form">
						<?php
						echo form_open('', [
							'id' => 'contact_form'
						]);
						?>
						<div class="alert alert-dismissable" style="display: none">

						</div>
						<ul>
							<li>
								<?= form_input([
									'name'=>'fullname',
									'placeholder'=>'Nom & Prénoms',
									'required'=>'',
								]) ?>
							</li>
							<li>
								<?= form_input([
									'name'=>'email',
									'placeholder'=>'Email',
									'required'=>'',
									'type'=>'email',
								]) ?>
							</li>
							<li>
								<?= form_input([
									'name'=>'subject',
									
									'placeholder'=>'Sujet',
									'required'=>'',
								]) ?>
							</li>
							<li>
								<?= form_textarea([
									'name'=>'message',
									'placeholder'=>'Message',
									'required'=>'',
									'rows'=>4
								]) ?>
							</li>
							<li id="my_google_recaptcha">
							</li>
							<?php
							echo form_hidden('g-recaptcha-response');
							echo get_form_error('g-recaptcha-response')
							?>
							<li>
								<input type="submit" disabled value="Soumettre">
							</li>
						</ul>
						<?php
						echo form_close();
						?>
					</div>
				</div>
				<?php
				if ($embedIframe = maybe_null_or_empty($options, 'contact_google_map_iframe_html')) {
					?>
					<div class="col-md-8 col-sm-7">
						<div class="map">
							<?= $embedIframe ?>
						</div>
					</div>
					<?php
				}
				?>

			</div>
		</div>
	</div>
</div>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit&hl=fr-FR"
		async defer>
</script>
