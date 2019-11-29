<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 28/11/2019
 * Time: 08:52
 */
?>
<div class="main-content">
    <?php getAdminBreadcrump([
        'title' => $pageTitle,
    ]);
    ?>
    <div class="card">
        <div class="card-body">
            <h4><?= $pageTitle ?></h4>
            <p>Trouvez ici le formulaire de modification de vos informations personnes et de votre mot de passe</p>
            <div class="m-t-25">

                <div class="row">

                    <div class="col-md-6 my-account-border-right">
                        <?= form_open_multipart('', [
                            //'id' => 'form-validation'
                        ]) ?>
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Modifier Informations personnelles</h5>
                            </div>
                            <div class="form-group col-md-12">
                                <?php
                                echo form_label($title = "Nom", $id = 'last_name');
                                echo form_input([
                                    'name' => $name = "user[$id]",
                                    'class' => 'form-control',
                                    'placeholder' => $title,
                                    'id' => $id,
                                    'required' => '',
                                    'value' => set_value($name, maybe_null_or_empty($user, $id), false)
                                ]);
                                echo get_form_error($name);
                                ?>
                            </div>
                            <div class="form-group col-md-12">
                                <?php
                                echo form_label($title = "Prénom(s)", $id = 'first_name');
                                echo form_input([
                                    'name' => $name = "user[$id]",
                                    'class' => 'form-control',
                                    'placeholder' => $title,
                                    'id' => $id,
                                    'required' => '',
                                    'value' => set_value($name, maybe_null_or_empty($user, $id), false)
                                ]);
                                echo get_form_error($name);
                                ?>
                            </div>
                            <div class="form-group col-md-12">
                                <?php
                                echo form_label($title = "Email", $id = 'email');
                                echo form_input([
                                    'name' => $name = "user[$id]",
                                    'class' => 'form-control',
                                    'placeholder' => $title,
                                    'id' => $id,
                                    'disabled' => '',
                                    //'required' => '',
                                    'value' => set_value($name, maybe_null_or_empty($user, $id), false)
                                ]);
                                ?>
                            </div>
                            <div class="form-group col-md-12 ">
                                <?php echo form_label($title = "Photo de profil");
                                $file = set_value($name = 'user[user_photo]', maybe_null_or_empty($user, 'user_photo', true));
                                ?>
                                <a class="my-file-preview-btn"
                                   data-toggle="tooltip" <?= $file ? '' : 'style="display:none;"' ?>
                                   data-placement="top" title="Visualiser la photo" target="_blank"
                                   href="<?= $file ? $uploadPath . $file : '#' ?>"> <span
                                            class="anticon anticon-cloud-upload"></span></a>
                                <?php
                                $data = [
                                    'name' => '',
                                    'attributes' => [
                                        'data-target' => 'user_photo',
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
                                get_form_upload($data, $extensions = 'jpg jpeg png', '1M', false, 'auto-upload');
                                echo get_form_error($name);
                                getFieldInfo('Format : JPG | JPEG | PNG Taille Max : 1M');
                                ?>
                            </div>
                            <div class="form-group col-md-12">
                                <?php getFormSubmit('Modifier', 'pull-right') ?>
                            </div>
                        </div>
                        <?= form_close() ?>
                    </div>


                    <div class="col-md-6 my-account-border-right">
                        <?= form_open('', [
                            //'id' => 'form-validation'
                        ]) ?>
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Modifier Mot de passe</h5>
                            </div>
                            <div class="form-group col-md-12">
                                <?php
                                echo form_label($title = "Mot de passe actuel", $id = 'actual');
                                echo form_password([
                                    'name' => $name = "password[$id]",
                                    'class' => 'form-control',
                                    'placeholder' => $title,
                                    'id' => $id,
                                    'required' => '',
                                    'value' => ''
                                ]);
                                echo get_form_error($name);
                                ?>
                            </div>
                            <div class="form-group col-md-12">
                                <?php
                                echo form_label($title = "Nouveau mot de passe", $id = 'new');
                                echo form_password([
                                    'name' => $name = "password[$id]",
                                    'class' => 'form-control',
                                    'placeholder' => $title,
                                    'id' => $id,
                                    'required' => '',
                                    'value' => ''
                                ]);
                                echo get_form_error($name);
                                ?>
                            </div>
                            <div class="form-group col-md-12">
                                <?php
                                echo form_label($title = "Confirmer mot de passe", $id = 'confirm');
                                echo form_password([
                                    'name' => $name = "password[$id]",
                                    'class' => 'form-control',
                                    'placeholder' => $title,
                                    'id' => $id,
                                    'required' => '',
                                    'value' => ''
                                ]);
                                echo get_form_error($name);
                                ?>
                            </div>
                            <div class="form-group col-md-12">
                                <?php getFormSubmit('Modifier', 'pull-right') ?>
                            </div>
                        </div>
                        <?= form_close() ?>
                    </div>

                </div>


                <script>
                    var validationRules = {}
                </script>
            </div>
        </div>
    </div>

</div>
