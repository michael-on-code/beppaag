<div class="main-content">
	<?php getAdminBreadcrump([
		'title' => $pageTitle,
	]) ?>
	<div class="card">
		<div class="card-body">
			<h4><?= $pageTitle ?></h4>
			<p>Le formulaire ci-dessous permet de modifier le contenu de la page Equipe
			</p>
			<div class="m-t-25">
				<?= form_open('', [
					'id' => 'form-validation'
				]) ?>
				<div class="row">
					<div class="col-md-12">
						<h4>Equipe</h4>
						<?php
						$teamMembers = set_value('site_team_members', maybe_null_or_empty($options, 'site_team_members', true), false);
						$teamMembersNotEmpty = !empty($teamMembers);
						?>
						<div class="my-recommendation-repeater <?= $teamMembersNotEmpty ? 'not-empty' : '' ?>"
							 delete-message="Etes-vous sûr de vouloir supprimer ce membre">
							<!--                                    TODO first recommendation empty-->
							<div class="accordion" data-repeater-list="team[site_team_members]" id="accordion-default">
								<div class="form-group col-md-12 button-container">
									<button title="Ajouter nouveau membre" type="button"
											data-repeater-create
											class="btn btn-primary mail-open-compose real-btn-primary">
										<i class="anticon anticon-plus"></i>
										<span class="m-l-5">Ajouter nouveau membre</span>
										<span class="badge badge-indicator badge-danger my-repeater-badge"><?= $teamMembersNotEmpty ? count($teamMembers) : 1 ?></span>
									</button>
								</div>
								<?php
								//Default first one
								getTeamMemberRepeater([], 'first-one', ($teamMembersNotEmpty ? 'ignore-completely' : ''), $teamMembersNotEmpty);
								if ($teamMembersNotEmpty) {
									foreach ($teamMembers as $key => $teamMember) {
										getTeamMemberRepeater($teamMember, '', '', false, $key + 1);
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
