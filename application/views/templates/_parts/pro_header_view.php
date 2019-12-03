<!DOCTYPE html>
<html lang="fr">
<!-- begin::Head -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <meta charset="utf-8"/>
    <title><?= $options['siteName'] ?> - <?= $pageTitle ?></title>
    <meta name="description" content="<?= $options['siteDescription'] ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex, nofollow">
    <link rel="shortcut icon" href="<?= getUploadedImageBySize($options['siteFavicon'])?>">
    <?php if (isset($headerCss) && !empty($headerCss)) {
        foreach ($headerCss as $css) {
            ?>
            <link href="<?= $css ?>?v=1.000" rel="stylesheet" type="text/css"/>
            <?php
        }
    }
    if (isset($footerJsHeader) && !empty($footerJsHeader)) {
        foreach ($footerJsHeader as $js) {
            ?>
            <script src="<?= $js ?>" type="text/javascript"></script>
            <?php
        }
    }
    ?>
    <link href="<?= $assetsUrl ?>pro/css/app.min.css?v=1.002" rel="stylesheet">
    <link rel="stylesheet" href="<?= $assetsUrl ?>pro/css/stylesheet.css?v=1.049">
</head>
<!-- end::Head -->

<!-- begin::Body -->
<body>

<div class="app">
    <?php get_flashdata() ?>
    <div class="layout">

        <!-- Header START -->
        <div class="header">
            <div class="logo logo-dark">
                <a href="<?= pro_url() ?>">
                    <img class="real-logo" src="<?= getUploadedImageBySize($options['siteLogo'], '345x119')?>" alt="Logo">
                    <img class="logo-fold" src="<?= getUploadedImageBySize($options['siteFavicon'], '150x150')?>" alt="Logo">
                </a>
            </div>

            <div class="nav-wrap">
                <ul class="nav-left">
                    <li class="desktop-toggle">
                        <a href="javascript:void(0);">
                            <i class="anticon"></i>
                        </a>
                    </li>
                    <li class="mobile-toggle">
                        <a href="javascript:void(0);">
                            <i class="anticon"></i>
                        </a>
                    </li>
                </ul>
                <ul class="nav-right">
