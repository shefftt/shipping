<form action="<?= base_url()?>admin/edit_unit_post" method="post">
<div class="form-group">
<label>الاسم </label>
  <input type="text" value="<?= $unit->name ?>" name="name" required="true"class="form-control" placeholder="اسم الوحده" aria-describedby="helpId">
  <input type="hidden" value="<?= $unit->id ?>" name="id" required="true"class="form-control" placeholder="اسم الوحده" aria-describedby="helpId">
</div>
<button class="btn btn-success">تعديل</button>
</form>   