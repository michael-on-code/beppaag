<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<footer class="footer">
    <div class="footer-content">
        <p class="m-b-0">Copyright © 2019 <?= $options['siteName'] ?>. Propulsé par <a target="_blank" href="http://akasigroup.com">AKASI Consulting Group</a></p>
        <!--<span>
                            <a href="#" class="text-gray m-r-15">Term &amp; Conditions</a>
                            <a href="#" class="text-gray">Privacy &amp; Policy</a>
                        </span>-->
    </div>
</footer>
<!-- Footer END -->

</div>
</div>
</div>
<script src="<?= $assetsUrl ?>pro/js/vendors.min.js"></script>
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
<script src="<?= $assetsUrl ?>pro/js/app.min.js"></script>
<script src="<?= $assetsUrl ?>pro/js/monjs.js?v=1.004"></script>

<!--end::Page Scripts -->
</body>
</html>