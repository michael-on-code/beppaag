<div class="main-content">
    <?php getAdminBreadcrump([
        'title' => $pageTitle,
    ]) ?>
    <div class="card">
        <div class="card-body">
            <h4><?= $pageTitle ?></h4>
            <p>Le formulaire ci-dessous permet de modifier le contenu general de la page de Contact
            </p>
            <div class="m-t-25">
                <?= form_open('', [
                    'id' => 'form-validation'
                ]) ?>
                <div class="row">
                    <div class="col-md-6">
                        <h4>Informatons de contacts</h4>
                        <?php
                        $contactInfos = set_value('contact_infos', maybe_null_or_empty($options, 'contact_infos', true), false);
                        $contactInfosNotEmpty = !empty($contactInfos);
                        ?>
                        <div class="my-recommendation-repeater <?= $contactInfosNotEmpty ? 'not-empty' : '' ?>"
                             delete-message="Etes-vous sûr de vouloir supprimer cette rubrique de contact">
                            <!--                                    TODO first recommendation empty-->
                            <div class="accordion" data-repeater-list="contact[contact_infos]" id="accordion-default">
                                <div class="form-group col-md-12 button-container">
                                    <button title="Ajouter nouvelle rubrique de contact" type="button"
                                            data-repeater-create
                                            class="btn btn-primary mail-open-compose real-btn-primary">
                                        <i class="anticon anticon-plus"></i>
                                        <span class="m-l-5">Ajouter nouvelle rubrique</span>
                                        <span class="badge badge-indicator badge-danger my-repeater-badge"><?= $contactInfosNotEmpty ? count($contactInfos) : 1 ?></span>
                                    </button>
                                </div>
                                <?php
                                //Default first one
                                getContactInfoRepeater([], 'first-one', ($contactInfosNotEmpty ? 'ignore-completely' : ''), $contactInfosNotEmpty);
                                if ($contactInfosNotEmpty) {
                                    foreach ($contactInfos as $key => $contactInfo) {
                                        getContactInfoRepeater($contactInfo, '', '', false, $key + 1);
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!--                        <h4>Liens Réseaux sociaux</h4>-->
                        <div class="form-group">
                            <?php
                            echo form_label($title = "Destinataire du formulaire de contact", $id = 'contact_form_receiver');
                            echo form_input([
                                'name' => $name = "contact[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'type' => 'email',
                                'required' => '',
                                'value' => set_value($name, maybe_null_or_empty($options, $id), false)
                            ]);
                            echo get_form_error($name);
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label($title = "Code HTML Iframe Google Maps", $id = 'contact_google_map_iframe_html');
                            echo form_textarea([
                                'name' => $name = "contact[$id]",
                                'placeholder' => $title,
                                'id' => $id,
                                'class' => 'form-control',
                                'required' => '',
                                'rows' => 4,
                                'value' => set_value($name, maybe_null_or_empty($options, $id), false)
                            ]);
                            echo get_form_error($name);
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
    var validationRules = {}
</script>