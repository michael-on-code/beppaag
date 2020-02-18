<div class="footer" style="display: block">
    <span class="center"></span>
    <ul class="footer-socials">
        <?php
        if($url = maybe_null_or_empty($options, 'site_facebook_url', true)){
            ?>
            <li class="btn-sm btn-sm-big"><a target='_blank' href="<?= $url ?>" class="fab fa-facebook" title="Facebook"></a></li>
            <?php
        }
        if($url = maybe_null_or_empty($options, 'site_twitter_url', true)){
            ?>
            <li class="btn-sm btn-sm-big"><a target='_blank' href="<?= $url ?>" class="fab fa-twitter" title="Twitter"></a></li>
            <?php
        }
        if($url = maybe_null_or_empty($options, 'site_youtube_url', true)){
            ?>
            <li class="btn-sm btn-sm-big"><a target='_blank' href="<?= $url ?>" class="fab fa-youtube" title="Youtube"></a></li>
            <?php
        }
        if($url = maybe_null_or_empty($options, 'site_flickr_url', true)){
            ?>
            <li class="btn-sm btn-sm-big"><a target='_blank' href="<?= $url ?>" class="fab fa-flickr" title="Flickr"></a></li>
            <?php
        }
        ?>
    </ul>
    <?php
    if($footerLinks = maybe_null_or_empty($options, 'footer_links')){
        ?>
        <ul class="footer-nav">
            <?php
            foreach ($footerLinks as $footerLink) {
                if(maybe_null_or_empty($footerLink, 'label', true)){
                    ?>
                    <li>
                        <span><?= $footerLink['label'] ?></span>
                        <?php
                        if($links = maybe_null_or_empty($footerLink, 'links')){
                            ?>
                            <ul class="">
                                <?php
                                foreach ($links as $link){
                                    if(maybe_null_or_empty($link, 'label', true)){
                                        ?>
                                        <li>
                                            <a target="_blank" href="<?= $link['url'] ?>"><?= $link['label'] ?></a>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                            <?php
                        }
                        ?>

                    </li>
                    <?php
                }
            }
            ?>
        </ul>
        <?php
    }
    ?>

<!--    <span class="hr center"></span>-->
    <!--<ul>
        <li><a href="<?/*= site_url('contact') */?>">Contact</a></li>
        <li><a href="sitemap.html">Plan du site</a></li>
    </ul>-->
    <div class="center">&copy; 2019 <?= $options['siteName'] ?>. Propulsé par <a target="_blank" href="http://akasigroup.com">AKASI Consulting Group</a></div>
    <div class="flag-container"><ul class="flag"><li></li><li></li><li></li></ul></div>
</div>
<!--Footer End-->
<div class="overlay"></div>
<!--</div>-->
<!--Wrapper End-->
<!-- JS -->
<script src="<?= $assetsUrl ?>public/js/jquery.min.js"></script>
<!--<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
<script src="<?= $assetsUrl ?>public/js/bootstrap.min.js"></script>
<?php
if (isset($footerJs) && !empty($footerJs)) {
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
<script src="<?= $assetsUrl ?>public/js/script34b3.js?v=1.001"></script>
<script src="<?= $assetsUrl ?>public/js/owl.carousel.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.10/jquery.lazy.min.js"></script>
<script src="<?= $assetsUrl ?>public/js/scrollIt.min.js"></script>
<script src="<?= $assetsUrl ?>public/js/scrollUp.js"></script>
<script src="<?= $assetsUrl ?>public/js/jquery.ticker.js"></script>
<script src="<?= $assetsUrl ?>public/js/jquery.prettyPhoto.js"></script>
<script src="<?= $assetsUrl ?>public/js/custom.js?v=1.22"></script>
<script src="<?= $assetsUrl ?>public/js/ajaxify.js?v=1.001"></script>
</body>

</html>
