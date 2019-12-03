<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 02/12/2019
 * Time: 06:26
 */
function getFooterRepeater($footerLink = [], $additionalClassToParent = '', $additionalClassToFields = '', $previousFooterLinkExist = false, $key = 0)
{
    ?>
    <div class="card <?= $additionalClassToParent ?>" data-repeater-item>
        <div class="card-header">
            <h5 class="card-title">
                <a data-toggle="collapse" href="#collapseDefault-<?= $key ?>">
                    <span class="collapse-identifier">#</span>
                    <span class="collapse-header-seperator"> - </span>
                    <span class="collapse-header-text"><?= myWordLimiter(maybe_null_or_empty($footerLink, 'label'), 15) ?></span>
                </a>
            </h5>
            <button title="Supprimer ensemble de lien" type="button" data-repeater-delete
                    class="btn btn-danger btn-rounded">
                <i class="anticon anticon-delete"></i>
            </button>
        </div>
        <div id="collapseDefault-<?= $key ?>" class="collapse"
             data-parent="#accordion-default">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <?php
                        echo form_label($title = 'Libellé du menu');
                        echo form_input([
                            'name' => 'label',
                            'class' => "form-control my-recommendation-title $additionalClassToFields",
                            'placeholder' => $title,
                            'required' => '',
                            'rows' => 2,
                            'value' => maybe_null_or_empty($footerLink, 'label')
                        ])
                        ?>
                    </div>

                </div>

                <?php
                $subLinks = maybe_null_or_empty($footerLink, 'links', true);
                //var_dump($activities);
                $footerLinkNotEmpty = !empty($footerLink);
                $subLinksNotEmpty = !empty($subLinks);
                ?>
                <div class="inner-repeater"
                     delete-message="Etes-vous sûr de vouloir les liens de ce menu">
                    <div class="row <?= $subLinksNotEmpty ? 'not-empty' : '' ?>"
                         data-repeater-list="links">
                        <div class="form-group col-md-12 button-container">
                            <button title="Ajouter nouvelle activité" type="button"
                                    data-repeater-create
                                    class="btn btn-primary mail-open-compose real-btn-primary">
                                <i class="anticon anticon-plus"></i>
                                <span class="m-l-5">Ajouter nouveau lien</span>
                                <span class="badge badge-indicator badge-danger my-repeater-badge"><?= $subLinksNotEmpty ? count($subLinks) : ($footerLinkNotEmpty ? 0 : ($previousFooterLinkExist ? 0 : 1)) ?></span>
                            </button>
                        </div>
                        <?php
                        //Default first one
                        getFooterLinkRepeaterItem([], 'first-one', ($subLinksNotEmpty ? 'ignore-completely' : ($footerLinkNotEmpty ? '' : 'inner-repeater-ignore-completely')));
                        if ($subLinksNotEmpty) {
                            foreach ($subLinks as $link) {
                                getFooterLinkRepeaterItem($link);
                            }
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php
}

function getFooterLinkRepeaterItem($values = [], $additionalClassToParent = '', $additionalClassToFields = '')
{
    ?>
    <div class="col-md-6 repeater-item <?= $additionalClassToParent ?>" data-repeater-item>
        <button title="Supprimer liens du menu" type="button" data-repeater-delete
                class="btn btn-danger btn-rounded">
            <i class="anticon anticon-delete"></i>
        </button>
        <div class="row">
            <div class="form-group">
                <?php
                echo form_label($title = "Libellé du lien", $id = 'label');
                echo form_input([
                    'name' => $name = 'label',
                    'class' => "form-control $additionalClassToFields",
                    'placeholder' => $title,
                    //'id' => $id,
                    'required' => '',
                    'rows' => 3,
                    'value' => maybe_null_or_empty($values, 'label')
                ]);
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label($title = "URL du lien", $id = 'url');
                echo form_input([
                    'name' => $name = 'url',
                    'class' => "form-control $additionalClassToFields",
                    'placeholder' => $title,
                    //'id' => $id,
                    'required' => '',
                    'type' => 'url',
                    'value' => maybe_null_or_empty($values, 'url')
                ]);
                ?>
            </div>
        </div>


    </div>
    <?php
}