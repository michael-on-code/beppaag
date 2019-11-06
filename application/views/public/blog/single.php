<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 06/11/2019
 * Time: 15:46
 */
getBreadcrump([
    'title'=>$pageTitle,
    'before'=>[
        [
            'title'=>'Blog',
            'url'=>site_url('blog')
        ]
    ]
])
?>
<div class="main-content p80">
    <!--News Details Page Start-->
    <div class="news-details">
        <div class="container">
            <div class="row">
                <!--Content Col Start-->
                <div class="col-md-9">
                    <div class="news-box">
                        <div class="new-thumb"> <a href="#"><i class="fas fa-link"></i></a> <span class="cat c4">Publication</span> <img src="<?= $assetsUrl ?>public/images/post-single.jpg" alt=""> </div>
                        <div class="new-txt">
                            <div class="row">
                                <div class="col-xs-10">
                                    <ul class="news-meta">
                                        <li>28 Octobre 2019</li>
                                    </ul>
                                </div>
                                <div class="col-xs-2">
                                    <div class="btn-group share-post">
                                        <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-share-alt"></i> Partager</button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" class="fb"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#" class="whats"><i class="fab fa-whatsapp"></i></a></li>
                                            <li><a href="#" class="tw"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#" class="linken"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <h4>Insécurité alimentaire : un regard sur les réponses apportées par les diverses parties prenantes</h4>
                            <p> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo d Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo d</p>
                            <p> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo d Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo d</p>
                            <p> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo d Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo d</p>
                            <blockquote>
                                <p> Pellentesque egestas vulputate augue, id consectetur dolor blandit nec. Nullam fermentum turpis in lacinia lobortis. Interdum et </p>
                            </blockquote>
                            <p> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo d Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo d</p>
                            <ul class="gallery-3-col">
                                <li><img src="<?= $assetsUrl ?>public/images/nd3.jpg" alt=""></li>
                                <li><img src="<?= $assetsUrl ?>public/images/nd4.jpg" alt=""></li>
                                <li><img src="<?= $assetsUrl ?>public/images/nd5.jpg" alt=""></li>
                            </ul>
                            <h5>Alimentation des populations</h5>
                            <p> Pellentesque egestas vulputate augue, id consectetur dolor blandit nec. Nullam fermentum turpis in lacinia lobortis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam metus neque, posuere eget tempor ut, consectetur vel elit. Aliquam fringilla justo at arcu varius Quisque est nunc, tristique in mollis quis, ullamcorper id diam. Mauris lorem elit, pellentesque quis ultrices vel, bibendum a odio. Nunc dapibus lacus quis urna mattis, a interdum est blandit. </p>
                            <p> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo d Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo d</p>
                            <h5>Nutrition & Qualité</h5>
                            <p> Sapien lacinia, pretium sapien gravida, maximus sapien. Cras id nulla vehicula dolor ultricies gravida. In hac habitasse platea dictumst. Nunc quis ultrices augue, ut lacinia erat. Duis varius cursus velit. </p>
                            <ul class="checklist">
                                <li><i class="fas fa-check"></i> Aliquam eget tellus sed dolor accumsan imperdiet.</li>
                                <li><i class="fas fa-check"></i> Nunc interdum arcu vel massa faucibus imperdiet.</li>
                                <li><i class="fas fa-check"></i> Vestibulum sollicitudin odio nec faucibus venenatis.</li>
                                <li><i class="fas fa-check"></i> Etiam iaculis nunc et iaculis sodales.</li>
                            </ul>
                            <ul class="gallery-2-col">
                                <li><img src="<?= $assetsUrl ?>public/images/nd1.jpg" alt=""></li>
                                <li><img src="<?= $assetsUrl ?>public/images/nd2.jpg" alt=""></li>
                            </ul>
                            <!--Post Tags Start-->
                            <div class="single-post-tags"> <a href="#">Santé</a> <a href="#">Alimentation</a> <a href="#">Population</a> <a href="#">Public</a> </div>
                            <!--Post Tags End-->
                            <!--Related Post Start-->
                            <div class="related-posts">
                                <h3 class="stitle">Articles liés</h3>
                                <div class="row">
                                    <ul>
                                        <li class="col-md-4 col-sm-4">
                                            <div class="rel-box">
                                                <h6><a href="#">Stratégies de croissances pour la réduction de la pauvreté</a></h6>
                                                <ul class="news-meta">
                                                    <li>30 Octobre, 2019</li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="col-md-4 col-sm-4">
                                            <div class="rel-box">
                                                <h6><a href="#">Politique Nationale du Tourisme au Bénin et dans la sous region</a></h6>
                                                <ul class="news-meta">
                                                    <li>30 Octobre, 2019</li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="col-md-4 col-sm-4">
                                            <div class="rel-box">
                                                <h6><a href="#">Politique Nationale de Développement de l’Artisanat (PNDA)</a></h6>
                                                <ul class="news-meta">
                                                    <li>30 Octobre, 2019</li>
                                                </ul>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <!--Related Post End-->
                        </div>
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
