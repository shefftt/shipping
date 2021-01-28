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
    <?php $sum=0; $i= 1; foreach ($jobs as $job) : $sum += $job->job_total; ?> 
        <tr>
            <td scope="row"><?= $i++ ?></td>
            <td><?= cars_info($car->id)->number?> </td>
            <td><?= cars_info($car->id)->driver_name?> </td>
            <td><?= $job->type ?> </td>
            <td><?= $job->job_total ?> </td>
            <td><?= $job->problems ?></td>
            <td><a href="<?= base_url() ?>admin/job_details/<?= $job->id ?>">عرض</a></td>  
            
        </tr></td>
        </tr>
<?php endforeach;?>
    </tbody>
</table>



           
            
            	<div class="footer">
			<span class="label label-sky" style="
    margin-top: 0.5rem;">
                                               المجموع الكلي  <?= $sum  ?> 
                                            </span>
		</div>
