<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 31/10/2019
 * Time: 14:52
 */

function getEventTemplatePreview($event, $class = 'col-md-4 col-sm-4')
{
    ?>
    <div class="<?= $class ?>">
        <!--News Post Start-->
        <div class="event-post">
            <div class="thumb lazy" data-src="<?= getUploadedImageBySize($event['thumbnail'], '360x260') ?>"><a
                        href="<?= $permalink = getPermalink($event['id'], 'events') ?>"><i class="fas fa-link"></i></a>
            </div>
            <div class="event-post-txt">
                <h5><a class="size-16" href="<?= $permalink ?>"><?= $event['title'] ?></a></h5>
                <?php
                if ($startdate = convert_date_to_french(maybe_null_or_empty($event, 'starts_at', true))) {
                    ?>
                    <ul class="event-meta">
                        <li><i class="far fa-calendar-alt"></i> Débute
                            le <?= getFullDateInFrench($startdate, 'd/m/Y') ?></li>
                        <!--                                            <li><i class="far fa-clock"></i> 09H - 13H</li>-->
                    </ul>
                    <?php
                }
                ?>
                <p><?= myWordLimiter(strip_tags($event['content']), 15) ?></p>
            </div>
            <div class="event-post-loc">
                <?php
                if (maybe_null_or_empty($event, 'location')) {
                    ?> <i class="fas fa-map-marker-alt"></i> <?= myWordLimiter($event['location'], 4) ?><?php
                }
                ?>
                <a href="<?= $permalink ?>"><i class="fas fa-arrow-right"></i></a></div>
        </div>
        <!--News Post End-->
    </div>
    <?php
}

function getPostTemplatePreview($post, $options, $outerClass = 'col-md-3 col-sm-6')
{
    $userPhoto = $post['user_photo'];
    if ($userPhoto == '') {
        $userPhoto = $options['siteDefaultAvatar'];
    }
    ?>
    <div class="<?= $outerClass ?> myNews">
        <div class="news-box">
            <div class="new-thumb lazy" data-src="<?= getUploadedImageBySize($post['thumbnail'], '263x200') ?>"><span
                        class="cat c<?= rand(1, 4) ?>"><?= $post['category'] ?></span></div>
            <div class="new-txt">
                <div class="row">
                    <div class="col-xs-10">
                        <ul class="news-meta">
                            <li><?= getFullDateInFrench($post['created_at'], getRegularDateTimeFormat()) ?></li>
                        </ul>
                    </div>
                    <div class="col-xs-2">
                        <div class="btn-group share-post">
                            <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"><i class="fas fa-share-alt"></i></button>
                            <ul class="dropdown-menu">
                                <li><a <?= getSharerAttributes($permalink = getPermalink($post['id'], 'blog'), $post['title'], 'facebook') ?> class="fb"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a <?= getSharerAttributes($permalink, $post['title'], 'whatsapp') ?> class="whats"><i class="fab fa-whatsapp"></i></a></li>
                                <li><a <?= getSharerAttributes($permalink, $post['title'], 'twitter') ?> class="tw"><i class="fab fa-twitter"></i></a></li>
                                <li><a <?= getSharerAttributes($permalink, $post['title'], 'linkedin') ?> class="linken"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <h6><a class="size-16"
                       href="<?= $permalink ?>"><?= $post['title'] ?></a></h6>
                <p> <?= myWordLimiter(strip_tags($post['content']), 15) ?> </p>
            </div>
            <div class="news-box-f"><img data-src="<?= getUploadedImageBySize($userPhoto, '150x150') ?>"
                                         alt=""> <?= substr($post['last_name'], 0, 1) . '. ' . $post['first_name'] ?> <a
                        href="<?= $permalink ?>"><i class="fas fa-arrow-right"></i></a></div>
        </div>
    </div>
    <?php
}

function includeEvaluationColirLibAssets()
{
    $ci =& get_instance();
    $ci->data['footerJs'][] = $ci->data['assetsUrl'] . 'public/lib/colorlib-search/js/extention/choices.js';
    $ci->data['footerJs'][] = $ci->data['assetsUrl'] . 'public/lib/colorlib-search/js/extention/flatpickr.js';
    $ci->data['headerCss'][] = $ci->data['assetsUrl'] . 'public/lib/colorlib-search/css/main.css';
}

function getSharerAttributes($link, $title = '', $type = 'facebook')
{
    switch ($type) {
        case 'whatsapp':
            $href = 'https://api.whatsapp.com/send?text=' . urlencode($link);
            return "onClick=\"window.open('$href', 'Whatsapp', 'width=585,height=666,left=' + (screen.availWidth / 2 - 292) + ',top=' + (screen.availHeight / 2 - 333) + ''); return false;\" href='$href'";
        case 'twitter':
            $href = 'https://twitter.com/share?url=' . urlencode($link) . ';text=' . urlencode($title);
            return "onClick=\"window.open('$href', 'Twitter', 'width=585,height=666,left=' + (screen.availWidth / 2 - 292) + ',top=' + (screen.availHeight / 2 - 333) + ''); return false;\" href='$href'";
        case 'linkedin':
            $href = 'http://www.linkedin.com/shareArticle?mini=true&amp;url=' . urlencode($link) . ';text=' . urlencode($title);
            return "onClick=\"window.open('$href', 'LinkedIn', 'width=585,height=666,left=' + (screen.availWidth / 2 - 292) + ',top=' + (screen.availHeight / 2 - 333) + ''); return false;\" href='$href'";
        default:
            $href = 'https://www.facebook.com/sharer.php?u=' . urlencode($link);
            return "onClick=\"window.open('$href', 'Facebook', 'width=600,height=300,left=' + (screen.availWidth / 2 - 300) + ',top=' + (screen.availHeight / 2 - 150) + ''); return false;\" href='$href'";
    }
}

function getPermalink($IDOrSlug, $type = 'blog')
{
    return site_url("$type/$IDOrSlug");
    switch ($type) {
        case 'events':
            return site_url("events/$IDOrSlug");
        case 'evaluations':
            return site_url("evaluations/$IDOrSlug");
        default:
            return site_url("blog/$IDOrSlug");
    }
}

function getBreadcrump(array $data, $options = [], $pageType = '')
{
    if ($pageType == '') {
        $banner = 'other_banner';
    } else {
        $banner = $pageType . '_banner';
    }
    $assetsUrl = base_url('assets/');
    ?>
    <section class="banner banner-small scale-hover">
        <div class="">
            <img data-src="<?= getUploadedImageBySize(maybe_null_or_empty($options, $banner), '1024x649') ?>"
                 class="cover transition">
        </div>
        <div class="infos on-container flex flex-col center text-left anim-title">
            <div>
                <h1 class="title small-title"><span><?= maybe_null_or_empty($data, 'title') ?></span></h1>
            </div>
        </div>
    </section>
    <!--<section class="breadcrumb">
        <ul class="block-center">
            <li class="iblock middle"><a href="<? /*= site_url('/') */
    ?>">Accueil</a></li>
            <?php
    /*            if(isset($data['before']) && !empty($data['before'])){
                    foreach ($data['before'] as $before){
                        */
    ?>
                    <li class="iblock middle"><a href="<? /*= maybe_null_or_empty($before, 'url') */
    ?>"><? /*= maybe_null_or_empty($before, 'title') */
    ?></a></li>
                    <?php
    /*                }
                }
                */
    ?>
            <li class="iblock middle"><? /*= maybe_null_or_empty($data, 'title') */
    ?></li>
        </ul>
    </section>-->
    <?php

}