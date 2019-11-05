<footer id="site-footer" class="main-footer wf100" style="margin-bottom: 23px;">
    <div class="container">
        <div class="row">
            <!--Footer Widget Start-->
            <div class="col-md-3 col-sm-6">
                <div class="textwidget"><a href="<?= site_url() ?>"><img class="footer-logo" src="<?= $assetsUrl ?>public/images/benin-revele-logo.png" style="width: 90%" alt=""></a>

                </div>
            </div>
            <!--Footer Widget End-->
            <!--Footer Widget Start-->
            <div class="col-md-3 col-sm-6">
                <div class="footer-widget">
                    <h6>Navigation</h6>
                    <ul>
                        <li><a href="<?= site_url() ?>"><i class="fas fa-star"></i> Accueil</a></li>
                        <li><a href="<?= site_url('evaluations') ?>"><i class="fas fa-star"></i> Evaluations</a></li>
                        <li><a href="<?= site_url('events') ?>"><i class="fas fa-star"></i> Evènements</a></li>
                        <li><a href="<?= site_url('blog') ?>"><i class="fas fa-star"></i> Actualités</a></li>
                        <!--<li><a href="##"><i class="fas fa-star"></i> Publications</a></li>
                        <li><a href="##"><i class="fas fa-star"></i> Gestion de connaissances</a></li>
                        <li><a href="##"><i class="fas fa-star"></i> Partenariat</a></li>
                        <li><a href="##"><i class="fas fa-star"></i> Ressources techniques</a></li>-->
                        <li><a href="<?= site_url('contact') ?>"><i class="fas fa-star"></i> Contact</a></li>
                        <li><a href="##"><i class="fas fa-star"></i> Plan du site</a></li>
                    </ul>
                </div>
            </div>
            <!--Footer Widget End-->
            <!--Footer Widget Start-->
            <div class="col-md-3 col-sm-6 third-footer-widget">
                <div class="footer-widget">
                    <h6>Liens utiles</h6>
                    <ul>
                        <li><a href="##"><i class="fas fa-star"></i> La Présidence</a></li>
                        <li><a href="##"><i class="fas fa-star"></i> UNICEF</a></li>
                        <li><a href="##"><i class="fas fa-star"></i> GIZ</a></li>
                        <li><a href="##"><i class="fas fa-star"></i> CNE</a></li>
                        <li><a href="##"><i class="fas fa-star"></i> BEPPAAG </a></li>
                    </ul>
                </div>
            </div>
            <!--Footer Widget End-->
            <!--Footer Widget Start-->
            <div class="col-md-3 col-sm-6">
                <div class="textwidget">
                    <h6>Contact</h6>
                    <address>
                        <ul>
                            <li> <i class="fas fa-university"></i> <strong>Address:</strong> Espace DINA, St Michel, Cotonou
                                New York, USA </li>
                            <li> <i class="fas fa-envelope"></i> <strong>Email:</strong> contact@beppaag.com<br>
                                info@beppaag.com </li>
                            <li> <i class="fas fa-phone"></i> <strong>Appeler nous:</strong> +229 90 90 90 90 <br> +229 98 98 98 98</li>
                        </ul>
                    </address>
                </div>
            </div>
            <!--Footer Widget End-->
        </div>
    </div>
</footer>
<!--Footer Start-->
<!--Footer Start-->
<footer class="home3 footer">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-7">
                <p class="copyr">BEPPAAG © 2019 | Tous droits réservés. Propulsée par <a href="##">AKASI Consulting Group</a></p>
            </div>
            <div class="col-md-5 col-sm-5">
                <ul class="footer-social">
                    <li><a href="##" class="fb"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="##" class="tw"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="##" class="linken"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="##" class="yt"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--Footer End-->
<div class="overlay"></div>
</div>
<!--Wrapper End-->
<!-- JS -->
<script src="<?= $assetsUrl ?>public/js/jquery.min.js"></script>
<!--<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
<script src="<?= $assetsUrl ?>public/js/bootstrap.min.js"></script>
<?php if (isset($footerJs) && !empty($footerJs)) {
    foreach ($footerJs as $js) {
        ?>
        <script src="<?= $js ?>" type="text/javascript"></script>
        <?php
    }
}
if (isset($clientData) && !empty($clientData)) {
    ?>
    <script>
        var clientData = <?= json_encode($clientData) ?>
    </script>
    <?php
}
?>
<script src="<?= $assetsUrl ?>public/js/owl.carousel.min.js"></script>
<script src="<?= $assetsUrl ?>public/js/line-cutter.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.10/jquery.lazy.min.js"></script>
<script src="<?= $assetsUrl ?>public/js/custom.js?v=1.03"></script>
</body>

</html>