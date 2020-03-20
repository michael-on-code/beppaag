<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 06/11/2019
 * Time: 12:21
 */
?>
<div class="col-md-3 col-sm-4">
    <div class="sidebar">
        <?php
        if (!empty($categories)) {
            ?>
            <div class="widget">
                <h4>Nos Rubriques</h4>
                <div class="categories inner">
                    <ul>
                        <?php
                        foreach ($categories as $category) {
                            ?>
                            <li>
                                <a href="<?= site_url('articles/categorie/' . $category['slug']) ?>"><?= $category['name'] ?></a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <?php
        }
        if (!empty($latestPosts)) {
            ?>
            <div class="widget">
                <h4>Actualités récentes</h4>
                <div class="recent-posts inner">
                    <ul>
                        <?php
                        foreach ($latestPosts as $post) {
                            ?>
                            <li><img data-src="<?= getUploadedImageBySize($post['thumbnail'], '82x75') ?>"
                                     alt="<?= $post['title'] ?>">
                                <strong><?= getFullDateInFrench($post['created_at'], getRegularDateTimeFormat()) ?></strong>
                                <h6><a data-toggle="tooltip" title="<?= $post['title'] ?>"
                                       href="<?= getPermalink($post['id']) ?>"><?= myWordLimiter($post['title'], 7) ?></a>
                                </h6>
                            </li>
                            <?php
                        }

                        ?>
                    </ul>
                </div>
            </div>
            <?php
        }
        if (!empty($latestEvents)) {
            ?>
            <div class="widget">
                <h4>Evènements</h4>
                <div class="upcoming-events inner">
                    <ul>
                        <?php
                        foreach ($latestEvents as $event) {
                            $dateArray = [];
                            if ($startdate = convert_date_to_french(maybe_null_or_empty($event, 'starts_at', true))) {
                                $dateArray = getFullDateInFrench($startdate, 'd/m/Y', true);
                            }
                            ?>
                            <li>
                                <?php
                                if(!empty($dateArray)){
                                    ?>
                                    <div class="edate">
                                        <strong><?= maybe_null_or_empty($dateArray, 'd') ?></strong> <?= substr(maybe_null_or_empty($dateArray, 'm'), 0, 4) ?>
                                        <span class="year"><?= maybe_null_or_empty($dateArray, 'Y') ?></span>
                                    </div>
                                    <?php
                                }

                                ?>

                                <h6><a data-toggle="tooltip" title="<?= $event['title'] ?>" href="<?= getPermalink($event['id'], 'events') ?>"><?= myWordLimiter($event['title'], 6) ?></a>
                                </h6>
                                <span class="loc"><i class="fas fa-map-marker-alt"></i> <?= $event['location'] ?></span>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <?php
        }
        if (!empty($tags)) {
            ?>
            <div class="widget">
                <h4>Etiquettes</h4>
                <div class="tags-widget inner">
                    <?php
                    foreach ($tags as $tag) {
                        ?> <a href="<?= site_url('articles/etiquette/'.$tag['slug']) ?>"><?= $tag['name'] ?></a><?php
                    }
                    ?>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
