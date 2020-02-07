<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 15/11/2019
 * Time: 08:29
 */


function getAdminDashboardView($assetsUrl)
{
    $ci =& get_instance();
    $totalPosts = getCountInTable('posts', true, ['active' => 1]);
    $totalEvents = getCountInTable('events', true, ['active' => 1]);
    $totalEvaluations = getCountInTable('evaluations', true, ['active' => 1]);
    $totalRecommendations = getCountInTable('recommendations',true,  ['active' => 1]);
    $totalUsers = getCountInTable('users', true, ['active' => 1]);
    $ci->load->model('recommendation_model');
    $recommendations = $ci->recommendation_model->getAll();
    $totalExecutedRecommendation = 0;
    $totalNonExecutedRecommendation = 0;
    $totalUnknownRecommendation = 0;
    $totalInProgressRecommendation = 0;
    includeChartJSAssets();
    if (!empty($recommendations)) {
        $ci->load->helper('evaluation');
        foreach ($recommendations as $recommendation) {
            $appreciation = getExecutionLevelByRecommendationsFromActivitiesArray(maybe_null_or_empty($recommendation, 'activities', true));
            switch ($appreciation) {
                case 'Exécuté':
                    $totalExecutedRecommendation++;
                    break;
                case 'En cours':
                    $totalInProgressRecommendation++;
                    break;
                case 'Inconnu':
                    $totalUnknownRecommendation++;
                    break;
                default :
                    $totalNonExecutedRecommendation++;
                    break;

            }
        }
    }
    ob_start();
    ?>
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="card dashboard-stats">
                <div class="card-body">
                    <div class=" media align-items-center">
                        <img src="<?= $assetsUrl ?>public/images/report-symbol.png" alt="">
                        <div class="m-l-15">
                            <h2 class="m-b-0"><?= addZeroBeforeNumber($totalEvaluations) ?></h2>
                            <p class="m-b-0 text-muted">Evaluations publiées</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card dashboard-stats">
                <div class="card-body">
                    <div class="media align-items-center">
                        <img src="<?= $assetsUrl ?>public/images/users.png" alt="">
                        <div class="m-l-15">
                            <h2 class="m-b-0"><?= addZeroBeforeNumber($totalUsers) ?></h2>
                            <p class="m-b-0 text-muted">Utilisateurs actifs</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card dashboard-stats">
                <div class="card-body">
                    <div class="media align-items-center">
                        <img src="<?= $assetsUrl ?>public/images/calendar.png" alt="">
                        <div class="m-l-15">
                            <h2 class="m-b-0"><?= addZeroBeforeNumber($totalEvents) ?></h2>
                            <p class="m-b-0 text-muted">Evènements publiés</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card dashboard-stats">
                <div class="card-body">
                    <div class="media align-items-center">
                        <img src="<?= $assetsUrl ?>public/images/brochure.png" alt="">
                        <div class="m-l-15">
                            <h2 class="m-b-0"><?= addZeroBeforeNumber($totalPosts) ?></h2>
                            <p class="m-b-0 text-muted">Articles publiés</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--
        <div class="col-md-6 col-lg-3">
            <div class="card dashboard-stats">
                <div class="card-body">
                    <div class="media align-items-center">
                        <img src="<?/*= $assetsUrl */?>public/images/recommendation.png" alt="">
                        <div class="m-l-15">
                            <h2 class="m-b-0"><?/*= addZeroBeforeNumber($totalRecommendations) */?></h2>
                            <p class="m-b-0 text-muted">Recommendations</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card dashboard-stats">
                <div class="card-body">
                    <div class="media align-items-center">
                        <img src="<?/*= $assetsUrl */?>public/images/checked.png" alt="">
                        <div class="m-l-15">
                            <h2 class="m-b-0"><?/*= addZeroBeforeNumber($totalExecutedRecommendation) */?></h2>
                            <p class="m-b-0 text-muted">Recommendations exécutées</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card dashboard-stats">
                <div class="card-body">
                    <div class="media align-items-center">
                        <img src="<?/*= $assetsUrl */?>public/images/progress.png" alt="">
                        <div class="m-l-15">
                            <h2 class="m-b-0"><?/*= addZeroBeforeNumber($totalInProgressRecommendation) */?></h2>
                            <p class="m-b-0 text-muted">Recommendations en cours</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card dashboard-stats">
                <div class="card-body">
                    <div class="media align-items-center">
                        <img src="<?/*= $assetsUrl */?>public/images/warning.png" alt="">
                        <div class="m-l-15">
                            <h2 class="m-b-0"><?/*= addZeroBeforeNumber($totalNonExecutedRecommendation+$totalUnknownRecommendation) */?></h2>
                            <p class="m-b-0 text-muted">Recommendations non exécutées</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
-->

    </div>
    <div class="row">
        <!--<div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <canvas id="myChart" width="400" height="400"></canvas>
                    <script>
                        var ctx = document.getElementById('myChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                datasets: [{
                                    label: '# of Votes',
                                    data: [12, 19, 3, 5, 2, 3],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
                </div>
            </div>
        </div>-->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <canvas id="myChart2" width="400" height="400"></canvas>
                    <script>
                        var ctx = document.getElementById('myChart2').getContext('2d');
                        var myDoughnutChart = new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                datasets: [{
                                    data: [
                                        <?= $totalNonExecutedRecommendation ?>,
                                        <?= $totalInProgressRecommendation ?>,
                                        <?= $totalExecutedRecommendation ?>,
                                        <?= $totalUnknownRecommendation ?>,
                                    ],
                                    backgroundColor: [
                                        'rgb(255, 99, 132)',
                                        'rgb(250, 243, 98)',
                                        'rgb(0, 184, 83)',
                                        'rgb(54, 162, 235)',
                                    ],
                                    label: 'Dataset 1'
                                }],
                                labels: [
                                    'Recommandations non exécutées',
                                    'Recommandations en cours',
                                    'Recommandations exécutées',
                                    'Inconnu'
                                ]
                            },
                            options:{
                                responsive: true,
                                legend: {
                                    position: 'top',
                                },
                                title: {
                                    display: true,
                                    text: "Niveau d'exécution des recommandations"
                                },
                                animation: {
                                    animateScale: true,
                                    animateRotate: true
                                }
                            }
                        });
                    </script>
                    <div class="row border-top m-t-15 p-t-25 ">
                        <div class="col-md-3">
                            <div class="d-flex text-center">
                                <div class="media align-items-center">
                                    <div class="m-l-5">
                                        <h2 class="m-b-0"><?= addZeroBeforeNumber($totalNonExecutedRecommendation) ?></h2>
                                        <p class="m-b-0 text-muted"><span class="badge badge-danger badge-dot m-r-10"></span>Non Exécutées</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex text-center">
                                <div class="media align-items-center">
                                    <div class="m-l-5">
                                        <h2 class="m-b-0"><?= addZeroBeforeNumber($totalInProgressRecommendation) ?></h2>
                                        <p class="m-b-0 text-muted"><span class="badge badge-warning badge-dot m-r-10"></span> En cours</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex text-center">
                                <div class="media align-items-center">
                                    <div class="m-l-5">
                                        <h2 class="m-b-0"><?= addZeroBeforeNumber($totalExecutedRecommendation) ?></h2>
                                        <p class="m-b-0 text-muted"><span class="badge badge-success badge-dot m-r-10"></span>Exécutée</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex text-center">
                                <div class="media align-items-center">
                                    <div class="m-l-5">
                                        <h2 class="m-b-0"><?= addZeroBeforeNumber($totalUnknownRecommendation) ?></h2>
                                        <p class="m-b-0 text-muted"><span class="badge badge-primary badge-dot m-r-10"></span>Inconnu</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
    <?php
    return ob_get_clean();
}

