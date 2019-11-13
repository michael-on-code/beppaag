<div class="main-content">
    <div class="page-header">
        <h2 class="header-title"><?= $pageTitle ?></h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="<?= pro_url() ?>" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Tableau de
                    bord</a>
                <span class="breadcrumb-item active"><?= $pageTitle ?></span>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4><?= $pageTitle ?></h4>
            <!--            <p>Les paramètres globaux de la plateforme</p>-->
            <div class="m-t-25">
                <div class="row">
                    <div class="col-md-8">
                        <?= form_open_multipart('', [
                                'id'=>'form-validation'
                        ]) ?>
                        <div class="form-group">
                            <?php
                            echo form_label('Nom de la plateforme', 'siteName');
                            echo form_input([
                                'name' => 'options[siteName]',
                                'class' => 'form-control',
                                'placeholder' => 'Nom de la plateforme',
                                'id' => 'siteName',
                                'required' => ''
                            ]);
                            echo form_error('options[siteName]')
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Description globale de la plateforme', 'siteDescription');
                            echo form_textarea([
                                'name' => 'options[siteDescription]',
                                'class' => 'form-control',
                                'placeholder' => 'Description globale de la plateforme',
                                'id' => 'siteDescription',
                                'required' => '',
                                'rows' => 3
                            ]);
                            echo form_error('options[siteDescription]')
                            ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_label("Attacher le logo de la plateforme ");
                            $file = set_value('options[siteLogo]', maybe_null_or_empty($options, 'siteLogo', true));
                            ?>
                            <a class="my-file-preview-btn" data-toggle="tooltip" <?= $file ? '' : 'style="display:none;"' ?>
                               data-placement="top" title="Visualiser le logo" target="_blank"
                               href="<?= $file ?  $uploadPath . $file : '#' ?>"> <span class="anticon anticon-cloud-upload"></span></a>
                            <?php
                            $data = [
                                'name' => '',
                                'attributes' => [
                                    'data-target' => 'siteLogo',
                                    'data-target-name' => 'options[siteLogo]',
                                ],
                                'title' => "Attacher le logo de la plateforme",
                            ];
                            if ($file) {
                                $data['value'] = $uploadPath . $file;
                            } else {
                                $data['value'] ='';
                            }
                            echo form_hidden('options[siteLogo]', set_value('options[siteLogo]', $file));
                            get_form_upload($data, $extensions = 'jpg jpeg png', '1M', true, 'auto-upload ignore');
                            echo get_form_error('options[siteLogo]');
                            getFieldInfo('Format : JPG|PNG|JPEG Taille Max : 1M');
                            ?>
                        </div>

                        <div class="form-group">
                            <?php getFormSubmit('Modifier') ?>
                        </div>
                        <?= form_close() ?>
                        <script>
                            var validationRules = {
                                'options[siteName]': 'required',
                                'options[siteDescription]':'required'
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>