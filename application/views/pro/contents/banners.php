<div class="main-content">
    <?php getAdminBreadcrump([
        'title'=>$pageTitle,
    ]) ?>
    <div class="card">
        <div class="card-body">
            <h4><?= $pageTitle ?></h4>
            <p>Le formulaire ci-dessous permet de modifier les bannières présentes sur le portail web publique
            </p>
            <div class="m-t-25">
                <?= form_open_multipart('', [
                    'id' => 'form-validation'
                ]) ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <?php echo form_label($title="Attacher la bannière de la page d'accueil");
                            $target ='home_banner';
                            $file = set_value($name="banners[$target]", maybe_null_or_empty($options, $target, true));
                            ?>
                            <a class="my-file-preview-btn"
                               data-toggle="tooltip" <?= $file ? '' : 'style="display:none;"' ?>
                               data-placement="top" title="Visualiser la bannière" target="_blank"
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
                            getFieldInfo('Dimensions recommandées : 1024x649 Format : JPG|PNG|JPEG Taille Max : 1M');
                            ?>
                        </div>
                        <div class="form-group ">
                            <?php echo form_label($title="Attacher la bannière des pages articles");
                            $target ='post_banner';
                            $file = set_value($name="banners[$target]", maybe_null_or_empty($options, $target, true));
                            ?>
                            <a class="my-file-preview-btn"
                               data-toggle="tooltip" <?= $file ? '' : 'style="display:none;"' ?>
                               data-placement="top" title="Visualiser la bannière" target="_blank"
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
                            getFieldInfo('Dimensions recommandées : 1024x649 Format : JPG|PNG|JPEG Taille Max : 1M');
                            ?>
                        </div>
                        <div class="form-group ">
                            <?php echo form_label($title="Attacher la bannière de la page contact");
                            $target ='contact_banner';
                            $file = set_value($name="banners[$target]", maybe_null_or_empty($options, $target, true));
                            ?>
                            <a class="my-file-preview-btn"
                               data-toggle="tooltip" <?= $file ? '' : 'style="display:none;"' ?>
                               data-placement="top" title="Visualiser la bannière" target="_blank"
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
                            getFieldInfo('Dimensions recommandées : 1024x649 Format : JPG|PNG|JPEG Taille Max : 1M');
                            ?>
                        </div>


                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo form_label($title="Attacher la bannière des pages d'évaluations");
                            $target ='evaluation_banner';
                            $file = set_value($name="banners[$target]", maybe_null_or_empty($options, $target, true));
                            ?>
                            <a class="my-file-preview-btn"
                               data-toggle="tooltip" <?= $file ? '' : 'style="display:none;"' ?>
                               data-placement="top" title="Visualiser la bannière" target="_blank"
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
                            getFieldInfo('Dimensions recommandées : 1024x649 Format : JPG|PNG|JPEG Taille Max : 1M');
                            ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_label($title="Attacher la bannière des pages évenements");
                            $target ='event_banner';
                            $file = set_value($name="banners[$target]", maybe_null_or_empty($options, $target, true));
                            ?>
                            <a class="my-file-preview-btn"
                               data-toggle="tooltip" <?= $file ? '' : 'style="display:none;"' ?>
                               data-placement="top" title="Visualiser la bannière" target="_blank"
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
                            getFieldInfo('Dimensions recommandées : 1024x649 Format : JPG|PNG|JPEG Taille Max : 1M');
                            ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_label($title="Attacher la bannière des autres pages");
                            $target ='other_banner';
                            $file = set_value($name="banners[$target]", maybe_null_or_empty($options, $target, true));
                            ?>
                            <a class="my-file-preview-btn"
                               data-toggle="tooltip" <?= $file ? '' : 'style="display:none;"' ?>
                               data-placement="top" title="Visualiser la bannière" target="_blank"
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
                            getFieldInfo('Dimensions recommandées : 1024x649 Format : JPG|PNG|JPEG Taille Max : 1M');
                            ?>
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
    var validationRules = {

    }
</script>