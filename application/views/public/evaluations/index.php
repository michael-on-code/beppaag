<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 31/10/2019
 * Time: 14:41
 */
getBreadcrump([
        'title'=>$pageTitle
])
?>
<style>
    .events-wrapper {
        padding: 19px 0!important;
    }
    .s002 label{
        text-align: center;
        font-size: 13px;
        color: white;
        display: block;
    }
    .s002 select{
        height: 70px;
        background: #fff;
        border-radius: 0;
        border: 0;
        display: block;
        width: 100%;
        padding: 10px 20px 10px 45px;
        font-size: 16px;
        color: #555;
        font-weight: 400;
    }

    .s002 input, .s002 select{
        border-right: 1px solid #ddd!important;
        padding: 10px 20px 10px 25px!important;
        height: 45px!important;
    }
    .s002 form .inner-form .input-field{
        border-right: unset!important;
        padding: unset!important;
    }
    .s002 form .inner-form .input-field .icon-wrap{
        top: 10px;
        width: 22px;

    }
    .s002 form .btn-search{
        height: 70px;
        width: 100%;
        /*background: #b78a62;*/
        white-space: nowrap;
        border-radius: .5px;
        font-size: 20px;
        color: #fff;
        transition: all .2s ease-out, color .2s ease-out;
        border: 0;
        cursor: pointer;
        font-weight: 400;
        font-family: 'Poppins', sans-serif;
        background-color: #d94148;
    }
    .s002 form .inner-form {
        background: rgba(0, 0, 0, 0.2);
    }
    .search-btn-container{
        margin-top: 26px;
    }
    .s002 form .btn-search{
        height: 45px!important;
        padding: 8px 10px!important;
    }
    /*.s002 form .inner-form .input-field{
        min-width: 130px!important;
        max-width: 190px!important;
    }*/
