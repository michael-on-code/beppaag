<div class="container-fluid p-0 h-100">
    <div class="row no-gutters h-100 full-height">
        <div class="col-lg-4 d-none d-lg-flex bg" style="background-image:url('<?= getUploadedImageBySize($options['site_login_bg_image'], '640x940') ?>')">
<div class="d-flex h-100 p-h-40 p-v-15 flex-column justify-content-between">
    <div class="login-logo-triangle-container"></div>
    <div class="login-logo-container">
        <img src="<?= getUploadedImageBySize($options['siteLogo'], '345x119')?>" alt="">
    </div>
    <div class="banner-text-container">
        <h1 class="text-white m-b-20 font-weight-normal"><?= maybe_null_or_empty($options, 'site_login_title', false, "Portail Web du Bureau de l'Evaluation des Politiques Publiques") ?></h1>
        <p class="text-white font-size-16 lh-2 w-80 opacity-08"><?= maybe_null_or_empty($options, 'site_login_description', false, "Bienvenue au portail web du Bureau de l'Evaluation des Politiques Publiques. Administrez
            ici, les évaluations des politiques publiques") ?></p>
    </div>
    <div class="d-flex justify-content-between login-footer">
        <span class="text-white">© 2019 <?= $options['siteName'] ?></span>
    </div>
</div>
</div>
<div class="col-lg-8 bg-white">
    <div class="container h-100 login-container">
        <div class="row no-gutters my-h-auto align-items-center">
            <div class="col-md-8 col-lg-7 col-xl-6 mx-auto login-form-container">
				<div class="hide-on-big-screen m-t-10 m-auto"style="text-align: center">
					<img style="width: 35%" src="<?= getUploadedImageBySize($options['siteLogo'], '150x150')?>" alt="">
					<hr class="mobile-m-t-b-10">
				</div>
                <h2>Se connecter</h2>
                <p class="m-b-30">Saisissez vos informations de connexion pour vous authentifier</p>
                <?php echo form_open() ?>
                <div class="form-group">
                    <?php
                    echo form_label('Email', 'email', [
                        'class' => 'font-weight-semibold'
                    ]);
                    ?>
                    <div class="input-affix">
                        <i class="prefix-icon anticon anticon-user"></i>
                        <?php
                        echo form_input([
                            'name' => 'login[email]',
                            'id' => 'email',
                            'required' => '',
                            'placeholder' => 'Adresse Email',
                            'class' => 'form-control',
                        ]);
                        echo get_form_error('login[email]')
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <?php
                    echo form_label('Mot de passe', 'password', [
                        'class' => 'font-weight-semibold'
                    ]);
                    ?>

                    <div class="input-affix m-b-10">
                        <i class="prefix-icon anticon anticon-lock"></i>
                        <?php
                        echo form_password([
                            'name' => 'login[password]',
                            'id' => 'password',
                            'required' => '',
                            'placeholder' => 'Mot de passe',
                            'class' => 'form-control',
                        ]);
                        echo get_form_error('login[password]')
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <?php
                        echo form_checkbox('login[remember]', 1, true, [
                            'id'=>'checkbox2'
                        ]);
                        echo form_label('Se souvenir de moi', 'checkbox2');
                        ?>
                        <a class="float-right" href="<?= pro_url('password-forgotten') ?>">Mot de passe oublié ?</a>
                    </div>
                </div>
                <div class="form-group">
                    <div id="my_google_recaptcha"></div>
                    <?php
                    echo form_hidden('g-recaptcha-response');
                    echo get_form_error('g-recaptcha-response')
                    ?>
                </div>
                <div class="form-group">
                    <div class="d-flex align-items-center justify-content-between">
                                            <span class="font-size-13 text-muted">

                                                <a class="anticon anticon-arrow-left" href="<?= site_url('/') ?>"> <i
                                                            class=""></i> Retourner au site</a>
                                            </span>
                        <button type="submit" disabled class="btn btn-primary m-l-5"><span>Se connecter</span>
                            <i class="anticon anticon-loading m-l-5"></i>
                        </button>
                    </div>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit&hl=fr-FR"
        async defer>
</script>
