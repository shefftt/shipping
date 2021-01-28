<div class="col-xs-12 col-md-6">
	<form action="<?= base_url() ?>admin/daily_report" method="post">
		<div class="form-group col-md-6">
			<input type="date" name="start_date" class="form-control">
		</div>
		<div class="form-group col-md-6">
			<button class="btn btn-md bt-info">بحث</button>
		</div>


	</form>
</div>
<div class="col-xs-12 col-md-6">
</div>
<button onclick="printDiv('printableArea')" class="btn btn btn-labeled btn-info" href="<?= base_url() ?>admin/products_in_add"><i class="btn-label fa fa-print"></i>طباعه</button>

</div>
<br>
<br>

<div id=printableArea>
	<center>
		<h2>
			تقرير يوم :
			<?= $curr_date ?>
		</h2>
	</center>
	<div class="col-xs-12 col-md-12">
		<div class="well with-header  with-footer">
			<div class="header bg-blue">
				تقرير يوم :
				<?= $curr_date ?>
			</div>
			<table class="table table-border table-inverse table-responsive">
				<thead class="bordered-darkorange">
					<tr>
						<th>#</th>
						<th>رقم الشاحنة</th>
						<th>الاعطال</th>
						<th> ملاحظات</th>

					</tr>
				</thead>
				<tbody>
					<?php $i = 1;
					foreach ($jobs as $job) : ?>
						<tr>
							<td scope="row"><?= $i++ ?></td>
							<td>
								<?= cars_info($job->car_id)->number ?>
							</td>
							<td>
								<?= $job->problems ?>
							</td>
							<td>
								<?= $job->created_at ?>
							</td>
							<td>
								<?php if ($job->status == 0) : ?>
									<span class="label label-darkpink graded">
										<i class="fa fa-wrench"></i>تحت الصيانه</span>
								<?php else : ?>
									<span class="label label-success">
										<i class="fa fa-check-circle"></i> تمت الصيانه</span>
								<?php endif;	?>
							</td>
						</tr>
					<?php endforeach; ?>
					<?php foreach ($old_jobs as $job) : ?>
						<tr>
							<td scope="row"><?= $i++ ?></td>
							<td>
								<?= cars_info($job->car_id)->number ?>
							</td>
							<td>
								<?= $job->problems ?>
							</td>
							<td>
								<?= $job->created_at ?>
							</td>
							<td>
								<?php if ($job->status == 0) : ?>
									<span class="label label-darkpink graded">
										<i class="fa fa-wrench"></i>تحت الصيانه</span>
								<?php else : ?>
									<span class="label label-success">
										<i class="fa fa-check-circle"></i> تمت الصيانه</span>
								<?php endif;	?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
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