<!--                    TODO Notification Area-->
                    <!--<li class="dropdown dropdown-animated scale-left">
                        <a href="javascript:void(0);" data-toggle="dropdown">
                            <i class="anticon anticon-bell notification-badge"></i>
                        </a>
                        <div class="dropdown-menu pop-notification">
                            <div class="p-v-15 p-h-25 border-bottom d-flex justify-content-between align-items-center">
                                <p class="text-dark font-weight-semibold m-b-0">
                                    <i class="anticon anticon-bell"></i>
                                    <span class="m-l-10">Notification</span>
                                </p>
                                <a class="btn-sm btn-default btn" href="javascript:void(0);">
                                    <small>View All</small>
                                </a>
                            </div>
                            <div class="relative">
                                <div class="overflow-y-auto relative scrollable" style="max-height: 300px">
                                    <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                        <div class="d-flex">
                                            <div class="avatar avatar-blue avatar-icon">
                                                <i class="anticon anticon-mail"></i>
                                            </div>
                                            <div class="m-l-15">
                                                <p class="m-b-0 text-dark">You received a new message</p>
                                                <p class="m-b-0">
                                                    <small>8 min ago</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                        <div class="d-flex">
                                            <div class="avatar avatar-cyan avatar-icon">
                                                <i class="anticon anticon-user-add"></i>
                                            </div>
                                            <div class="m-l-15">
                                                <p class="m-b-0 text-dark">New user registered</p>
                                                <p class="m-b-0">
                                                    <small>7 hours ago</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                        <div class="d-flex">
                                            <div class="avatar avatar-red avatar-icon">
                                                <i class="anticon anticon-user-add"></i>
                                            </div>
                                            <div class="m-l-15">
                                                <p class="m-b-0 text-dark">System Alert</p>
                                                <p class="m-b-0">
                                                    <small>8 hours ago</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item d-block p-15 ">
                                        <div class="d-flex">
                                            <div class="avatar avatar-gold avatar-icon">
                                                <i class="anticon anticon-user-add"></i>
                                            </div>
                                            <div class="m-l-15">
                                                <p class="m-b-0 text-dark">You have a new update</p>
                                                <p class="m-b-0">
                                                    <small>2 days ago</small>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>-->
                    <li class="dropdown dropdown-animated scale-left">
                        <!--                        User Avatar and Dropdown Menus-->
                        <div class="pointer" data-toggle="dropdown">
                            <div class="avatar avatar-image  m-h-10 m-r-15">
                                <?php
                                if($userPhoto = maybe_null_or_empty($user, 'user_photo', true)){
                                    $userPhoto = getUploadedImageBySize($userPhoto, '150x150');
                                }else{
                                    $userPhoto = getUploadedImageBySize($options['siteDefaultAvatar'], '150x150');
                                }
                                ?>
                                <img src="<?= $userPhoto ?>" alt="">
                            </div>
                        </div>
                        <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                            <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                                <div class="d-flex m-r-50">
                                    <div class="avatar avatar-lg avatar-image">
                                        <img src="<?= $userPhoto ?>" alt="">
                                    </div>
                                    <div class="m-l-10">
                                        <p class="m-b-0 text-dark font-weight-semibold"><?= substr(maybe_null_or_empty($user, 'last_name'), 0, 1).'. '.maybe_null_or_empty($user, 'first_name') ?></p>
                                        <p class="m-b-0 opacity-07">
                                            <?= maybe_null_or_empty($user, 'role') ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if(isset($menus) && !empty($menus)){
                                foreach ($menus as $key=>$menu){
                                    if(!isset($menu['url'])){
                                        continue;
                                    }
                                    ?>
                                    <a href="<?= $menu['url'] ?>" class="dropdown-item d-block p-h-15 p-v-10">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <i class="<?= $menu['icon'] ?> opacity-04 font-size-16 "></i>
                                                <span class="m-l-10"><?= $menu['title'] ?></span>
                                            </div>
<!--                                            <i class="anticon font-size-10 anticon-right"></i>-->
                                        </div>
                                    </a>
                                    <?php
                                }
                            }
                            ?>

                        </div>
                    </li>
                    <li>
                        <a target="_blank" data-toggle="tooltip" href="<?= site_url() ?>"
                           data-placement="top" title="Accéder au site">
                            <i class="anticon anticon-export"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Header END -->

        <?php
        if (isset($menus) && !empty($menus)) {
            ?>
            <div class="side-nav">
                <div class="side-nav-inner">
                    <ul class="side-nav-menu scrollable">
                        <?php
                        foreach ($menus as $key => $menu) {
                            $hasDropDown = isset($menu['submenus']);
                            //TODO can had open near dropdown to preopen a dropdown list
                            ?>
                            <li class="nav-item <?= $hasDropDown ? 'dropdown' : '' ?>">
                                <a class="<?= $hasDropDown ? 'dropdown-toggle' : '' ?>"
                                   href="<?= $hasDropDown ? 'javascript:void(0);' : $menu['url'] ?>">
                                <span class="icon-holder">
                                    <i class="<?= $menu['icon'] ?>"></i>
                                </span>
                                    <span class="title"><?= $menu['title'] ?></span>
                                    <?php if ($hasDropDown) {
                                        ?>
                                        <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                                        <?php
                                    } ?>
                                </a>
                                <?php
                                if ($hasDropDown) {
                                    ?>
                                    <ul class="dropdown-menu">
                                        <?php
                                        foreach ($menu['submenus'] as $submenuKey => $submenu) {
                                            $submenuHasDropDown = isset($submenu['submenus']);
                                            //TODO active check on Javascript on li class
                                            ?>
                                            <li class="<?= $submenuHasDropDown ? 'nav-item dropdown' : '' ?>">
                                                <a href="<?= $submenuHasDropDown ? 'javascript:void(0);' : $submenu['url'] ?>">
                                                    <?php
                                                    if ($submenuHasDropDown) {
                                                        ?>
                                                        <span><?= $submenu['title'] ?></span>
                                                        <span class="arrow">
                                            <i class="arrow-icon"></i>
                                        </span>
                                                        <?php
                                                    } else {
                                                        echo $submenu['title'];
                                                    }
                                                    ?>
                                                </a>
                                                <?php
                                                if($submenuHasDropDown){
                                                    ?>
                                                    <ul class="dropdown-menu">
                                                        <?php
                                                        foreach ($submenu['submenus'] as $grandChildMenu){
                                                            ?>
                                                            <li>
                                                                <a href="<?= $grandChildMenu['url'] ?>"><?= $grandChildMenu['title'] ?></a>
                                                            </li>
                                                            <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                    <?php
                                                }
                                                ?>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                    <?php
                                }
                                ?>

                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <?php
        }
        ?>
        <!-- Side Nav START -->
        <div class="page-container">