<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 02/11/2019
 * Time: 09:40
 */

getBreadcrump([
    'title' => $pageTitle
], $options, 'post')
?>
<!--Sub Header End-->
<!--Main Content Start-->
<div class="main-content p80">
    <!--Events Start-->
    <div class="news-wrapper news-full">
        <div class="row">
            <div class="container">
                <?php
                if (!empty($posts)) {
                    ?>
                    <div class="col-md-9 col-sm-8">
                        <!--News Full Start-->
                        <div class="row mobile-container">
                            <!--News Box Start-->
                            <?php
                            $perLine = 3;
                            $total = count($posts) - 1;
                            foreach ($posts as $key => $post) {
                                if ($perLine && $total) {
                                    if ($key % $perLine == 0) {
                                        echo '<div class="row">';
                                    }
                                }
                                getPostTemplatePreview($post, $options, 'col-md-4 col-sm-6 mt-auto');
                                if ($perLine && $key && $total) {
                                    if (($key + 1) % $perLine == 0 || $key == $total) {
                                        echo '</div>';
                                    }
                                }
                            }
                            ?>
                        </div>
                        <div class="row">
                            <div class="site-pagination">
                                <nav aria-label="Page navigation">
                                    <?= $links ?>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="col-md-9 col-sm-8">
                        <h4 class="sorry-no-content">Désolé, aucun contenu trouvé</h4>
                    </div>
                    <?php
                }
                ?>
                <?php $this->load->view('public/blog/sidebar'); ?>
            </div>
        </div>
    </div>
    <!--Events End-->
</div>
