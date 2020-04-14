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

function getTeamRepeater($team = [], $additionalClassToParent = '', $additionalClassToFields = '', $uploadPath)
{
	?>
	<div class="col-md-4 repeater-item <?= $additionalClassToParent ?>" data-repeater-item>
		<button title="Supprimer membre de l'équipe" type="button" data-repeater-delete
				class="btn btn-danger btn-rounded">
			<i class="anticon anticon-delete"></i>
		</button>
		<div class="form-group">
			<?php
			echo form_label($title = 'Nom complet du membre', $id = 'fullname');
			echo form_input([
				'name' => $id,
				'class' => "form-control $additionalClassToFields",
				'required' => '',
				'placeholder'=>$title,
				'value' => maybe_null_or_empty($team, $id)
			]);
			?>
		</div>
		<div class="form-group">
			<?php
			echo form_label($title = 'Fonction', $id = 'role');
			echo form_input([
				'name' => $id,
				'class' => "form-control $additionalClassToFields",
				'required' => '',
				'placeholder'=>$title,
				'value' => maybe_null_or_empty($team, $id)
			]);
			?>
		</div>
		<div class="form-group">
			<?php
			echo form_label($title = 'Bio', $id = 'bio');
			echo form_textarea([
				'name' => $id,
				'class' => "form-control $additionalClassToFields",
				'required' => '',
				'placeholder'=>$title,
				'rows'=>4,
				'value' => maybe_null_or_empty($team, $id)
			]);
			?>
		</div>
		<div class="form-group">
			<?php
			echo form_label($title = 'URL Facebook', $id = 'facebook_url');
			echo form_input([
				'name' => $id,
				'class' => "form-control $additionalClassToFields",
				'type' => 'url',
				'placeholder'=>$title,
				'value' => maybe_null_or_empty($team, $id)
			]);
			?>
		</div>
		<div class="form-group">
			<?php
			echo form_label($title = 'URL Twitter', $id = 'twitter_url');
			echo form_input([
				'name' => $id,
				'class' => "form-control $additionalClassToFields",
				'type' => 'url',
				'placeholder'=>$title,
				'value' => maybe_null_or_empty($team, $id)
			]);
			?>
		</div>
		<div class="form-group">
			<?php
			echo form_label($title = 'URL LinkedIn', $id = 'linkedin_url');
			echo form_input([
				'name' => $id,
				'class' => "form-control $additionalClassToFields",
				'type' => 'url',
				'placeholder'=>$title,
				'value' => maybe_null_or_empty($team, $id)
			]);
			?>
		</div>
		<div class="form-group">
			<?php echo form_label($title="Attacher photo du membre");
			$target ='photo';
			$file = set_value($name="$target", maybe_null_or_empty($team, $target, true));
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
			get_form_upload($data, $extensions = 'jpg jpeg png', '1M', true, 'auto-upload ignore');
			echo get_form_error($name);
			getFieldInfo('Dimensions recommandées : 360x420 Format : JPG|PNG|JPEG Taille Max : 1M');
			?>
		</div>

	</div>
	<?php
}
function getTopHeaderMenuRepeater($topHeaderLinks = [], $additionalClassToParent = '', $additionalClassToFields = '', $previousFooterLinkExist = false, $key = 0)
{
    ?>
    <div class="card <?= $additionalClassToParent ?>" data-repeater-item>
        <div class="card-header">
            <h5 class="card-title">
                <a data-toggle="collapse" href="#collapseDefault-<?= $key ?>">
                    <span class="collapse-identifier">#</span>
                    <span class="collapse-header-seperator"> - </span>
                    <span class="collapse-header-text"><?= myWordLimiter(maybe_null_or_empty($topHeaderLinks, 'label'), 15) ?></span>
                </a>
            </h5>
            <button title="Supprimer le lien" type="button" data-repeater-delete
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
                        echo form_label($title = 'Libellé du lien');
                        echo form_input([
                            'name' => 'label',
                            'class' => "form-control my-recommendation-title $additionalClassToFields",
                            'placeholder' => $title,
                            'required' => '',
                            'value' => maybe_null_or_empty($topHeaderLinks, 'label')
                        ])
                        ?>
                    </div>
                    <div class="form-group col-md-12">
                        <?php
                        echo form_label($title = 'URL du lien');
                        echo form_input([
                            'name' => 'url',
                            'class' => "form-control $additionalClassToFields",
                            'placeholder' => $title,
                            'required' => '',
                            'type' => 'url',
                            'value' => maybe_null_or_empty($topHeaderLinks, 'url')
                        ])
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php
}


