<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 27/11/2019
 * Time: 16:10
 */
?>
<div class="container-fluid p-h-0 p-v-20 bg full-height d-flex"
     style="background-image: url('<?= $assetsUrl ?>pro/images/others/login-3.png')">
    <div class="d-flex flex-column justify-content-between w-100">
        <div class="container d-flex h-100">
            <div class="row align-items-center w-100">
                <div class="col-md-7 col-lg-5 m-h-auto">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between m-b-30">
                                <img class="img-fluid m-auto" alt=""
                                     src="<?= getUploadedImageBySize($options['siteLogo'], '345x119') ?>">
                            </div>
                            <h5 class="m-b-25 text-center"><?= $pageTitle ?></h5>
                            <?= form_open() ?>
                            <div class="form-group">
                                <label class="font-weight-semibold" for="new">Nouveau mot de passe:</label>
                                <div class="input-affix">
                                    <i class="prefix-icon anticon anticon-lock"></i>
                                    <?php
                                    echo form_password([
                                        'name' => $name = 'password[new]',
                                        'id' => 'new',
                                        'class' => 'form-control',
                                        'placeholder' => 'Saisissez nouveau mot de passe',
                                        'required' => '',
                                        'value' => ''
                                    ]);
                                    ?>
                                </div>
                                <?php
                                echo get_form_error($name);
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-semibold" for="confirm">Confirmer:</label>
                                <div class="input-affix">
                                    <i class="prefix-icon anticon anticon-lock"></i>
                                    <?php
                                    echo form_password([
                                        'name' => $name = 'password[confirm]',
                                        'id' => 'confirm',
                                        'class' => 'form-control',
                                        'placeholder' => 'Confirmer mot de passe',
                                        'required' => '',
                                        'value' => ''
                                    ]);
                                    ?>
                                </div>
                                <?php
                                echo get_form_error($name);
                                ?>
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
                                                    <a href="<?= pro_url('login') ?>"> <i
                                                                class="anticon anticon-arrow-left"></i> Retour</a>
                                                </span>
                                    <button disabled type="submit" class="btn btn-primary"><span>Définir</span>
                                        <i class="anticon anticon-loading m-l-5"></i>
                                    </button>
                                </div>
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-none d-md-flex p-h-40 justify-content-between">
            <span class="">© 2019 <?= $options['siteName'] ?></span>
        </div>
    </div>
</div>
</div>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit&hl=fr-FR"
        async defer>
</script>