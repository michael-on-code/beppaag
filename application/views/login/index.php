<div class="d-flex h-100 p-h-40 p-v-15 flex-column justify-content-between">
    <div style="left: 0;
    border-width: 0 0 325px 325px;
    border-color: transparent transparent transparent #fff;
    position: fixed;
    width: 0;
    height: 0;
    top: 0;
    /* bottom: 0; */
    /* right: 0; */
    border-style: solid;">

    </div>
    <div style="position: absolute;
    z-index: 9999;
    /* width: 30%; */
    top: 36px;
    left: 30px;">
        <img style="width: 30%" src="<?= $assetsUrl ?>pro/images/logo/benin-revele-logo.png" alt="">
    </div>
    <div style="margin: 226px 0 10px 81px;">
        <h1 class="text-white m-b-20 font-weight-normal">Portail Web des Evaluations</h1>
        <p class="text-white font-size-16 lh-2 w-80 opacity-08">Bienvenue au portail web des Evaluations. Administrer ici, les évaluations des politiques publiques</p>
    </div>
    <div class="d-flex justify-content-between">
        <span class="text-white">© 2019 BEPPAAG</span>
        <!--<ul class="list-inline">
            <li class="list-inline-item">
                <a class="text-white text-link" href="#">Legal</a>
            </li>
            <li class="list-inline-item">
                <a class="text-white text-link" href="#">Privacy</a>
            </li>
        </ul>-->
    </div>
</div>
</div>
<div class="col-lg-8 bg-white">
    <div class="container h-100">
        <div class="row no-gutters h-100 align-items-center">
            <div class="col-md-8 col-lg-7 col-xl-6 mx-auto">
                <h2>Se connecter</h2>
                <p class="m-b-30">Saisissez vos informations de connexion pour vous authentifier</p>
                <form>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="userName">Email:</label>
                        <div class="input-affix">
                            <i class="prefix-icon anticon anticon-user"></i>
                            <input type="text" class="form-control" id="userName" placeholder="Adresse Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="password">Mot de passe:</label>
                        <a class="float-right font-size-13 text-muted" href="#">Mot de passe oublié ?</a>
                        <div class="input-affix m-b-10">
                            <i class="prefix-icon anticon anticon-lock"></i>
                            <input type="password" class="form-control" id="password" placeholder="Mot de passe">
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="my_google_recaptcha"></div>
                        <?php
                        //echo get_form_error('my_google_recaptcha')
                        ?>
                    </div>
                    <div class="form-group">
                        <div class="d-flex align-items-center justify-content-between">
                                            <span class="font-size-13 text-muted">

                                                <a class="anticon anticon-arrow-left" href="<?= site_url('/') ?>"> <i class=""></i> Retourner au site</a>
                                            </span>
                            <button type="submit" disabled class="btn btn-primary m-l-5"><span>Se connecter</span>
                                <i class="anticon anticon-loading m-l-5"></i>
                            </button>
                        </div>
                    </div>
                </form>
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