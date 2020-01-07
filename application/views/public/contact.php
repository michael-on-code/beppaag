<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 31/10/2019
 * Time: 11:41
 */
getBreadcrump([
    'title'=>$pageTitle
],  $options, 'contact')
?>
<!--Sub Header End-->
<!--Main Content Start-->
<div class="main-content">
    <!--Contact Us Start-->
    <div class="contact-details  p80 pagebg2">
        <div class="container">
            <div class="row">
                <?php
                if($contactInfos = maybe_null_or_empty($options, 'contact_infos')){
                    ?>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="col-md-12">
                            <h3 class="stitle">Information de contact</h3>
                        </div>
                        <div class="row">
                            <?php
                            foreach ($contactInfos as $info){
                                ?>
                                <div class="col-md-6 col-sm-4">
                                    <div class="add-box">
                                        <h5><?= $info['label'] ?></h5>
                                        <ul>
                                            <li><i class="fas fa-phone"></i> <strong>Téléphone:</strong> <?= $info['phone'] ?></li>
                                            <li><i class="fas fa-building"></i> <strong>Adresse:</strong>
                                                <?= $info['adress'] ?>
                                            </li>
                                            <li><i class="far fa-envelope"></i><strong> Email:</strong> <?= $info['email'] ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!--Contact Us Start-->
    <!-- Google Map with Contact Form -->
    <div class="map-form p80">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-5">
                    <h3 class="stitle">Nous envoyer un message</h3>
                    <div class="contact-form">
                        <form>
                            <ul>
                                <li>
                                    <input type="text" placeholder="Nom & Prénom(s)" required>
                                </li>
                                <li>
                                    <input type="text" placeholder="Email" required>
                                </li>
                                <li>
                                    <input type="text" placeholder="Sujet">
                                </li>
                                <li>
                                    <textarea placeholder="Mesage"></textarea>
                                </li>
                                <li>
                                    <input type="submit" value="Soumettre">
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
                <?php
                if($embedIframe = maybe_null_or_empty($options, 'contact_google_map_iframe_html')){
                    ?>
                    <div class="col-md-8 col-sm-7">
                        <div class="map">
                            <?= $embedIframe ?>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>
    </div>
</div>
