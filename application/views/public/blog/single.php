<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 06/11/2019
 * Time: 15:46
 */
getBreadcrump([
    'title' => $pageTitle,
    'before' => [
        [
            'title' => 'Blog',
            'url' => site_url('blog')
        ]
    ]
], $options, 'post')
?>
<div class="main-content p80">
    <!--News Details Page Start-->
    <div class="news-details">
        <div class="container">
            <div class="row">
                <!--Content Col Start-->
                <div class="col-md-9">
                    <div class="news-box">
                        <div class="new-thumb"><a href="#"><i class="fas fa-link"></i></a> <span
                                    class="cat c<?= rand(1, 4) ?>"><?= $post['category'] ?></span>
                            <img data-src="<?= getUploadedImageBySize($post['thumbnail'], '900x420')?>" alt="<?= $post['title'] ?>">
                        </div>
                        <div class="new-txt">
                            <div class="row">
                                <div class="col-xs-10">
                                    <ul class="news-meta">
                                        <li><?= getFullDateInFrench($post['created_at'], getRegularDateTimeFormat()) ?></li>
                                    </ul>
                                </div>
                                <div class="col-xs-2">
                                    <div class="btn-group share-post">
                                        <button type="button" class="dropdown-toggle" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"><i
                                                    class="fas fa-share-alt"></i> Partager
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" class="fb"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#" class="whats"><i class="fab fa-whatsapp"></i></a></li>
                                            <li><a href="#" class="tw"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#" class="linken"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <h4><?= $post['title'] ?></h4>
                            <?= $post['content'] ?>
                            <?php
                            if($tags = maybe_null_or_empty($post, 'tag_id', true)){
                                ?>
                                <div class="single-post-tags">
                                    <?php
                                    foreach ($tags as $tag) {
                                        ?> <a href="<?= site_url('blog/tag/'.$tag['slug']) ?>"><?= $tag['name'] ?></a> <?php
                                    }
                                    ?>
                                </div>
                                <?php
                            }
                            if(!empty($relatedPosts)){
                                ?>
                                <div class="related-posts">
                                    <h3 class="stitle">Articles liés</h3>
                                    <div class="row">
                                        <ul>
                                            <?php
                                            foreach ($relatedPosts as $relatedPost){
                                                ?>
                                                <li class="col-md-4 col-sm-4">
                                                    <div class="rel-box">
                                                        <h6><a href="<?= site_url('blog/'.$relatedPost['slug']) ?>"><?= $relatedPost['title'] ?></a></h6>
                                                        <ul class="news-meta">
                                                            <li><?= getFullDateInFrench($relatedPost['created_at'], getRegularDateTimeFormat()) ?></li>
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
