<table id="myTable" class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>رقم المركبه</th>
            <th>اسم السائق</th>
            <th>تكلفة العربية </th>
        </tr>
    </thead>
    <tbody>
    <?php $i= 1; foreach ($cars as $car) :?> 
        <tr>
            <td scope="row"><?= $i++ ?></td>
            <td><?= $car->number ?> </td>
            <td><?= $car->driver_name ?> </td>
            <td> <?=	job_total($id)?> </td>
            
        </tr></td>
        </tr>
<?php endforeach;?>
    </tbody>
</table>
	<script>
	    $(document).ready( function () {
    $('#myTable').DataTable();
} );
	</script>