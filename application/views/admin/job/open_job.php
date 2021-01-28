<form action="<?= base_url() ?>admin/redirect_to_relase" method="post">
<input type="text" name="id" palceholder="اذن الصرف">
<button type="submit">بحث</button>
</form>

<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>رقم المركبه</th>
            <th>اسم السائق</th>
            <th>التاريخ</th>
            <th>اعدادات</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        foreach ($jobs as $job) : ?>
            <tr <?php if(products_job_count($job->id)) : ?> style="border-right: 7px solid red;" <?php else: ?> style="border-right: 7px solid green;" <?php endif; ?>>
                <td scope="row"><?= $i++ ?></td>
                <td><?= cars_info($job->car_id)->number ?> </td>
                <td><?= cars_info($job->car_id)->driver_name ?> </td>
                <td><?= $job->created_at ?> </td>
                <td>
                    <a class="label label-azure graded" href="<?= base_url() ?>admin/job_open_details/<?= $job->id ?>"><i class="fa fa-eye"></i> التفاصيل</a>
                    <a href="<?php echo base_url() ?>admin/utpdate_job_status/<?php echo $job->id ?>" class="label label-success graded"> <i class="fa fa-check-circle"></i> انهاء المهمة</a> </td>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>