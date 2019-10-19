<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BEPPAAG</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= $assetsUrl ?>pro/images/logo/favicon.png">

    <!-- page css -->

    <!-- Core css -->
    <link href="<?= $assetsUrl ?>pro/css/app.min.css" rel="stylesheet">
    <link href="<?= $assetsUrl ?>pro/css/stylesheet.css" rel="stylesheet">
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
                'sitekey': '6LdBbL4UAAAAAN35hhhAHJ6V7PbZAeLG_RvC9weK',
                'data-expired-callback': verifyExpireCallback,
                'data-error-callback': verifyErrorCallback,
                'callback': verifyCallback,
            });
        };
    </script>

</head>

<body>
<div class="app">
    <div class="container-fluid p-0 h-100">
        <div class="row no-gutters h-100 full-height">
            <div class="col-lg-4 d-none d-lg-flex bg" style="background-image:url('<?= $assetsUrl ?>pro/images/others/login-1.jpg')">


