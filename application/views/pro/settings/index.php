<div class="main-content">
    <?php getAdminBreadcrump([
        'title'=>$pageTitle,
    ]) ?>
    <div class="card">
        <div class="card-body">
            <h4><?= $pageTitle ?></h4>
                        <p>Le formulaire ci-dessous est constitué des champs des plus critiques de la plateforme <br>
                        Veuillez bien à tous les remplir correctement
                        </p>
            <div class="m-t-25">
                <div class="row">
                    <div class="col-md-8">
                        <?= form_open_multipart('', [
                            'id' => 'form-validation'
                        ]) ?>
                        <div class="form-group">
                            <?php
                            echo form_label('Nom de la plateforme', 'siteName');
                            echo form_input([
                                'name' => 'options[siteName]',
                                'class' => 'form-control',
                                'placeholder' => 'Nom de la plateforme',
                                'id' => 'siteName',
                                'required' => '',
                                'value'=>set_value('options[siteName]', maybe_null_or_empty($options, 'siteName'))
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
                                'rows' => 3,
                                'value'=>set_value('options[siteDescription]', maybe_null_or_empty($options, 'siteDescription'))
                            ]);
                            echo form_error('options[siteDescription]')
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('ID de suivi Google Analytics', 'googleAnalyticsID');
                            echo form_input([
                                'name' => 'options[googleAnalyticsID]',
                                'class' => 'form-control',
                                'placeholder' => 'ID de suivi Google Analytics',
                                'id' => 'googleAnalyticsID',
                                'required' => '',
                                'value'=>set_value('options[googleAnalyticsID]', maybe_null_or_empty($options, 'googleAnalyticsID'))
                            ]);
                            echo form_error('options[googleAnalyticsID]')
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Clé Publique Google Recaptcha', 'googleRecaptchaPublicKey');
                            echo form_input([
                                'name' => 'options[googleRecaptchaPublicKey]',
                                'class' => 'form-control',
                                'placeholder' => 'Clé Publique Google Recaptcha de la plateforme',
                                'id' => 'googleRecaptchaPublicKey',
                                'required' => '',
                                'value'=>set_value('options[googleRecaptchaPublicKey]', maybe_null_or_empty($options, 'googleRecaptchaPublicKey'))
                            ]);
                            echo form_error('options[googleRecaptchaPublicKey]')
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Clé Privée Google Recaptcha', 'googleRecaptchaSecretKey');
                            echo form_input([
                                'name' => 'options[googleRecaptchaSecretKey]',
                                'class' => 'form-control',
                                'placeholder' => 'Clé Privée Google Recaptcha de la plateforme',
                                'id' => 'googleRecaptchaSecretKey',
                                'required' => '',
                                'value'=>set_value('options[googleRecaptchaSecretKey]', maybe_null_or_empty($options, 'googleRecaptchaSecretKey'))
                            ]);
                            echo form_error('options[googleRecaptchaSecretKey]')
                            ?>
                        </div>


                        <div class="form-group">
                            <?php echo form_label("Attacher le logo de la plateforme ");
                            $file = set_value('options[siteLogo]', maybe_null_or_empty($options, 'siteLogo', true));
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
                                    'data-target' => 'siteLogo',
                                    'data-target-name' => 'options[siteLogo]',
                                ],
                                'title' => "Attacher le logo de la plateforme",
                            ];
                            if ($file) {
                                $data['value'] = $uploadPath . $file;
                            } else {
                                $data['value'] = '';
                            }
                            echo form_hidden('options[siteLogo]', set_value('options[siteLogo]', $file));
                            get_form_upload($data, $extensions = 'jpg jpeg png', '1M', true, 'auto-upload ignore');
                            echo get_form_error('options[siteLogo]');
                            getFieldInfo('Dimensions recommandées : 345x120 Format : JPG|PNG|JPEG Taille Max : 1M');
                            ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_label("Attacher le favicon de la plateforme ");
                            $file = set_value($fieldName='options[siteFavicon]', maybe_null_or_empty($options, 'siteFavicon', true));
                            ?>
                            <a class="my-file-preview-btn"
                               data-toggle="tooltip" <?= $file ? '' : 'style="display:none;"' ?>
                               data-placement="top" title="Visualiser le favicon" target="_blank"
                               href="<?= $file ? $uploadPath . $file : '#' ?>"> <span
                                        class="anticon anticon-cloud-upload"></span></a>
                            <?php
                            $data = [
                                'name' => '',
                                'attributes' => [
                                    'data-target' => 'siteFavicon',
                                    'data-target-name' => $fieldName,
                                ],
                                'title' => "Attacher le favicon de la plateforme",
                            ];
                            if ($file) {
                                $data['value'] = $uploadPath . $file;
                            } else {
                                $data['value'] = '';
                            }
                            echo form_hidden($fieldName, set_value($fieldName, $file));
                            get_form_upload($data, $extensions = 'jpg jpeg png', '1M', true, 'auto-upload ignore');
                            echo get_form_error($fieldName);
                            getFieldInfo('Dimensions recommandées : 150x150 Format : JPG|PNG|JPEG Taille Max : 1M');
                            ?>
                        </div>
                        <div class="form-group">
                            <?php echo form_label("Attacher avatar utilisateur par défaut");
                            $file = set_value($fieldName='options[siteDefaultAvatar]', maybe_null_or_empty($options, 'siteDefaultAvatar', true));
                            ?>
                            <a class="my-file-preview-btn"
                               data-toggle="tooltip" <?= $file ? '' : 'style="display:none;"' ?>
                               data-placement="top" title="Visualiser l'avatar par defaut" target="_blank"
                               href="<?= $file ? $uploadPath . $file : '#' ?>"> <span
                                        class="anticon anticon-cloud-upload"></span></a>
                            <?php
                            $data = [
                                'name' => '',
                                'attributes' => [
                                    'data-target' => 'siteDefaultAvatar',
                                    'data-target-name' => $fieldName,
                                ],
                                'title' => "Attacher avatar utilisateur par défaut",
                            ];
                            if ($file) {
                                $data['value'] = $uploadPath . $file;
                            } else {
                                $data['value'] = '';
                            }
                            echo form_hidden($fieldName, set_value($fieldName, $file));
                            get_form_upload($data, $extensions = 'jpg jpeg png', '1M', true, 'auto-upload ignore');
                            echo get_form_error($fieldName);
                            getFieldInfo('Dimensions recommandées : 150x150 Format : JPG|PNG|JPEG Taille Max : 1M');
                            ?>
                        </div>


                        <div class="form-group">
                            <?php getFormSubmit('Modifier') ?>
                        </div>
                        <?= form_close() ?>
                        <script>
                            var validationRules = {
                                'options[siteName]': 'required',
                                'options[siteDescription]': 'required',
                                'options[googleRecaptchaPublicKey]': 'required',
                                'options[googleRecaptchaSecretKey]': 'required',
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>