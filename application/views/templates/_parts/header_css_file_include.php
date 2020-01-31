<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 28/11/2019
 * Time: 11:07
 */
//var_dump($options);exit;
?>
<style>

    body a:focus {
        color: <?= $mainColor = maybe_null_or_empty($options, 'site_main_color', false, '#d94148') ?>;
    }

    .logo-nav-row ul.nav.navbar-nav.navbar-right .bars-btn a {
        line-height: 80px;
        padding: 0 0 0 20px;
        color: <?= $mainColor ?>;
        font-size: 14px;
    }

    .slide-content-box a, .slider-caption a {
        background: <?= $mainColor ?>;
        color: #fff;
        font-family: 'Montserrat', sans-serif;
        font-size: 16px;
        text-transform: uppercase;
        font-weight: 600;
        line-height: 50px;
        display: inline-block;
        border-radius: 25px;
        padding: 0 35px;
        letter-spacing: 1px;
    }

    .slide-content-box a:hover, .slider-caption a:hover {
        background: <?= $secondaryColor = maybe_null_or_empty($options, 'site_secondary_color', false, '#0a3764') ?>;
        color: #fff;
    }

    a#scrollUp {
        bottom: 50px;
        position: fixed;
        right: 30px;
        background: <?= $secondaryColor ?>;
        height: 50px;
        width: 50px;
        text-align: center;
        font-size: 24px;
        color: #fff;
        line-height: 45px;
        border-radius: 3px;
    }

    .evaluation-sidebar .widget {
        background-color: <?= $secondaryColor ?> !important;
        box-shadow: unset;
    }

    .tags-widget a.active {
        background: <?= $mainColor ?>;
        color: #ffffff;
        border: 1px solid<?= $mainColor ?>;
    }

    .widget .archives a.active, .widget .categories a.active {
        color: <?= $mainColor ?>;
        padding: 0 10px;
    }

    .eval-list-content h5 a:hover {
        color: <?= $mainColor ?> !important;
    }

    a#scrollUp:hover {
        background: <?= $mainColor ?>;
    }

    .main-slider .owl-dots {
        position: absolute;
        right: 20px;
        bottom: 20px;
        z-index: 999;
    }

    .main-slider .owl-carousel button.owl-dot {
        margin-left: 5px;
    }

    .main-slider .owl-carousel button.owl-dot span {
        width: 12px;
        height: 12px;
        background: rgba(255, 255, 255, .7);
        display: block;
        border-radius: 15px;
    }

    .banner-tags {
        margin: 0 0 15px;
        padding: 0;
        list-style: none;
        width: 100%;
        float: left;
    }

    .banner-tags li {
        display: inline-block;
        color: #bbbbbb;
        background: rgba(150, 35, 57, .70);
        margin-right: 2px;
        line-height: 25px;
        padding: 0 20px;
        border-radius: 13px;
        cursor: pointer;
        text-transform: uppercase;
        font-size: 12px;
        font-weight: 600;
    }

    .banner-tags li:hover {
        background: <?= $secondaryColor ?>;
        color: #fff;
    }

    /******** + ========== + Main Slider End + ========== + ********/

    /******** + ========== + Local Boards & Services Start + ========== + ********/
    .title-style-2, .title-style-1 {
        margin: 0 0 27px;
    }

    .title-style-2 h2, .title-style-1 h2 {
        font-weight: 700;
        color: #333;
        margin: 0 0 12px;
    }

    .title-style-2 p, .title-style-1 p {
        font-size: 16px;
        line-height: 22px;
        color: #777777;
        margin: 0px;
    }

    .row.p5 {
        margin-right: -5px;
        margin-left: -5px;
    }

    .local-brands .col-md-4 {
        padding: 0 5px;
    }

    .local-service-box {
        width: 100%;
        border-radius: 5px;
        text-align: center;
        background: #f3f6f9;
        height: 160px;
        margin: 0 0 10px;
        padding: 20px 30px;
        position: relative;
        overflow: hidden;
    }

    .local-service-box:after {
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 0;
        content: "";
        background: rgba(0, 0, 0, .10);
        opacity: 0;
    }

    .local-service-box img {
        margin: 0 0 20px;
        position: relative;
        z-index: 99;
    }

    .local-service-box a {
        display: block;
        color: #333333;
        font-size: 16px;
        font-weight: 600;
        font-family: 'Montserrat', sans-serif;
        line-height: 20px;
        position: relative;
        z-index: 99;
    }

    .local-service-box:hover:after {
        height: 100%;
        opacity: 1;
    }

    .local-service-box:hover a {
        color: <?= $mainColor ?>;
    }

    .Mayor-msg {
        background: <?= $mainColor ?>;
        width: 100%;
        float: left;
        padding: 15px;
        position: relative;
        margin: -100px 0 0;
        border-radius: 5px;
        overflow: hidden;
    }

    .Mayor-msg:after {
        position: absolute;
        bottom: 0;
        right: 0;
        content: "";
        width: 100%;
        height: 40%;
        background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.4) 100%);
        background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.4) 100%);
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.4) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#66000000', GradientType=0);
    }

    .Mayor-thumb {
        position: relative;
    }

    .Mayor-thumb img {
        width: 100%;
        height: auto;
    }

    .Mayor-thumb span.Mayor-sig {
        position: absolute;
        right: 20px;
        bottom: 20px;
    }

    .Mayor-text {
        padding: 25px 15px 15px;
        position: relative;
        z-index: 99;
    }

    .Mayor-msg .Mayor-text span {
        font-style: italic;
        margin-bottom: 5px;
        display: block;
    }

    .Mayor-text span, .Mayor-text p {
        font-family: 'Lato', serif;
        font-size: 16px;
        color: #fff;
        line-height: 26px;
        margin: 0 0 25px;
        text-shadow: 0 7px 10px rgba(0, 0, 0, .12);
    }

    .Mayor-text h5 {
        margin: 0 0 35px;
        color: #fff;
        font-weight: 700;
        position: relative;
        text-shadow: 0 7px 10px rgba(0, 0, 0, .12);
    }

    .Mayor-text h5:after {
        width: 80px;
        position: absolute;
        left: 0;
        bottom: -22px;
        background: rgba(255, 255, 255, .25);
        height: 2px;
        content: "";
    }

    .Mayor-text a {
        background: #fff;
        font-family: 'Montserrat', sans-serif;
        border-radius: 3px;
        display: inline-block;
        color: #222222;
        font-size: 14px;
        font-weight: 500;
        line-height: 36px;
        padding: 0 20px;
    }

    .Mayor-text a:hover {
        background: <?= $secondaryColor ?>;
        color: #fff;
    }

    .lb-box {
        width: 100%;
        float: left;
        overflow: hidden;
        position: relative;
        margin-bottom: 10px;
        border-radius: 3px;
    }

    .lb-box:after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0.8) 100%); /* FF3.6-15 */
        background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0.8) 100%); /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0.8) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#cc000000', GradientType=0); /* IE6-9 */
    }

    .lb-box img {
        width: 100%;
        height: auto;
    }

    .lb-box h6 {
        position: absolute;
        left: 20px;
        bottom: 20px;
        color: #fff;
        font-size: 18px;
        font-weight: 700;
        z-index: 99;
    }

    .row.m5 {
        margin-right: -5px;
        margin-left: -5px;
    }

    .col-md-4.p5 {
        padding-right: 5px;
        padding-left: 5px;
    }

    .lb-box:hover img {
        transform: scale(1.07, 1.07);
        -webkit-transform: scale(1.07, 1.07);
    }

    .emergency-info.lb {
        margin: 0px
    }

    .emergency-info.lb h5 {
        padding: 20px;
    }

    .emergency-info.lb .panel-group .panel-heading {
        padding: 17px 0 17px 20px;
        border-bottom: 1px solid rgba(255, 255, 255, .12);
    }

    /******** + ========== + Local Boards & Services End + ========== + ********/

    /******** + ========== + Event Festivals & News Articles Start + ========== + ********/

    .title-style-2 a {
        background: <?= $mainColor ?>;
        color: #fff;
        font-family: 'Montserrat', sans-serif;
        line-height: 42px;
        float: right;
        font-weight: 500;
        font-size: 14px;
        padding: 0 20px;
        border-radius: 3px;
    }

    .title-style-2 a:hover {
        background: <?= $secondaryColor ?>;
        color: #fff;
    }

    .title-style-2 {
        margin-bottom: 30px;
    }

    .title-style-2 h2 {
        border-right: 1px solid #fadbe1;
        margin: 0px;
        letter-spacing: -.5px;
    }

    .latest-updates {
        width: 100%;
        float: left;
        background: #fff;
        border-radius: 3px;
        overflow: hidden;
        border: 1px solid #e8e8e8;
        box-shadow: 0 5px 15px rgba(0, 0, 0, .07);
    }

    .latest-updates h6 {
        background: <?= $mainColor ?>;
        color: #fff;
        line-height: 58px;
        font-weight: 700;
        padding: 0 20px;
        text-transform: uppercase;
        position: relative;
    }

    .latest-updates h6 img {
        position: absolute;
        right: 0;
        bottom: 0;
    }

    .latest-updates ul {
        margin: 0px;
        padding: 0 20px;
        list-style: none;
    }

    .latest-updates ul li {
        border-bottom: 1px solid #e8e8e8;
        padding: 16px 0 16px;
        position: relative;
    }

    .latest-updates ul li:hover:after {
        height: 100%;
    }

    .latest-updates ul li:after {
        position: absolute;
        left: -20px;
        top: 0;
        width: 2px;
        height: 0;
        content: "";
        background: <?= $mainColor ?>;
    }

    .latest-updates ul li strong {
        display: block;
        font-family: 'Montserrat', sans-serif;
        line-height: 24px;
        font-size: 18px;
        font-weight: 600;
        margin: 0 0 10px;
        letter-spacing: -.5px;
    }

    .latest-updates ul li strong a {
        color: #333;
    }

    .latest-updates ul li:last-child {
        border: 0px;
    }

    .event-meta li, .latest-updates .post-date {
        color: #777;
        font-size: 14px;
    }

    .event-meta i, .latest-updates .post-date i {
        color: #cccccc;
        font-size: 16px;
        margin-right: 5px;
    }

    .latest-updates ul li strong a:hover {
        color: <?= $mainColor ?>;
    }

    .event-post {
        width: 100%;
        background: #fff;
        box-shadow: 0 5px 15px rgba(0, 0, 0, .07);
        border-radius: 3px;
        overflow: hidden;
    }

    .event-post-txt {
        padding: 23px 28px;
    }

    .event-post-txt h5 {
        margin: 0 0 15px;
        font-weight: 700;
        letter-spacing: -.5px;
    }

    .event-post-txt h5 a {
        color: #333;
    }

    .event-meta {
        margin: 0 0 19px;
        padding: 0px;
        list-style: none;
    }

    .event-meta li {
        margin: 0 0 7px;
    }

    .event-post-txt p {
        line-height: 22px;
        margin: 0px;
    }

    .event-post-loc {
        border-top: 1px solid #eeeeee;
        color: #777;
        padding: 0 0 0 30px;
        height: 46px;
        position: relative;
        line-height: 46px;
    }

    .event-post-loc i {
        color: #cccccc;
        margin-right: 5px;
    }

    .event-post-loc a {
        float: right;
        color: #cccccc;
        border-left: 1px solid #eee;
        padding: 0 20px;
    }

    .event-post:hover .event-post-loc a, .event-post:hover h5 a {
        color: <?= $mainColor ?>;
    }

    .event-post:hover .event-post-loc a {
        background: <?= $mainColor ?>;
        color: #fff;
    }

    .event-post:hover .event-post-loc a i {
        color: #fff;
    }

    .thumb {
        position: relative;
        overflow: hidden;
    }

    .thumb:after {
        position: absolute;
        left: 0;
        top: 0;
        background: rgba(0, 0, 0, .3);
        width: 100%;
        height: 100%;
        content: "";
        opacity: 0;
    }

    .thumb img {
        width: 100%;
        height: auto;
    }

    .new-thumb a, .thumb a {
        position: absolute;
        left: -150px;
        right: 0;
        top: 0;
        bottom: 0;
        margin: auto;
        width: 44px;
        height: 44px;
        background: #fff;
        border-radius: 100%;
        z-index: 99;
        text-align: center;
        line-height: 44px;
        color: <?= $mainColor ?>;
        opacity: 0;
    }

    .new-thumb a:hover, .thumb a:hover {
        background: <?= $mainColor ?>;
        color: #fff;
    }

    .mb20 {
        margin-bottom: 20px;
    }

    .event-post:hover .thumb:after {
        opacity: 1;
    }

    .event-post:hover .thumb a {
        opacity: 1;
        left: 0;
    }

    /******** + ========== + Event Festivals & News Articles End + ========== + ********/

    /******** + ========== + Cityscapes & Highlights Start + ========== + ********/

    .white-text h2 {
        color: #fff;
    }

    .white-text p {
        color: #fff;
        width: 60%;
        margin: 0 auto;
    }

    .city-highlights .container-fluid {
        max-width: 1540px;
        margin: 0 auto;
    }

    .ch-box {
        width: 100%;
        float: left;
        position: relative;
        overflow: hidden;
    }

    .ch-box .ch-thumb {
        position: relative;
    }

    .ch-box:hover:after {
        height: 100%;
    }

    .ch-box:after {
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 50%;
        content: "";
        background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.95) 100%);
        background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.95) 100%);
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.95) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#bf000000', GradientType=0);
    }

    .ch-box .ch-thumb a {
        position: absolute;
        left: 0;
        top: -100px;
        right: 0;
        bottom: 0;
        margin: auto;
        width: 50px;
        height: 50px;
        background: #fff;
        border-radius: 100%;
        line-height: 50px;
        z-index: 99;
        text-align: center;
        color: <?= $mainColor ?>;
        opacity: 0;
        font-size: 16px;
    }

    .ch-box:hover:after {
        height: 100%;
    }

    .ch-box .ch-thumb a:hover {
        background: <?= $mainColor ?>;
        color: #fff;
    }

    .ch-box:hover .ch-thumb a {
        top: -50px;
        opacity: 1;
    }

    .ch-box:hover .ch-txt h5 a {
        color: #fff;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, .5);
    }

    .ch-box .ch-txt ul li a:hover {
        color: <?= $mainColor ?>;
    }

    .ch-box:hover .ch-txt {
        height: 160px;
    }

    .ch-box:hover .ch-txt p {
        opacity: 1;
    }

    .ch-box .ch-txt {
        position: absolute;
        left: 0;
        bottom: 0;
        padding: 30px 30px 20px;
        z-index: 99;
        width: 100%;
        height: 115px;
    }

    .ch-box .ch-txt h5 {
        font-weight: 600;
        margin: 0 0 7px;
    }

    .ch-box .ch-txt p {
        color: #fff;
        margin: 0px;
        font-size: 14px;
        opacity: 0;
    }

    .ch-box .ch-txt h5 a {
        color: #fff;
    }

    .ch-box .ch-txt ul {
        margin: 0 0 10px;
        padding: 0px;
        list-style: none;
    }

    .ch-box .ch-txt ul li {
        display: inline-block;
    }

    .ch-box .ch-txt ul li:after {
        content: "|";
        color: <?= $mainColor ?>;
        margin: 0 10px;
    }

    .ch-box .ch-txt ul li:last-child:after {
        display: none;
    }

    .ch-box .ch-txt ul li a {
        color: #fff;
        font-size: 14px;
    }

    .city-highlights .owl-carousel .owl-nav button.owl-next, .city-highlights .owl-carousel .owl-nav button.owl-prev {
        position: absolute;
        left: -20px;
        top: 0;
        bottom: 0;
        width: 40px;
        height: 120px;
        margin: auto;
        background: <?= $mainColor ?>;
        z-index: 99;
        color: #fff;
        border-radius: 5px 0 0px 5px;
        font-size: 0px;
    }

    .city-highlights .owl-carousel .owl-nav button.owl-next {
        left: inherit;
        right: -20px;
        border-radius: 0 5px 5px 0;
    }

    .city-highlights .owl-carousel .owl-nav button.owl-next:after, .city-highlights .owl-carousel .owl-nav button.owl-prev:after {
        content: "\f104";
        font-family: "FontAwesome";
        font-weight: 900;
        font-size: 24px;
    }

    .city-highlights .owl-carousel .owl-nav button.owl-next:after {
        content: "\f105";
    }

    .city-highlights .owl-carousel .owl-nav button.owl-next:hover, .city-highlights .owl-carousel .owl-nav button.owl-prev:hover {
        background: <?= $secondaryColor ?>;
    }

    .ch-box .ch-txt h5 a:hover {
        color: <?= $mainColor ?>;
    }

    /******** + ========== + Cityscapes & Highlights End + ========== + ********/

    /******** + ========== + Govt. Services & Informations Start + ========== + ********/
    .pb80 {
        padding: 0 0 80px;
    }

    .c1 {
        background: <?= maybe_null_or_empty($options, 'site_secondary_color', false, '#d94148') ?>;
    }

    .c2 {
        background: #2196f3;
    }

    .c3 {
        background: #4caf50;
    }

    .c4 {
        background: #d32f2f;
    }

    .c5 {
        background: #795548;
    }

    .c6 {
        background: #546e7a;
    }

    .department-box {
        width: 100%;
        float: left;
        border-radius: 5px;
        position: relative;
        overflow: hidden;
    }

    .department-box:hover:after {
        opacity: 1;
    }

    .department-box:after {
        position: absolute;
        left: 0;
        top: 0;
        background: rgba(0, 0, 0, .2);
        width: 100%;
        height: 100%;
        content: "";
        opacity: 0;
    }

    .department-box h6 {
        color: #fff;
        font-weight: 700;
        border-bottom: 1px solid rgba(238, 238, 238, .40);
        padding: 15px 0 15px 20px;
        position: relative;
        z-index: 98
    }

    .department-box ul {
        margin: 0px;
        padding: 12px 20px 13px;
        list-style: none;
        position: relative;
        z-index: 98
    }

    .department-box a {
        font-size: 14px;
        font-weight: 500;
        color: #fff;
        display: block;
        line-height: 30px;
        letter-spacing: -.1px;
        position: relative;
        z-index: 98
    }

    .department-box a i {
        color: rgba(255, 255, 255, .30);
        font-size: 6px;
        margin: 0 5px 0 0;
        position: relative;
        top: -3px;
    }

    .department-box a:hover {
        color: rgba(255, 255, 255, .70);
    }

    a.see-more {
        background: rgba(0, 0, 0, .20);
        display: inline-block;
        border-radius: 5px;
        font-family: 'Montserrat', sans-serif;
        font-size: 12px;
        font-weight: 600;
        color: #fff;
        margin: 0 0 20px 35px;
        padding: 0 20px;
    }

    a.see-more:hover {
        background: rgba(0, 0, 0, .40);
        color: #fff;
    }

    .mb30 {
        margin: 0 0 30px;
    }

    .emergency-info {
        background: <?= $secondaryColor ?>;
        width: 100%;
        float: left;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .emergency-info h5 {
        color: #fff;
        font-weight: 600;
        text-align: center;
        padding: 15px 20px;
        line-height: 30px;
        border-bottom: 1px solid rgba(255, 255, 255, .12);
    }

    .emergency-info .panel-group {
        margin-bottom: 10px;
    }

    .emergency-info ul {
        margin: 0px;
        padding: 0px;
        list-style: none;
    }

    .emergency-info ul li {
        line-height: 34px;
        color: rgba(255, 255, 255, .70);
    }

    .emergency-info ul li i {
        color: rgba(255, 255, 255, 1);
        margin-right: 8px;
    }

    .emergency-info .panel-group .panel {
        background: none;
        border: 0px;
        box-shadow: none;
    }

    .emergency-info .panel-group .panel:last-child .panel-heading {
        border: 0px;
    }

    .emergency-info .panel-group .panel-heading {
        padding: 15px 0 15px 20px;
        border-bottom: 1px solid rgba(255, 255, 255, .12);
    }

    .emergency-info .panel-group .panel-heading a {
        color: #fff;
        font-weight: 600;
        display: block;
        position: relative;
    }

    .emergency-info .panel-group .panel-heading a:after {
        content: "\f107";
        font-family: "FontAwesome";
        font-weight: 900;
        color: #fff;
        font-size: 18px;
        position: absolute;
        right: 20px;
        top: 0;
    }

    .emergency-info .panel-group .panel-heading + .panel-collapse > .list-group, .emergency-info .panel-group .panel-heading + .panel-collapse > .panel-body {
        border: 0px;
    }

    .query {
        background: #fff;
        border-radius: 5px;
        width: 100%;
        float: left;
        padding: 25px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.12);
        margin-top: 7px;
    }

    .query ul {
        margin: 0px;
        padding: 0px;
        list-style: none;
    }

    .query h5 {
        font-weight: 600;
        color: #222;
        margin: 0 0 10px;
    }

    .query ul li {
        position: relative;
        padding: 0 0 0 35px;
        color: #555555;
        font-size: 18px;
        font-weight: 400;
        margin-bottom: 10px;
    }

    .query ul li:last-child {
        margin: 0px;
    }

    .query ul li strong {
        display: block;
        color: <?= $mainColor ?>;
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
    }

    .query ul li span {
        position: absolute;
        left: 0;
        top: 0;
        width: 24px;
        height: 24px;
        border: 1px solid #e6e6e6;
        border-radius: 100%;
        font-size: 12px;
        text-align: center;
        line-height: 24px;
        color: #bbbbbb;
    }

    /******** + ========== + Govt. Services & Informations End + ========== + ********/

    /******** + ========== + Facts About City Start + ========== + ********/

    .title-style-1.white p, .title-style-1.white h2 {
        color: #fff;
    }

    .fact-newsletter .title-style-1.white p {
        width: 85%;
    }

    .fact-newsletter ul.counter {
        margin: 0px;
        padding: 0px;
        list-style: none;
    }

    .fact-box {
        background: #fff;
        border: 1px solid #e8e8e8;
        border-radius: 5px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7);
        margin-bottom: 12px;
        height: 120px;
        padding: 35px 0 0 70px;
        position: relative;
    }

    .fact-box:hover {
        background: <?= $mainColor ?>;
        opacity: 0.9;
        border-color: <?= $mainColor ?>;
    }

    .fact-box:hover span, .fact-box:hover strong {
        color: #fff;
    }

    .fact-newsletter ul.counter .col-md-4 {
        padding: 0 6px;
    }

    .fact-box strong {
        color: <?= $mainColor ?>;
        font-size: 36px;
        font-weight: 800;
        display: block;
        line-height: 30px;
        margin: 0 0 6px;
    }

    .fact-box span {
        font-family: 'Montserrat', sans-serif;
        font-size: 14px;
        font-weight: 500;
        color: #777777;
        text-transform: uppercase;
    }

    .fact-box i {
        position: absolute;
        left: 20px;
        top: 45px;
        font-size: 30px;
        color: #cccccc;
    }

    .stay-connected {
        background: <?= $mainColor ?>;
        border-radius: 5px;
        width: 100%;
        float: left;
        padding: 30px;
        margin: 16px 0 0;
    }

    .stay-connected ul {
        margin: 10px 0 0;
        padding: 0px;
        list-style: none;
    }

    .stay-connected ul li {
        margin: 0 0 20px;
    }

    .stay-connected ul li:last-child {
        margin: 0;
    }

    .stay-connected .form-control {
        border-radius: 3px;
        height: 55px;
        border: 1px solid #e8e8e8;
        line-height: 53px;
        padding: 0 20px;
        font-size: 16px;
    }

    .stay-connected input[type="submit"] {
        width: 100%;
        border: 0px;
        background: <?= $secondaryColor ?>;
        color: #fff;
        height: 55px;
        line-height: 55px;
        font-family: 'Montserrat', sans-serif;
        border-radius: 3px;
        font-size: 16px;
        font-weight: 500;
    }

    .stay-connected input[type="submit"]:hover {
        background: #222;
        color: #fff;
    }

    .stay-connected p, .stay-connected h5 {
        color: #fff;
        margin: 0 0 15px;
    }

    /******** + ========== + Facts About City End + ========== + ********/

    /******** + ========== + City Officials Team Start + ========== + ********/

    .p80-p50 {
        padding: 80px 0 50px;
    }

    .city-team .title-style-1 p {
        width: 70%;
        margin: 0 auto;
    }

    .team-box {
        width: 100%;
        float: left;
        background: #fff;
        overflow: hidden;
        border-radius: 5px;
        margin: 0 0 30px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.07);
    }

    .team-box .team-thumb {
        width: 47.5%;
        float: left;
        overflow: hidden;
        position: relative;
    }

    .team-box .team-txt {
        width: 52.5%;
        float: left;
        padding: 27px 30px 0 30px;
    }

    .team-box .team-thumb img {
        width: 100%;
        height: auto;
    }

    .team-box .team-txt h5 {
        font-weight: 700;
        margin: 0 0 7px;
    }

    .team-box .team-txt strong {
        font-weight: 500;
        color: #f63859;
        font-style: italic;
        font-size: 16px;
        display: block;
        margin: 0 0 7px;
    }

    .team-box .team-txt p {
        margin: 0 0 17px;
        line-height: 22px;
    }

    ul.team-social {
        margin: 0px;
        padding: 13px 0 0;
        list-style: none;
        border-top: 1px solid #eeeeee;
        position: relative;
    }

    .team-box:hover ul.team-social:after {
        width: 100%;
    }

    ul.team-social:after {
        position: absolute;
        left: 0;
        top: -1px;
        width: 0;
        height: 1px;
        background: #f63859;
        content: "";
    }

    ul.team-social li {
        display: inline-block;
        margin: 0 5px 0 0;
        color: #999;
    }

    ul.team-social a {
        color: #bbb;
    }

    ul.team-social a:hover {
        color: #f63859;
    }

    .team-box .team-thumb:after {
        position: absolute;
        left: 0;
        top: 0;
        background: rgba(0, 0, 0, .5);
        content: "";
        width: 100%;
        height: 100%;
        opacity: 0;
    }

    .team-box .team-thumb a {
        position: absolute;
        left: -90px;
        top: 0;
        bottom: 0;
        right: 0;
        margin: auto;
        width: 45px;
        height: 45px;
        background: #fff;
        border-radius: 100%;
        color: #f63859;
        text-align: center;
        line-height: 45px;
        z-index: 333;
        opacity: 0;
    }

    .team-box:hover .team-thumb:after {
        opacity: 1;
    }

    .team-box:hover .team-thumb a {
        opacity: 1;
        left: 0;
    }

    .team-box .team-thumb a:hover {
        background: #f63859;
        color: #fff;
    }

    .team-box:hover .team-txt h5 {
        color: #f63859;
    }

    .team-box:hover .team-txt strong {
        color: #222;
    }

    /******** + ========== + City Officials Team End + ========== + ********/

    /******** + ========== + Call 2 Action Start + ========== + ********/

    .call2action p {
        font-size: 32px;
        font-style: italic;
        color: #e1e1e1;
        font-weight: 300;
        line-height: 45px;
        margin: 30px 0;
    }

    .call2action a {
        background: #f63859;
        display: inline-block;
        font-family: 'Montserrat', sans-serif;
        font-size: 16px;
        font-weight: 500;
        color: #fff;
        padding: 0 35px;
        line-height: 55px;
        border-radius: 5px;
    }

    .call2action a:hover {
        background: #2eafe7;
        color: #fff;
    }

    /******** + ========== + Call 2 Action End + ========== + ********/

    /******** + ========== + Footer Start + ========== + ********/

    .footer {
        background: #333333;
        padding: 20px 0;
    }

    .footer p.copyr {
        color: #888888;
        margin: 0px;
    }

    .footer p.copyr a {
        color: #f63859;
    }

    .footer p.copyr a:hover {
        color: #fff;
    }

    .footer-social {
        margin: 0px;
        padding: 0px;
        list-style: none;
        text-align: right;
    }

    .footer-social li {
        display: inline-block;
        margin-left: 10px;
    }

    .footer-social a {
        color: #616161;
        font-size: 18px;
    }

    .footer-social a:hover {
        color: #f63859;
    }

    /******** + ========== + Footer End + ========== + ********/

    /******** + ========== + Home Page Two Start + ========== + ********/

    /*** + === + Mayor MSG Start + === + ***/

    .h2-Mayor-msg .Mayor-img {
        width: 34%;
        overflow: hidden;
        float: left;
        position: relative;
    }

    .h2-Mayor-msg .Mayor-img img {
        border-radius: 5px;
        width: 100%;
        height: auto;
    }

    .h2-Mayor-msg .msig {
        position: absolute;
        bottom: 20px;
        right: 20px;
        z-index: 99;
    }

    .h2-Mayor-msg .Mayor-txt {
        width: 66%;
        float: left;
        padding-left: 30px;
    }

    .h2-Mayor-msg .Mayor-txt p {
        color: #fff;
        font-size: 20px;
        line-height: 28px;
        font-style: italic;
        margin: 0 0 20px;
    }

    .h2-Mayor-msg .Mayor-txt a {
        background: #fff;
        display: inline-block;
        border-radius: 17px;
        line-height: 34px;
        font-family: 'Montserrat', sans-serif;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 12px;
        color: #333;
        letter-spacing: 2px;
        padding: 0 20px;
    }

    .h2-Mayor-msg .Mayor-txt h4 {
        color: #fff;
        text-transform: uppercase;
        font-weight: 700;
        margin: 4px 0 13px;
    }

    .h2-Mayor-msg .Mayor-txt strong {
        font-family: 'Montserrat', sans-serif;
        font-size: 14px;
        font-weight: 500;
        color: #fff;
    }

    .h2-Mayor-msg .Mayor-txt a:hover {
        background: <?= $secondaryColor ?>;
        color: #fff;
    }

    .city-tour {
        position: relative;
        width: 100%;
        float: left;
        overflow: hidden;
        border-radius: 5px;
    }

    .city-tour strong {
        position: absolute;
        left: -5px;
        top: 20px;
        color: #fff;
        font-family: 'Montserrat', sans-serif;
        font-size: 12px;
        text-transform: uppercase;
        line-height: 30px;
        padding: 0 15px;
        letter-spacing: 2px;
        border-radius: 3px;
    }

    .city-tour a {
        position: absolute;
        right: 20px;
        bottom: 20px;
    }

    .city-tour a:hover img {
        opacity: .7;
    }

    /*** + === + Mayor MSG End + === + ***/

    /*** + === + Local Boards & Services Start + === + ***/

    .section-title {
        margin: 0 0 27px;
    }

    .section-title h2 {
        font-weight: 700;
        color: #333;
        margin: 0 0 13px;
    }

    .section-title p {
        color: #777777;
        font-size: 16px;
        margin: 0px;
    }

    /*** + === + Local Boards & Services End + === + ***/

    .local-brands .title-style-1 {
        margin-bottom: 32px;
    }

    .h2-local-brands .col-md-3 {
        padding: 0 6px;
    }

    .local-box {
        width: 100%;
        float: left;
        position: relative;
        overflow: hidden;
        border-radius: 5px;
        margin: 0 0 10px;
    }

    .local-box:after {
        position: absolute;
        left: 0;
        bottom: -1px;
        width: 100%;
        height: 75%;
        content: "";
        background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 1) 100%);
        background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 1) 100%);
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#000000', GradientType=0);
    }

    .local-box a {
        position: absolute;
        bottom: 0;
        left: 0;
        font-size: 20px;
        font-weight: 600;
        color: #fff;
        font-family: 'Montserrat', sans-serif;
        padding: 20px;
        z-index: 999;
    }

    .local-box:hover img {
        transform: scale(1.2);
        -webkit-transform: scale(1.2);
    }

    .local-box img {
        width: 100%;
        height: auto;
    }

    .local-box:hover:after {
        height: 100%;
    }

    .local-box:hover a {
        color: #f63859;
    }

    .lb-ser-box {
        width: 100%;
        float: left;
        margin: 0px;
        padding: 0px;
        list-style: none;
    }

    .lb-ser-box li {
        position: relative;
        width: 100%;
        float: left;
        margin: 0 0 30px;
    }

    .lb-ser-box li:last-child {
        margin: 0px;
    }

    .lb-ser-box .lb-icon img {
        width: 50px;
        height: auto;
    }

    .lb-ser-box h6 {
        font-weight: 700;
        color: #333333;
        margin: 0 0 5px;
    }

    .lb-ser-box p {
        margin: 0px;
        color: #777777;
        font-size: 14px;
        line-height: 24px;
    }

    .lb-ser-box li:hover .lb-icon {
        opacity: .7;
    }

    /*** + === + Local Boards & Services End + === + ***/

    /*** + === + Emergency Numbers Start + === + ***/

    .newsletter-form h5 {
        color: #fff;
        font-weight: 700;
        margin: 0 0 20px;
    }

    .newsletter-form ul {
        list-style: none;
        padding: 0px;
        margin: 0 -6px 0;
    }

    .newsletter-form ul li.col-md-6 {
        padding: 0 6px;
    }

    .newsletter-form .form-control {
        border: 1px solid #e8e8e8;
        box-shadow: none;
        padding: 0 20px;
        line-height: 53px;
        height: 55px;
        margin: 0 0 15px;
    }

    .newsletter-form button {
        float: right;
        border: 0px;
        padding: 0 40px;
        background: #f43758;
        color: #fff;
        font-family: 'Montserrat', sans-serif;
        line-height: 55px;
        border-radius: 30px;
        font-size: 16px;
        font-weight: 500;
    }

    .newsletter-form button:hover {
        background: #fff;
        color: #f43758;
    }

    .newsletter-form p {
        color: #fff;
        margin: 5px 0 0;
        font-style: italic;
    }

    .e-numbers {
        position: relative;
    }

    .e-numbers .info-num {
        position: absolute;
        right: 0;
        top: 0;
        text-align: right;
    }

    .e-numbers .info-num strong {
        color: <?= $mainColor ?>;
        font-size: 12px;
        text-transform: uppercase;
        display: block;
        margin: 0 0 10px;
    }

    .e-numbers .info-num h3 {
        font-weight: 300;
        color: <?= $secondaryColor ?>;
        font-size: 28px;
    }

    .department-links h5 {
        margin: 0 0 20px;
        color: #333;
        font-weight: 700;
    }

    .e-numbers h5 {
        color: #333;
        font-weight: 700;
        margin: 0 0 8px;
    }

    .e-numbers p {
        margin: 0 0 17px;
        font-style: italic;
        color: #777777;
        font-size: 16px;
    }

    .e-numbers ul {
        padding: 0px;
        list-style: none;
        margin-bottom: 0px;
    }

    .e-numbers .em-box {
        background: #fff;
        border: 1px solid #d7d7d7;
        width: 100%;
        float: left;
        padding: 20px 25px;
        border-radius: 3px;
        height: 165px;
    }

    .e-numbers .em-box:hover {
        background: <?= $mainColor ?>;
        border-color: <?= $mainColor ?>;
    }

    .e-numbers .em-box:hover i, .e-numbers .em-box:hover strong.em-deprt, .e-numbers .em-box:hover strong.em-num {
        color: #fff;
    }

    .e-numbers .em-box i {
        font-size: 30px;
        color: #bbbbbb;
    }

    .e-numbers .em-box strong.em-num {
        font-size: 36px;
        color: <?= $mainColor ?>;
        font-weight: 900;
        display: block;
    }

    .e-numbers .em-box strong.em-deprt {
        font-family: 'Montserrat', sans-serif;
        font-size: 14px;
        color: #777;
        font-weight: 600;
    }

    /*** + === + Emergency Numbers End + === + ***/

    /*** + === + Event Festivals & News Articles Start + === + ***/

    .h2-news-articles {
        background: #fafafa;
    }

    .event-post-full {
        background: #fff;
        width: 100%;
        float: left;
        box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, 0.07);
        overflow: hidden;
        border-radius: 3px;
        margin-bottom: 30px;
    }

    .event-post-full .thumb {
        width: 360px;
        float: left;
        position: relative;
        overflow: hidden;
    }

    .event-post-full .event-post-content {
        width: 390px;
        float: left;
    }

    .event-post-full .event-post-txt {
        padding: 20px 30px 0;
        width: 100%;
    }

    .event-post-full .event-post-txt p {
        margin: 0 0 20px;
    }

    .event-post-full:hover .event-post-loc a, .event-post-full:hover .event-post-txt h5 a {
        color: #f63859;
    }

    span.ecat {
        background: <?= $mainColor ?>;
        display: inline-block;
        color: #fff;
        line-height: 24px;
        border-radius: 15px;
        padding: 0 12px;
        font-size: 12px;
        text-transform: uppercase;
        margin: 0 0 17px;
    }

    .btn-group.share-post {
        float: right;
    }

    .btn-group.share-post button.dropdown-toggle {
        background: none;
        border: 0;
        font-size: 12px;
        color: #cccccc;
        text-transform: uppercase;
    }

    .btn-group.share-post button.dropdown-toggle:hover {
        color: <?= $mainColor ?>;
    }

    .btn-group.share-post .dropdown-menu {
        border: 0px;
        width: 35px;
        text-align: center;
        margin: 0px;
        padding: 0px;
        min-width: inherit;
        left: 0;
        right: 0;
        margin: 5px auto;
    }

    .btn-group.share-post .dropdown-menu > li > a {
        padding: 5px 0;
    }

    body .btn-group.open .dropdown-toggle {
        box-shadow: none;
        -webkit-box-shadow: none;
    }

    .share-post .fb {
        color: #3b5998;
    }

    .share-post .tw {
        color: #38a1f3;
    }

    .share-post .insta {
        color: #e1306c;
    }

    .share-post .yt {
        color: #ff0000;
    }

    .share-post .linked {
        color: #0077b5;
    }

    .share-post .pin {
        color: #bd081b;
    }

    .news-post {
        width: 100%;
        float: left;
        border-radius: 5px;
        overflow: hidden;
        position: relative;
        margin-bottom: 30px;
        box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, 0.07);
        background: #fff;
    }

    .event-post-full:hover, .news-post:hover {
        box-shadow: 0px 10px 25px 0px rgba(0, 0, 0, 0.07);
    }

    .image-post .thumb:before {
        position: absolute;
        left: 0;
        top: 0;
        background: rgba(0, 0, 0, .60);
        width: 100%;
        height: 100%;
        content: "";
    }

    .image-post .news-post-txt {
        position: absolute;
        left: 0;
        top: 0;
        z-index: 99;
        width: 100%;
        height: 100%;
    }

    .image-post .news-meta li, .image-post .news-post-txt p, .image-post .news-post-txt h5 a {
        color: #fff;
    }

    .news-post-txt h5 {
        font-weight: 700;
        margin: 0 0 15px;
        line-height: 30px;
        letter-spacing: -.5px;
    }

    .news-post-txt h5 a {
        color: #333333;
    }

    .news-post-txt p {
        margin: 0 0 30px;
        font-size: 16px;
        color: #777777;
        line-height: 22px;
        letter-spacing: -0.1px;
    }

    .news-meta {
        margin: 0px;
        padding: 0px;
        list-style: none;
    }

    .news-meta li {
        display: inline-block;
        color: #999999;
        font-size: 14px;
    }

    .news-meta li:after {
        content: "|";
        margin: 0 5px;
        color: #999999;
        font-style: normal;
    }

    .news-meta li:last-child:after {
        display: none;
    }

    .news-meta .post-user {
        color: <?= $mainColor ?>;
        font-style: italic;
    }

    .post-user img {
        border-radius: 100%;
        width: 30px;
        height: 30px;
        border: 1px solid #fff;
        margin-right: 3px;
    }

    .news-post .news-post-txt {
        padding: 20px 30px;
    }

    .thumb .ecat {
        position: absolute;
        left: 30px;
        top: 20px;
        z-index: 99;
    }

    .thumb .share-post {
        position: absolute;
        right: 30px;
        top: 20px;
        z-index: 99;
    }

    .ecat.c1 {
        background-color: <?= $mainColor ?>;
    }

    .ecat.c2 {
        background-color: #f7941d;
    }

    .ecat.c3 {
        background-color: <?= $secondaryColor ?>;
    }

    .ecat.c4 {
        background-color: #72bf44;
    }

    .ecat.c5 {
        background-color: #00a98f;
    }

    .ecat.c6 {
        background-color: #74d2e7;
    }

    .ecat.c7 {
        background-color: #c2c0bf;
    }

    .ecat.c8 {
        background-color: #ff8100;
    }

    .ecat.c9 {
        background-color: #168de2;
    }

    .news-post:hover .news-post-txt h5 a {
        color: #f63859;
    }

    .event-post-full:hover .thumb a {
        left: 0;
        opacity: 1;
    }

    /*** + === + Event Festivals & News Articles End + === + ***/

    /*** + === + Highlights & Cityscapes Start + === + ***/

    .hc-box {
        width: 100%;
        float: left;
        overflow: hidden;
        position: relative;
    }

    .hc-box:after {
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        content: "";
        background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.85) 100%);
        background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.85) 100%);
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.85) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#d9000000', GradientType=0);
    }

    .hc-box .hc-box-cap {
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        padding: 30px 40px;
        z-index: 999;
        height: 115px;
    }

    .hc-box .hc-box-cap h5 {
        margin: 0 0 20px;
        font-weight: 700;
    }

    .hc-box .hc-box-cap h5 a {
        color: #fff;
    }

    .hc-box .hc-box-cap ul {
        margin: 0 0 10px;
        padding: 0px;
        list-style: none;
    }

    .hc-box .hc-box-cap li {
        color: #fff;
        display: inline-block;
        font-size: 14px;
    }

    .hc-box .hc-box-cap li a {
        color: #fff;
    }

    .hc-box .hc-box-cap li:after {
        content: "|";
        margin: 0 10px;
        color: <?= $mainColor ?>;
    }

    .hc-box .hc-box-cap li:last-child:after {
        display: none;
    }

    .highlights-cityscapes .owl-carousel .owl-nav button.owl-prev, .highlights-cityscapes .owl-carousel .owl-nav button.owl-next {
        position: absolute;
        right: 10px;
        top: 0;
        bottom: 0;
        margin: auto;
        width: 60px;
        height: 60px;
        border-radius: 100%;
        background: <?= $mainColor ?>;
        font-size: 0px;
        opacity: .3;
    }

    .highlights-cityscapes .owl-carousel .owl-nav button.owl-prev {
        right: inherit;
        left: 10px;
    }

    .highlights-cityscapes .owl-carousel .owl-nav button.owl-prev:after {
        content: "\f053";
        font-family: FontAwesome;
        font-weight: 700;
        color: #fff;
        font-size: 20px;
    }

    .highlights-cityscapes .owl-carousel .owl-nav button.owl-next:after {
        content: "\f054";
        font-family: FontAwesome;
        font-weight: 700;
        color: #fff;
        font-size: 20px;
    }

    .highlights-cityscapes .owl-carousel .owl-nav button.owl-prev:hover, .highlights-cityscapes .owl-carousel .owl-nav button.owl-next:hover {
        background: <?= $mainColor ?>;
        opacity: 1;
    }

    .hc-box:hover .hc-box-cap h5 a, .hc-box:hover .hc-box-cap li a {
        color: <?= $mainColor ?>;
    }

    .hc-box .hc-box-cap p {
        color: #fff;
        font-size: 14px;
        margin: 0px;
        opacity: 0;
    }

    .hc-box:hover .hc-box-cap p {
        opacity: 1;
    }

    .hc-box:hover .hc-box-cap {
        height: 170px;
    }

    /*** + === + Highlights & Cityscapes End + === + ***/

    /*** + === + Citizens & Community Corner Start + === + ***/

    .community-box {
        background: #fff;
        width: 100%;
        float: left;
        position: relative;
        border-radius: 5px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, .07);
    }

    .community-box:hover {
        box-shadow: 0px 10px 25px rgba(0, 0, 0, .20);
    }

    .community-box:hover a.see-more {
        background: #f63859;
        color: #fff;
        border-color: #f63859;
    }

    .community-box h6 {
        color: <?= $secondaryColor ?>;
        border-bottom: 1px solid #eeeeee;
        line-height: 53px;
        font-weight: 700;
        padding-left: 20px;
    }

    .community-box ul {
        margin: 0px;
        padding: 20px;
        list-style: none;
    }

    .community-box ul li i {
        font-size: 7px;
        color: #cccccc;
        margin-right: 7px;
    }

    .community-box ul li a {
        font-size: 14px;
        line-height: 30px;
        color: #444444;
    }

    .community-box a.see-more {
        border: 1px solid #e1e1e1;
        background: #f0f0f0;
        color: #777777;
        display: inline-block;
        line-height: 25px;
        font-family: 'Montserrat', sans-serif;
        font-size: 12px;
        font-weight: 600;
    }

    .community-box span {
        position: absolute;
        right: 0;
        bottom: 0;
    }

    .community-box ul li a:hover {
        color: <?= $mainColor ?>;
    }

    .community-box a.see-more:hover {
        background: <?= $mainColor ?>;
        color: #fff;
        border-color: <?= $mainColor ?>;
    }

    /*** + === + Citizens & Community Corner End + === + ***/

    /*** + === + Read Some Facts Start + === + ***/

    .some-facts h2 {
        color: #fff;
        text-align: center;
        font-weight: 700;
        margin: 0 0 30px;
    }

    .some-facts ul {
        margin: 0px;
        padding: 0px;
        list-style: none;
    }

    .some-facts ul li {
        float: left;
        width: 20%;
        text-align: center;
        border-right: 2px solid rgba(255, 255, 255, .35);
        padding: 20px 0;
    }

    .some-facts ul li:last-child {
        border: 0px;
    }

    .facts-icon {
        width: 84px;
        height: 84px;
        text-align: center;
        line-height: 80px;
        margin: 0 auto 20px;
        border-radius: 100%;
        font-size: 36px;
        color: #ffcb0b;
        transition: box-shadow 0.2s;
        position: relative;
    }

    .some-facts strong {
        display: block;
        color: #fff;
        font-size: 36px;
        font-weight: 700;
    }

    .some-facts span {
        color: #e1e1e1;
        font-size: 18px;
        font-weight: 400;
        font-family: 'Montserrat', sans-serif;
    }

    .some-facts ul li:hover .facts-icon {
        box-shadow: 0 0 0 5px rgba(255, 255, 255, 1);
        color: #fff;
    }

    .facts-icon:after {
        top: 0;
        left: 0;
        padding: 0;
        box-shadow: 0 0 0 2px #f63859;
        -webkit-transition: -webkit-transform 0.2s, opacity 0.2s;
        -moz-transition: -moz-transform 0.2s, opacity 0.2s;
        transition: transform 0.2s, opacity 0.2s;
        position: absolute;
        width: 100%;
        height: 100%;
        content: '';
        -webkit-box-sizing: content-box;
        -moz-box-sizing: content-box;
        box-sizing: content-box;
        border-radius: 100%;
    }

    .some-facts ul li:hover:hover .facts-icon:after {
        -webkit-transform: scale(0.85);
        -moz-transform: scale(0.85);
        -ms-transform: scale(0.85);
        transform: scale(0.85);
        opacity: 0.5;
    }

    .some-facts ul li:hover strong {
        color: #f63859;
    }

    /*** + === + Read Some Facts End + === + ***/

    /*** + === + City Official Members Start + === + ***/
    .official-members {
        background: #fff;
    }

    .official-members .team-box {
        margin: 0px;
    }

    .official-members .team-box .team-txt, .official-members .team-box .team-thumb {
        width: 100%;
        text-align: center;
    }

    .official-members .team-box .team-txt {
        padding: 17px 20px;
    }

    .team-heading {
        padding: 100px 0 0;
    }

    .team-heading h2 {
        font-weight: 700;
        line-height: 50px;
        margin: 0 0 10px;
    }

    .team-heading p {
        font-size: 16px;
        line-height: 22px;
        margin: 0 0 20px;
    }

    .team-heading a {
        background: <?= $mainColor ?>;
        color: #fff;
        font-family: 'Montserrat', sans-serif;
        text-transform: 700;
        font-size: 12px;
        line-height: 33px;
        border-radius: 18px;
        display: inline-block;
        padding: 0 20px;
        text-transform: uppercase;
    }

    .team-heading a:hover {
        background: <?= $secondaryColor ?>;
        color: #fff;
    }

    /*** + === + City Official Members End + === + ***/

    /*** + === + Home 2 Footer Start + === + ***/

    .home3.footer {
        background: <?= $mainColor ?>;
    }

    .home3.footer p.copyr {
        color: #fff;
    }

    .home3.footer a, .home3.footer p a {
        color: #fff;
    }

    .footer-widget h6 {
        font-size: 22px;
        color: #fff;
        margin: 0;
        font-weight: 600;
        margin-bottom: 16px;
    }

    .footer-widget ul {
        margin: 0px;
        padding: 0px;
        list-style: none;
    }

    .footer-widget ul li {
        line-height: 32px;
    }

    .footer-widget ul li a {
        color: #fff;
        font-size: 16px;
    }

    .footer-widget ul li a i {
        font-size: 8px;
        margin-right: 8px;
    }

    .footer-widget ul li a:hover {
        color: <?= $mainColor ?>;
    }

    .textwidget address ul {
        margin: 20px 0 0;
        padding: 0px;
        list-style: none;
    }

    .textwidget address ul li {
        color: #fff;
        margin: 0 0 20px;
        padding: 0 0 0 26px;
        position: relative;
    }

    .textwidget address ul li i {
        position: absolute;
        left: 0;
        top: 5px;
        font-size: 14px;
    }

    .textwidget address ul li strong {
        display: block;
        font-weight: 500;
    }

    .twitter-widget {
        background: #38a1f3;
        border-radius: 5px;
        position: relative;
    }

    .tw-txt {
        padding: 30px 30px 17px 30px;
    }

    .twitter-widget h6 {
        color: #fff;
        margin: 0 0 20px;
    }

    .twitter-widget a.reply-tw {
        position: absolute;
        right: 24px;
        top: 24px;
        border: 2px solid #fff;
        width: 30px;
        height: 30px;
        color: #fff;
        text-align: center;
        line-height: 28px;
        border-radius: 100%;
        font-size: 12px;
    }

    .twitter-widget p {
        color: #fff;
        font-size: 16px;
        padding: 0 10px 0 0;
        margin: 0px;
    }

    .tw-footer {
        border-top: 1px solid rgba(255, 255, 255, .20);
        padding: 10px 30px;
        color: #fff;
        position: relative;
        font-size: 14px;
    }

    .tw-footer strong {
        font-size: 12px;
        font-weight: 600;
        display: block;
        text-transform: uppercase;
    }

    .tw-footer i {
        position: absolute;
        bottom: 0;
        right: 0;
        font-size: 60px;
        color: rgba(255, 255, 255, .20);
    }

    .twitter-widget a.reply-tw:hover {
        color: <?= $secondaryColor ?>;
        border-color: <?= $secondaryColor ?>;
    }

    /*** + === + Home 2 Footer End + === + ***/

    .main-content {
        background: #fff;
        width: 100%;
        float: left;
        position: relative;
        z-index: 99;
    }

    #site-footer {
        position: relative;
        z-index: 1;
    }

    #call-2-action {
        position: fixed;
        z-index: -1;
        left: 0;
        right: 0;
        bottom: 0;
    }

    #call-2-action .container {
        padding: 40px 0;
    }

    .owl-carousel .owl-item img {
        height: auto;
    }

    /******** + ========== + Home Page Two End + ========== + ********/

    /******** + ========== + Home Page Three Start + ========== + ********/

    .header-two {
        width: 100%;
        float: left;
        box-shadow: 0 5px 20px rgba(0, 0, 0, .15);
    }

    .header-two .topbar p {
        margin: 0px;
        color: #fff;
        line-height: 40px;
    }

    .header-two .topbar p a {
        font-weight: 700;
        color: #fff;
    }

    .become-vol {
        float: right;
        background: <?= $mainColor ?>;
        line-height: 40px;
        color: #fff;
        text-transform: uppercase;
        font-weight: 600;
        padding: 0 20px;
        font-size: 14px;
    }

    .cross-btn {
        float: right;
        background: rgba(0, 0, 0, .30);
        color: #fff;
        font-size: 14px;
        font-weight: 700;
        width: 45px;
        text-align: center;
        line-height: 40px;
    }

    .cross-btn:hover {
        background: <?= $mainColor ?>;
        color: #fff;
    }

    .become-vol:hover {
        background: #f54337;
        color: #fff;
    }

    .h3-logo-row {
    }

    .h3-logo-row .h3-logo {
        text-align: center;
        padding: 19px 0;
    }

    .h3-logo-row ul.quick-links {
        margin: 20px 0 14px;
        padding: 0;
        list-style: none;
        width: 50%;
        float: left;
    }

    .h3-logo-row ul.quick-links li {
        float: left;
        margin: 0 5px 5px 0;
    }

    .h3-logo-row ul.quick-links li a {
        border: 1px solid #e1e1e1;
        line-height: 20px;
        display: block;
        border-radius: 3px;
        background: #f7f7f7;
        color: #888888;
        font-size: 12px;
        padding: 0 10px;
    }

    .h3-logo-row ul.quick-links li a:hover {
        background: #f54337;
        color: #fff;
        border-color: #f54337;
    }

    .header-contact {
        margin: 20px 0 0;
        padding: 0px;
        list-style: none;
        float: right;
    }

    .header-contact li {
        float: left;
        border-right: 1px solid #eeeeee;
        text-align: left;
        padding: 7px 15px;
        font-size: 12px;
    }

    .header-contact li span {
        display: block;
        color: #222;
    }

    .header-contact i {
        color: #222;
        font-size: 16px;
    }

    .city-exp i {
        float: left;
        margin: 10px 15px 0 0;
    }

    .city-exp strong {
        float: left;
        font-weight: 400;
    }

    li.header-weather {
        line-height: 34px;
    }

    .h3-navbar {
        border-top: 1px solid #eeeeee;
    }

    .h3-navbar .navbar {
        position: relative;
        min-height: inherit;
        margin-bottom: 0;
        border: 0px solid transparent;
    }

    .header .navbar-collapse, .h3-navbar .navbar-collapse {
        padding: 0px;
    }

    .h3-navbar .navbar .navbar-nav > li > a {
        padding: 0px 12px;
        line-height: 60px;
        position: relative;
        text-transform: uppercase;
        font-size: 14px;
        font-weight: 700;
        color: #333333;
    }

    .h3-navbar .navbar .navbar-nav > li > a:after {
        position: absolute;
        left: 0;
        top: -1px;
        width: 0;
        height: 3px;
        background: #d7d7d7;
        content: "";
    }

    .h3-navbar .nav .open > a, .h3-navbar .nav .open > a:focus, .h3-navbar .nav .open > a:hover, .h3-navbar .nav > li > a:focus, .h3-navbar .nav > li > a:hover, .h3-navbar .navbar .navbar-nav > li > a:hover {
        background: none;
        color: #f54337;
    }

    .h3-navbar .navbar .navbar-nav > li > a:hover:after {
        width: 100%;
    }

    .h3-navbar .navbar .navbar-nav > li.open > a:after {
        width: 100%;
    }

    .h3-navbar .dropdown-menu {
        display: none;
        min-width: 220px;
        padding: 0;
        margin: 0;
        font-size: 14px;
        background: #fff;
        border: 0px;
        box-shadow: none;
        -webkit-box-shadow: none;
        border-radius: 0px;
    }

    .h3-navbar .dropdown-menu .sub-menu {
        display: none;
        min-width: 220px;
        padding: 0;
        margin: 0;
        font-size: 14px;
        background: #fff;
        border: 0px;
        box-shadow: none;
        -webkit-box-shadow: none;
        border-radius: 0px;
    }

    .h3-navbar .dropdown-menu .sub-menu a, .h3-navbar .dropdown-menu a {
        display: block;
        line-height: 40px;
        text-transform: uppercase;
        font-weight: 600;
        font-size: 12px;
        border-bottom: 1px solid #eee;
        background: #fff;
        color: #444;
    }

    .h3-navbar .dropdown-menu a:hover {
        background: #eee;
        color: #f54337;
    }

    .h3-navbar ul.navbar-right {
        margin: 15px 0 0;
        padding: 0px;
        list-style: none;
        float: right;
    }

    .h3-navbar ul.navbar-right li {
        float: left;
        margin: 0 0 0 15px;
    }

    .h3-navbar ul.navbar-right li.search-form {
        width: 220px;
    }

    .h3-navbar .donate-btn a {
        background: <?= $mainColor ?>;
        color: #fff;
        text-transform: uppercase;
        font-size: 12px;
        font-weight: 700;
        line-height: 30px;
        display: block;
        border-radius: 15px;
        padding: 0 20px;
    }

    .h3-navbar .navbar-form {
        padding: 0px;
        margin: 0px;
        height: 30px;
        border: 1px solid #e1e1e1;
        position: relative;
        box-shadow: none;
        -webkit-box-shadow: none;
        border-radius: 15px;
        padding: 0 12px;
        font-size: 12px;
    }

    .h3-navbar .navbar-form .form-control {
        border: 0px;
        width: 100%;
        box-shadow: none;
        outline: none;
        height: 30px;
        line-height: 30px;
        background: none;
    }

    .h3-navbar .navbar-form button {
        position: absolute;
        right: 0;
        top: 0;
        background: none;
        border: 0;
        line-height: 28px;
        padding: 0 12px;
        border-left: 1px solid #e1e1e1;
    }

    .h3-slider-caption {
        position: absolute;
        left: 0;
        width: 100%;
        top: 175px;
        text-align: left;
    }

    .h3-slider-caption strong {
        color: #fff;
        font-size: 60px;
        font-family: 'Montserrat', sans-serif;
        line-height: 70px;
        display: block;
        margin: 0 0 20px;
        text-shadow: 0 5px 10px rgba(0, 0, 0, .12);
    }

    .h3-slider-caption p {
        font-size: 24px;
        font-style: italic;
        color: #fff;
        line-height: 34px;
        margin: 0 0 30px;
    }

    .h3-slider-caption a {
        background: <?= $mainColor ?>;
        color: #fff;
        font-family: 'Montserrat', sans-serif;
        font-size: 16px;
        text-transform: uppercase;
        font-weight: 600;
        line-height: 50px;
        display: inline-block;
        border-radius: 25px;
        padding: 0 35px;
        letter-spacing: 1px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, .12);
    }

    .h3-slider-caption a:hover {
        background: <?= $secondaryColor ?>;
        color: #fff;
    }

    /*********** Mayor Msg with Video Start ***********/

    .Mayor-welcome h5 {
        font-weight: 700;
        color: #fff;
        margin: 0 0 16px;
    }

    .Mayor-welcome p {
        font-size: 16px;
        color: #fff;
        line-height: 24px;
        margin: 0 0 31px;
    }

    .Mayor-welcome h6 {
        font-weight: 600;
        color: #fff;
        margin: 0 0 6px;
        position: relative;
    }

    .Mayor-welcome strong {
        color: #fff;
        font-size: 14 ppx;
        font-style: italic;
        font-weight: 500;
    }

    .Mayor-welcome h6:after {
        position: absolute;
        left: 0;
        top: -14px;
        background: rgba(255, 255, 255, .20);
        width: 80px;
        height: 2px;
        content: "";
    }

    .Mayor-video-msg .city-tour {
        margin-top: -90px;
        box-shadow: 6px 10px 20px rgba(0, 0, 0, .15);
        -webkit-box-shadow: 6px 10px 20px rgba(0, 0, 0, .15);
    }

    /*********** Mayor Msg with Video End ***********/

    /*********** City News Start ***********/

    .city-news {
        background: #f7f7f7;
    }

    .title-style-3 {
        margin-bottom: 25px;
    }

    .title-style-3 h3 {
        margin: 0 0 15px;
        color: #333333;
        font-weight: 700;
    }

    .title-style-3 p {
        margin: 0px;
        color: #777777;
        font-size: 16px;
        font-style: italic;
        position: relative;
        padding-left: 21px;
    }

    .title-style-3 p:before {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        margin: auto;
        width: 15px;
        height: 2px;
        background: <?= $mainColor ?>;
        content: "";
    }

    .news-box {
        background: #fff;
        border-radius: 5px;
        overflow: hidden;
        box-shadow: 0px 5px 15px 0 rgba(0, 0, 0, .07);
    }

    .new-txt {
        padding: 20px;
    }

    .new-txt h6 {
        line-height: 26px;
        font-size: 20px;
        font-weight: 600;
        margin: 0 0 15px;
        letter-spacing: -.5px;
    }

    .new-txt h6 a {
        color: #222;
    }

    .new-txt h4 {
        line-height: 28px;
        font-size: 28px;
        font-weight: 700;
        margin: 0 0 15px;
    }

    .new-txt h4 a {
        color: #222;
    }

    .new-txt h5 {
        font-weight: 600;
        margin: 0 0 10px;
    }

    .new-txt p {
        color: #777777;
        line-height: 24px;
        margin: 0px;
        font-size: 16px;
    }

    .new-txt ul.news-meta {
        margin: 0 0 10px;
        padding: 0px;
        list-style: none;
        width: 100%;
        float: left;
    }

    .new-txt ul.news-meta li {
        float: left;
        font-size: 12px;
        color: #777;
        font-weight: 400;
        text-transform: uppercase;
    }

    .new-txt ul.news-meta li:after {
        content: "|";
        color: #cccccc;
        padding: 0 12px;
    }

    .new-txt li:last-child:after {
        display: none;
    }

    .new-thumb {
        position: relative;
        overflow: hidden;
    }

    .new-thumb img {
        width: 100%;
        height: auto;
        max-width: 100%;
    }

    .new-thumb:after {
        background: rgba(0, 0, 0, .50);
        width: 100%;
        height: 0%;
        position: absolute;
        left: 0;
        top: 0;
        content: "";
        z-index: 9;
        opacity: 0;
    }

    .new-thumb .cat {
        position: absolute;
        right: -3px;
        top: 20px;
        color: #fff;
        font-size: 12px;
        font-family: 'Montserrat', sans-serif;
        line-height: 22px;
        padding: 0 20px;
        border-radius: 3px;
        z-index: 99;
    }

    .news-box-f {
        border-top: 1px solid #eeeeee;
        overflow: hidden;
        line-height: 50px;
        color: #777777;
        font-style: italic;
        font-size: 14px;
        font-weight: 600;
        position: relative;
    }

    .news-box-f img {
        width: 30px;
        height: 30px;
    }

    .news-box:hover .news-box-f:after {
        width: 100%;
    }

    .news-box-f:after {
        position: absolute;
        left: 0;
        top: -1px;
        width: 0;
        height: 1px;
        background: <?= $mainColor ?>;
        content: "";
    }

    .news-box-f img {
        border-radius: 100%;
        margin: 0 10px 0 25px;
    }

    .news-box-f a {
        float: right;
        border-left: 1px solid #eee;
        width: 54px;
        height: 50px;
        text-align: center;
        line-height: 50px;
        color: #bbbbbb;
    }

    .news-box:hover .new-thumb:after {
        height: 100%;
        opacity: 1;
    }

    .news-box:hover .news-box-f a {
        background: <?= $mainColor ?>;
        color: #fff;
    }

    .news-box:hover .new-txt h6 a {
        color: <?= $mainColor ?>;
    }

    .news-box:hover {
        box-shadow: 0px 10px 30px 0 rgba(0, 0, 0, .20);
    }

    .news-details .new-txt p {
        margin: 0 0 20px;
    }

    .news-details blockquote {
        width: 85%;
        background: <?= $secondaryColor ?>;
        overflow: hidden;
        margin: 0 auto 20px;
        border: 0px;
        border-radius: 3px;
        padding: 25px;
        position: relative;
    }

    .news-details blockquote p {
        font-family: 'Montserrat', sans-serif;
        font-size: 20px;
        color: #fff;
        font-style: italic;
        line-height: 32px;
    }

    .single-post-tags {
        width: 100%;
        float: left;
        margin-bottom: 30px;
    }

    .single-post-tags a {
        display: inline-block;
        border: 1px solid #e1e1e1;
        background: #fff;
        color: #888888;
        font-size: 12px;
        font-weight: 500;
        line-height: 29px;
        padding: 0 20px;
        border-radius: 3px;
        margin-right: 3px;
    }

    .single-post-tags a:hover {
        background: <?= $secondaryColor ?>;
        border-color: <?= $secondaryColor ?>;
        color: #fff;
    }

    .about-post-author {
        background: #f5f5f5;
        border-radius: 3px;
        width: 100%;
        float: left;
        position: relative;
        padding: 30px 30px 30px 145px;
        margin-bottom: 50px;
    }

    .about-post-author h5 {
        font-weight: 700;
    }

    .news-details .about-post-author p {
        margin: 0px;
    }

    .about-post-author img {
        width: 100px;
        height: 100px;
        border-radius: 100%;
        position: absolute;
        left: 30px;
        top: 30px;
    }

    .post-comments {
        width: 100%;
        float: left;
    }

    ul.comments {
        width: 100%;
        float: left;
        padding: 0px;
        margin: 0px;
        list-style: none;
    }

    ul.comments .comment {
        width: 100%;
        float: left;
        margin-bottom: 25px;
        position: relative;
        padding-left: 85px;
    }

    .user-thumb {
        position: absolute;
        left: 0;
        top: 0;
        width: 70px;
        height: 70px;
        overflow: hidden;
    }

    .user-thumb img {
        width: 100%;
        height: auto;
        border-radius: 100%;
    }

    ul.post-time {
        position: absolute;
        right: 0;
        top: 5px;
        margin: 0px;
        padding: 0px;
        list-style: none;
    }

    ul.post-time li {
        float: left;
        margin-left: 10px;
        color: #888888;
        font-size: 14px;
    }

    ul.post-time a {
        color: #888888;
    }

    ul.post-time a i {
        color: <?= $secondaryColor ?>;
        font-size: 12px;
    }

    .user-comments {
        float: left;
        width: 100%;
        border-bottom: 1px solid #dddddd;
        padding-bottom: 21px;
    }

    .user-comments h6 {
        margin-bottom: 10px;
    }

    .user-comments p {
        font-size: 14px;
        line-height: 24px;
        margin: 0px;
    }

    .child-comments {
        width: 100%;
        float: left;
        margin: 25px 0 0;
        list-style: none;
        padding: 0px;
    }

    .clinks, .clinks a {
        color: #919da6;
    }

    .child-comments .user-comments {
        padding-right: 20px;
    }

    .aname {
        display: inline-block;
    }

    span.ctime {
        font-size: 12px;
        color: #919da6;
    }

    ul.rep-comments {
        width: 85%;
        background: #fff;
        border-radius: 5px;
        float: left;
        padding: 0px;
        list-style: none;
        margin: 20px 0 0 68px;
        padding: 20px;
    }

    .comment-form {
        width: 100%;
        float: left;
        padding: 30px;
    }

    .comment-form h3 {
        margin-bottom: 20px;
    }

    .comment-form ul {
        padding: 0px;
        margin: 0px;
        list-style: none;
    }

    .comment-form input.form-control {
        border: 2px solid #cdd4d9;
        border-radius: 5px;
        padding: 0 20px;
        height: 52px;
        line-height: 48px;
        color: #cdd4d9;
        margin-bottom: 20px;
        box-shadow: none;
    }

    .comment-form textarea {
        width: 100%;
        border: 2px solid #e1e1e1;
        border-radius: 5px;
        padding: 20px;
        margin-bottom: 5px;
        box-shadow: none;
    }

    .comment-form button.submit {
        background: #0a2c55;
        color: #fff;
        text-align: center;
        height: 50px;
        line-height: 50px;
    }

    .related-posts {
        width: 100%;
        float: left;
        margin: 30px 0;
    }

    .related-posts ul {
        margin: 0px;
        padding: 0px;
        list-style: none;
    }

    .rel-box {
        background: #f5f5f5;
        border: 1px solid #e1e1e1;
        border-radius: 3px;
        padding: 15px;
        width: 100%;
        float: left;
    }

    .rel-box h6 {
        margin-bottom: 15px;
        font-size: 18px;
    }

    .rel-box a {
        color: #333;
        line-height: 28px;
    }

    .rel-box ul.news-meta li {
        line-height: 28px;
    }

    .post-comments-form {
        width: 100%;
        float: left;
        margin: 0 0 30px;
    }

    .post-comments-form ul {
        margin: 0px;
        padding: 0px;
        list-style: none;
    }

    .post-comments-form input[type="text"] {
        width: 100%;
        border: 1px solid #cccccc;
        line-height: 48px;
        font-size: 16px;
        border-radius: 3px;
        padding: 0 20px;
    }

    .post-comments-form textarea {
        width: 100%;
        border: 1px solid #cccccc;
        line-height: 28px;
        font-size: 16px;
        border-radius: 3px;
        padding: 10px 20px;
        min-height: 150px;
        margin: 10px 0 5px;
    }

    .post-comments-form input[type="submit"] {
        width: 100%;
        border: 0;
        line-height: 48px;
        font-size: 14px;
        border-radius: 3px;
        text-align: center;
        background: <?= $secondaryColor ?>;
        color: #fff;
        text-transform: uppercase;
        font-weight: 700;
    }

    .post-comments-form input[type="submit"]:hover {
        background: #3949ab;
        color: #fff;
    }

    .news-box.new-txt .rel-box h6 a:hover, .rel-box a:hover {
        color: #d32f2f;
    }

    .post-comments-form .row {
        margin-left: -5px;
        margin-right: -5px;
    }

    .news-box:hover .new-txt .rel-box h6 a {
        color: #222;
    }

    /*********** City News End ***********/

    /*********** Department Start ***********/

    .depart-info.p80 {
        padding: 80px 0 50px;
    }

    .depart-info .deprt-icon-box {
        background: #fff;
        border-radius: 10px;
        text-align: center;
        height: 225px;
        margin: 0 0 28px;
        box-shadow: 0px 5px 15px 0 rgba(0, 0, 0, .07);
        padding: 40px 0px;
        position: relative;
    }

    .depart-info .deprt-icon-box img {
        margin: 0 0 20px;
        width: 85px;
        height: 85px;
    }

    .deprt-icon-box h6 {
        line-height: 22px;
        margin: 0 0 12px;
        font-weight: 600;
    }

    .deprt-icon-box h6 a {
        color: #222;
    }

    .deprt-icon-box a.rm {
        background: <?= $mainColor ?>;
        display: inline-block;
        color: #fff;
        line-height: 24px;
        border-radius: 12px;
        font-size: 12px;
        text-transform: uppercase;
        padding: 0 15px;
        opacity: 0;
    }

    .deprt-icon-box:hover {
        padding: 20px 40px;
    }

    .deprt-icon-box:hover a.rm {
        opacity: 1;
    }

    .deprt-icon-box:hover h6 a {
        color: <?= $mainColor ?>;
    }

    .deprt-icon-box a.rm:hover {
        background: <?= $secondaryColor ?>;
        color: #fff;
    }

    a.jobs-link {
        background: <?= $mainColor ?>;
        display: block;
        line-height: 52px;
        clear: both;
        text-align: center;
        text-transform: uppercase;
        color: #fff;
        border-radius: 3px;
        font-family: 'Montserrat', sans-serif;
        font-size: 18px;
        font-weight: 700;
    }

    a.jobs-link:hover {
        background: <?= $secondaryColor ?>;
        color: #fff;
    }

    ul.reports {
        padding: 0;
        margin: 10px 0 0;
        background: #38a1f3;
        list-style: none;
        border-radius: 5px;
        overflow: hidden;
    }

    ul.reports a {
        color: #fff;
        line-height: 40px;
        border-bottom: 1px solid rgba(255, 255, 255, .1);
        display: block;
        font-family: 'Montserrat', sans-serif;
        font-size: 14px;
        padding: 0 20px;
    }

    ul.reports a:hover {
        background: rgba(0, 0, 0, .3);
        color: #fff;
    }

    ul.reports a i {
        margin-right: 10px;
    }

    .depart-info .emergency-info .panel-group .panel-heading {
        padding: 15px 0 15px 20px;
    }

    /*********** Department End ***********/

    /*********** Recent Events Start ***********/

    .recent-events h3 {
        color: #fff;
        font-weight: 700;
        margin: 0 0 20px;
    }

    .recent-events .nav-tabs {
        border-bottom: 0px solid #ddd;
    }

    .recent-events .nav-tabs > li {
        margin: 0px;
    }

    .recent-events .nav-tabs > li > a {
        background: #f7f7f7;
        text-transform: uppercase;
        font-family: 'Montserrat', sans-serif;
        font-size: 16px;
        font-weight: 600;
        padding: 0 20px;
        line-height: 51px;
        color: #222;
        border: 0px;
        position: relative;
        border-radius: 3px 3px 0 0;
        overflow: hidden;
    }

    .recent-events .nav-tabs > li > a {
        background: <?= $mainColor ?>;
        text-transform: uppercase;
        font-family: 'Montserrat', sans-serif;
        font-size: 16px;
        font-weight: 600;
        padding: 0 20px;
        line-height: 51px;
        color: #fff;
        border: 0px;
        position: relative;
        border-radius: 3px 3px 0 0;
        overflow: hidden;
    }

    .recent-events .nav-tabs > li > a:after {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 3px;
        background: <?= $mainColor ?>;
        content: "";
    }

    .recent-events .nav-tabs > li.active > a, .recent-events .nav-tabs > li.active > a:focus, .recent-events .nav-tabs > li.active > a:hover {
        color: #222;
        cursor: default;
        background-color: #f7f7f7;
        border: 0px solid #ddd;
    }

    .recent-events .nav-tabs > li > a:hover {
        background: #f7f7f7;
        color: #222;
    }

    .recent-events .tab-content {
        background: #fff;
        border-radius: 0 3px 3px 3px;
        width: 100%;
        float: left;
        padding: 30px;
    }

    .recent-events .event-list {
        margin: 0 0 20px;
        padding: 0 0 20px;
        list-style: none;
        width: 100%;
        float: left;
        border-bottom: 1px solid #eeeeee;
        position: relative;
    }

    .recent-events .event-list:after {
        position: absolute;
        left: -30px;
        width: 3px;
        height: 0;
        background: <?= $mainColor ?>;
        content: "";
        top: -20px;
    }

    .recent-events .event-list:last-child {
        margin: 0px;
        padding: 0px;
        border: 0px;
    }

    .recent-events .event-list li {
        float: left;
        margin-right: 15px;
    }

    .recent-events .event-list li:last-child {
        float: right;
        margin: 0px;
    }

    .event-list li strong.edate {
        display: block;
        color: <?= $mainColor ?>;
        font-size: 16px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .event-list li strong.etime {
        display: block;
        color: #aaaaaa;
        font-size: 16px;
        font-weight: 500;
        text-transform: uppercase;
    }

    .event-list img {
        border-radius: 3px;
    }

    .event-list a.joinnow {
        background: #fafafa;
        border: 1px solid #e1e1e1;
        line-height: 28px;
        display: inline-block;
        text-transform: uppercase;
        font-size: 14px;
        color: #a0a0a0;
        padding: 0 20px;
        border-radius: 15px;
    }

    .event-list a.joinnow:hover {
        background: <?= $mainColor ?>;
        border-color: <?= $mainColor ?>;
        color: #fff;
    }

    .event-list li.el-title {
        width: 40%;
    }

    .event-list li.el-title h6 {
        color: #222222;
        margin: 0 0 7px;
        font-weight: 600;
        line-height: 22px;
    }

    .event-list li.el-title h6 a {
        color: #222;
    }

    .event-list li.el-title p {
        margin: 0px;
        color: #aaaaaa;
        line-height: 22px;
    }

    .event-list li.el-title p i {
        color: <?= $mainColor ?>;
        margin-right: 5px;
    }

    .recent-events .event-list:hover:after {
        height: 113px;
    }

    .recent-events .event-list:hover h6 a {
        color: <?= $mainColor ?>;
    }

    .recent-events .event-list:hover a.joinnow {
        background: <?= $mainColor ?>;
        border-color: <?= $mainColor ?>;
        color: #fff;
    }

    .event-big {
        overflow: hidden;
        position: relative;
        border-radius: 3px 3px 0 0;
    }

    .event-big img {
        width: 100%;
        height: auto;
    }

    .event-big:hover .event-cap {
        height: 150px;
    }

    .event-big:hover .event-cap p {
        opacity: 1;
    }

    .event-cap {
        position: absolute;
        left: 0;
        bottom: 0;
        background: rgba(0, 0, 0, .80);
        width: 100%;
        border-left: 3px solid<?= $mainColor ?>;
        padding: 20px;
        height: 88px;
    }

    .event-cap h5 {
        font-weight: 700;
        color: #fff;
        margin: 0 0 10px;
    }

    .event-cap h5 a {
        color: #fff;
    }

    .event-cap h5 a:hover {
        color: <?= $mainColor ?>;
    }

    .event-cap ul {
        margin: 0 0 10px;
        padding: 0px;
        list-style: none;
        width: 100%;
        float: left;
    }

    .event-cap ul li {
        float: left;
        font-size: 14px;
        color: #fff;
    }

    .event-cap ul li:after {
        content: "|";
        color: <?= $mainColor ?>;
        padding: 0 12px;
    }

    .event-cap ul li:last-child:after {
        border: 0;
        margin: 0px;
        display: none;
    }

    .event-cap p {
        display: block;
        color: #fff;
        clear: both;
        font-size: 14px;
        margin: 0px;
        opacity: 0;
    }

    .event-cap ul li {
        float: left;
        font-size: 14px;
        color: #fff;
    }

    .recent-event-slider {
        margin-bottom: 10px;
    }

    .recent-event-slider-nav .slick-slide {
        padding: 0 5px;
    }

    .slick-slide img {
        width: 100%;
        height: auto;
        border-radius: 3px;
        cursor: pointer;
    }

    /*********** Recent Events End ***********/

    /*********** Explore Community Start ***********/

    .explore-community h3 {
        margin: 0 0 25px;
        font-weight: 700;
    }

    .community-links-style-two {
        background: #fafafa;
        border: 5px solid #ebebeb;
        margin: 0px;
        padding: 25px 30px;
        list-style: none;
        width: 100%;
        float: left;
    }

    .community-links-style-two li {
        width: 50%;
        float: left;
        line-height: 45px;
        margin: 5px 0;
    }

    .community-links-style-two li a img {
        width: 45px;
        height: 45px;
        background: <?= $secondaryColor ?>;
        border-radius: 100%;
        margin-right: 10px;
    }

    .community-links-style-two li a {
        font-size: 16px;
        font-weight: 600;
        color: #444444;
    }

    .community-links-style-two li a:hover {
        color: <?= $mainColor ?>;
    }

    .community-links-style-two li a:hover img {
        background: <?= $mainColor ?>;
    }

    .h3-team-box {
        position: relative;
        border-radius: 3px;
        overflow: hidden;
    }

    .h3-team-box:after {
        position: absolute;
        left: 0;
        bottom: 0;
        background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.9) 100%);
        background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.9) 100%);
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.9) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#e6000000', GradientType=0);
        width: 100%;
        height: 100%;
        content: "";
    }

    .team-info {
        position: absolute;
        left: 0;
        bottom: -95px;
        padding: 20px;
        z-index: 99;
    }

    .team-info ul {
        margin: 0px;
        padding: 10px 0 0;
        list-style: none;
        border-top: 1px solid #98989a;
        opacity: 0;
    }

    .team-info ul li {
        display: inline-block;
        color: #cccccc;
        font-size: 14px;
        margin: 0 7px 0 0;
    }

    .team-info ul li a {
        color: #cccccc;
    }

    .team-info h6 {
        color: #fff;
        margin: 0 0 7px;
    }

    .team-info strong {
        color: #fff;
        font-style: italic;
        font-weight: 400;
        display: block;
        margin: 0 0 10px;
    }

    .team-info p {
        margin: 0 0 15px;
        font-size: 14px;
        color: #fff;
        opacity: 0;
    }

    .team-info ul strong {
        margin: 0px;
    }

    .h3-team-box:hover .team-info {
        bottom: 0;
    }

    .h3-team-box:hover .team-info ul, .h3-team-box:hover .team-info p {
        opacity: 1;
    }

    .team-info ul li a:hover {
        color: <?= $mainColor ?>;
    }

    #h3team-slider .owl-nav {
        position: absolute;
        top: -50px;
        right: 0;
    }

    #h3team-slider .owl-next, #h3team-slider .owl-prev {
        background: #fafafa;
        height: 26px;
        width: 26px;
        border: 1px solid #e2e2e2;
        border-radius: 100%;
        margin: 0 0 0 10px;
        font-size: 0px;
        text-align: center;
        color: <?= $mainColor ?>;
    }

    #h3team-slider .owl-next:hover, #h3team-slider .owl-prev:hover {
        background: <?= $mainColor ?>;
        color: #fff;
        border-color: <?= $mainColor ?>;
    }

    #h3team-slider .owl-prev:before, #h3team-slider .owl-next:after {
        content: "\f105";
        font-family: FontAwesome;
        font-size: 16px;
        font-weight: 700;
    }

    #h3team-slider .owl-prev:before {
        content: "\f104";
    }

    /*********** Explore Community End ***********/

    .home3.emergency-numbers .newsletter-form button {
        background: #144b8b;
        color: #fff;
    }

    .home3.emergency-numbers .newsletter-form button:hover {
        background: #fff;
        color: #144b8b;
    }

    .home3.emergency-numbers .e-numbers .em-box i {
        color: <?= $mainColor ?>;
    }

    .home3.emergency-numbers .e-numbers .em-box strong.em-num {
        color: #144b8b;
    }

    .home3.emergency-numbers .e-numbers .em-box:hover i {
        color: #fff;
    }

    /******** + ========== + Home Page Three End + ========== + ********/

    /******** + ========== + Event Pages Start + ========== + ********/

    .events-wrapper .event-post {
        margin-bottom: 40px;
    }

    .site-pagination {
        text-align: center;
    }

    .site-pagination .pagination {
        margin: 20px 0 0;
        padding: 0px;
    }

    .site-pagination .pagination > li > a, .pagination > li > span {
        color: #333;
        padding: 8px 15px;
    }

    .site-pagination .pagination > .active > a, .site-pagination .pagination > .active > a:focus, .site-pagination .pagination > .active > a:hover, .site-pagination .pagination > .active > span, .site-pagination .pagination > .active > span:focus, .site-pagination .pagination > .active > span:hover, .site-pagination .pagination > li > a:focus, .site-pagination .pagination > li > a:hover, .site-pagination .pagination > li > span:focus, .site-pagination .pagination > li > span:hover {
        z-index: 2;
        color: #fff;
        background-color: <?= $mainColor ?>;
        border-color: <?= $mainColor ?>;
    }

    .events-wrapper .event-post-full .thumb {
        width: 390px;
    }

    .events-wrapper .event-post-full .event-post-content {
        width: 457px;
    }

    .events-wrapper .event-post-full {
        margin-bottom: 40px;
    }

    .event-post-full:hover .thumb:after {
        opacity: 1;
    }

    .events-wrapper.events-listing {
        background: #fafafa;
    }

    .events-listing .event-post-full .event-post-txt {
        padding: 30px 30px 0;
        width: 100%;
    }

    .events-listing span.ecat {
        margin: 0 0 23px;
    }

    .events-listing .event-post-loc {
        line-height: 50px;
        height: 50px;
    }

    .event-list-box {
        background: #fff;
        border-radius: 3px;
        width: 100%;
        float: left;
        box-shadow: 0 3px 6px rgba(0, 0, 0, .12);
        padding: 30px;
        margin: 0 0 30px;
    }

    .event-list-box ul {
        margin: 0px;
        padding: 0px;
        list-style: none;
    }

    .event-list-box ul li {
        float: left;
        margin-right: 20px;
    }

    .event-list-box ul li:last-child {
        float: right;
        margin: 0px;
    }

    .event-list-box .edate {
        font-size: 16px;
        color: #aaaaaa;
        font-weight: 500;
        text-transform: uppercase;
        padding-top: 25px;
    }

    .event-list-box .edate strong {
        display: block;
        color: <?= $mainColor ?>;
        font-weight: 900;
    }

    .event-list-box .event-title {
        width: 48%;
    }

    .event-list-box .event-title h6 {
        font-size: 20px;
        font-weight: 600;
        line-height: 30px;
        margin: 5px 0 10px;
    }

    .event-list-box .event-title h6 a {
        color: #222;
    }

    .event-list-box .event-title p {
        margin: 0px;
        color: #aaaaaa;
        font-size: 16px;
        font-weight: 500;
    }

    .event-list-box .event-title p i {
        color: <?= $mainColor ?>;
        margin-right: 5px;
    }

    a.join-now {
        background: #fafafa;
        display: inline-block;
        line-height: 28px;
        padding: 0 20px;
        border-radius: 15px;
        border: 1px solid #e1e1e1;
        text-transform: uppercase;
        font-size: 14px;
        color: #a0a0a0;
        height: 30px;
        margin: 30px 0 0;
    }

    .event-list-box img {
        width: 130px;
        height: auto;
        border-radius: 3px;
    }

    .event-list-box:hover {
        box-shadow: 0 6px 12px rgba(247, 56, 89, .12);
    }

    .event-list-box:hover .event-title h6 a {
        color: <?= $mainColor ?>;
    }

    .event-list-box:hover a.join-now {
        background: <?= $mainColor ?>;
        border-color: <?= $mainColor ?>;
        color: #fff;
    }

    /******** + ========== + Event Pages End + ========== + ********/

    /***==============  Sidebar Widgets Start	   ==============***/

    .sidebar .widget {
        background: #fff;
        border-radius: 3px;
        width: 100%;
        float: left;
        margin-bottom: 40px;
        border: 1px solid #ececec;
        box-shadow: 0px 5px 10px 0 rgba(0, 0, 0, .07);

    }

    .sidebar .widget .inner {
        padding: 20px;
        width: 100%;
        float: left;
    }

    .widget:last-child {
        margin: 0px;
    }

    .widget ul {
        margin: 0px;
        padding: 0px;
        list-style: none;
    }

    .sidebar .widget h4 {
        font-weight: 700;
        font-size: 18px;
        line-height: 53px;
        border-bottom: 1px solid #ececec;
        padding: 0 20px;
        text-transform: uppercase;
    }

    .about-widget img {
        border-radius: 3px;
        width: 100%;
        height: auto;
        margin-bottom: 10px;
    }

    .about-widget p {
        font-size: 14px;
        line-height: 24px;
    }

    .about-widget a {
        font-size: 14px;
        font-weight: 700;
        color: #222222;
        text-transform: uppercase;
    }

    .about-widget a:hover {
        color: #d32f2f;
    }

    .widget .recent-posts li {
        position: relative;
        padding-left: 98px;
        width: 100%;
        float: left;
        margin-bottom: 20px;
        min-height: 75px;
    }

    .widget .recent-posts li:last-child {
        margin: 0px;
    }

    .widget .recent-posts li img {
        position: absolute;
        left: 0;
        top: 0;
        width: 82px;
        height: 75px;
        border-radius: 3px;
    }

    .widget .recent-posts strong {
        font-weight: 400;
        color: #d32f2f;
        display: block;
        font-size: 12px;
    }

    .widget .upcoming-events h6, .widget .recent-posts h6 {
        font-weight: 600;
        line-height: 22px;
        font-size: 14px;
        margin: 0 0 3px;
    }

    .widget .recent-posts h6 a {
        color: #333333;
    }

    .widget .recent-posts h6 a:hover {
        color: #d32f2f;
    }

    .widget .archives a, .widget .categories a {
        display: block;
        line-height: 34px;
        font-size: 16px;
        font-weight: 700;
        font-family: 'Lato', sans-serif;
        color: #333333;
        padding: 0;
    }

    .widget .archives a:before, .widget .categories a:before {
        content: "\f0da";
        font-family: FontAwesome;
        font-size: 12px;
        margin-right: 10px;
        font-weight: 700;
        color: <?= $mainColor ?>;
    }

    .widget .archives a:hover, .widget .categories a:hover {
        color: <?= $mainColor ?>;
        padding: 0 10px;
    }

    .widget .upcoming-events li {
        position: relative;
        padding-left: 78px;
        margin-bottom: 20px;
    }

    .widget .upcoming-events .edate {
        width: 62px;
        background: <?= $mainColor ?>;
        position: absolute;
        left: 0;
        top: 0;
        text-align: center;
        color: #fff;
        overflow: hidden;
        border-radius: 3px;
        padding-top: 8px;
        z-index: 99;
    }

    .widget .upcoming-events .edate strong {
        display: block;
        color: #fff;
        font-size: 30px;
        font-weight: 400;
        line-height: 22px;
    }

    .widget .upcoming-events span.year {
        display: block;
        background: rgba(0, 0, 0, .25);
        text-align: center;
        color: #fff;
        font-size: 12px;
        line-height: 20px;
        margin-top: 8px;
    }

    .widget h6 a {
        color: #333;
        font-weight: 600;
        line-height: 22px;
    }

    .widget h6 a:hover {
        color: <?= $mainColor ?>;
    }

    .widget .upcoming-events span.loc {
        color: #888888;
        font-size: 12px;
        display: block;
    }

    .widget .upcoming-events li:hover .edate {
        background: <?= $secondaryColor ?>;
    }

    .fb-like img {
        max-width: 100%;
        height: auto;
    }

    .tags-widget a {
        display: inline-block;
        line-height: 31px;
        padding: 0 20px;
        border: 1px solid #eeeeee;
        margin: 0 5px 5px 0;
        color: #666666;
        font-weight: 400;
        border-radius: 3px;
        font-size: 14px;
        background: #f7f7f7;
        border-radius: 20px;
    }

    .tags-widget a:hover {
        background: <?= $mainColor ?>;
        color: #fff;
        border-color: <?= $mainColor ?>;
    }

    .issues-content h3, .issues-content h4 {
        margin-bottom: 15px;
    }

    .issues-content .fimg {
        width: 100%;
        height: auto;
        margin-bottom: 20px;
    }

    .issues-content p {
        margin-bottom: 20px;
    }

    .img-right {
        float: right;
        border-radius: 3px;
        margin: 0 0 20px 20px;
    }

    .img-left {
        float: left;
        border-radius: 3px;
        margin: 0 20px 20px 0;
    }

    .issue-images {
        width: 100%;
        float: left;
        margin: 20px 0 0;
        padding: 0px;
        list-style: none;
    }

    .issue-images li {
        width: 33.3333%;
        float: left;
    }

    .issue-images img {
        border-radius: 3px;
        max-width: 100%;
        height: auto;
    }

    /***==============  Sidebar Widgets End	   ==============***/

    /******** + ========== + News Start + ========== + ********/

    .news-grid .news-box {
        margin-bottom: 30px;
    }

    .image-post .news-post-txt .news-meta {
        position: absolute;
        bottom: 25px;
    }

    .news-full .news-box {
        margin-bottom: 40px;
    }

    .news-full .news-box:hover .new-thumb a {
        left: 0;
        opacity: 1;
    }

    .news-full .new-txt h6 {
        font-size: 24px;
        line-height: 28px;
    }

    /******** + ========== + News End + ========== + ********/

    /******** + ========== + Team Start + ========== + ********/

    .team-grid .team-box {
        margin-bottom: 40px;
    }

    .team-grid.official-members {
        background: none;
    }

    .h3-team-box h5 {
        color: #fff;
        font-weight: 700;
        margin: 0 0 10px;
    }

    .team-grid .h3-team-box {
        margin: 0 0 40px;
        overflow: hidden;
    }

    .h3-team-box img {
        width: 100%;
        height: auto;
    }

    .h3-team-box:hover img {
        transform: scale(1.09);
        -webkit-transform: scale(1.09);
    }

    /*Team Details*/

    .team-img img {
        width: 100%;
        height: auto;
        border-radius: 3px;
    }

    .team-details-txt {
        width: 100%;
        float: left;
    }

    .team-detail h2 {
        margin-bottom: 9px;
        color: #333333;
        font-weight: 700;
    }

    .team-detail .advisor {
        color: <?= $mainColor ?>;
        font-size: 20px;
        font-style: italic;
        font-family: 'Lato', sans-serif;
        font-weight: 700;
        margin-bottom: 11px;
        display: block;
    }

    .team-detail p {
        font-size: 18px;
        line-height: 28px;
        margin-bottom: 30px;
    }

    .contact-team {
        float: left;
        background: <?= $secondaryColor ?>;
        color: #fff;
        border-radius: 3px;
        line-height: 50px;
        padding: 0 30px;
        font-size: 14px;
        text-transform: uppercase;
        font-weight: 700;
    }

    .contact-team:hover {
        background: <?= $mainColor ?>;
        color: #fff;
    }

    ul.member-social {
        float: right;
        margin: 10px 0 0;
        padding: 0px;
        list-style: none;
    }

    ul.member-social li {
        display: inline-block;
        margin-left: 10px;
    }

    ul.member-social a {
        display: inline-block;
        width: 32px;
        height: 32px;
        border: 1px solid #dedede;
        border-radius: 100%;
        text-align: center;
        line-height: 30px;
    }

    ul.member-social a:hover {
        background: #d32f2f;
        color: #fff;
        border-color: #d32f2f;
    }

    a.fb {
        color: #3b5998;
    }

    a.tw {
        color: #00aced;
    }

    a.lnk {
        color: #0077b5;
    }

    a.gp {
        color: #dc4a38;
    }

    a.insta {
        color: #d93175;
    }

    a.yt {
        color: #fe0002;
    }

    .m90 {
        margin-bottom: 84px;
    }

    .m40 {
        margin-bottom: 40px;
    }

    .team-detail {
        width: 100%;
        float: left;
        padding-top: 47px;
    }

    ul.check-list {
        margin: 0 0 20px;
        padding: 0px;
        list-style: none;
    }

    ul.check-list li {
        font-weight: 700;
        color: #555555;
        line-height: 26px;
    }

    ul.check-list i {
        color: #d32f2f;
        font-size: 12px;
        margin-right: 5px;
    }

    .panel-default > .panel-heading {
        padding: 0px;
        background: #eeeeee;

    }

    .team-details-txt .panel-heading .panel-title {
        padding: 0px;
        box-shadow: none;
        font-family: 'Lato', sans-serif;
        font-size: 18px;
        line-height: 55px;
        font-weight: 700;
        padding: 0 20px;
        position: relative;
    }

    .faqs .panel-body, .team-details-txt .panel-body {
        padding: 0px 20px 20px;
    }

    .faqs .panel-group .panel-heading + .panel-collapse > .list-group, .faqs .panel-group .panel-heading + .panel-collapse > .panel-body {
        background: #eeeeee;
        border: 0px;
    }

    .team-details-txt h3 {
        font-weight: 700;
        margin: 0 0 15px;
    }

    .team-details-txt .panel {
        box-shadow: none;
    }

    .team-details-txt .panel-title a {
        display: block;
        position: relative;
    }

    .team-details-txt .panel-title a.collapsed:before {
        position: absolute;
        right: 0;
        top: 0;
        content: "\f067";
        font-family: FontAwesome;
        font-weight: 700;
        font-size: 12px;
    }

    .team-details-txt .panel-title a:before {
        position: absolute;
        right: 0;
        top: 0;
        content: "\f068";
        font-family: FontAwesome;
        font-weight: 700;
        font-size: 12px;
    }

    /******** + ========== + Team End + ========== + ********/

    /******** + ========== + City Departments Start + ========== + ********/

    .h2-local-brands.nobg {
        background: #fff;
    }

    .col-md-12.nop {
        padding: 0 6px;
    }

    .newsletter-style2 .form-control {
        border: 1px solid #e8e8e8;
        box-shadow: none;
        padding: 0 20px;
        line-height: 53px;
        height: 55px;
        border-radius: 3px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, .12);
    }

    .newsletter-style2 ul {
        margin-bottom: 0px;
        padding: 0px;
        list-style: none;
    }

    .newsletter-style2 button {
        background: <?= $secondaryColor ?>;
        color: #fff;
        width: 100%;
        border: 0px;
        height: 55px;
        line-height: 55px;
        text-transform: 600;
        border-radius: 3px;
        font-family: 'Montserrat', sans-serif;
        font-size: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, .12);
    }

    .newsletter-style2 p {
        color: #fff;
        margin: 15px 0 0;
        font-style: italic;
    }

    .newsletter-style2 h5 {
        color: #fff;
        font-weight: 700;
        margin: 0 0 15px;
    }

    .p60 {
        padding: 60px 0;
    }

    .newsletter-style2 button:hover {
        background: #222;
        color: #fff;
    }

    .deprt-txt h3 {
        font-weight: 700;
        line-height: 46px;
        color: #333333;
        line-height: 46px;
        margin: 0 0 20px;
    }

    .deprt-txt p {
        margin: 0 0 15px;
        color: #777;
        line-height: 24px;
        font-size: 16px;
    }

    .deprt-txt h5 {
        font-weight: 700;
        color: #333333;
        margin: 40px 0 15px;
    }

    ul.gallery-2-col, ul.gallery-3-col, ul.gallery-4-col {
        margin: 0 -5px 40px;
        padding: 0;
        list-style: none;
        width: 100%;
        float: left;
        overflow: hidden;
    }

    ul.gallery-2-col li {
        float: left;
        width: 50%;
        padding: 0 5px;
        overflow: hidden;
    }

    ul.gallery-3-col li {
        float: left;
        width: 33.3333%;
        padding: 0 5px;
        overflow: hidden;
    }

    ul.gallery-4-col li {
        float: left;
        width: 25%;
        padding: 0 5px;
        overflow: hidden;
    }

    ul.gallery-2-col img, ul.gallery-3-col img, ul.gallery-4-col img {
        width: 100%;
        height: auto;
        border-radius: 3px;
    }

    .checklist {
        margin: 0 0 30px;
        padding: 0;
        list-style: none;
    }

    .checklist li {
        line-height: 28px;
        clear: both;
        font-size: 16px;
    }

    .checklist li i {
        color: <?= $mainColor ?>;
        font-size: 14px;
        margin-right: 6px;
    }

    .share-post-single {
        border-top: 1px solid #e8e8e8;
        border-bottom: 1px solid #e8e8e8;
        width: 100%;
        float: left;
        padding: 20px 0;
        margin: 30px 0;
    }

    .share-post-single strong {
        font-family: 'Montserrat', sans-serif;
        color: #333;
        font-weight: 600;
        margin: 0 15px 0 0;
    }

    .share-post-single a {
        width: 32px;
        height: 32px;
        border: 1px solid #dedede;
        border-radius: 100%;
        display: inline-block;
        line-height: 30px;
        text-align: center;
    }

    .share-post-single .fb {
        color: #3b5998;
    }

    .share-post-single .tw {
        color: #38a1f3;
    }

    .share-post-single .insta {
        color: #e1306c;
    }

    .share-post-single .yt {
        color: #ff0000;
    }

    .share-post-single .linked {
        color: #0077b5;
    }

    .share-post-single .pin {
        color: #bd081b;
    }

    .share-post-single a.fb:hover {
        background: #3b5998;
        border-color: #3b5998;
        color: #fff;
    }

    .share-post-single a.tw:hover {
        background: #38a1f3;
        border-color: #38a1f3;
        color: #fff;
    }

    .share-post-single a.insta:hover {
        background: #e1306c;
        border-color: #e1306c;
        color: #fff;
    }

    .share-post-single a.yt:hover {
        background: #ff0000;
        border-color: #ff0000;
        color: #fff;
    }

    .share-post-single a.linked:hover {
        background: #0077b5;
        border-color: #0077b5;
        color: #fff;
    }

    .share-post-single a.pin:hover {
        background: #bd081b;
        border-color: #bd081b;
        color: #fff;
    }

    .share-post-single a.gp:hover {
        background: #dc4a38;
        border-color: #dc4a38;
        color: #fff;
    }

    .other-department {
        border-bottom: 1px solid #e8e8e8;
        padding: 30px 0;
        margin-bottom: 60px;
    }

    .post-comments-form h3, .other-department h3 {
        font-weight: 700;
        margin: 0 0 25px;
    }

    .post-comments-form ul {
        list-style: none;
        padding: 0px;
        margin: 0px;
    }

    .post-comments-form textarea, .post-comments-form input {
        width: 100%;
        background: #fafafa;
        border: 1px solid #e8e8e8;
        height: 53px;
        line-height: 51px;
        padding: 0 15px;
        border-radius: 3px;
    }

    .post-comments-form textarea {
        height: 200px;
        line-height: 24px;
        padding: 15px;
    }

    .post-comments-form .p5 {
        padding: 0 5px;
        margin: 0 0 10px;
    }

    .post-comments-form input[type="submit"] {
        background: <?= $secondaryColor ?>;
        color: #fff;
        border: 1px solid<?= $secondaryColor ?>;
        font-family: 'Montserrat', sans-serif;
        font-size: 16px;
        font-weight: 600;
        text-align: center;
    }

    .post-comments-form input[type="submit"]:hover {
        background: <?= $mainColor ?>;
        color: #fff;
        border-color: <?= $mainColor ?>;
    }

    ul.gallery-2-col img:hover, ul.gallery-3-col img:hover, ul.gallery-4-col img:hover {
        background: #000;
        opacity: .8;
    }

    .local-service-box:hover img {
        padding: 5px 0;
    }

    /******** + ========== + City Departments End + ========== + ********/

    /******** + ========== + Services Page Start + ========== + ********/

    .service-box {
        width: 100%;
        float: left;
        overflow: hidden;
        position: relative;
        border-radius: 3px;
        margin: 0 0 30px;
    }

    .service-box img {
        width: 100%;
        height: auto;
    }

    .service-box:after {
        position: absolute;
        left: 0;
        bottom: 0;
        background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 10%, rgba(0, 0, 0, 1) 100%);
        background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 10%, rgba(0, 0, 0, 1) 100%);
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 10%, rgba(0, 0, 0, 1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#000000', GradientType=0);
        width: 100%;
        height: 50%;
        content: "";
    }

    .serbox-cap {
        position: absolute;
        left: 0;
        bottom: 0;
        z-index: 99;
        padding: 20px;
        width: 100%;
        height: 100px;
    }

    .serbox-cap h6 {
        margin: 0 0 10px;
    }

    .serbox-cap h6 a {
        color: #fff;
        font-weight: 600;
        line-height: 24px;
        font-size: 20px;
    }

    .serbox-cap p {
        color: #fff;
        opacity: 0;
    }

    .serbox-cap .rm {
        background: #fff;
        color: #333;
        border-radius: 25px;
        text-transform: uppercase;
        font-size: 12px;
        font-family: 'Montserrat', sans-serif;
        font-weight: 500;
        padding: 5px 15px;
        opacity: 0;
    }

    .service-box:hover:after {
        height: 100%;
    }

    .service-box:hover .serbox-cap {
        height: 170px;
    }

    .service-box:hover .serbox-cap h6 a {
        color: #fff;
    }

    .service-box:hover .serbox-cap p {
        opacity: 1;
    }

    .service-box:hover .serbox-cap .rm {
        opacity: 1;
    }

    .serbox-cap .rm:hover {
        background: #f7385a;
        color: #fff;
    }

    .service-box:hover img {
        transform: scale(1.08);
        -webkit-transform: scale(1.08);
    }

    .local-services .deprt-icon-box {
        background: #fff;
        border-radius: 10px;
        text-align: center;
        height: 300px;
        margin: 0 0 30px;
        box-shadow: 0px 5px 15px 0 rgba(0, 0, 0, .07);
        padding: 65px;
        position: relative;
    }

    .deprt-icon-box img {
        margin: 0 0 20px;
        width: 100px;
        height: 100px;
    }

    .deprt-icon-box h5 {
        line-height: 32px;
        margin: 0 0 12px;
        text-transform: capitalize;
        font-weight: 600;
    }

    .deprt-icon-box h5 a {
        color: #222;
    }

    .local-services .deprt-icon-box:hover {
        padding: 30px 65px;
    }

    .deprt-icon-box:hover h5 a {
        color: <?= $mainColor ?>;
    }

    .service-page-bottom .newsletter-form button {
        background: <?= $secondaryColor ?>;
    }

    .service-page-bottom .newsletter-form button:hover {
        background: #38a1f3;
        color: #fff;
    }

    .service-page-bottom .emergency-info h5 {
        font-weight: 400;
        padding: 10px 20px;
    }

    body .panel-group .panel + .panel {
        margin: 0px;
    }

    .service-page-bottom .emergency-info .panel-group {
        margin-bottom: 5px;
    }

    .service-page-bottom ul.reports {
        margin: 0 0 30px;
    }

    .service-page-bottom ul.reports a {
        line-height: 42px;
    }

    /******** + ========== + Services Page End + ========== + ********/

    /******** + ========== + Explore City Start + ========== + ********/

    .facts-counter h3, .department-links h3, .cityscapes h3, .city-updates h3, .recent-event-block h3 {
        font-weight: 700;
        margin: 0 0 20px;
    }

    .city-updates {
        width: 100%;
        float: left;
    }

    .city-updates ul {
        width: 100%;
        float: left;
        background: #fff;
        border-radius: 3px;
        overflow: hidden;
        border: 1px solid #e8e8e8;
        box-shadow: 0 5px 15px rgba(0, 0, 0, .07);
        list-style: none;
        padding: 0px 20px;
        margin: 0px;
        background: #fff;
    }

    .city-updates ul li {
        border-bottom: 1px solid #e8e8e8;
        padding: 19px 0;
    }

    .city-updates ul li strong {
        display: block;
        font-family: 'Montserrat', sans-serif;
        line-height: 24px;
        font-size: 18px;
        font-weight: 600;
        margin: 0 0 10px;
        letter-spacing: -.5px;
    }

    .city-updates ul li strong a {
        color: #333;
    }

    .city-updates ul li:last-child {
        border: 0px;
    }

    .city-updates .post-date {
        color: #888888;
        font-size: 14px;
    }

    .city-updates .post-date i {
        color: #cccccc;
        font-size: 16px;
        margin-right: 5px;
    }

    .city-updates ul li strong a:hover {
        color: <?= $mainColor ?>;
    }

    .city-updates li.more-news {
        padding: 0px;
        margin: 0 -20px;
    }

    .city-updates li.more-news a {
        line-height: 55px;
        background: <?= $mainColor ?>;
        text-align: center;
        display: block;
        text-transform: uppercase;
        color: #fff;
        font-size: 16px;
        font-weight: 700;
    }

    .city-updates li.more-news a:hover {
        background: <?= $secondaryColor ?>;
        color: #fff;
    }

    .community-links-style-two.col3 li {
        width: 33.3333%;
        float: left;
    }

    .cityscapes .ch-box {
        overflow: hidden;
        border-radius: 3px;
        margin: 0 0 10px;
    }

    .ch-thumb img {
        width: 100%;
        height: auto;
    }

    .cityscapes .p5 {
        padding: 0 5px;
    }

    .cityscapes .row {
        margin-right: -5px;
        margin-left: -5px;
    }

    .cityscapes .ch-box .ch-txt ul li:after {
        content: ",";
        margin: 0 2px;
        color: #fff;
    }

    .cityscapes .ch-box .ch-txt {
        padding: 20px;
        height: 90px;
    }

    .ch-box .ch-txt h6 {
        font-weight: 600;
        margin: 0 0 10px;
    }

    .ch-box .ch-txt h6 a {
        color: #fff;
    }

    .ch-box .ch-txt h6 a:hover {
        color: <?= $mainColor ?>;
    }

    .cityscapes .ch-box:hover .ch-txt {
        height: 145px;
    }

    .department-links ul {
        margin: 0px;
        padding: 0px;
        list-style: none;
    }

    .department-links li {
        width: 33.3333%;
        float: left;
        padding: 0 15px 0 0;
        margin: 0 0 15px;
    }

    .department-links li a {
        display: block;
        line-height: 63px;
        color: #fff;
        background: <?= $secondaryColor ?>;
        font-family: 'Montserrat', sans-serif;
        font-size: 18px;
        font-weight: 600;
        border-radius: 3px;
        padding: 0 15px;
        position: relative;
        overflow: hidden;
    }

    .department-links li a:after {
        width: 0;
        height: 100%;
        background: rgba(0, 0, 0, .3);
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        z-index: 9;
        opacity: 0;
    }

    .department-links li a span {
        position: relative;
        z-index: 99;
    }

    .department-links li a.c1 {
        background: #009688;
    }

    .department-links li a.c2 {
        background: #2196f3;
    }

    .department-links li a.c3 {
        background: #4caf50;
    }

    .department-links li a.c4 {
        background: #d32f2f;
    }

    .department-links li a.c5 {
        background: #795548;
    }

    .department-links li a.c6 {
        background: #009688;
    }

    .department-links li a.c7 {
        background: #9e9d24;
    }

    .department-links li a.c8 {
        background: #546e7a;
    }

    .department-links li a.c9 {
        background: <?= $mainColor ?>;
    }

    .department-links li a:hover:after {
        width: 100%;
        opacity: 1;
    }

    .facts-counter h3 {
        color: #fff;
    }

    .facts-counter ul.counter {
        padding: 0px;
        margin: 0px;
        list-style: none;
    }

    .facts-counter .p6 {
        padding: 0 6px;
    }

    .facts-counter .row {
        margin-right: -6px;
        margin-left: -6px;
    }

    /******** + ========== + Explore City End + ========== + ********/

    /***==============  Gallery Pages Start	   ==============***/

    .gallery-thumb {
        width: 100%;
        float: left;
        overflow: hidden;
        position: relative;
        margin-bottom: 30px;
    }

    .gallery-thumb img {
        width: 100%;
        height: auto;
        border-radius: 3px;
    }

    .gallery-thumb:after {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, .5);
        content: "";
        opacity: 0;
    }

    .gallery-thumb a {
        position: absolute;
        left: -200px;
        right: 0;
        top: 0;
        bottom: 0;
        width: 40px;
        height: 40px;
        background: #fff;
        border-radius: 3px;
        margin: auto;
        text-align: center;
        line-height: 40px;
        color: <?= $mainColor ?>;
        z-index: 999;
        opacity: 0;
    }

    .gallery-thumb:hover:after {
        opacity: 1;
    }

    .gallery-thumb:hover a {
        left: 0;
        opacity: 1;
    }

    .gallery-thumb a:hover {
        background: <?= $mainColor ?>;
        color: #fff;
    }

    /***  Filter Able Gallery ****/
    .filter-gallery .isotope {
        margin-bottom: -10px;
        margin-right: -10px;
    }

    .isotope:after {
        content: '';
        display: block;
        clear: both;
    }

    .isotope .item {
        float: left
    }

    .filter-gallery .isotope .item {
        width: 33.3333%;
        height: 330px;
        overflow: hidden;
        box-sizing: border-box;
        padding: 0 15px;
        margin-bottom: 30px;
    }

    .filter-gallery .isotope .item.width2 {
        width: 785px;
    }

    .filter-gallery .isotope .item.height2 {
        height: 690px
    }

    .filter-gallery figure img {
        width: 100%;
        height: auto;
        border-radius: 3px;
    }

    .button-group:after {
        content: '';
        display: block;
        clear: both;
    }

    .button-group .button {
        display: inline-block;
        background: none;
        border: none;
        color: #666;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        text-transform: uppercase;
        padding: 0;
        margin-left: 15px;
        -webkit-transition: all 200ms ease-in;
        -o-transition: all 200ms ease-in;
        -moz-transition: all 200ms ease-in;
    }

    .button-group .button:before {
        content: "/";
        display: inline-block;
        padding-right: 15px;
        color: #333;
    }

    .button-group .button:first-child:before {
        display: none
    }

    .button-group .button:hover, .button-group .button:active, .button-group .button.is-checked {
        color: <?= $mainColor ?>
    }

    div#filters {
        margin-bottom: 30px;
        text-align: center;
    }

    .filter-gallery .gallery-thumb {
        margin-bottom: 30px;
    }

    .classic-gallery .isotope .item {
        width: 25%;
        height: 239px;
        overflow: hidden;
        box-sizing: border-box;
        padding: 0 15px;
        margin-bottom: 30px;
    }

    .classic-gallery .isotope .item.width2 {
        width: 585px;
        height: 239px;
    }

    .classic-gallery .isotope .item.height2 {
        height: 690px
    }

    .classic-gallery figure img {
        width: 100%;
        height: auto;
        border-radius: 3px;
    }

    /***==============  Gallery Pages End	   ==============***/

    /***==============  Contact Us Start	   ==============***/
    .contact-details {
        width: 100%;
        float: left;
        position: relative;
    }

    .stitle {
        font-weight: 700;
        margin: 0 0 20px;
    }

    .add-box {
        background: #fff;
        width: 100%;
        float: left;
        box-shadow: 0 3px 6px rgba(0, 0, 0, .12);
        border-radius: 3px;
        padding: 25px 30px;
    }

    .add-box ul {
        margin: 0px;
        padding: 0px;
        list-style: none;
    }

    .add-box li {
        width: 100%;
        position: relative;
        padding-left: 30px;
        margin-bottom: 20px;
        line-height: 26px;
        color: #666666;
    }

    .add-box li:last-child {
        margin: 0px;
    }

    .add-box h5 {
        border-bottom: 1px solid #ccc;
        padding-bottom: 16px;
        margin-bottom: 18px;
        font-weight: 700;
    }

    .add-box i {
        position: absolute;
        left: 0;
        top: 0;
        line-height: 26px;
        font-size: 20px;
        color: <?= $secondaryColor ?>;
    }

    .map-form {
        width: 100%;
        float: left;
    }

    .map {
        width: 100%;
        border: 4px solid #e6e6e6;
        float: left;
    }

    .map iframe {
        width: 100%;
        border: 0px;
        height: 470px;
    }

    .contact-form {
        width: 100%;
        float: left;
    }

    .contact-form ul {
        margin: 0px;
        padding: 0px;
        list-style: none;
    }

    .contact-form li {
        margin-bottom: 10px;
    }

    .contact-form input[type="text"] {
        border: 1px solid #ccc;
        line-height: 48px;
        padding: 0 20px;
        width: 100%;
        border-radius: 3px;
    }

    .contact-form textarea {
        border: 1px solid #ccc;
        line-height: 48px;
        padding: 0 20px;
        width: 100%;
        border-radius: 3px;
        min-height: 180px;
    }

    .contact-form input[type="submit"] {
        background: <?= $secondaryColor ?>;
        border: 0px;
        border-radius: 3px;
        height: 50px;
        line-height: 50px;
        text-align: center;
        width: 100%;
        color: #fff;
        text-transform: uppercase;
        font-size: 16px;
        font-weight: 700;
    }

    .contact-form input[type="submit"]:hover {
        background: <?= $mainColor ?>;
        color: #fff;
    }

    .add-box-2 {
        width: 100%;
        float: left;
        text-align: center;
    }

    .add-box-2 i {
        color: <?= $mainColor ?>;
        font-size: 48px;
    }

    .add-box-2 h5 {
        margin: 20px 0;
        font-weight: 700;
    }

    .add-box-2 p {
        margin: 0px;
        color: #666666;
    }

    .add-box-2 a {
        color: #666;
    }

    .add-box-2 a:hover {
        color: #d32f2f;
    }

    .br {
        border-right: 1px solid #d9d9d9;
        border-left: 1px solid #d9d9d9;
    }

    .contact-map {
        width: 100%;
        float: left;
        padding: 80px 0;
    }

    .contact-form .container {
        padding: 0 100px;
    }

    .inner-padding.np {
        padding-top: 0px;
    }

    .m80 {
        margin-bottom: 80px;
    }

    .graybg {
        background: #f5f5f5;
    }

    /***==============  Contact Us End	   ==============***/

    /***==============  Event Details Start	   ==============***/
    .event-details {
        width: 100%;
        float: left;
    }

    .event-thumb img {
        border-radius: 3px;
        width: 100%;
        height: auto;
    }

    .event-counter ul {
        margin: 0px;
        padding: 0px;
        list-style: none;
    }

    .event-counter li.first-col {
        float: left;
        width: 15%;
        padding-top: 23px;
    }

    .event-counter li.snd-col {
        float: left;
        width: 55%;
    }

    .event-counter li.trd-col {
        float: left;
        width: 30%;
        text-align: right;
        position: relative;
        padding: 27px 0;
    }

    .event-counter li.trd-col:after {
        position: absolute;
        left: 15px;
        top: 0;
        width: 1px;
        height: 100%;
        content: "";
        background: rgba(255, 255, 255, .1);
    }

    .event-counter a {
        background: #ffffff;
        text-transform: uppercase;
        color: <?= $secondaryColor ?>;
        font-size: 14px;
        font-weight: 700;
        display: inline-block;
        line-height: 36px;
        padding: 0 20px;
        border-radius: 3px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, .12);
    }

    .event-counter a:hover {
        background: <?= $mainColor ?>;
        color: #fff;
    }

    .event-counter li.first-col strong {
        color: #fff;
        font-size: 16px;
        font-family: 'Lato', sans-serif;
        font-weight: 700;
    }

    .countdown-section {
        width: 25%;
        float: left;
        text-align: center;
        position: relative;
        padding: 17px 0;
    }

    .countdown-period, .countdown-amount {
        display: block;
        text-align: center;
        position: relative;
        font-weight: 600;
    }

    .event-counter .countdown-amount:before {
        content: " : ";
        font-size: 30px;
        color: #fff;
        float: left;
        position: absolute;
        left: 0;
        font-weight: 600;
    }

    .event-counter .countdown-amount {
        color: #fff;
        font-size: 36px;
        font-weight: 500;
        line-height: 36px;
    }

    .event-counter .countdown-period {
        color: #fff;
        font-size: 14px;
        font-weight: 400;
        text-transform: uppercase;
    }

    .event-counter .countdown-section:first-child .countdown-amount:before {
        display: none;
    }

    .event-content {
        width: 100%;
        float: left;
        position: relative;
        padding-left: 98px;
    }

    .event-content p {
        margin: 0 0 20px;
        color: #777;
        line-height: 24px;
        font-size: 16px;
    }

    .event-content .event-date-share {
        position: absolute;
        left: 0;
        top: 0;
    }

    .event-content ul.emeta {
        margin: 0 0 13px;
        padding: 0 0 15px;
        list-style: none;
        border-bottom: 1px solid #cccccc;
    }

    .event-content ul.emeta li {
        display: inline-block;
        color: #444444;
        font-size: 16px;
    }

    .event-content ul.emeta li strong {
        color: <?= $secondaryColor ?>;
        font-weight: 400;
    }

    .event-content ul.emeta li:after {
        content: "|";
        color: #cccccc;
        padding: 0 10px;
    }

    .event-content ul.emeta li:last-child:after {
        display: none;
    }

    .event-details blockquote {
        background: <?= $secondaryColor ?>;
        border-radius: 3px;
        border: 0px;
        padding: 40px;
        box-shadow: 0px 0px 15px 0 rgba(0, 0, 0, .12);
        position: relative;
        width: 100%;
        float: left;
        margin: 30px 0;
    }

    .event-details blockquote p {
        color: #fff;
        margin: 0px;
        font-size: 20px;
        font-family: 'Lato', sans-serif;
        font-style: italic;
        line-height: 32px;
    }

    .event-details blockquote:after {
        position: absolute;
        bottom: 20px;
        right: 20px;
        content: "\f10e";
        font-family: FontAwesome;
        font-weight: 700;
        color: #e9e9e9;
        font-size: 60px;
        line-height: 36px;
    }

    .event-date-share .edate {
        width: 68px;
        height: 82px;
        background: <?= $secondaryColor ?>;
        text-align: center;
        border-radius: 3px;
        overflow: hidden;
        color: #fff;
        text-transform: uppercase;
        font-size: 12px;
        padding: 13px 0 0 0;
        margin-bottom: 20px;
    }

    .event-date-share .edate strong {
        display: block;
        font-size: 30px;
        font-weight: 700;
        color: #fff;
        line-height: 20px;
        margin-bottom: 5px;
    }

    .event-date-share .edate span {
        display: block;
    }

    .event-speakers {
        width: 100%;
        float: left;
        padding: 42px 0 60px;
    }

    .event-speakers h3 {
        margin-bottom: 21px;
        font-weight: 600;
    }

    .speaker-box {
        width: 100%;
        float: left;
        border-radius: 3px;
        overflow: hidden;
        box-shadow: 0 3px 6px rgba(0, 0, 0, .12);
    }

    .speaker-box .sp-text, .speaker-box .sp-thumb {
        width: 100%;
        float: left;
    }

    .speaker-box:hover .sp-thumb:after {
        opacity: 1;
    }

    .speaker-box:hover .sp-thumb a {
        left: 0px;
        opacity: 1;
    }

    .speaker-box .sp-thumb {
        position: relative;
    }

    .speaker-box .sp-thumb:after {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        content: "";
        background: rgba(0, 0, 0, .30);
        opacity: 0;
    }

    .speaker-box .sp-thumb a {
        width: 40px;
        height: 40px;
        border-radius: 100%;
        position: absolute;
        left: -150px;
        top: 0;
        bottom: 0;
        right: 0;
        margin: auto;
        background: #fff;
        color: #d32f2f;
        text-align: center;
        line-height: 40px;
        font-size: 14px;
        z-index: 99;
        opacity: 0;
    }

    .speaker-box .sp-text h5 {
        margin-bottom: 6px;
    }

    .speaker-box img {
        width: 100%;
        height: auto;
    }

    .speaker-box .sp-text {
        background: #fff;
        text-align: center;
        padding: 20px 0;
        box-shadow: 0 3px 6px rgba(0, 0, 0, .12);
    }

    .speaker-box .sp-text h3 {
        margin-bottom: 7px;
    }

    .speaker-box .sp-text strong {
        font-weight: 400;
        color: #d32f2f;
    }

    .event-gallery {
        width: 100%;
        float: left;
        background: #fff;
        box-shadow: 0 0px 10px rgba(0, 0, 0, .12);
        padding: 34px 34px 34px;
        border-radius: 3px;
        margin-bottom: 60px;
    }

    .event-gallery h3 {
        margin: 0 0 19px 6px;
        font-weight: 600;
    }

    .event-gallery ul.gallery {
        margin: 0px;
        padding: 0px;
        list-style: none;
        width: 100%;
        float: left;
    }

    .event-gallery ul.gallery li {
        width: 33.333333%;
        float: left;
        padding: 6px;
        box-sizing: border-box;
    }

    .event-gallery ul.gallery img {
        width: 100%;
        height: auto;
        border-radius: 3px;
    }

    .event-gallery .eg-thumb {
        position: relative;
        overflow: hidden;
    }

    .event-gallery .eg-thumb:hover:after {
        opacity: 1;
    }

    .event-gallery .eg-thumb:after {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        content: "";
        background: rgba(0, 0, 0, .50);
        border-radius: 3px;
        opacity: 0;
    }

    .event-gallery .eg-thumb:hover a {
        left: 0;
        opacity: 1;
    }

    .event-gallery .eg-thumb a {
        width: 40px;
        height: 40px;
        border-radius: 100%;
        position: absolute;
        left: -150px;
        top: 0;
        bottom: 0;
        right: 0;
        margin: auto;
        background: #fff;
        color: <?= $secondaryColor ?>;
        text-align: center;
        line-height: 40px;
        font-size: 14px;
        z-index: 99;
        opacity: 0;
    }

    .event-gallery .eg-thumb a:hover {
        background: <?= $secondaryColor ?>;
        color: #fff;
    }

    .leave-comment {
        width: 100%;
        float: left;
        margin-top: 60px;
    }

    .leave-comment h2 {
        margin: 0 0 23px 5px;
    }

    .leave-comment ul {
        margin: 0px;
        padding: 0px;
        list-style: none;
    }

    .leave-comment textarea, .leave-comment input[type="text"] {
        width: 100%;
        border: 0px;
        border-radius: 3px;
        line-height: 53px;
        padding: 0 20px;
        font-size: 16px;
        margin-bottom: 10px;
        border: 2px solid #e1e1e1;
    }

    .leave-comment input[type="submit"] {
        width: 100%;
        border: 0px;
        border-radius: 3px;
        line-height: 53px;
        padding: 0 20px;
        font-size: 16px;
        background: #3949ab;
        color: #fff;
        text-transform: uppercase;
        font-weight: 700;
    }

    .leave-comment input[type="submit"]:hover {
        background: #d32f2f;
        color: #fff;
    }

    .event-share ul {
        margin: 0px;
        padding: 0px;
        list-style: none;
        text-align: center;
    }

    .event-share li {
        display: block;
        width: 100%;
    }

    .event-share ul a {
        display: inline-block;
        width: 32px;
        height: 32px;
        border: 1px solid #dedede;
        border-radius: 100%;
        margin-bottom: 5px;
        background: #fff;
        color: #d32f2f;
        line-height: 30px;
        font-size: 14px;
    }

    .event-share ul a.like {
        width: 55px;
        height: 36px;
        border-radius: 3px;
        color: #fff;
        line-height: 34px;
        position: relative;
        margin-bottom: 10px;
    }

    .event-share ul a.like:after {
        content: "\f0d7";
        font-family: FontAwesome;
        font-weight: 700;
        position: absolute;
        left: 0;
        right: 0;
        bottom: -18px;
        color: <?= $mainColor ?>;
        text-shadow: 0 2px 0 #dedede;
        font-size: 16px;
    }

    .event-share ul a.tw {
        color: #00aced;
    }

    .event-share ul a.fb {
        color: #3b5998;
    }

    .event-share ul a.in {
        color: #0077b5;
    }

    .event-share ul a:hover {
        background: <?= $mainColor ?>;
        color: #fff;
        border-color: <?= $mainColor ?>;
    }

    .event-share ul a:hover.like:after {
        color: <?= $mainColor ?>;
    }

    /***==============  Event Details End	   ==============***/

    /***==============  About Us Pages Start	   ==============***/
    .h2-local-brands.depart-info {
        background: #fff;
    }

    .h2-local-brands.depart-info .deprt-icon-box {
        border: 1px solid #f1f1f1;
    }

    .ser-box-top-icon {
        width: 100%;
        float: left;
        background: #fff;
        border-radius: 3px;
        padding: 30px 20px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, .12);
        margin-bottom: 10px;
        position: relative;
        text-align: center;
    }

    .ser-box-top-icon .ser-icon {
        border: 2px solid #eeeeee;
        width: 90px;
        height: 90px;
        text-align: center;
        line-height: 86px;
        color: #3949ab;
        font-size: 45px;
        border-radius: 3px;
        margin: 0 auto 27px;
    }

    .ser-box-top-icon .ser-icon i {
        text-shadow: 0 5px 0px rgba(0, 0, 0, .08);
    }

    .ser-box-top-icon h5 {
        font-weight: 700;
        margin-bottom: 13px;
    }

    .ser-box-top-icon p {
        margin-bottom: 13px;
        font-size: 16px;
    }

    .ser-box-top-icon .rm {
        color: #3949ab;
        font-size: 14px;
        font-weight: 900;
        border-bottom: 1px solid #3949ab;
    }

    .ser-box-top-icon:hover .ser-icon {
        background: #d32f2f;
        border-color: #d32f2f;
        color: #fff;
    }

    .ser-box-top-icon:hover h5 {
        color: #d32f2f;
    }

    .ser-box-top-icon:hover .rm {
        color: #d32f2f;
        border-bottom: 1px solid #d32f2f;
    }

    .cityscape-sidebar h3 {
        font-weight: 700;
        margin: 0 0 20px;
    }

    .department-links.col2 ul li {
        width: 50%;
    }

    /***==============  About Us Pages End	   ==============***/

    /******** + ========== + Causes Start + ========== + ********/

    .campaign-box {
        width: 100%;
        float: left;
        overflow: hidden;
        background: #fff;
        border-radius: 5px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, .20);
        margin-bottom: 40px;
        padding-bottom: 20px;
    }

    .campaign-thumb a {
        position: absolute;
        left: 0;
        top: -150px;
        bottom: 0;
        right: 0;
        margin: auto;
        width: 45px;
        height: 45px;
        z-index: 99;
        background: #fff;
        border-radius: 100%;
        line-height: 45px;
        text-align: center;
        color: <?= $secondaryColor ?>;
        opacity: 0;
    }

    .campaign-thumb a:hover {
        background: <?= $mainColor ?>;
        color: #fff;
    }

    .campaign-box:hover .campaign-thumb a {
        top: 0;
        opacity: 1;
    }

    .campaign-txt {
        padding: 20px;
        clear: both;
    }

    a.dbutton {
        background: red;
        display: block;
        text-align: center;
        line-height: 45px;
        color: #fff;
        background: <?= $secondaryColor ?>;
        font-family: 'Montserrat', sans-serif;
        font-size: 14px;
        font-weight: 600;
        text-transform: uppercase;
        width: 50%;
        margin: 0 auto;
    }

    ul.participants {
        margin: 0;
        padding: 0;
        list-style: none;
        width: 100%;
        float: left;
    }

    ul.participants li {
        float: left;
        line-height: 30px;
    }

    ul.participants img {
        width: 30px;
        height: 30px;
        border-radius: 30px;
        margin-left: -5px;
    }

    ul.participants li span {
        width: 30px;
        height: 30px;
        display: block;
        color: #fff;
        line-height: 30px;
        text-align: center;
        border-radius: 100%;
        font-size: 12px;
        background: <?= $secondaryColor ?>;
    }

    ul.funds {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    ul.funds li {
        width: 32%;
        display: inline-block;
        text-align: center;
        font-size: 14px;
        color: #999999;
    }

    ul.funds li:first-child {
        text-align: left;
    }

    ul.funds li:last-child {
        text-align: right;
    }

    ul.funds li strong {
        display: block;
        font-size: 18px;
        color: #222;
        font-weight: 600;
        font-family: 'Montserrat', sans-serif;
    }

    ul.participants li strong {
        margin-left: 20px;
        color: #999999;
        font-size: 14px;
        display: inline-block;
    }

    ul.participants li strong i {
        font-style: normal;
        color: <?= $secondaryColor ?>;
    }

    .campaign-txt .progress {
        width: 100%;
        margin-bottom: 20px;
        height: 10px;
        background: #e6e6e6;
    }

    .campaign-txt .progress .progress-bar {
        background: <?= $secondaryColor ?>;
        border-radius: 10px;
    }

    .campaign-txt h5 {
        font-weight: 700;
        font-size: 22px;
        letter-spacing: -.5px;
    }

    ul.participants, .campaign-txt h5 {
        margin-bottom: 25px;
    }

    .campaign-txt h6 a, .campaign-txt h5 a {
        color: #222;
    }

    .campaign-thumb {
        position: relative;
        overflow: hidden;
    }

    .campaign-thumb:after {
        position: absolute;
        left: 0;
        top: 0;
        background: rgba(0, 0, 0, .5);
        content: "";
        width: 100%;
        height: 100%;
        opacity: 0;
    }

    .campaign-box:hover .campaign-thumb:after {
        opacity: 1;
    }

    .campaign-box:hover .campaign-thumb a {
        opacity: 1;
        top: 0;
    }

    .campaign-box:hover h6 a, .campaign-box:hover h5 a {
        color: <?= $mainColor ?>;
    }

    .campaign-box:hover a.dbutton {
        color: #fff;
        background: <?= $mainColor ?>;
    }

    /*************  Causes Listing Start  **************/

    .causes-listing .campaign-box {
        margin-bottom: 40px;
        padding: 0px;
    }

    .causes-listing .campaign-thumb {
        width: 42.7%;
        float: left;
    }

    .causes-listing .campaign-txt {
        width: 57.3%;
        float: left;
        clear: none;
        padding: 30px;
    }

    .causes-listing .campaign-txt h4 {
        font-weight: 700;
        line-height: 32px;
        margin: 0 0 14px;
        font-size: 24px;
    }

    .causes-listing .campaign-txt h4 a {
        color: #222;
    }

    .causes-listing ul.funds {
        margin: 0 0 20px;
    }

    .causes-listing ul.funds li strong {
        font-family: 'Poppins', serif;
    }

    .causes-listing ul.funds li {
        font-family: 'Poppins', serif;
        font-weight: 500;
        font-size: 14px;
    }

    .dn-btn {
        background: <?= $secondaryColor ?>;
        color: #fff;
        text-transform: uppercase;
        font-family: 'Montserrat', sans-serif;
        font-weight: 500;
        font-size: 14px;
        display: inline-block;
        border-radius: 3px;
        line-height: 40px;
        padding: 0 25px;
    }

    .causes-listing .campaign-box:hover .dn-btn {
        background: <?= $mainColor ?>;
        color: #fff;
    }

    .causes-listing .campaign-box:hover h4 a {
        color: <?= $mainColor ?>;
    }

    /*************************/

    .single-donation-box {
        background: #f7f7f7;
        border: 1px solid #eeeeee;
        border-radius: 3px;
        padding: 20px 15px;
        margin-bottom: 24px;
    }

    .sdb-left {
        float: left;
        width: 48%;
        padding-right: 15px;
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
    }

    .sdb-right {
        float: right;
        width: 52%;
        padding-left: 15px;
    }

    .single-donation-box .progress {
        height: 15px;
        border-radius: 15px;
        margin-bottom: 20px;
        background: #ccc;
    }

    .single-donation-box .progress .progress-bar {
        border-radius: 15px;
        background: <?= $secondaryColor ?>;
    }

    .single-donation-box .funds li:first-child {
        text-align: left;
    }

    .single-donation-box .funds li:last-child {
        text-align: right;
    }

    .single-donation-box .radio-boxes li {
        padding: 0 3px;
    }

    .single-donation-box .radio-boxes input[type=radio].css-radio + label.css-label {
        height: 55px;
        width: 58px;
        line-height: 52px;
        font-size: 20px;
        padding: 0px;
        background: #fff;
    }

    .single-donation-box li.form-submit {
        width: auto;
    }

    .single-donation-box li.form-submit button {
        height: 55px;
        line-height: 55px;
        padding: 0 20px;
    }

    .single-donation-box .radio-boxes input[type=radio].css-radio + label.css-label:hover, .single-donation-box .radio-boxes input[type=radio].css-radio:checked + label.css-label {
        background: <?= $mainColor ?>;
        border-color: <?= $mainColor ?>;
        color: #fff;
    }

    .radio-boxes {
        margin: 0px;
        padding: 0px;
        list-style: none;
    }

    .radio-boxes li {
        float: left;
        padding: 10px 5px;
    }

    .radio-boxes .radio.custom {
        float: left;
        margin: 0;
        padding: 0;
        display: block;
        width: 100%;
    }

    .radio-boxes input[type="radio"].custom {
        margin-left: 0;
        padding: 0;
    }

    .radio-boxes input[type=radio].css-radio {
        position: absolute;
        overflow: hidden;
        clip: rect(0 0 0 0);
        height: 1px;
        width: 1px;
        margin: -1px;
        padding: 0px;
        border: 0;
    }

    .radio-boxes input[type=radio].css-radio + label.css-label {
        height: 52px;
        width: 89px;
        display: inline-block;
        line-height: 50px;
        font-size: 24px;
        vertical-align: middle;
        cursor: pointer;
        opacity: 1;
        background: #f5f5f5;
        border: 1px solid #cccccc;
        border-radius: 3px;
        padding: 0px;
        text-align: center;
        color: #333;
        margin: 0px;
    }

    .radio-boxes input[type=radio].css-radio + label.css-label:hover {
        background: <?= $mainColor ?>;
        border-color: <?= $mainColor ?>;
        color: #fff;
    }

    .radio-boxes input[type=radio].css-radio:checked + label.css-label {
        background: <?= $mainColor ?>;
        border-color: <?= $mainColor ?>;
        color: #fff;
    }

    .radio-boxes .inputs {
        width: 89px;
        overflow: hidden;
    }

    input.enter {
        background: #fff;
        border: 1px solid #cccccc;
        height: 52px;
        line-height: 50px;
        width: 100%;
        padding: 0 5px;
        border-radius: 3px;
    }

    li.form-submit {
        width: 100%;
    }

    li.form-submit button {
        width: 100%;
        border: 0px;
        background: <?= $secondaryColor ?>;
        color: #fff;
        font-family: 'Montserrat', sans-serif;
        font-size: 16px;
        font-weight: 500;
        border-radius: 3px;
        line-height: 50px;
        text-transform: uppercase;
        cursor: pointer;
    }

    li.form-submit button:hover {
        background: <?= $mainColor ?>;
        color: #fff;
    }

    /******** + ========== + Causes End + ========== + ********/

    /*********************************
Donation Page Start
*********************************/

    .donations h4 {
        margin: 0 0 13px;
        font-weight: 600;
    }

    .donations .radio-boxes {
        margin-bottom: 30px;
        width: 100%;
        float: left;
    }

    .donations .radio-boxes li {
        padding: 0px 5px 0 0;
    }

    .payment-method {
        margin: 0 0 30px;
    }

    .payment-method ul {
        margin: 0px;
        padding: 0px;
        list-style: none;
    }

    .payment-method li.half {
        width: 50%;
        float: left;
    }

    .payment-method h4 span {
        color: #ccc;
        font-weight: 400;
        font-size: 14px;
    }

    .payment-method p {
        margin: 0px;
    }

    .pl15 {
        padding-left: 15px;
    }

    .pr15 {
        padding-right: 15px;
    }

    .payment-method .form-control {
        border: 1px solid #cccccc;
        height: 53px;
        line-height: 51px;
        padding: 0 20px;
        margin-top: 20px;
    }

    .your-comments textarea.form-control {
        border: 1px solid #cccccc;
        height: 200px;
        padding: 15px;
        margin-bottom: 20px;
    }

    .your-comments {
        margin-bottom: 30px;
    }

    .your-comments .form-check-label {
        color: #555;
        font-size: 20px;
        font-weight: 600;
        font-family: 'Montserrat', sans-serif;
    }

    .donator-details ul {
        margin: 0px;
        padding: 0px;
        list-style: none;
        width: 100%;
        float: left;
    }

    .donator-details li.half {
        width: 50%;
        float: left;
        margin-bottom: 20px;
    }

    .donator-details .form-control {
        border: 1px solid #cccccc;
        height: 53px;
        line-height: 51px;
        padding: 0 20px;
    }

    .donator-details input[type="submit"] {
        width: 100%;
        height: 53px;
        border: 0px;
        color: #fff;
        font-size: 16px;
        text-transform: uppercase;
        color: #fff;
        font-weight: 600;
        font-family: 'Montserrat', sans-serif;
        background: <?= $secondaryColor ?>;
        border-radius: 5px;
        cursor: pointer;
    }

    .donator-details input[type="submit"]:hover {
        background: <?= $mainColor ?>;
        color: #fff;
    }

    .form-check.form-check-inline {
        display: inline-block;
    }

    .form-check.form-check-inline label {
        font-weight: 400;
        margin: 0px;
    }

    /*********************************
Donation Page End
*********************************/

    /*********************************
Testimonials Start
*********************************/

    .testimonials-section h2.text-center {
        margin: 0 0 30px;
        font-weight: 600;
    }

    .testimonials-section p, .h3testimonials p {
        background: #fff;
        border: 1px solid #dddddd;
        font-size: 18px;
        color: #555555;
        line-height: 30px;
        padding: 25px;
        position: relative;
    }

    .testimonials-section .center p, .h3testimonials .center p {
        background: #f9f9f9;
    }

    .testimonials-section .center p:after, .h3testimonials .center p:after {
        border-top: 20px solid #f9f9f9;
    }

    .testimonials-section p:after, .h3testimonials p:after {
        width: 0;
        height: 0;
        border-top: 20px solid #fff;
        border-left: 20px solid transparent;
        content: "";
        position: absolute;
        left: 20px;
        bottom: -19px;
    }

    .testimonials-section p:before, .h3testimonials p:before {
        width: 0;
        height: 0;
        border-top: 22px solid #dddddd;
        border-left: 22px solid transparent;
        content: "";
        position: absolute;
        left: 19px;
        bottom: -22px;
    }

    .tuser {
        margin: 30px 0 0;
        color: #888888;
        font-size: 14px;
    }

    .tuser strong {
        color: #222;
        font-weight: 400;
        font-family: 'Montserrat', sans-serif;
        display: block;
        font-size: 20px;
    }

    .owl-carousel .owl-item .tuser img {
        width: 55px;
        height: 55px;
        border: 1px solid #dddddd;
        border-radius: 100%;
        float: left;
        margin-right: 15px;
    }

    .testimonials-section .owl-theme .owl-dots .owl-dot span {
        width: 20px;
        height: 5px;
        margin: 5px 7px;
        background: #D6D6D6;
        display: block;
        -webkit-backface-visibility: visible;
        transition: opacity 200ms ease;
        border-radius: 30px;
    }

    .testimonials-section .owl-theme .owl-dots .owl-dot.active span, .testimonials-section .owl-theme .owl-dots .owl-dot span:hover {
        background: <?= $mainColor ?>;
    }

    .testimonials-section .owl-dots {
        text-align: center;
        margin: 30px 0 0 0;
    }

    /*********************************
Testimonials End
*********************************/

    /***==============  Login / Register Page	   ==============***/

    .login-wrap {
        width: 420px;
        margin: 0 auto;
        overflow: hidden;
        text-align: center;
        padding-top: 180px;
    }

    .login-wrap img {
        margin-bottom: 30px;
    }

    .login-box {
        width: 100%;
        float: left;
        background: #fff;
        border-radius: 3px;
        padding: 30px;
        text-align: left;
        margin-bottom: 20px;
    }

    .login-box h4 {
        margin-bottom: 10px;
    }

    .login-box p {
        font-size: 14px;
    }

    .login-box ul {
        margin: 20px 0;
        padding: 0 0 10px;
        list-style: none;
        border-bottom: 1px solid #eeeeee;
    }

    .login-box li {
        margin-bottom: 10px;
    }

    .linput {
        background: #fff;
        border-radius: 3px;
        width: 100%;
        line-height: 51px;
        border: 1px solid #cccccc;
        padding: 0 20px;
        color: #555;
    }

    .linput:focus {
        border: 1px solid #ababab;
    }

    .login-box input[type="submit"] {
        background: <?= $secondaryColor ?>;
        line-height: 53px;
        padding: 0 30px;
        border-radius: 3px;
        color: #fff;
        text-transform: uppercase;
        border: 0px;
        font-weight: 700;
    }

    .login-box p.reg {
        text-align: center;
        font-size: 14px;
        margin: 0px;
    }

    .login-box p.reg a {
        color: #3949ab;
    }

    p.or {
        color: #fff;
        text-align: center;
    }

    p.or strong {
        display: block;
    }

    ul.social-login {
        margin: 0px;
        padding: 0px;
        list-style: none;
    }

    ul.social-login li {
        display: inline-block;
    }

    ul.social-login li i {
        font-weight: 400;
        font-size: 20px;
        margin-right: 5px;
    }

    ul.social-login a {
        border-radius: 3px;
        display: inline-block;
        line-height: 50px;
        padding: 0 18px;
        text-transform: uppercase;
        color: #fff;
        font-weight: 700;
        font-size: 16px;
    }

    ul.social-login a.fb {
        background: #3b5998;
    }

    ul.social-login a.tw {
        background: #55acee;
    }

    ul.social-login a.gp {
        background: #dd4b39;
    }

    .login-page.register-page .login-wrap {
        padding-top: 60px;
    }

    .login-account {
        background: <?= $secondaryColor ?>;
        width: 100%;
        float: left;
        border-radius: 3px;
        padding: 44px 30px 40px;
    }

    .login-account p {
        color: #fff;
    }

    .login-account h4 {
        color: #fff;
        margin: 0 0 30px;
        font-weight: 700;
    }

    .register-account ul, .login-account ul {
        margin: 0px;
        padding: 0px;
        list-style: none;
    }

    .login-account li {
        margin-bottom: 10px;
        color: #fff;
    }

    .login-account a {
        color: #fff;
    }

    .login-account .linput {
        border: 1px solid #fff;
    }

    .login-account input[type="submit"] {
        width: 100%;
        background: <?= $mainColor ?>;
        color: #fff;
        text-align: center;
        text-transform: uppercase;
        line-height: 53px;
        border: 0px;
        border-radius: 3px;
        font-size: 14px;
        font-weight: 700;
        margin-top: 10px;
    }

    .login-account input[type="submit"]:hover {
        background: #fff;
        color: <?= $mainColor ?>;
    }

    .register-account li {
        margin-bottom: 18px;
    }

    .register-account h4 {
        margin-bottom: 10px;
        font-weight: 700;
    }

    .register-account a {
        color: <?= $mainColor ?>;
    }

    .register-account input[type="submit"] {
        width: 100%;
        background: <?= $secondaryColor ?>;
        color: #fff;
        text-align: center;
        text-transform: uppercase;
        line-height: 53px;
        border: 0px;
        border-radius: 3px;
        font-size: 14px;
        font-weight: 700;
        margin-top: 10px;
    }

    .register-account input[type="submit"]:hover {
        background: <?= $mainColor ?>;
        color: #fff;
    }

    /***==============  Login / Register Page end	   ==============***/

    /*********************************
Coming Soon Start
*********************************/

    .cs-txt {
        position: relative;
        width: 80%;
        margin: auto;
        overflow: hidden;
        text-align: center;
        padding-top: 200px;
    }

    .cs-txt img {
        margin-bottom: 40px;
        max-width: 100%;
        height: auto;
    }

    .cs-txt p {
        color: #fff;
        font-size: 22px;
        font-weight: 300;
        font-family: 'Lato', sans-serif;
        margin: 0 0 40px;
    }

    .cs-txt h1 {
        font-weight: 700;
        color: #fff;
        margin: 0 0 40px;
    }

    .cs-txt .countdown.is-countdown {
        width: 100%;
        float: left;
        margin: 0 0 70px;
        padding: 0 50px;
    }

    .cs-txt .countdown-section {
        width: 170px;
        height: 170px;
        border: 8px solid<?= $mainColor ?>;
        display: inline-block;
        border-radius: 100%;
        margin: 0 15px;
        padding: 30px 0 0;
    }

    .cs-txt .countdown-amount {
        display: block;
        color: #fff;
        font-family: 'Montserrat', sans-serif;
        font-size: 60px;
        font-weight: 800;
        line-height: 60px;
    }

    .cs-txt .countdown-period {
        display: block;
        color: #fff;
        text-transform: uppercase;
        font-size: 20px;
        font-weight: 500;
        font-family: 'Montserrat', sans-serif;
    }

    .cs-newsletter-form {
        width: 80%;
        margin: auto;
        position: relative;
        text-align: left;
        overflow: hidden;
    }

    .cs-newsletter-form h4 {
        color: #fff;
        font-weight: 700;
        margin: 0 0 15px;
    }

    .cs-newsletter-form input.form-control {
        height: 53px;
        line-height: 49;
        border: 2px solid<?= $mainColor ?>;
        background: none;
        padding: 0 20px;
        color: #fff;
    }

    .cs-newsletter-form button.subscribe {
        background: <?= $mainColor ?>;
        position: absolute;
        right: 0;
        bottom: 0;
        height: 53px;
        border-radius: 0 5px 5px 0;
        border: 0;
        color: #fff;
        font-weight: 500;
        font-size: 18px;
        text-transform: uppercase;
        padding: 0 30px;
        font-family: 'Montserrat', sans-serif;
    }

    /*********************************
Coming Soon End
*********************************/

    /*********************************
Page 404
*********************************/

    .wrap-404 {
        width: 600px;
        margin: 250px auto 0;
        text-align: center;
    }

    .wrap-404 strong.title-404 {
        font-size: 256px;
        font-family: 'Montserrat', sans-serif;
        color: #fff;
        font-weight: 900;
        line-height: 200px;
        display: block;
        margin-bottom: 20px;
    }

    .wrap-404 h2 {
        color: #fff;
        margin-bottom: 15px;
    }

    .wrap-404 h3 {
        color: #fff;
        margin-bottom: 15px;
    }

    .wrap-404 p {
        color: #fff;
        font-size: 20px;
        margin-bottom: 15px;
    }

    .search-form {
        width: 100%;
        float: left;
        margin-bottom: 20px;
    }

    .wrap-404 .search strong {
        font-size: 32px;
        color: #fff;
        display: block;
        font-weight: 700;
        font-family: 'Montserrat', sans-serif;
        margin-bottom: 10px;
    }

    .wrap-404 input.form-control {
        border: 0;
        border-radius: 3px;
        padding: 0 15px;
        line-height: 53px;
        height: 53px;
        width: 85%;
        float: left;
    }

    .wrap-404 button.btn {
        background: <?= $mainColor ?>;
        height: 53px;
        line-height: 53px;
        border: 0px;
        box-shadow: none;
        padding: 0 25px;
        color: #fff;
        font-size: 18px;
    }

    .wrap-404 a.back {
        background: <?= $mainColor ?>;
        color: #fff;
        display: inline-block;
        border-radius: 3px;
        line-height: 45px;
        padding: 0 30px;
        text-transform: uppercase;
        font-weight: 700;
    }

    /*********************************
Page 404 End
*********************************/

    /*********************************
Search Overlay End
*********************************/
    #search {
        position: fixed;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .9);
        -webkit-transition: all 0.5s ease-in-out;
        -moz-transition: all 0.5s ease-in-out;
        -o-transition: all 0.5s ease-in-out;
        -ms-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
        -webkit-transform: translate(0px, -100%) scale(0, 0);
        -moz-transform: translate(0px, -100%) scale(0, 0);
        -o-transform: translate(0px, -100%) scale(0, 0);
        -ms-transform: translate(0px, -100%) scale(0, 0);
        transform: translate(0px, -100%) scale(0, 0);
        opacity: 0;
        z-index: 99999999;
    }

    #search.open {
        -webkit-transform: translate(0px, 0px) scale(1, 1);
        -moz-transform: translate(0px, 0px) scale(1, 1);
        -o-transform: translate(0px, 0px) scale(1, 1);
        -ms-transform: translate(0px, 0px) scale(1, 1);
        transform: translate(0px, 0px) scale(1, 1);
        opacity: 1;
    }

    .search-overlay-form {
        position: absolute;
        top: 0px;
        bottom: 0;
        left: 0;
        right: 0;
        width: 60%;
        height: 60px;
        margin: auto;
    }

    #search input[type="search"] {
        width: 100%;
        line-height: 60px;
        color: #fff;
        background: rgba(0, 0, 0, 0);
        font-size: 40px;
        font-weight: 300;
        text-align: center;
        border: 0px;
        border-bottom: 1px solid #ccc;
        outline: none;
    }

    #search .btn {
        position: absolute;
        background: #66bb6a;
        color: #fff;
        border: 0px;
        right: 0;
        top: 5px;
        width: 50px;
        height: 50px;
    }

    #search .close {
        position: fixed;
        top: 15px;
        right: 15px;
        color: #fff;
        background-color: #66bb6a;
        border-color: #66bb6a;
        opacity: 1;
        padding: 10px 17px;
        font-size: 27px;
    }

    /*********************************
Search Overlay End
*********************************/

    #sidebar {
        width: 300px;
        position: fixed;
        top: 0;
        right: -300px;
        height: 100vh;
        z-index: 999;
        background: <?= $secondaryColor ?>;
        color: #fff;
        transition: all 0.3s;
        box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.2);
    }

    #sidebar.active {
        right: 0;
    }

    #dismiss {
        width: 35px;
        height: 35px;
        line-height: 35px;
        text-align: center;
        background: rgba(0, 0, 0, .5);
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
        -webkit-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
    }

    #dismiss:hover {
        background: #fff;
        color: #7386D5;
    }

    .overlay {
        display: none;
        position: fixed;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.7);
        z-index: 998;
        opacity: 0;
        transition: all 0.5s ease-in-out;
        overflow: hidden;
    }

    .overlay.active {
        display: block;
        opacity: 1;
    }

    #sidebar .sidebar-header {
        padding: 20px;
        background: <?= $secondaryColor ?>;
    }

    #sidebar ul.components {
        padding: 20px 0;
        border-bottom: 1px solid #47748b;
    }

    #sidebar ul p {
        color: #fff;
        padding: 10px;
    }

    #sidebar ul li a {
        padding: 10px;
        font-size: 1.1em;
        display: block;
        color: #fff;
    }

    #sidebar ul li a:hover {
        color: <?= $secondaryColor ?>;
        background: #fff;
    }

    #sidebar ul li.active > a {
        color: #fff;
        background: rgba(0, 0, 0, .3);
    }

    a[data-toggle="collapse"] {
        position: relative;
    }

    .dropdown-toggle::after {
        display: block;
        position: absolute;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);
    }

    .font {
        font-family: 'Montserrat', sans-serif;
        font-family: 'Lato', sans-serif;
    }

    /******** + ========== + Transition Start + ========== + ********/

    .lb-ser-box h6, .lb-ser-box img, .lb-icon, .lb-box img, .ch-box:after, .banner-tags li, .main-slider .owl-carousel button.owl-dot span, .news-box-f:after, ul.team-social:after, .latest-updates ul li:after, .sub-menu a, .login-account input[type="submit"], .login-box input[type="submit"], .register-account input[type="submit"], .donator-details input[type="submit"], .testimonials-section .owl-theme .owl-dots .owl-dot span, li.form-submit button, .dn-btn, .causes-listing .campaign-txt h4 a, .campaign-txt h6 a, .campaign-txt h5 a, a.dbutton, .campaign-thumb a, .campaign-thumb:after, .event-counter a, .event-share ul a, .event-share ul a.like:after, .event-gallery .eg-thumb:after, .event-gallery .eg-thumb a, .h3-team-box img, .contact-form input[type="submit"], .single-post-tags a, .gallery-thumb:after, .gallery-thumb a, .stay-connected input[type="submit"], .department-links li a:after, .department-links li a, .ch-box .ch-txt h6 a, .city-updates li.more-news a, .city-updates ul li strong a, .deprt-icon-box h5 a, .service-box img, .serbox-cap, .serbox-cap h6 a, .serbox-cap p, .serbox-cap .rm, .service-box:after, .local-service-box img, .hc-box .hc-box-cap, .hc-box .hc-box-cap p, .event-cap, .event-cap p, .owl-carousel .owl-item img, .ch-box .ch-txt, .ch-box .ch-txt p, .post-comments-form input[type="submit"], ul.gallery-2-col img, ul.gallery-3-col img, ul.gallery-4-col img, .share-post-single a, .newsletter-style2 button, .department-box:after, .contact-team, ul.member-social a, .team-grid .h3-team-box img, .new-thumb a, .event-list-box, .event-list-box .event-title h6 a, a.join-now, a.join-now, .about-widget a, .widget .archives a, .tags-widget a, .widget .categories a, .widget .upcoming-events .edate, .widget h6 a, .site-pagination .pagination > li > a, .pagination > li > span, #h3team-slider .owl-next, #h3team-slider .owl-prev, .team-info ul, .team-info p, .team-info, .team-info ul li a, .community-links-style-two li a, .community-links-style-two li a img, ul.reports a, a.jobs-link, .deprt-icon-box, .deprt-icon-box img, .deprt-icon-box h6, .deprt-icon-box h6 a, .deprt-icon-box a.rm, .news-box, .new-thumb:after, .new-txt h6 a, .news-box-f a, .event-cap h5 a, .recent-events .event-list, .recent-events .event-list:after, .event-list li.el-title h6 a, .event-list a.joinnow, .recent-events .nav-tabs > li > a, .h3-slider-caption a, .h3-navbar .dropdown-menu a, .h3-navbar .navbar .navbar-nav > li > a, .h3-navbar .navbar .navbar-nav > li > a:after, .h3-logo-row ul.quick-links li a, .become-vol, .cross-btn, .some-facts strong, .community-box, .news-post, .event-post-full, .hc-box, .hc-box .hc-box-cap, .hc-box .hc-box-cap h5 a, .hc-box .hc-box-cap ul li, .hc-box .hc-box-cap p, .hc-box .hc-box-cap h5 a, .hc-box .hc-box-cap ul, .hc-box .hc-box-cap li a, .local-box img, .event-post-txt h5 a, .newsletter-form button, .e-numbers .em-box, .e-numbers .em-box strong.em-num, .e-numbers .em-box strong.em-deprt, .e-numbers .em-box i, .twitter-widget a.reply-tw, .footer-widget ul li a, .team-heading a, .community-box ul li a, .community-box a.see-more, .highlights-cityscapes .owl-carousel .owl-nav button.owl-prev, .highlights-cityscapes .owl-carousel .owl-nav button.owl-next, .btn-group.share-post button.dropdown-toggle, .news-post-txt h5 a, .local-box:after, .local-box a, .city-tour a img, .h2-Mayor-msg .Mayor-txt a, .slider-caption a, .header .topbar a, .call2action a, .footer p.copyr a, .footer-social a, .team-box .team-txt h5, .team-box .team-txt strong, .team-box .team-thumb:after, .team-box .team-thumb a, ul.team-social a, .fact-box, .fact-box span, .fact-box strong, .department-box a, .ch-box .ch-txt ul li a, .ch-box .ch-thumb a, .ch-box .ch-thumb:after, .ch-box .ch-txt h5 a, .city-highlights .owl-carousel .owl-nav button.owl-next, .city-highlights .owl-carousel .owl-nav button.owl-prev, .thumb a, .thumb:after, .event-post-txt h5 a, .event-post-loc a, .latest-updates ul li strong a, .title-style-2 a, .local-service-box:after, .local-service-box a, .Mayor-text a, .logo-nav-row .navbar-nav > li > a, .topbar ul.left-links a, .logo-nav-row .dropdown-menu > li > a {
        transition: all ease-in-out 0.3s;
        -webkit-transition: all ease-in-out 0.3s;
    }

    /******** + ========== + Transition End + ========== + ********/
    9

    /*COLOR CSS*/
    /******** + ========== + Blue BackgroundColor Start + ========== + ********/
    .city-tour strong, ul.reports, .h3-navbar .donate-btn a:hover,
    .wrap-404 a.back,
    .wrap-404 button.btn,
    .main-slider .owl-carousel button.owl-dot span:hover, .main-slider .owl-carousel button.owl-dot.active span, .banner-tags li:hover, .header .topbar, .city-highlights .owl-carousel .owl-nav button.owl-next:hover, .city-highlights .owl-carousel .owl-nav button.owl-prev:hover, .sub-menu a:hover, .logo-nav-row .dropdown-menu > li > a:hover, .slider-caption a:hover, .Mayor-text a:hover, .title-style-2 a:hover, .city-highlights .owl-carousel .owl-nav button.owl- next:hover, .city-highlights .owl-carousel .owl-nav button.owl-prev:hover, .emergency-info, .stay-connected input[type="submit"], .h2-Mayor-msg .Mayor-txt a:hover, .team-heading a:hover, .h3-slider-caption a:hover, .news-details blockquote, .single-post-tags a:hover, .post-comments-form input[type="submit"], .deprt-icon-box a.rm:hover, a.jobs-link:hover, .community-links-style-two li a img, .widget .upcoming-events li:hover .edate, .contact-team, .newsletter-style2 button, .post-comments-form input[type="submit"], .service-page-bottom .newsletter-form button, .city-updates li.more-news a:hover, .department-links li a, .contact-form input[type="submit"], .event-date-share .edate, .event-gallery .eg-thumb a:hover, a.dbutton, .dn-btn, .single-donation-box .progress .progress-bar, li.form-submit button, .donator-details input[type="submit"], .login-box input[type="submit"], .login-account, .register-account input[type="submit"], .home3.emergency-numbers .newsletter-form button {
        background-color: <?= $secondaryColor ?>;
    }

    /******** + ========== + Blue Text Color Start + ========== + ********/

    .sub-menu a, .logo-nav-row .dropdown-menu > li > a, .e-numbers .info-num h3, .community-box h6, .twitter-widget a.reply-tw:hover, ul.post-time a i, .add-box i, .event-counter a, .event-content ul.emeta li strong, .event-gallery .eg-thumb a, .campaign-thumb a, ul.participants li strong i {
        color: <?= $secondaryColor ?>;
    }

    /******** + ========== + Blue Border Color Start + ========== + ********/

    .main-slider .owl-carousel button.owl-dot span:hover, .main-slider .owl-carousel button.owl-dot.active span, .twitter-widget a.reply-tw:hover, .single-post-tags a:hover, .post-comments-form input[type="submit"] {
        border-color: <?= $secondaryColor ?>;
    }

    /******** + ========== + Pink BackgroundColor Start + ========== + ********/

    .event-share ul a.like, .h3-logo-row ul.quick-links li a:hover,
    #search .btn, #search .close, .slider-caption a, .Mayor-msg, .title-style-2 a, .latest-updates h6, .latest-updates ul li:after, .new-thumb a:hover, .thumb a:hover, .ch-box .ch-thumb a:hover, .city-highlights .owl-carousel .owl-nav button.owl-next, .city-highlights .owl-carousel .owl-nav button.owl-prev, .stay-connected, .e-numbers .em-box:hover, span.ecat, .highlights-cityscapes .owl-carousel .owl-nav button.owl- prev, .highlights-cityscapes .owl-carousel .owl-nav button.owl-next, .highlights-cityscapes .owl-carousel .owl-nav button.owl- prev:hover, .highlights-cityscapes .owl-carousel .owl-nav button.owl-next:hover, .community-box a.see-more:hover, .team-heading a, .home3.footer, .become-vol, .cross-btn:hover, .h3-navbar .donate-btn a, .h3-slider-caption a, .title-style-3 p:before, .news-box-f:after, .news-box:hover .news-box-f a, .deprt-icon-box a.rm, a.jobs-link, .recent-events .nav-tabs > li > a, .recent-events .nav-tabs > li > a:after, .recent-events .event-list:after, .event-list a.joinnow:hover, .recent-events .event-list:hover a.joinnow, .community-links-style-two li a:hover img, #h3team-slider .owl-next:hover, #h3team-slider .owl- prev:hover, .event-list-box:hover a.join-now, .widget .upcoming-events .edate, .tags-widget a:hover, .contact-team:hover, .post-comments-form input[type="submit"]:hover, .city-updates li.more-news a, .department-links li a.c9, .gallery-thumb a:hover, .contact-form input[type="submit"]:hover, .event-counter a:hover, .event-share ul a:hover, .campaign-thumb a:hover, .campaign-box:hover a.dbutton, .causes-listing .campaign-box:hover .dn-btn, .single-donation-box .radio-boxes input[type=radio].css- radio + label.css-label:hover, .single-donation-box .radio- boxes input[type=radio].css-radio:checked + label.css-label, .radio-boxes input[type=radio].css-radio + label.css-label:hover, .radio-boxes input[type=radio].css-radio:checked + label.css-label, li.form-submit button:hover, .donator-details input[type="submit"]:hover, .testimonials-section .owl-theme .owl-dots .owl-dot.active span, .testimonials-section .owl-theme .owl-dots .owl-dot span:hover, .login-account input[type="submit"], .register-account input[type="submit"]:hover, .cs-newsletter-form button.subscribe, ul.team-social:after, .call2action a, .h2-Mayor-msg, .newsletter-form button, .community-box a.see-more:hover, .community-box:hover a.see-more, .ecat.c1, .site-pagination .pagination > .active > a, .site-pagination .pagination > .active > a:focus, .site-pagination .pagination > .active > a:hover, .site-pagination .pagination > .active > span, .site-pagination .pagination > .active > span:focus, .site-pagination .pagination > .active > span:hover, .site-pagination .pagination > li > a:focus, .site-pagination .pagination > li > a:hover, .site-pagination .pagination > li > span:focus, .site-pagination .pagination > li > span:hover, .serbox-cap .rm:hover {
        background-color: <?= $secondaryColor ?>;
    }

    /******** + ========== + Pink Text Color Start + ========== + ********/
    .lb-ser-box li:hover h6,
    .footer-social a:hover, .some-facts ul li:hover strong, .team-box .team-txt strong, .team-box:hover .team-txt h5, ul.check-list i, .local-box:hover a, .event-post-full:hover .event-post-loc a, .event-post-full:hover .event-post-txt h5 a, .news-post:hover .news-post-txt h5 a, .logo-nav-row ul.nav.navbar-nav.navbar-right .search-btn a, .logo-nav-row ul.nav.navbar-nav.navbar-right .bars-btn a, .logo-nav-row .nav .open > a, .logo-nav-row .nav .open > a:focus, .logo-nav-row .nav .open > a:hover, .logo-nav-row .navbar-nav > li > a:hover, .about-widget a:hover, .widget .recent-posts strong, .widget .recent-posts h6 a:hover, .button-group .button:hover, .button-group .button:active, .button-group .button.is-checked, .local-service-box:hover a, .latest-updates ul li strong a:hover, .event-post:hover .event-post-loc a, .event-post:hover h5 a, .new-thumb a, .thumb a, .ch-box .ch-thumb a, .ch-box .ch-txt ul li a:hover, .ch-box .ch-txt ul li:after, .ch-box .ch-txt h5 a:hover, .query ul li strong, .fact-box strong, .e-numbers .info-num strong, .e-numbers .em-box strong.em-num, .btn-group.share-post button.dropdown-toggle:hover, .news-meta .post-user, .hc-box .hc-box-cap li:after, .hc-box:hover .hc-box-cap h5 a, .hc-box:hover .hc-box-cap li a, .community-box ul li a:hover, .footer-widget ul li a:hover, .news-box:hover .new-txt h6 a, .deprt-icon-box:hover h6 a, .event-list li strong.edate, .event-list li.el-title p i, .recent-events .event-list:hover h6 a, .event-cap h5 a:hover, .event-cap ul li:after, .community-links-style-two li a:hover, .team-info ul li a:hover, #h3team-slider .owl-next, #h3team-slider .owl-prev, .home3.emergency-numbers .e-numbers .em-box i, .event-list-box .edate strong, .event-list-box .event-title p i, .event-list-box:hover .event-title h6 a, .widget h6 a:hover, .team-detail .advisor, .checklist li i, .deprt-icon-box:hover h5 a, .city-updates ul li strong a:hover, .ch-box .ch-txt h6 a:hover, .gallery-thumb a, .add-box-2 i, .event-share ul a:hover.like:after, .campaign-box:hover h6 a, .campaign-box:hover h5 a, .causes-listing .campaign-box:hover h4 a, .login-account input[type="submit"]:hover, .register-account a {
        color: <?= $mainColor ?>;
    }

    /******** + ========== + Pink Border Color Start + ========== + ********/
    .h3-logo-row ul.quick-links li a:hover,
    .community-box:hover a.see-more, .cs-newsletter-form input.form-control, .cs-txt .countdown-section, .fact-box:hover, .e-numbers .em-box:hover, .community-box a.see-more:hover, .event-list a.joinnow:hover, .recent-events .event-list:hover a.joinnow, #h3team-slider .owl-next:hover, #h3team-slider .owl-prev:hover, .site-pagination .pagination > .active > a, .site-pagination .pagination > .active > a:focus, .site-pagination .pagination > .active > a:hover, .site-pagination .pagination > .active > span, .site-pagination .pagination > .active > span:focus, .site-pagination .pagination > .active > span:hover, .site-pagination .pagination > li > a:focus, .site-pagination .pagination > li > a:hover, .site-pagination .pagination > li > span:focus, .site-pagination .pagination > li > span:hover, .event-list-box:hover a.join-now, .tags-widget a:hover, .post-comments-form input[type="submit"]:hover, .event-share ul a:hover, .single-donation-box .radio-boxes input[type=radio].css-radio + label.css-label:hover, .single-donation-box .radio-boxes input[type=radio].css-radio:checked + label.css-label, .radio-boxes input[type=radio].css-radio + label.css-label:hover, .radio-boxes input[type=radio].css-radio:checked + label.css-label, .fact-box:hover {
        border-color: <?= $mainColor ?>;
    }

    .facts-icon:after {
        box-shadow: 0 0 0 2px <?= $mainColor ?>;
    }

    .header .topbar {
        background: <?= $secondaryColor ?>;
    }
    .footer-nav a:hover{
        color: <?= $mainColor ?>;
    }

    body > .footer {
        background: <?= maybe_null_or_empty($options, 'footer_background_color', false, '#383838') ?> !important;
    }

    <?php
        if($logo = maybe_null_or_empty($options, 'footer_logo', true)){
            ?>
    body > .footer > span:first-child {
        background: url("<?= getUploadedImageBySize($logo, '150x150') ?>") center center no-repeat!important;;
    }
    <?php
        }
    ?>


</style>
