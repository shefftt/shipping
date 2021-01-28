<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>رقم المركبه</th>
            <th>اسم السائق</th>
            <th>نوع الجوب</th>
            <th>الاعطال</th> 

             <th>اعدادات</th>
        </tr>
    </thead>
    <tbody>
    <?php $i= 1; foreach ($jobs as $job) :?> 
        <tr>
            <td scope="row"><?= $i++ ?></td>
            <td><?= cars_info($job->car_id)->number?> </td>
            <td><?= cars_info($job->car_id)->driver_name?> </td>
            <td><?= $job->type ?> </td>
            <td><?= $job->problems ?></td>
             
             <td><a href="<?= base_url() ?>admin/job_details/<?= $job->id ?>">عرض</a></td>  
            
        </tr></td>
        </tr>
<?php endforeach;?>
    </tbody>
</table>

