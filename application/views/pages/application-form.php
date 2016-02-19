<div id="page-application-form">
<?
	$form_attributes = array(
		'id'           => 'form-application',
		'class'        => 'form-horizontal',
		'role'         => "form",
		'data-toggle'	 => "validator",
	);
	echo form_open($form['process'], $form_attributes);
	$this->load->view('pages/application-form/'.$form['section']);
?>
	<div class="container">
	</div>
	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<table>
						<tr>
						<?
							for($i = 1; $i <= count($form['form_sections']); $i++) {
								$step = ($i == $form['step'] ? 'step-active' : 'step-disabled');
						?>
							<td>
								<div class="footer-progress-step <?=$step?>" id="step-<?=$i?>">
									<span class="fa-stack fa-2x">
										<i class="fa fa-circle-thin fa-stack-2x icon-outline"></i>
										<i class="fa fa-circle fa-stack-2x icon-background"></i>
										<i class="fa fa-check fa-stack-1x icon-image"></i>
										<i class="fa fa-stack-1x icon-number"><?=$i?></i>
									</span>
								</div>
							</td>
							<?
								if ($i != count($form['form_sections'])) {
							?>
								<td>
									<div class="footer-bav-connector"></div>
								</td>
						<?
								}
							}
						?>
						</tr>
					</table>
				</div>
				<div class="col-sm-6">
					<button class="button button-invert-blue pull-right" type="submit">
						<?=$this->lang->line('next')?><i class="icon-right fa fa-angle-right"></i>
					</button>
					<a href="#" class="button button-invert-blue mr10 pull-right" data-action="prev">
						<i class="icon-left fa fa-angle-left"></i><?=$this->lang->line('back')?>
					</a>
					<a href="<?=base_url('apply/cancel')?>" class="button button-transparent mr10 pull-right">Cancel</a>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
<?
	echo form_close();
?>
</div>
