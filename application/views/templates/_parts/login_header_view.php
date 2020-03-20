<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $options['siteName'] ?> - <?= $pageTitle ?></title>
    <meta name="description" content="<?= $options['siteDescription'] ?>">
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= getUploadedImageBySize($options['siteFavicon'], '150x150')?>">

    <!-- page css -->

    <!-- Core css -->
    <link href="<?= $assetsUrl ?>pro/css/app.min.css" rel="stylesheet">
    <link href="<?= $assetsUrl ?>pro/css/stylesheet.css?v=1.004" rel="stylesheet">
    <script type="text/javascript">
        var verifyCallback = function (response) {
            if ($('form input[name=g-recaptcha-response]')) {
                $('form input[name=g-recaptcha-response]').val(response);
                $('form button[type=submit]').removeAttr('disabled');
            }
        };
        var verifyExpireCallback = function (response) {
            alert('in');
            $('form button[type=submit]').attr('disabled', '');
        };
        var verifyErrorCallback = function (response) {
            $('form button[type=submit]').attr('disabled', '');
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

</head>

<body>
<div class="app">
    <?php get_flashdata() ?>



