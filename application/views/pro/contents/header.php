<div class="main-content">
    <?php getAdminBreadcrump([
        'title' => $pageTitle,
    ]) ?>
    <div class="card">
        <div class="card-body">
            <h4><?= $pageTitle ?></h4>
            <p>Le formulaire ci-dessous permet de modifier le contenu de l'entête sur le portail web publique
            </p>
            <div class="m-t-25">
                <?= form_open('', [
                    'id' => 'form-validation'
                ]) ?>
                <div class="row">
                    <div class="col-md-6">
                        <!--                        <h4>Liens Réseaux sociaux</h4>-->
                        <div class="form-group">
                            <?php
                            echo form_label($title = "Numéro de téléphone principal", $id = 'site_phone');
                            echo form_input([
                                'name' => $name = "header[$id]",
                                'placeholder' => $title,
                                'class' => 'form-control',
                                'id' => $id,
                                'required' => '',
                                'value' => set_value($name, maybe_null_or_empty($options, $id), false)
                            ]);
                            echo get_form_error($name);
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label($title = "Email principal", $id = 'site_email');
                            echo form_input([
                                'name' => $name = "header[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                                'value' => set_value($name, maybe_null_or_empty($options, $id), false)
                            ]);
                            echo get_form_error($name);
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label($title = "Rubriques d'article à aficher", $id = 'site_header_post_cat_submenu');
                            echo form_dropdown($name = "header[$id][]", $postSectors, set_value($name, maybe_null_or_empty($options, $id)), [
                                'class' => 'select2',
                                'required' => '',
                                'id' => $id,
                                'multiple' => 'multiple',
                            ]);
                            echo get_form_error($name);
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4>Menu Coin Supérieur Gauche</h4>
                        <?php
                        $topHeaderLinks = set_value('top_header_links', maybe_null_or_empty($options, 'top_header_links', true), false);
                        $topHeaderLinksNotEmpty = !empty($topHeaderLinks);
                        ?>
                        <div class="my-recommendation-repeater <?= $topHeaderLinksNotEmpty ? 'not-empty' : '' ?>"
                             delete-message="Etes-vous sûr de vouloir supprimer ce lien">
                            <!--                                    TODO first recommendation empty-->
                            <div class="accordion" data-repeater-list="header[top_header_links]" id="accordion-default">
                                <div class="form-group col-md-12 button-container">
                                    <button title="Ajouter nouveau lien" type="button"
                                            data-repeater-create
                                            class="btn btn-primary mail-open-compose real-btn-primary">
                                        <i class="anticon anticon-plus"></i>
                                        <span class="m-l-5">Ajouter nouveau lien</span>
                                        <span class="badge badge-indicator badge-danger my-repeater-badge"><?= $topHeaderLinksNotEmpty ? count($topHeaderLinks) : 1 ?></span>
                                    </button>
                                </div>
                                <?php
                                //Default first one
                                getTopHeaderMenuRepeater([], 'first-one', ($topHeaderLinksNotEmpty ? 'ignore-completely' : ''), $topHeaderLinksNotEmpty);
                                if ($topHeaderLinksNotEmpty) {
                                    foreach ($topHeaderLinks as $key => $topHeaderLink) {
                                        getTopHeaderMenuRepeater($topHeaderLink, '', '', false, $key + 1);
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