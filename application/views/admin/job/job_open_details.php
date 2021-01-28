<style type="text/css">
    html * {
        font-size : 20px;
    }
	
	</style>
	
	<div class="col-md-12">
	<button onclick="printDiv('printableArea')" class="btn btn btn-labeled btn-info" href="<?= base_url() ?>admin/products_in_add"><i class="btn-label fa fa-print"></i>طباعه</button>
	<a class="btn btn-md btn-info" href="<?= base_url()?>admin/stock_report/<?= $jobs->id ?>">طباعه اذن صرف</a>
	<br>
	<br>
	<br>
	<div id=printableArea>
		<div class="col-md-12">
			<!-- <div class="row">
				<center>

				
				<div class="col-md-4">
					<img style="width: 60px;" src="<?= base_url() ?>logo.png" class="img-fluid" alt="">
				</div>
				<div class="col-md-4">
					<h2> عثمان الخير عز الدين للنقل البرى </h2>
				</div>
				<div class="col-md-4">

					<img style="width: 60px;" src="<?= base_url() ?>logo.png" class="img-fluid" alt="">
				</div>
				</center>
			</div> -->
			<br>
		</div>
		<div class="col-md-12">
			<div class="widget flat radius-bordered">
				<div class="widget-header bg-themeprimary">
					<span class="widget-caption">معلومات عامه</span>
				</div>

				<div class="widget-body">
					<div class="widget-main ">
						<div class="table-scrollable">
							<table class="table table-striped table-bordered table-hover">
								<tr>
									<td>
										<u><label style="font-style:bold;font-size:20px;">رقم المركبه:</label></u>
									</td>
									<td>
										<label><?= cars_info($jobs->car_id)->number ?></label>
									</td>
									<td>
										<b><label style="font-size:20px;">  رقم الجوب:</label></b>
									</td>
									<!-- chassis_no -->
									<td>
										<label>S : <?= $jobs->id ?></label> 
										<br>
										<?= $jobs->job_number ?>
										<br>
										
									</td>
								</tr>
								<tr>
									<td>
										<b><label style="font-size:20px;">نوع الجوب :</label></b>
									</td>
									<td>
										<label><?= $jobs->type ?></label>
									</td>
									<td>
										<b><label style="font-size:20px;">  رقم الشاسى </label></b>
									</td>
									<td>
									<label> 
											 <?= cars_info($jobs->car_id)->chassis_no ?>
									</label>
									</td>
								</tr>
								<tr>
									<td>
										<b><label style="font-size:20px;">تاريخ الدخول :</label></b>
									</td>
									<td>
										<label><?= $jobs->created_at ?></label>
									</td>
									<td>
										<b><label style="font-size:20px;"> نوع المركبه:</label></b>
									</td>
									<td>
									<label> <?=table_info('cars_type' ,cars_info($jobs->car_id)->type)->name  ?></label>
									</td>
								</tr>
								<tr>
									<td>
										<b><label style="font-size:20px;">تاريخ الخروج :</label></b>
									</td>
									<td>
										<label><?= $jobs->date_out ?></label>
									</td>
								
									<td>
									<b><label style="font-size:20px;">الكيلو متر </label></b>
								</td>
								<td>
									<label><?= table_info("cars" , $jobs->car_id)->distance	 ?></label>
								</td>
								</tr>
							</table>
						</div>
						
					</div>
				</div>
			</div>
		


			<div class="col-md-12">
				<div class="widget flat radius-bordered">
					<div class="widget-header bg-themeprimary">
						<span class="widget-caption">الاعطال</span>
					</div>

					<div class="widget-body">
						<div class="widget-main ">
							<p for=""><?= $jobs->problems ?></p>
						</div>
					</div>
				</div>
			</div>

			<?php if ($this->session->userdata('stock_message') !== null) : ?>
				<div class="col-xs-12 col-md-12">
					<div class="alert alert-danger fade in">
						<button class="close" data-dismiss="alert">
							×
						</button>
						<i class="fa-fw fa fa-times"></i>
						<strong>خطاء!</strong>
						<?= $this->session->userdata('stock_message') ?>
					</div>
				</div>
			<?php endif; ?>

			<?php if ($this->session->userdata('stock_qyt_errorr') !== null) : ?>
				<div class="col-xs-12 col-md-12">
					<div class="alert alert-danger fade in">
						<button class="close" data-dismiss="alert">
							×
						</button>
						<i class="fa-fw fa fa-times"></i>
						<strong>خطاء!</strong>
						<?= $this->session->userdata('stock_qyt_errorr') ?>
					</div>
				</div>
			<?php endif; ?>
			<?php if ($this->session->userdata('stock_qyt') !== null) : ?>
				<div class="col-xs-12 col-md-12">
					<div class="alert alert-success fade in">
						<button class="close" data-dismiss="alert">
							×
						</button>
						<i class="fa-fw fa fa-times"></i>
						<strong>نجاح!</strong>
						<?= $this->session->userdata('stock_qyt') ?>
					</div>
				</div>
			<?php endif; ?>
			<div class="col-xs-12 col-md-12">
				<div class="well with-header with-footer">
					<div class="header bordered-success font-size">
						الاسبيرات
					</div>
					<div class="table-scrollable">
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>اسم الاسبير </th>
									<th>العدد</th>
									<th>الحاله</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1;
								foreach ($products_job as $job) : ?>
									<tr>
										<td scope="row">1</td>
										<td>
											<?= job_products($job->product_job)->name ?>
										</td>
										<td>
											<?= $job->job_qyt ?>
										</td>
										<td>
											<?php if ($job->status == 0) : ?>
												<form action="<?= base_url() ?>admin/agree" method="post">

													<p class="btn btn-sm btn-warning">
														قيد الانتظار
													</p>
													<a class="btn btn-sm btn-danger" href="<?= base_url() ?>admin/delete_product_job/<?= $job->id ?>">
														حذف
													</a>
													<?php if (login()->level == 'stock') : ?>
														<input type="hidden" name="product_id" value="<?= $job->product_job ?>">
														<input type="hidden" name="job_qyt" value="<?= $job->job_qyt ?>">
														<input type="hidden" name="products_job_id" value="<?= $job->id ?>">
														
														<button class="btn btn-sm btn-info">صرف </button>


													<?php endif; ?>
												</form>
											<?php elseif ($job->status == 1) : ?>
												<a class="btn btn-sm btn-success" href="#">
													تم الصرف
												</a>
											<?php endif; ?>
										</td>
									</tr>
								<?php endforeach; ?>

							</tbody>
						</table>


					</div>

					<div class="footer">
						<div class="row">
						<div class="col-md-6">
						<?php if ($jobs->status == 0 and login()->level != 'stock') : ?>
							<a class="btn btn btn-success" href="<?= base_url() ?>admin/new_product_in_job/<?= $jobs->id ?>">اضافة اسبير جديد</a>
							<a class="btn btn btn-success" href="<?= base_url() ?>admin/new_engineer_in_job/<?= $jobs->id ?>">اضافة فني جديد</a>
						<?php endif; ?>
						<label>
							المجموع الكلي
						</label>
						<span class="label label-sky" style="margin-top: 0.5rem;">
							<?= job_total($job_id) ?>
						</span></div>
						<div class="col-md-6">
						<?php if ($jobs->status == 0 and login()->level != 'stock') : ?>
							<a class="btn btn btn-success" href="<?= base_url() ?>admin/job_edit/<?= $jobs->id ?>"> تعديل الجوب </a>
						<?php endif; ?>
						
						</div>
						</div>


					</div>

				</div>
			</div>
		</div>
	


	<div class="form-group col-md-12">

		<div class="form-group col-md-6">
			<b><label for="" style="font-size:20px;">الفنيين:</label></b>
	
				<?php foreach ($job_engineers as $engineer) : ?>
					
					<span class="label label-sky" style="margin-top: 0.5rem;">
					<?= job_engineers($engineer->engineer_id)->name ?>
						</span>
				<?php endforeach; ?>
			


		</div>
	</div>
	</div>
	<script>
		function printDiv(divName) {

			$('.ahmed').css('display', 'none');
			$('.ahme2').css('display', 'block');
			console.log('dddddddddd')
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;
		}
	</script>
</div>