<div class="main-content">
    <?php getAdminBreadcrump([
        'title' => $pageTitle,
    ]) ?>
    <div class="card">
        <div class="card-body">
            <h4><?= $pageTitle ?></h4>
            <p>Le formulaire ci-dessous permet de modifier le contenu general du pieds de page sur le portail web publique
            </p>
            <div class="m-t-25">
                <?= form_open_multipart('', [
                    'id' => 'form-validation'
                ]) ?>
                <div class="row">
                    <div class="col-md-6">
                        <!--                        <h4>Liens Réseaux sociaux</h4>-->
                        <div class="form-group">
                            <?php
                            echo form_label($title = "Couleur arrière plan pieds de page", $id = 'footer_background_color');
                            echo form_input([
                                'name' => $name = "footer[$id]",
                                'style' => 'width:100%',
                                'placeholder' => $title,
                                'id' => $id,
                                'type' => 'color',
                                'required' => '',
                                'value' => set_value($name, maybe_null_or_empty($options, $id), false)
                            ]);
                            echo get_form_error($name);
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label($title = "URL Page Facebook", $id = 'site_facebook_url');
                            echo form_input([
                                'name' => $name = "footer[$id]",
                                'placeholder' => $title,
                                'id' => $id,
                                'type' => 'url',
                                'class' => 'form-control',
                                //'required' => '',
                                'value' => set_value($name, maybe_null_or_empty($options, $id), false)
                            ]);
                            echo get_form_error($name);
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label($title = "URL Page Twitter", $id = 'site_twitter_url');
                            echo form_input([
                                'name' => $name = "footer[$id]",
                                'placeholder' => $title,
                                'id' => $id,
                                'type' => 'url',
                                'class' => 'form-control',
                                //'required' => '',
                                'value' => set_value($name, maybe_null_or_empty($options, $id), false)
                            ]);
                            echo get_form_error($name);
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label($title = "URL Page Youtube", $id = 'site_youtube_url');
                            echo form_input([
                                'name' => $name = "footer[$id]",
                                'placeholder' => $title,
                                'id' => $id,
                                'type' => 'url',
                                'class' => 'form-control',
                                //'required' => '',
                                'value' => set_value($name, maybe_null_or_empty($options, $id), false)
                            ]);
                            echo get_form_error($name);
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label($title = "URL Page Flickr", $id = 'site_flickr_url');
                            echo form_input([
                                'name' => $name = "footer[$id]",
                                'placeholder' => $title,
                                'id' => $id,
                                'type' => 'url',
                                'class' => 'form-control',
                                //'required' => '',
                                'value' => set_value($name, maybe_null_or_empty($options, $id), false)
                            ]);
                            echo get_form_error($name);
                            ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_label($title = "Attacher le logo en pied de page");
                            $target = 'footer_logo';
                            $file = set_value($name = "footer[$target]", maybe_null_or_empty($options, $target, true));
                            ?>
                            <a class="my-file-preview-btn"
                               data-toggle="tooltip" <?= $file ? '' : 'style="display:none;"' ?>
                               data-placement="top" title="Visualiser le logo" target="_blank"
                               href="<?= $file ? $uploadPath . $file : '#' ?>"> <span
                                        class="anticon anticon-cloud-upload"></span></a>
                            <?php
                            $data = [
                                'name' => '',
                                'attributes' => [
                                    'data-target' => $target,
                                    'data-target-name' => $name,
                                ],
                                'title' => $title,
                            ];
                            if ($file) {
                                $data['value'] = $uploadPath . $file;
                            } else {
                                $data['value'] = '';
                            }
                            echo form_hidden($name, set_value($name, $file));
                            get_form_upload($data, $extensions = 'jpg jpeg png', '1M', true, 'auto-upload');
                            echo get_form_error($name);
                            getFieldInfo('Dimensions recommandées : 345x120 Format : JPG|PNG|JPEG Taille Max : 1M');
                            ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_label($title = "Attacher le logo du sponsor");
                            $target = 'sponsor_logo';
                            $file = set_value($name = "footer[$target]", maybe_null_or_empty($options, $target, true));
                            ?>
                            <a class="my-file-preview-btn"
                               data-toggle="tooltip" <?= $file ? '' : 'style="display:none;"' ?>
                               data-placement="top" title="Visualiser le logo" target="_blank"
                               href="<?= $file ? $uploadPath . $file : '#' ?>"> <span
                                        class="anticon anticon-cloud-upload"></span></a>
                            <?php
                            $data = [
                                'name' => '',
                                'attributes' => [
                                    'data-target' => $target,
                                    'data-target-name' => $name,
                                ],
                                'title' => $title,
                            ];
                            if ($file) {
                                $data['value'] = $uploadPath . $file;
                            } else {
                                $data['value'] = '';
                            }
                            echo form_hidden($name, set_value($name, $file));
                            get_form_upload($data, $extensions = 'jpg jpeg png', '1M', true, 'auto-upload');
                            echo get_form_error($name);
                            getFieldInfo('Dimensions recommandées : 345x120 Format : JPG|PNG|JPEG Taille Max : 1M');
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4>Menu du pieds de page</h4>
                        <?php
                        $footerLinks = set_value('footer_links', maybe_null_or_empty($options, 'footer_links', true), false);
                        $footerLinksNotEmpty = !empty($footerLinks);
                        ?>
                        <div class="my-recommendation-repeater <?= $footerLinksNotEmpty ? 'not-empty' : '' ?>"
                             delete-message="Etes-vous sûr de vouloir supprimer ce menu de pied de page">
                            <!--                                    TODO first recommendation empty-->
                            <div class="accordion" data-repeater-list="footer[footer_links]" id="accordion-default">
                                <div class="form-group col-md-12 button-container">
                                    <button title="Ajouter nouveau menu" type="button"
                                            data-repeater-create
                                            class="btn btn-primary mail-open-compose real-btn-primary">
                                        <i class="anticon anticon-plus"></i>
                                        <span class="m-l-5">Ajouter nouveau menu</span>
                                        <span class="badge badge-indicator badge-danger my-repeater-badge"><?= $footerLinksNotEmpty ? count($footerLinks) : 1 ?></span>
                                    </button>
                                </div>
                                <?php
                                //Default first one
                                getFooterRepeater([], 'first-one', ($footerLinksNotEmpty ? 'ignore-completely' : ''), $footerLinksNotEmpty);
                                if ($footerLinksNotEmpty) {
                                    foreach ($footerLinks as $key => $footerLink) {
                                        getFooterRepeater($footerLink, '', '', false, $key + 1);
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <?php getFormSubmit('Modifier', 'pull-right') ?>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>
<script>
    var validationRules = {}
</script>