</style>
<!--Sub Header End-->
<!--Main Content Start-->
<div class="main-content">
    <!--Events Start-->
    <div class="events-wrapper">
        <div class="container">
            <div class="row">



                <div class="col-md-12">

                    <div class="s002">
                        <form>
                            <div class="inner-form">
                                <div class="input-field col-md-2 col-sm-3 col-xs-6">
                                    <label for="" style="">Année</label>
                                    <select class="form-control" name="" style="">
                                        <option>Choisir</option>
                                        <option>2009</option>
                                        <option>2010</option>
                                        <option>2011</option>
                                        <option>2012</option>
                                        <option>2013</option>
                                    </select>
                                </div>
                                <div class="input-field col-md-2 col-sm-3 col-xs-6">
                                    <label for="" style="">Secteur</label>
                                    <select class="form-control" name="">
                                        <option selected="" disabled="">Choisir ...</option>
                                        <option value="1">Pauvreté</option>
                                        <option value="2">Rural</option>
                                        <option value="3">Industrie et Commerce</option>
                                        <option value="4">Services</option>
                                        <option value="5">Eau et Électricité </option>
                                        <option value="6">Mines</option>
                                        <option value="7">Infrastructures</option>
                                        <option value="8">Artisanat et Tourisme</option>
                                        <option value="9">Santé</option>
                                        <option value="10">Éducation</option>
                                        <option value="11">Habitat</option>
                                        <option value="12">Environnement</option>
                                        <option value="13">Autres Secteurs Sociaux</option>
                                        <option value="14">Administration</option>
                                    </select>
                                </div>

                                <div class="input-field col-md-2 col-sm-3 col-xs-6">
                                    <label for="" style="">Thématique</label>
                                    <select class="form-control" name="">
                                        <option selected="" disabled="">Choisir ...</option>
                                        <option value="1">Aucune</option>
                                        <option value="2">Droits humains</option>
                                        <option value="3">Équité</option>
                                        <option value="4">Genre</option>
                                        <option value="5">Environnement</option>
                                    </select>
                                </div><div class="input-field col-md-2 col-sm-3 col-xs-6">
                                    <label for="" style="">Temporalité</label>
                                    <select class="form-control" name="">
                                        <option selected="" disabled="">Choisir ...</option>
                                        <option value="0">Ex-ante</option>
                                        <option value="1">Mi-parcours</option>
                                        <option value="2">Finale</option>
                                        <option value="3">Ex-post</option>
                                    </select>
                                </div>
                                <div class="input-field col-md-2 col-sm-3 col-xs-6">
                                    <label for="" style="">Autorité contractante</label>
                                    <select class="form-control" name="" style="">
                                        <option>Choisir</option>
                                        <option>AKASI</option>
                                        <option>AKASI</option>
                                        <option>AKASI</option>
                                        <option>AKASI</option>
                                    </select>
                                </div>
                                <div class="input-field col-md-2 col-sm-3 col-xs-6">
                                    <label for="" style="">Mot clé</label>

                                    <input class="" id="" type="text" placeholder="Saisir mot clé" />
                                </div>
                                <div class="input-field  search-btn-container">
                                    <button class="btn-search" type="button"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="city-updates">
                        <ul class="eval-ul">
                            <li>
                                <div class="row">
                                    <div class="container eval-list-container">
                                        <div>
                                            <label class="checkbox-container">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="eval-list-content">
                                            <h5 ><a href="#">Stratégie de Croissance pour la Réduction de la Pauvreté (SCRP 2011-2015) Stratégie de Croissance pour la Réducti</a></h5>
                                            <!--<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et </p>-->
                                            <div class="eval-list-btns-container">
                                                <span class="post-date"><i class="far fa-calendar-alt"></i> 01 Novembre, 2019</span>
                                                <span class="eval-list-btns">
                                                   <a style="" class="see-more" href="#"> <i class="fa fa-eye"></i> | Lire</a>
                                                <a class="see-more" href="#"> <i class="fa fa-download"></i> | Télécharger</a>
                                                <div class="btn-group share-post no-float">
                                                   <a class="see-more" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-share" style="margin-right: 5px"></i> | Partager</a>
                                                   <ul class="dropdown-menu">
                                                      <li><a href="#" class="fb"><i class="fab fa-facebook-f"></i></a></li>
                                                      <li><a href="#" class="whats"><i class="fab fa-whatsapp"></i></a></li>
                                                      <li><a href="#" class="tw"><i class="fab fa-twitter"></i></a></li>
                                                      <li><a href="#" class="linken"><i class="fab fa-linkedin-in"></i></a></li>
                                                   </ul>
                                                </div>
                                                </span>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </li>
                        </ul>
                        <ul class="eval-ul">
                            <li>
                                <div class="row">
                                    <div class="container eval-list-container">
                                        <div>
                                            <label class="checkbox-container">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="eval-list-content">
                                            <h5 ><a href="#">Stratégie de Croissance pour la Réduction de la Pauvreté (SCRP 2011-2015) Stratégie de Croissance pour la Réducti</a></h5>
                                            <!--<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et </p>-->
                                            <div class="eval-list-btns-container">
                                                <span class="post-date"><i class="far fa-calendar-alt"></i> 01 Novembre, 2019</span>
                                                <span class="eval-list-btns">
                                                   <a style="" class="see-more" href="#"> <i class="fa fa-eye"></i> | Lire</a>
                                                <a class="see-more" href="#"> <i class="fa fa-download"></i> | Télécharger</a>
                                                <div class="btn-group share-post no-float">
                                                   <a class="see-more" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-share" style="margin-right: 5px"></i> | Partager</a>
                                                   <ul class="dropdown-menu">
                                                      <li><a href="#" class="fb"><i class="fab fa-facebook-f"></i></a></li>
                                                      <li><a href="#" class="whats"><i class="fab fa-whatsapp"></i></a></li>
                                                      <li><a href="#" class="tw"><i class="fab fa-twitter"></i></a></li>
                                                      <li><a href="#" class="linken"><i class="fab fa-linkedin-in"></i></a></li>
                                                   </ul>
                                                </div>
                                                </span>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </li>
                        </ul>
                        <ul class="eval-ul">
                            <li>
                                <div class="row">
                                    <div class="container eval-list-container">
                                        <div>
                                            <label class="checkbox-container">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="eval-list-content">
                                            <h5 ><a href="#">Stratégie de Croissance pour la Réduction de la Pauvreté (SCRP 2011-2015) Stratégie de Croissance pour la Réducti</a></h5>
                                            <!--<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et </p>-->
                                            <div class="eval-list-btns-container">
                                                <span class="post-date"><i class="far fa-calendar-alt"></i> 01 Novembre, 2019</span>
                                                <span class="eval-list-btns">
                                                   <a style="" class="see-more" href="#"> <i class="fa fa-eye"></i> | Lire</a>
                                                <a class="see-more" href="#"> <i class="fa fa-download"></i> | Télécharger</a>
                                                <div class="btn-group share-post no-float">
                                                   <a class="see-more" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-share" style="margin-right: 5px"></i> | Partager</a>
                                                   <ul class="dropdown-menu">
                                                      <li><a href="#" class="fb"><i class="fab fa-facebook-f"></i></a></li>
                                                      <li><a href="#" class="whats"><i class="fab fa-whatsapp"></i></a></li>
                                                      <li><a href="#" class="tw"><i class="fab fa-twitter"></i></a></li>
                                                      <li><a href="#" class="linken"><i class="fab fa-linkedin-in"></i></a></li>
                                                   </ul>
                                                </div>
                                                </span>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </li>
                        </ul>
                        <ul class="eval-ul">
                            <li>
                                <div class="row">
                                    <div class="container eval-list-container">
                                        <div>
                                            <label class="checkbox-container">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="eval-list-content">
                                            <h5 ><a href="#">Stratégie de Croissance pour la Réduction de la Pauvreté (SCRP 2011-2015) Stratégie de Croissance pour la Réducti</a></h5>
                                            <!--<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et </p>-->
                                            <div class="eval-list-btns-container">
                                                <span class="post-date"><i class="far fa-calendar-alt"></i> 01 Novembre, 2019</span>
                                                <span class="eval-list-btns">
                                                   <a style="" class="see-more" href="#"> <i class="fa fa-eye"></i> | Lire</a>
                                                <a class="see-more" href="#"> <i class="fa fa-download"></i> | Télécharger</a>
                                                <div class="btn-group share-post no-float">
                                                   <a class="see-more" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-share" style="margin-right: 5px"></i> | Partager</a>
                                                   <ul class="dropdown-menu">
                                                      <li><a href="#" class="fb"><i class="fab fa-facebook-f"></i></a></li>
                                                      <li><a href="#" class="whats"><i class="fab fa-whatsapp"></i></a></li>
                                                      <li><a href="#" class="tw"><i class="fab fa-twitter"></i></a></li>
                                                      <li><a href="#" class="linken"><i class="fab fa-linkedin-in"></i></a></li>
                                                   </ul>
                                                </div>
                                                </span>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </li>
                        </ul>
                        <ul class="eval-ul">
                            <li>
                                <div class="row">
                                    <div class="container eval-list-container">
                                        <div>
                                            <label class="checkbox-container">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="eval-list-content">
                                            <h5 ><a href="#">Stratégie de Croissance pour la Réduction de la Pauvreté (SCRP 2011-2015) Stratégie de Croissance pour la Réducti</a></h5>
                                            <!--<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et </p>-->
                                            <div class="eval-list-btns-container">
                                                <span class="post-date"><i class="far fa-calendar-alt"></i> 01 Novembre, 2019</span>
                                                <span class="eval-list-btns">
                                                   <a style="" class="see-more" href="#"> <i class="fa fa-eye"></i> | Lire</a>
                                                <a class="see-more" href="#"> <i class="fa fa-download"></i> | Télécharger</a>
                                                <div class="btn-group share-post no-float">
                                                   <a class="see-more" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-share" style="margin-right: 5px"></i> | Partager</a>
                                                   <ul class="dropdown-menu">
                                                      <li><a href="#" class="fb"><i class="fab fa-facebook-f"></i></a></li>
                                                      <li><a href="#" class="whats"><i class="fab fa-whatsapp"></i></a></li>
                                                      <li><a href="#" class="tw"><i class="fab fa-twitter"></i></a></li>
                                                      <li><a href="#" class="linken"><i class="fab fa-linkedin-in"></i></a></li>
                                                   </ul>
                                                </div>
                                                </span>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </li>
                        </ul>
                        <ul class="eval-ul">
                            <li>
                                <div class="row">
                                    <div class="container eval-list-container">
                                        <div>
                                            <label class="checkbox-container">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="eval-list-content">
                                            <h5 ><a href="#">Stratégie de Croissance pour la Réduction de la Pauvreté (SCRP 2011-2015) Stratégie de Croissance pour la Réducti</a></h5>
                                            <!--<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et </p>-->
                                            <div class="eval-list-btns-container">
                                                <span class="post-date"><i class="far fa-calendar-alt"></i> 01 Novembre, 2019</span>
                                                <span class="eval-list-btns">
                                                   <a style="" class="see-more" href="#"> <i class="fa fa-eye"></i> | Lire</a>
                                                <a class="see-more" href="#"> <i class="fa fa-download"></i> | Télécharger</a>
                                                <div class="btn-group share-post no-float">
                                                   <a class="see-more" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-share" style="margin-right: 5px"></i> | Partager</a>
                                                   <ul class="dropdown-menu">
                                                      <li><a href="#" class="fb"><i class="fab fa-facebook-f"></i></a></li>
                                                      <li><a href="#" class="whats"><i class="fab fa-whatsapp"></i></a></li>
                                                      <li><a href="#" class="tw"><i class="fab fa-twitter"></i></a></li>
                                                      <li><a href="#" class="linken"><i class="fab fa-linkedin-in"></i></a></li>
                                                   </ul>
                                                </div>
                                                </span>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </li>
                        </ul>
                        <ul class="eval-ul">
                            <li>
                                <div class="row">
                                    <div class="container eval-list-container">
                                        <div>
                                            <label class="checkbox-container">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="eval-list-content">
                                            <h5 ><a href="#">Stratégie de Croissance pour la Réduction de la Pauvreté (SCRP 2011-2015) Stratégie de Croissance pour la Réducti</a></h5>
                                            <!--<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et </p>-->
                                            <div class="eval-list-btns-container">
                                                <span class="post-date"><i class="far fa-calendar-alt"></i> 01 Novembre, 2019</span>
                                                <span class="eval-list-btns">
                                                   <a style="" class="see-more" href="#"> <i class="fa fa-eye"></i> | Lire</a>
                                                <a class="see-more" href="#"> <i class="fa fa-download"></i> | Télécharger</a>
                                                <div class="btn-group share-post no-float">
                                                   <a class="see-more" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-share" style="margin-right: 5px"></i> | Partager</a>
                                                   <ul class="dropdown-menu">
                                                      <li><a href="#" class="fb"><i class="fab fa-facebook-f"></i></a></li>
                                                      <li><a href="#" class="whats"><i class="fab fa-whatsapp"></i></a></li>
                                                      <li><a href="#" class="tw"><i class="fab fa-twitter"></i></a></li>
                                                      <li><a href="#" class="linken"><i class="fab fa-linkedin-in"></i></a></li>
                                                   </ul>
                                                </div>
                                                </span>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="site-pagination">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li> <a href="#" aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a> </li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li> <a href="#" aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a> </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--Events End-->
</div>