function getContactInfoRepeater($contactInfos = [], $additionalClassToParent = '', $additionalClassToFields = '', $previousFooterLinkExist = false, $key = 0)
{
    ?>
    <div class="card <?= $additionalClassToParent ?>" data-repeater-item>
        <div class="card-header">
            <h5 class="card-title">
                <a data-toggle="collapse" href="#collapseDefault-<?= $key ?>">
                    <span class="collapse-identifier">#</span>
                    <span class="collapse-header-seperator"> - </span>
                    <span class="collapse-header-text"><?= myWordLimiter(maybe_null_or_empty($contactInfos, 'label'), 15) ?></span>
                </a>
            </h5>
            <button title="Supprimer la rubrique" type="button" data-repeater-delete
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
                        echo form_label($title = 'Libellé de la rubrique');
                        echo form_input([
                            'name' => 'label',
                            'class' => "form-control my-recommendation-title $additionalClassToFields",
                            'placeholder' => $title,
                            'required' => '',
                            'value' => maybe_null_or_empty($contactInfos, 'label')
                        ])
                        ?>
                    </div>
                    <div class="form-group col-md-12">
                        <?php
                        echo form_label($title = 'Téléphone');
                        echo form_input([
                            'name' => 'phone',
                            'class' => "form-control $additionalClassToFields",
                            'placeholder' => $title,
                            'required' => '',
                            'value' => maybe_null_or_empty($contactInfos, 'phone')
                        ])
                        ?>
                    </div>
                    <div class="form-group col-md-12">
                        <?php
                        echo form_label($title = 'Adresse');
                        echo form_input([
                            'name' => 'adress',
                            'class' => "form-control $additionalClassToFields",
                            'placeholder' => $title,
                            'required' => '',
                            'value' => maybe_null_or_empty($contactInfos, 'adress')
                        ])
                        ?>
                    </div>
                    <div class="form-group col-md-12">
                        <?php
                        echo form_label($title = 'Email');
                        echo form_input([
                            'name' => 'email',
                            'class' => "form-control $additionalClassToFields",
                            'placeholder' => $title,
                            'required' => '',
                            'type' => 'email',
                            'value' => maybe_null_or_empty($contactInfos, 'email')
                        ])
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php
}

function getTeamMemberRepeater($teamMember = [], $additionalClassToParent = '', $additionalClassToFields = '', $previousFooterLinkExist = false, $key = 0)
{
    ?>
    <div class="card <?= $additionalClassToParent ?>" data-repeater-item>
        <div class="card-header">
            <h5 class="card-title">
                <a data-toggle="collapse" href="#collapseDefault-<?= $key ?>">
                    <span class="collapse-identifier">#</span>
                    <span class="collapse-header-seperator"> - </span>
                    <span class="collapse-header-text"><?= myWordLimiter(maybe_null_or_empty($teamMember, 'name'), 4) ?></span>
                </a>
            </h5>
            <button title="Supprimer le membre" type="button" data-repeater-delete
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
                        echo form_label($title = 'Nom complet');
                        echo form_input([
                            'name' => 'name',
                            'class' => "form-control my-recommendation-title $additionalClassToFields",
                            'placeholder' => $title,
                            'required' => '',
                            'value' => maybe_null_or_empty($teamMember, 'name')
                        ])
                        ?>
                    </div>
                    <div class="form-group col-md-12">
                        <?php
                        echo form_label($title = 'Rôle');
                        echo form_input([
                            'name' => 'role',
                            'class' => "form-control $additionalClassToFields",
                            'placeholder' => $title,
                            'required' => '',
                            'value' => maybe_null_or_empty($teamMember, 'role')
                        ])
                        ?>
                    </div>
                    <div class="form-group col-md-12">
                        <?php
                        echo form_label($title = 'Description');
                        echo form_textarea([
                            'name' => 'description',
                            'class' => "form-control $additionalClassToFields",
                            'placeholder' => $title,
                            'required' => '',
                            'rows'=>3,
                            'value' => maybe_null_or_empty($teamMember, 'description')
                        ])
                        ?>
                    </div>
					<div class="form-group col-md-12">
						<?php echo form_label($title="Attacher la photo du membre");
						$target ='photo';
						$file = set_value($name="$target", maybe_null_or_empty($teamMember, $target, true));
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
						getFieldInfo('Dimensions recommandées : 445x520 Format : JPG|PNG|JPEG Taille Max : 1M');
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
