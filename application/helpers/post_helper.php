<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 26/11/2019
 * Time: 08:11
 */


function setPostValidation($edit = false, $postID = '')
{
    $ci = &get_instance();
    if ($post = $ci->input->post('post')) {
        setFormValidationRules([
            [
                'name' => 'post[title]',
                'label' => "Titre de l'article",
                'rules' => 'trim|required'
            ],
            [
                'name' => 'post[content]',
                'label' => "Contenu de l'article",
                'rules' => 'trim|required'
            ],
            [
                'name' => 'post[category_id]',
                'label' => "Catégorie de l'article",
                'rules' => 'trim|required|is_natural_no_zero'
            ],
            [
                'name' => 'post[tag_id][]',
                'label' => "Etiquette de l'article",
                'rules' => 'trim'
            ],
            [
                'name' => 'post[thumbnail]',
                'label' => "Image A la une de l'article",
                'rules' => 'trim|required'
            ],

        ]);
        if($ci->form_validation->run()){
            if ($ci->post_model->insertOrUpdatePost($post, $postID)) {
                get_success_message('Article ' . ($edit ? 'modifié' : 'ajouté') . ' avec succès');
                pro_redirect('posts');
            } else {
                get_warning_message("Une erreur s'est produite <br> Veuillez recommencer");
            }
        }else{
            get_error_message();
        }
    }
}

function setPostCategoryValidation($edit = false, $categoryID = '')
{
    $tables = getPostTablesNames();
    $ci =& get_instance();
    if ($category = $ci->input->post('category')) {
        setFormValidationRules([
            [
                'name' => 'category[name]',
                'label' => "Titre de la catégorie",
                'rules' => 'trim|required|' . $edit ? "callback_is_unique_on_update[$tables->categories.name.$categoryID]" : "is_unique[$tables->categories.name]"
            ],
            [
                'name' => 'category[description]',
                'label' => "Description de la catégorie d'article",
                'rules' => 'trim|required'
            ],
        ]);
        if ($ci->form_validation->run()) {
            if (!$edit) {
                $category['slug'] = getSlugifyString($category['name'], true, true) . uniqid();
            }
            $ci->post_model->insertorUpdateCategory($category, $categoryID);
            get_success_message("Catégorie d'articles " . ($edit ? 'modifiée' : 'ajoutée') . ' avec succès');
            pro_redirect("posts/categories");
        } else {
            get_error_message();
        }
    }
}

function setPostTagValidation($edit = false, $tagID = '')
{
    $tables = getPostTablesNames();
    $ci =& get_instance();
    if ($tag = $ci->input->post('tag')) {
        setFormValidationRules([
            [
                'name' => 'tag[name]',
                'label' => "Titre",
                'rules' => 'trim|required|' . $edit ? "callback_is_unique_on_update[$tables->tags.name.$tagID]" : "is_unique[$tables->tags.name]"
            ],
            [
                'name' => 'tag[description]',
                'label' => "Description de l'étiquette d'article",
                'rules' => 'trim|required'
            ],
        ]);
        if ($ci->form_validation->run()) {
            if (!$edit) {
                $tag['slug'] = getSlugifyString($tag['name'], true, true) . uniqid();
            }
            $ci->post_model->insertorUpdateTag($tag, $tagID);
            get_success_message("Etiquette d'articles " . ($edit ? 'modifié' : 'ajouté') . ' avec succès');
            pro_redirect("posts/tags");
        } else {
            get_error_message();
        }
    }
}

