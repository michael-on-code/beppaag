<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 16/11/2019
 * Time: 08:58
 */
?>
<div class="main-content">
    <?php getAdminBreadcrump([
        'title' => $pageTitle,
    ]);
    ?>
    <div class="card">
        <div class="card-body">
            <h4 class="inline"><?= $pageTitle ?></h4>
            <a href="<?= pro_url('evaluations/add') ?>" class="btn btn-primary mail-open-compose real-btn-primary">
                <i class="anticon anticon-plus"></i>
                <span class="m-l-5">Ajouter</span>
            </a>
            <p>Trouvez dans le tableau ci-dessous, la liste des évaluations enregistrées en mode brouillon</p>
            <div class="m-t-25">

                <table class="table table-responsive-md table-hover wd-100p-f my-datatable">
                    <thead>
                    <tr>
                        <?php
                        foreach ($tableHeaders as $key => $header) {
                            $class = '';
                            /*if($key==0){
                                //Numero Interne
                                $class='class="min-wd-150-f"';
                            }elseif($key==1){
                                //Designation
                                $class='class="min-wd-200-f"';
                            }*/
                            ?>
                            <th <?= $class ?>><?= $header ?></th> <?php
                        }
                        ?>
                        <th class="wd-70-f text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (isset($evaluations) && !empty($evaluations)) {
                    	//var_dump($evaluations);exit();
                        foreach ($evaluations as $key => $evaluation) {
                            ?>
                            <tr>
                                <td data-toggle="tooltip" class=""
                                    data-placement="top"
                                    title="<?= $evaluation->title ?>"><?= myWordLimiter($evaluation->title, 20) ?></td>
								<td ><?= $evaluation->first_name.' '.$evaluation->last_name ?></td>
                                <td data-sort="<?= strtotime($evaluation->created_at) ?>"><?= convert_date_to_french($evaluation->created_at, getRegularDateTimeFormat(false)) ?></td>
                                <td data-sort="<?= strtotime($evaluation->updated_at) ?>"><?= convert_date_to_french($evaluation->updated_at, getRegularDateTimeFormat(false)) ?></td>
                                <td class="text-center actions-btn-container">
									<a href="<?= pro_url("evaluations/edit/$evaluation->id") ?>" data-toggle="tooltip"
									   data-placement="top" title="Modifier evaluation"
									   class="btn btn-primary btn-icon">
										<i class="anticon anticon-edit"></i>
									</a>
                                </td>
                            </tr>
                            <?php
                        }
                    } ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div>

</div>
