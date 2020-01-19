<script src="<?= $assetsUrl ?>pro/js/vendors.min.js"></script>
<?php
if (isset($clientData) && !empty($clientData)) {
	?>
	<script>
        var clientData = <?= json_encode($clientData) ?>
	</script>
	<?php
}
?>
<script src="<?= $assetsUrl ?>pro/js/app.min.js"></script>
<script src="<?= $assetsUrl ?>pro/js/public.js?v=1.003"></script>
<script src="<?= $assetsUrl ?>public/js/ajaxify.js?v=1.001"></script>

</body>
</html>