function getAddOrEditCategoryHTML($edit = false, $category = [], $pageTitle)
{
    ?>
    <div class="card">
        <div class="card-body">
            <h4><?= $pageTitle ?></h4>
            <p>Trouvez ici le formulaire de remplissage des catégories d'articles de la plateforme</p>
            <div class="m-t-25">
                <?= form_open('', [
                    'id' => 'form-validation'
                ]) ?>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <?php
                            echo form_label($title = "Titre de la catégorie", $id = 'name');
                            echo form_input([
                                'name' => $name = "category[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                                'value' => set_value($name, maybe_null_or_empty($category, $id), false)
                            ]);
                            echo get_form_error($name);
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label($title = "Description de la catégorie", $id = 'description');
                            echo form_textarea([
                                'name' => $name = "category[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                                'rows' => 2,
                                'value' => set_value($name, maybe_null_or_empty($category, $id), false)
                            ]);
                            echo get_form_error($name)
                            ?>
                        </div>

                        <?php getAllFormButtons($edit, pro_url('posts/categories')) ?>
                    </div>
                </div>


                <?= form_close() ?>
                <script>
                    var validationRules = {
                        'category[name]': 'required',
                        'category[description]': 'required',
                    }
                </script>
            </div>
        </div>
    </div>
    <?php
}

