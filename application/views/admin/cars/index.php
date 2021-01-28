<div class="col-m-12">
    <a class="btn btn btn-labeled btn-info" href="<?= base_url() ?>admin/car_add"><i class="btn-label fa fa-plus"></i>اضافة مركبه</a>
</div>
<br>
<table id="myTable" class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>رقم المركبه</th>
            <th>اسم السائق</th>
            <th>شركة التصنيع</th>
            <th>شكل المركبه</th>
            <th>نوع لمركبه</th>
            <th>مسافة تغير الزيت </th>
            <th> رسالة التغير </th>
            <th>تكلفة العربية</th>
            <th>رقم الشاسى </th>
            <th>تفاصيل المركبه</th>
            <th>اعدادات </th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        foreach ($cars as $car) : ?>
            <tr>
                <td scope="row"><?= $i++ ?></td>
                <td><?= $car->number ?> </td>
                <td><?= $car->driver_name ?> </td>
                <td><?=table_info('brands' ,$car->company)->name ?> </td>
                <td><?=table_info('car_shape' ,$car->form)->name ?> </td>
                <td><?=table_info('cars_type' ,$car->type)->name ?> </td>
                <td><?= $car->oil_change ?> </td>
                <td><?= oil_change($car->id) ?> </td>
                   
        
                <td> <?= car_total($car->id) ?> </td>
                <td><?= $car->chassis_no ?></td>
                <td><a href="<?= base_url() ?>admin/car_jobs/<?= $car->id ?>">عرض</a></td>
                <td>
                    <a class="btn btn-sm btn-info" href="<?= base_url() ?>admin/car_edit/<?= $car->id ?>">تعديل</a>
                </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>