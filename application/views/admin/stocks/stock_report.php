	
	<div class="col-md-12">
	<button onclick="printDiv('printableArea')" class="btn btn btn-labeled btn-info" href="<?= base_url() ?>admin/products_in_add"><i class="btn-label fa fa-print"></i>طباعه</button>
	<br>
	<br>
	<br>
	<div id=printableArea>

<div class="col-xs-12 col-md-12">
            <table class="table table-striped table-bordered table-hover">
            
                <tbody>
                        <tr>
                            <td scope="row">رقم المركبه</td>
                            <td>
                            <?= $car->number ?>
                            </td>
                            <td>
                           اسم السائق
                            </td>
                            <td>
                            
                            <?= $car->driver_name ?> 
                            </td>
                            <td>
                           اذن الصرف 
                            </td>
                            <td>
                            
                            <?= $jobs->id ?> 
                            </td>
                        </tr>

                </tbody>
            </table>

</div>
<hr>



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
                        <th>السعر</th>
                        <th>رقم الرف</th>
                        <th>المخزن </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($products_job as $job) : ?>
                        <tr>
                            <td scope="row"><?= $i++ ?></td>
                            <td>
                                <?= job_products($job->product_job)->name ?>
                            </td>
                            <td>
                                <?= $job->job_qyt ?>
                            </td>
                            <td>
                                <?= job_products($job->product_job)->price ?>
                            </td>
                            <td>
                                <?= table_info('shelves' , job_products($job->product_job)->shelve_id)->name ?>
                            </td>
                            <td>
                                <?= table_info('stocks' , job_products($job->product_job)->stock_id)->name ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>


        </div>

        <div class="footer">
            <div class="row">
            <div class="col-md-6">
            
            <label>
                المجموع الكلي
            </label>
            <span class="label label-sky" style="margin-top: 0.5rem;">
                <?= job_total($job_id) ?>
            </span>
            </div>
            
            </div>


        </div>

    </div>
</div>


<hr>
<div class="col-xs-12 col-md-12">
            <table class="table">
            
                <tbody>
                        <tr>
                            <td scope="row">امين المخزن</td>
                            <td>
                            ..............................
                            </td>
                            <td>
                            المستلم
                            </td>
                            <td>
                            ..................... 
                            </td>
                        </tr>

                </tbody>
            </table>

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