function includeChartJSAssets()
{
    $ci =& get_instance();
    $ci->data['footerJsHeader'][] = $ci->data['assetsUrl'] . "pro/vendors/chartjs/Chart.min.js";
}

function includeIroColorPicker()
{
    $ci =& get_instance();
    $ci->data['footerJs'][] = $ci->data['assetsUrl'] . "pro/vendors/iro-colorpicker/iro.min.js";
}

function includeFancyBoxAssets()
{
    $ci =& get_instance();
    $ci->data['footerJs'][] = $ci->data['assetsUrl'] . "pro/vendors/fancybox/jquery.fancybox.js";
    $ci->data['headerCss'][] = $ci->data['assetsUrl'] . "pro/vendors/fancybox/jquery.fancybox.min.css";
}

function includeDatatableButtonsAssets(){
	$ci =& get_instance();
	$ci->data['headerCss'][] = "//cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css";
	$ci->data['footerJs'][] = "//cdnjs.cloudflare.com/ajax/libs/jszip/3.2.2/jszip.min.js";
	$ci->data['footerJs'][] = "//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.62/pdfmake.min.js";
	$ci->data['footerJs'][] = "//cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js";
	$ci->data['footerJs'][] = "//cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js";
}

function includeDatatablesAssets()
{
    $ci =& get_instance();
    $ci->data['footerJs'][] = $ci->data['assetsUrl'] . "pro/vendors/datatables/jquery.dataTables.min.js";
    $ci->data['footerJs'][] = $ci->data['assetsUrl'] . "pro/vendors/datatables/dataTables.bootstrap.min.js";
    $ci->data['footerJs'][] = $ci->data['assetsUrl'] . "pro/vendors/datatables/datatables.net-responsive/js/dataTables.responsive.min.js";
    $ci->data['headerCss'][] = $ci->data['assetsUrl'] . "pro/vendors/datatables/dataTables.bootstrap.min.css";
}