function getAddOrEditPostHTML($edit = false, $post = [], $categories, $tags, $categoryAjaxForm, $tagAjaxForm, $uploadPath, $pageTitle)
{
    ?>
    <div class="card">
        <div class="card-body">
            <h4><?= $pageTitle ?></h4>
            <!--            <p>Trouvez ici le formulaire de remplissage des catégories d'articles de la plateforme</p>-->
            <div class="m-t-25">
                <?= form_open('', [
                    'id' => 'form-validation'
                ]) ?>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <?php
                            echo form_label($title = "Titre de l'article", $id = 'title');
                            echo form_input([
                                'name' => $name = "post[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                                'value' => set_value($name, maybe_null_or_empty($post, $id), false)
                            ]);
                            echo get_form_error($name);
                            ?>
                        </div>
                        <div class="form-group text-area">
                            <?= form_label("Contenu", $id = 'content') ?>
                            <?= form_textarea([
                                'name' => $name = "post[$id]",
                                'class' => 'my-summernote',
                                'required' => '',
                                'id' => $id,
                                'data-summernote-height' => 210,
                                'value' => set_value($name, maybe_null_or_empty($post, $id), false)
                            ]) ?>
                            <?= get_form_error($name) ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="input-group with-add-btn ">
                                <?php
                                echo form_label($title = "Classer sous", $id = 'category_id');
                                ?>
                                <div class="input-group-container">
                                    <?php
                                    echo form_dropdown($name = 'post[category_id]', $categories, set_value($name, maybe_null_or_empty($post, $id)), [
                                        'class' => 'select2',
                                        'id' => $id,
                                        'required' => ''
                                    ]);
                                    ?>
                                    <div class="input-group-append">
                                        <button type="button" data-toggle="modal"
                                                data-target="#post-category"
                                                class="input-group-text btn btn-primary my-additional-add-btn">
                                            <i
                                                    class="anticon anticon-plus"></i></button>
                                    </div>
                                    <?php
                                    echo get_form_error($name)
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group with-add-btn ">
                                <?php
                                echo form_label($title = "Etiquetté sous", $id = 'tag_id');
                                ?>
                                <div class="input-group-container">
                                    <?php
                                    echo form_dropdown($name = 'post[tag_id][]', $tags, set_value($name, maybe_null_or_empty($post, $id)), [
                                        'class' => 'select2',
                                        //'required' => '',
                                        'id' => $id,
                                        'multiple' => 'multiple',
                                    ]);
                                    ?>
                                    <div class="input-group-append">
                                        <button type="button" data-toggle="modal"
                                                data-target="#post-tag"
                                                class="input-group-text btn btn-primary my-additional-add-btn">
                                            <i
                                                    class="anticon anticon-plus"></i></button>
                                    </div>
                                    <?php
                                    echo get_form_error($name)
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo form_label($title = "Attacher image à la une de l'article");
                            $file = set_value($name = 'post[thumbnail]', maybe_null_or_empty($post, 'thumbnail', true));
                            ?>
                            <a class="my-file-preview-btn"
                               data-toggle="tooltip" <?= $file ? '' : 'style="display:none;"' ?>
                               data-placement="top" title="Visualiser l'image" target="_blank"
                               href="<?= $file ? $uploadPath . $file : '#' ?>"> <span
                                        class="anticon anticon-cloud-upload"></span></a>
                            <?php
                            $data = [
                                'name' => '',
                                'attributes' => [
                                    'data-target' => 'thumbnail',
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
                            getFieldInfo('Format : JPG | JPEG | PNG Taille Max : 1M');
                            ?>
                        </div>
                    </div>

                </div>
                <?php getAllFormButtons($edit, pro_url('posts')) ?>


                <?= form_close() ?>
                <script>
                    var validationRules = {}
                </script>
            </div>
        </div>
    </div>
    <?php
    echo $categoryAjaxForm;
    echo $tagAjaxForm;

    ?>
    <?php
}

function getAddOrEditTagHTML($edit = false, $tag = [], $pageTitle)
{
    ?>
    <div class="card">
        <div class="card-body">
            <h4><?= $pageTitle ?></h4>
            <p>Trouvez ici le formulaire de remplissage des étiquettes d'articles de la plateforme</p>
            <div class="m-t-25">
                <?= form_open('', [
                    'id' => 'form-validation'
                ]) ?>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <?php
                            echo form_label($title = "Titre de l'étiquette", $id = 'name');
                            echo form_input([
                                'name' => $name = "tag[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                                'value' => set_value($name, maybe_null_or_empty($tag, $id), false)
                            ]);
                            echo get_form_error($name);
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label($title = "Description de l'étiquette", $id = 'description');
                            echo form_textarea([
                                'name' => $name = "tag[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                                'rows' => 2,
                                'value' => set_value($name, maybe_null_or_empty($tag, $id), false)
                            ]);
                            echo get_form_error($name)
                            ?>
                        </div>

                        <?php getAllFormButtons($edit, pro_url('posts/tags')) ?>
                    </div>
                </div>


                <?= form_close() ?>
                <script>
                    var validationRules = {
                        'tag[name]': 'required',
                        'tag[description]': 'required',
                    }
                </script>
            </div>
        </div>
    </div>
    <?php
}

function getAjaxifyPostCategoryForm()
{
    ob_start();
    ?>
    <div class="modal fade" id="post-category">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <?= form_open('', [
                    'class' => 'myAjaxifyModalForm',
                    'data-caller' => 'addPostCategory',
                    'return-select-caller-id' => 'category_id'
                ]) ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter catégorie d'article</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row modal-body-container">
                        <div class="form-group col-md-12">
                            <?php
                            echo form_label($title = "Titre de la catégorie", $id = 'name');
                            echo form_input([
                                'name' => $name = "category[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                            ]);
                            echo get_form_error($name);
                            ?>
                        </div>
                        <div class="form-group col-md-12">
                            <?php
                            echo form_label($title = "Description de la catégorie", $id = 'description');
                            echo form_textarea([
                                'name' => $name = "category[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                                'rows' => 2,
                            ]);
                            echo get_form_error($name)
                            ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">
                        <span>Ajouter</span>
                        <i class="anticon anticon-loading m-l-5"></i>
                    </button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

function getAjaxifyPostTagForm()
{
    ob_start();
    ?>
    <div class="modal fade" id="post-tag">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <?= form_open('', [
                    'class' => 'myAjaxifyModalForm',
                    'data-caller' => 'addPostTag',
                    'return-select-caller-id' => 'tag_id'
                ]) ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter étiquette d'article</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row modal-body-container">
                        <div class="form-group col-md-12">
                            <?php
                            echo form_label($title = "Titre de l'étiquette", $id = 'name');
                            echo form_input([
                                'name' => $name = "tag[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                            ]);
                            echo get_form_error($name);
                            ?>
                        </div>
                        <div class="form-group col-md-12">
                            <?php
                            echo form_label($title = "Description de l'étiquette", $id = 'description');
                            echo form_textarea([
                                'name' => $name = "tag[$id]",
                                'class' => 'form-control',
                                'placeholder' => $title,
                                'id' => $id,
                                'required' => '',
                                'rows' => 2,
                            ]);
                            echo get_form_error($name)
                            ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">
                        <span>Ajouter</span>
                        <i class="anticon anticon-loading m-l-5"></i>
                    </button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}