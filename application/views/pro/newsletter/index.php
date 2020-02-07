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
			<p>Trouvez dans le tableau ci-dessous, la liste des abonnés ayant souscrit à la Newsletter</p>
			<div class="m-t-25">

				<table class="table table-responsive-md table-hover wd-100p-f my-datatable with-excel-button">
					<thead>
					<tr>
						<?php
						foreach ($tableHeaders as $key => $header) {
							$class = '';
							?>
							<th <?= $class ?>><?= $header ?></th> <?php
						}
						?>
					</tr>
					</thead>
					<tbody>
					<?php if (isset($newsletters) && !empty($newsletters)) {
						//var_dump($newsletters);exit();
						foreach ($newsletters as $key => $newsletter) {
							?>
							<tr>
								<td data-toggle="tooltip" class=""
									data-placement="top"
									title="<?= $newsletter->name ?>"><?= myWordLimiter($newsletter->name, 4) ?></td>
								<td ><?= $newsletter->email ?></td>
								<td ><?= $newsletter->phone ?></td>
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
