<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 06/11/2019
 * Time: 12:14
 */
getBreadcrump([
    'title'=>$pageTitle,
    'before'=>[
        [
            'title'=>'Evènements',
            'url'=>site_url('events')
        ]
    ]
],  $options, 'event')
?>
<div class="main-content p80">
    <!--News Details Page Start-->
    <div class="news-details">
        <div class="container">
            <div class="row">
                <!--Content Col Start-->
                <div class="col-md-9">
                    <div class="event-details">
                        <div class="event-thumb"> <img data-src="<?= $assetsUrl ?>public/images/event-medium1.jpg" alt=""> </div>
                        <!--Counter-->
                        <div class="event-counter">
                            <ul>
                                <li class="first-col"><strong>Evènement commence dans :</strong>
                                </li>
                                <li class="snd-col">
                                    <!--Note: JavaScript counts months from 0 to 11.
                                    January is 0. December is 11.-->
                                    <div id="defaultCountdown" data-date-year="2019" data-date-month="10" data-date-day="25" data-date-hour="11" data-date-minute="30"></div>
                                </li>
<!--                                <li class="trd-col"> <a href="#">Participate Now</a> </li>-->
                            </ul>
                        </div>
                        <!--Counter End-->
                        <!--Event Details text-->
                        <div class="event-content">
                            <!--Date and Share Start-->
                            <div class="event-date-share">
                                <div class="edate"> <strong>25</strong> Nov <span class="year">2019</span> </div>
                                <div class="event-share">
                                    <ul>
                                        <li><a class="like" href="#"><i class="fas fa-share-alt"></i> <!--2k--></a></li>
                                        <li><a class="fb" href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a class="whats" href="#"><i class="fab fa-whatsapp"></i></a></li>
                                        <li><a class="tw" href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a class="in" href="#"><i class="fab fa-linkedin-in"></i></a></li>
<!--                                        <li><a href="#"><i class="fas fa-ellipsis-h"></i></a></li>-->
                                    </ul>
                                </div>
                            </div>
                            <!--Date and Share End-->
                            <div class="etext">
                                <ul class="emeta">
                                    <li><strong>Heures :</strong> 11H30  -- 13H30</li>
<!--                                    <li><strong>Attending:</strong> 613</li>-->
                                    <li><strong>Lieu :</strong>  Espace DINA, St Michel, Cotonou, Bénin</li>
                                </ul>
                                <p> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed d Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed d</p>
                                <p> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed d Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed d</p>
                                <p> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed d Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed d</p>
                                <!--<ul class="checklist">
                                    <li><i class="fas fa-check"></i> Suspendisse tempor sapien sit amet orci pharetra placerat.</li>
                                    <li><i class="fas fa-check"></i> Duis ullamcorper lorem vel imperdiet congue.</li>
                                    <li><i class="fas fa-check"></i> Nulla ullamcorper nisi et ligula eleifend ultrices.</li>
                                    <li><i class="fas fa-check"></i> In quis turpis in massa dignissim viverra.</li>
                                </ul>-->
                                <p> Consectetur turpis, et convallis mi. Nunc eu semper augue. Vestibulum justo nisi, lobortis sed est et, faucibus fringilla metus. Donec ipsum quam, laoreet ac ex non, hendrerit malesuada risus. </p>
                                <blockquote>
                                    <p> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed d Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam  </p>
                                </blockquote>
                                <p> Consectetur turpis, et convallis mi. Nunc eu semper augue. Vestibulum justo nisi, lobortis sed est et, faucibus fringilla metus. Donec ipsum quam, laoreet ac ex non, hendrerit malesuada risus. </p>
                            </div>
                        </div>
                        <!--Event Details End-->
                        <!--Event Speakers Start-->
                        <div class="event-speakers">
                            <h3>Orateurs et invités spéciaux</h3>
                            <div class="row">
                                <!--Speaker Box Start-->
                                <div class="col-md-4 col-sm-4">
                                    <div class="h3-team-box">
                                        <div class="team-info">
                                            <h5>AKPONA Cyrille</h5>
                                            <strong>Expert Comptable</strong>
                                            <p> M. Cyrille nous parlera de ses experiences dans l'administration publique </p>
                                            <ul>
                                                <li><strong>Reseaux sociaux:</strong></li>
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                                <!--                                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>-->
                                            </ul>
                                        </div>
                                        <img data-src="<?= $assetsUrl ?>public/images/speaker1.jpg" alt="">
                                    </div>
                                </div>
                                <!--Speaker Box End-->
                                <!--Speaker Box Start-->
                                <div class="col-md-4 col-sm-4">
                                    <div class="h3-team-box">
                                        <div class="team-info">
                                            <h5>SEHOUE Albertine</h5>
                                            <strong>Directrice SEME CITY</strong>
                                            <p> Mme. Albertine nous parlera de ses experiences dans l'administration publique </p>
                                            <ul>
                                                <li><strong>Reseaux sociaux:</strong></li>
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                                <!--                                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>-->
                                            </ul>
                                        </div>
                                        <img data-src="<?= $assetsUrl ?>public/images/speaker2.jpg" alt="">
                                    </div>
                                </div>
                                <!--Speaker Box End-->
                                <!--Speaker Box Start-->
                                <div class="col-md-4 col-sm-4">
                                    <div class="h3-team-box">
                                        <div class="team-info">
                                            <h5>Ahoundji Badmus</h5>
                                            <strong>Directeur adjoint MAEP</strong>
                                            <p> M. Badmus nous parlera de ses experiences dans l'administration publique </p>
                                            <ul>
                                                <li><strong>Reseaux sociaux:</strong></li>
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
<!--                                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>-->
                                            </ul>
                                        </div>
                                        <img data-src="<?= $assetsUrl ?>public/images/speaker3.jpg" alt="">
                                    </div>
                                </div>
                                <!--Speaker Box End-->
                            </div>
                        </div>
                        <!--Event Speakers End-->
                    </div>
                </div>
                <!--Content Col End-->
                <!--Sidebar Start-->
                <?php $this->load->view('public/blog/sidebar'); ?>
                <!--Sidebar End-->
            </div>
        </div>
    </div>
    <!--News Details Page End-->
</div>
