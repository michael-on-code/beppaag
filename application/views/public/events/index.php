<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 31/10/2019
 * Time: 14:41
 */
getBreadcrump([
        'title'=>$pageTitle
],  $options, 'event')
?>
<!--Sub Header End-->
<!--Main Content Start-->
<div class="main-content">
    <!--Events Start-->
    <div class="events-wrapper">
        <div class="container">
            <div class="row container">
                <?php
                if(!empty($events)){
                    $perLine = 3;
                    $total = count($events) - 1;
                    foreach ($events as $key=> $event){
                        if ($perLine && $total) {
                            if ($key % $perLine == 0) {
                                echo '<div class="row">';
                            }
                        }
                        getEventTemplatePreview($event, 'col-md-4 col-sm-6');
                        if ($perLine && $key && $total) {
                            if (($key + 1) % $perLine == 0 || $key == $total) {
                                echo '</div>';
                            }
                        }
                    }
                }else{
                    ?>
                    <div class="col-md-12 sorry-no-content">
                        Désolé, aucun contenu trouvé
                    </div>
                    <?php
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
    </div>
    <!--Events End-->
</div>
