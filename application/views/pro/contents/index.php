<div class="main-content">
    <?php getAdminBreadcrump([
        'title'=>$pageTitle,
    ]) ?>
    <div class="card">
        <div class="card-body">
            <h4><?= $pageTitle ?></h4>
            <p>Le formulaire ci-dessous permet de modifier le contenu générale du portail web publique
            </p>
            <div class="m-t-25">
                <?= form_open('', [
                    'id' => 'form-validation'
                ]) ?>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <?php
                            echo form_label($title = "Couleur principale du site", $id = 'site_main_color');
                            echo form_input([
                                'name' => $name = "content[$id]",
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
                            echo form_label($title = "Couleur secondaire du site", $id = 'site_secondary_color');
                            echo form_input([
                                'name' => $name = "content[$id]",
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
                            <?php getFormSubmit('Modifier', 'pull-right') ?>
                        </div>
                        
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