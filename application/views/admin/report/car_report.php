<div class="col-md-12">
<button  onclick="printDiv('printableArea')" class="btn btn btn-labeled btn-info" href="<?= base_url()?>admin/products_in_add"><i class="btn-label fa fa-print"></i>طباعه</button>
<br>
<br>
<br>

<form action="" method="post">
	<div class="col-xs-12 col-md-12">

		<div class="form-group col-md-3">
			<label for="">من </label>
			<input class="form-control" type="date" required name="from">
		</div>

		<div class="form-group col-md-3">
			<label>من</label>
			<input class="form-control" type="date" required name="to">

		</div>

		<div class="form-group col-md-3">
			<label>الوحده</label>
<select class="form-control" name="car_id">
            <?php foreach ($cars as  $car) :  ?>
            <option value="<?= $car->id?>"><?= $car->number?></option>
            <?php endforeach;  ?>
</select class="form-control" name="car_id">
		</div>
		<div class="form-group col-md-3">
			<br>
			<button class="btn btn-md btn-success btn-block" type="submit">بحث</button>
		</div>
	</div>
</form>
<br>
<br>

<div id=printableArea>
<div class="col-xs-12 col-md-12">
<?php if (isset($to)) : ?>
	<div id="printableArea">
<div class="col-md-12">
	<center>
		
		<h2>
			عرض تقرير الوحده من 
			<?= $from ?>

			الى
			<?= $to ?>
	
			<?php endif; ?>
            </center>
</div>
<div class="col-xs-12 col-md-12">
	<div class="well with-header  with-footer">
		<div class="header bg-blue">
			تقرير وحده
		</div>
		<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>رقم المركبه</th>
            <th>اسم السائق</th>
            <th>نوع الجوب</th>
            <th>تكلفة المهمه</th>
            <th>الاعطال</th> 

             <th>اعدادات</th>
        </tr>
    </thead>
    <tbody>
    <?php if(isset($jobs)) : ?>
    <?php $sum=0; $i= 1; foreach ($jobs as $job) : $sum += $job->job_total; ?> 
        <tr>
            <td scope="row"><?= $i++ ?></td>
            <td><?= cars_info($job->car_id)->number?> </td>
            <td><?= cars_info($job->car_id)->driver_name?> </td>
            <td><?= $job->type ?> </td>
            <td><?= $job->job_total ?> </td>
            <td><?= $job->problems ?></td>
            <td><a href="<?= base_url() ?>admin/job_details/<?= $job->id ?>">عرض</a></td>  
            
        </tr></td>
        </tr>
<?php endforeach;?>
<?php endif;?>
    </tbody>
</table>
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