function includeJQueryRepeaterAssets()
{
    $ci =& get_instance();
    //$ci->data['footerJs'][]=$ci->data['assetsUrl']."pro/vendors/jquery-repeater/jquery.repeater.min.js";
    $ci->data['footerJs'][] = $ci->data['assetsUrl'] . "pro/vendors/jquery-repeater/jquery.repeater.1.2.1.min.js";
}

function includeCleaveNumberFormatterAssets()
{
    $ci =& get_instance();
    $ci->data['footerJs'][] = $ci->data['assetsUrl'] . "pro/vendors/cleave.js/cleave.min.js";
    //$ci->data['footerJs'][] = $ci->data['assetsUrl'].'lib/cleave.js/addons/cleave-phone.us.js';
}

function includeSweetAlertAssets()
{
    $ci =& get_instance();
    $ci->data['headerCss'][] = $ci->data['assetsUrl'] . 'pro/vendors/sweetalert/sweetalert.css';
    $ci->data['footerJs'][] = $ci->data['assetsUrl'] . 'pro/vendors/sweetalert/sweetalert.min.js';
}

function includeSummernoteAssets()
{
    $ci =& get_instance();
    $ci->data['footerJs'][] = '//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js';
    $ci->data['headerCss'][] = '//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css';
    $ci->data['footerJs'][] = '//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/lang/summernote-fr-FR.js';
}

function includeSelect2Assets()
{
    $ci =& get_instance();
//    $ci->data['footerJs'][]=$ci->data['assetsUrl'].'pro/vendors/select2a/js/select2.min.js';
//    $ci->data['headerCss'][]=$ci->data['assetsUrl'].'pro/vendors/select2a/css/select2.min.css';
    $ci->data['footerJs'][] = $ci->data['assetsUrl'] . 'pro/vendors/select2/select2.min.js';
    $ci->data['headerCss'][] = $ci->data['assetsUrl'] . 'pro/vendors/select2/select2.css';
}

function includeDatePickerAssets()
{
    $ci =& get_instance();
    $ci->data['footerJs'][] = $ci->data['assetsUrl'] . 'pro/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js';
    $ci->data['footerJs'][] = $ci->data['assetsUrl'] . 'pro/vendors/bootstrap-datepicker/bootstrap-datepicker.fr.js';
    $ci->data['headerCss'][] = $ci->data['assetsUrl'] . 'pro/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css';
}

function includeDropifyAssets()
{
    $ci =& get_instance();
    $ci->data['footerJs'][] = $ci->data['assetsUrl'] . 'pro/vendors/dropify/dist/js/dropify.min.js';
    $ci->data['headerCss'][] = $ci->data['assetsUrl'] . 'pro/vendors/dropify/dist/css/dropify.min.css';
}

function getAllFormButtons($edit = false, $cancelUrl, $withDraftButton=false, $draftButtonAdditionalClass='', $submitLabel='')
{
    ?>
    <div class="form-group pull-right form-buttons">
        <a href="<?= $cancelUrl ?>" class="btn btn-dark m-l-5 ">
            <i class="anticon anticon-arrow-left"></i> Annuler
        </a>
        <button type="button" class="btn btn-warning m-l-5 clear-form">
			<i class="anticon anticon-undo"></i> Effacer
        </button>
		<?php
		if($withDraftButton){
			?>
			<button type="button" class="btn real-btn-primary m-l-5 draftify-form <?= $draftButtonAdditionalClass ?>">
				<i class="anticon anticon-save"></i> Enregistrer brouillon
			</button>
			<?php
		}
		?>
        <?php
		$submitLabel = $submitLabel == '' ? ($edit ? 'Modifier' : 'Ajouter') : $submitLabel;
		getFormSubmit($submitLabel) ?>
    </div>
    <?php
}

function getAdminBreadcrump(array $args)
{
    ?>
    <div class="page-header">
        <h2 class="header-title"><?= $args['title'] ?></h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="<?= pro_url() ?>" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Tableau de
                    bord</a>
                <?php
                if (isset($args['before'])) {
                    ?>
                    <a href="<?= $args['before']['url'] ?>" class="breadcrumb-item"><?= $args['before']['title'] ?></a>
                    <?php
                }
                ?>
                <span class="breadcrumb-item active"><?= $args['title'] ?></span>

            </nav>
        </div>
    </div>
    <?php
}
