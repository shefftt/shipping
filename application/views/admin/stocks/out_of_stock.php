<div class="col-md-12">
<form action="<?= base_url() ?>admin/out_of_stock" method="post">
	<div class="form-group col-md-4">
		<label>من</label>
		<input type="date" name="from" class="form-control">
	</div>
	<div class="form-group col-md-4">
		<label>الى</label>
		<input type="date" name="to" class="form-control">
	</div>
	<div class="form-group col-md-4">
		<label>الى</label>
		<select name="product_id" class="form-control">
			<option value="0">الكل</option>
			<?php foreach ($products as $product) : ?>
			<option value="<?= $product->id ?>"><?= $product->name ?></option>
		<?php endforeach; ?>
		</select>
	</div>

	<div class="form-group col-md-6">
		<button class="btn btn-success btn-md">عرض</button>
		
	</div>
</form>
<button  onclick="printDiv('printableArea')" class="btn btn btn-labeled btn-info"><i class="btn-label fa fa-print"></i>طباعه</button>
</div>
<?php if (isset($to)) : ?>
	<div id="printableArea">
<div class="col-md-12">
	<center>
		
		<h2>
			عرض العمليات من 
			<?= $from ?>

			الى
			<?= $to ?>
			<?php if ($product_id) : ?>
				<br>
				 <u><b>
				 	<?= product($product_id)->name ?>
				 </b></u>
			<?php endif; ?>
		</h2>
	</center>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>المنتج</th>
				<th>رقم اذن الصرف</th>
				<th>العربيه</th>
				<th>المخزن</th>
				<th>الكميه</th>
				<th>السعر</th>
				<th>الوحده</th>
				<th>الرقم التسلسلى</th>
				<th>المجموع</th>
			</tr> 
		</thead>
		<tbody>
			<?php $total =0 ; $i = 1; foreach ($products_job as $product) : $total += $product->sub_total;?>
			<tr>
				<td><?= $i++ ?></td>
				<td><?= product($product->product_job)->name ?></td>
				<td><a href="<?= base_url() ?>admin/job_open_details/<?= $product->job_id ?>"><?= $product->job_id ?></a></td>
				<td><?= table_info('cars' , table_info('jobs' ,$product->job_id)->car_id)->number?></td>
				<td><?= stock($product->stock_id)->name ?></td>
				<td><?= $product->job_qyt ?></td>
				<td><?= $product->price ?></td>
				<td><?= table_info("units" , product($product->product_job)->unit_id)->name ?> </td>
				<td><?= product($product->product_job)->code ?></td>
				
				<td><?= $product->sub_total ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<div class="col-md-12">
		<center>
			<h3>
				التكلفة الكليه
				<?= $total ?> 
				جنيه
			</h3>
		</center>
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
<?php endif; ?>