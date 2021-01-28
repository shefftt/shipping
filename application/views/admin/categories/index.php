<div class="col-m-12">
<a class="btn btn btn-labeled btn-info" href="<?= base_url()?>admin/add_category"><i class="btn-label fa fa-plus"></i>اضافة  تصنيف</a>
</div>
<br>
<h1>
    
</h1>
<table id="myTable" class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>الاسم</th>
            <th>اعدادات</th>
        </tr>
    </thead>
    <tbody>
    <?php $i= 1; foreach ($categorys as $category) :?> 
        <tr>
            <td scope="row"><?= $i++ ?></td>
            <td><?= $category->name ?> </td>
            <td>
            	<a class="btn btn-sm btn-info" href="<?= base_url() ?>admin/category/<?= $category->id ?>">عرض</a>
            </td>
      
        </tr>
<?php endforeach;?>
    </tbody>
</table>

	<script>
	    $(document).ready( function () {
    $('#myTable').DataTable();
} );
	</script>