<div class="col-md-12">
    <button  onclick="printDiv('printableArea')" class="btn btn btn-labeled btn-info" href="<?= base_url()?>admin/products_in_add"><i class="btn-label fa fa-print"></i>طباعه</button>
<br>
<br>
<br>
<div id=printableArea>
<div class="form-group col-md-6">
	<label style="font-size:15px;">رقم المركبه:</label>
<div id="car_number"></div>
<img style="width: 200px;" src="<?= base_url() ?>assets/car_num.jpg">
	<label id="car_number" style="color:#000; margin-right: -157px;position: absolute;margin-top: 34px;font-size: 35px;font-weight: bold;" for=""><?= cars_info($jobs->car_id)->number ?></label>

</div>

<div class="form-group col-md-6">
	<label for="" style="color:blue; font-size:15px">نوع الجوب:</label>

	<label for=""><?= $jobs->type ?></label>
</div>
<div class="form-group col-md-6">
	<b><label for="" style="font-size:15px;">الفنيين:</label></b>
	<?php foreach ($job_engineers as $engineer) : ?>
		<label class="label label-info" for=""><?= job_engineers($engineer->engineer_id)->name ?></label>
	<?php endforeach; ?>

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
									<p class="btn btn-sm btn-warning">
										قيد الانتظار
									</p>
									<a class="btn btn-sm btn-danger" href="<?= base_url() ?>admin/delete_product_job/<?= $job->id ?>">
										حذف
									</a>
									<a class="btn btn-sm btn-info" href="<?= base_url() ?>admin/agree/<?= $job->id ?>">
										صرف
									</a>
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

		
			<span class="label label-sky" style="
    margin-top: 0.5rem;
">
                                               المجموع الكلي =	<?=	job_total($job_id)?> 
                                            </span>

		</div>

	</div>
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