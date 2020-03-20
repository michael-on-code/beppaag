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
                        <div class="event-thumb new-thumb"> <span
                                    class="cat c<?= rand(1, 4) ?>"><?= $event['category'] ?></span><img data-src="<?= getUploadedImageBySize($event['thumbnail'], '848x420')?>" alt="<?= $event['title'] ?>"> </div>
                        <!--Counter-->
                        <?php
                        $contentClass='mg-t-50';
                        $dateArray=[];
                        if(isset($event['starts_at']) && $event['starts_at'] && $event['starts_at']!=''){
                            if(strtotime($event['starts_at']) > time()){
                                $contentClass='';
                                $dateArray = getFullDateInFrench($event['starts_at'], getRegularDateTimeFormat(), true, false, true);
                                ?>
                                <div class="event-counter">
                                    <ul>
                                        <li class="first-col"><strong>Evènement commence dans :</strong>
                                        </li>
                                        <li class="snd-col">
                                            <!--Note: JavaScript counts months from 0 to 11.
                                            January is 0. December is 11.-->
                                            <div id="defaultCountdown" data-date-year="<?= $dateArray['Y'] ?>"
                                                 data-date-month="<?= ((int) $dateArray['m'])-1 ?>" data-date-day="<?= $dateArray['d'] ?>"
                                                 data-date-hour="<?= $dateArray['G'] ?>" data-date-minute="<?= $dateArray['i'] ?>"></div>
                                        </li>
                                        <!--                                <li class="trd-col"> <a href="#">Participate Now</a> </li>-->
                                    </ul>
                                </div>
                                <?php
                            }
                        }
                        ?>
                        <div class="event-content <?= $contentClass ?>">
                            <!--Date and Share Start-->
                            <div class="event-date-share">
                                <?php
                                if(maybe_null_or_empty($event, 'starts_at')){
                                    $dateArray = getFullDateInFrench($event['starts_at'], getRegularDateTimeFormat(), true, true);
                                    ?>
                                    <div class="edate"> <strong><?= $dateArray['d'] ?></strong> <?= substr($dateArray['m'], 0, 4) ?> <span class="year"><?= $dateArray['Y'] ?></span> </div>
                                    <?php
                                }
                                ?>
                                <div class="event-share">
                                    <ul>
                                        <li><a class="like" href="#"><i class="fas fa-share-alt"></i> <!--2k--></a></li>
                                        <li><a class="fb" <?= getSharerAttributes($permalink=getPermalink($event['id'], 'events'), '') ?>><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a class="whats" <?= getSharerAttributes($permalink, '', 'whatsapp') ?>><i class="fab fa-whatsapp"></i></a></li>
                                        <li><a class="tw" <?= getSharerAttributes($permalink, $event['title'], 'twitter') ?>><i class="fab fa-twitter"></i></a></li>
                                        <li><a class="in" <?= getSharerAttributes($permalink, '', 'linkedin') ?>><i class="fab fa-linkedin-in"></i></a></li>
<!--                                        <li><a href="#"><i class="fas fa-ellipsis-h"></i></a></li>-->
                                    </ul>
                                </div>
                            </div>
                            <!--Date and Share End-->
                            <div class="etext">
                                <ul class="emeta">
<!--                                    <li><strong>Heures :</strong> 11H30  -- 13H30</li>-->
<!--                                    <li><strong>Attending:</strong> 613</li>-->
                                    <?php
                                    if(maybe_null_or_empty($event, 'location')){
                                        ?>
                                        <li><strong>Lieu :</strong>  <?= $event['location'] ?></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                                <?= $event['content'] ?>
                                <?php
                                if($tags = maybe_null_or_empty($event, 'tag_id', true)){
                                    ?>
                                    <div class="single-post-tags">
                                        <?php
                                        foreach ($tags as $tag) {
                                            ?> <a href="<?= site_url('evenements/etiquette/'.$tag['slug']) ?>"><?= $tag['name'] ?></a> <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                }
                                if(!empty($relatedEvents)){
                                    ?>
                                    <div class="related-posts">
                                        <h3 class="stitle">Evènements liés</h3>
                                        <div class="row">
                                            <ul>
                                                <?php
                                                foreach ($relatedEvents as $relatedEvent){
                                                    ?>
                                                    <li class="col-md-4 col-sm-4">
                                                        <div class="rel-box">
                                                            <h6><a href="<?= getPermalink($relatedEvent['id'], 'events') ?>"><?= $relatedEvent['title'] ?></a></h6>
                                                            <ul class="news-meta">
                                                                <li><?= getFullDateInFrench($relatedEvent['starts_at'], getRegularDateTimeFormat()) ?></li>
                                                            </ul>
                                                        </div>
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
                            </div>
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
