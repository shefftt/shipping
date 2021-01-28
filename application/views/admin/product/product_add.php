<form action="<?= base_url()?>admin/product_add_post" method="post">
<div class="form-group col-md-6">
<label for="">اسم المنتج</label>
  <input type="text" name="name" required="true" id="name" class="form-control" placeholder="اسم المنتج" aria-describedby="helpId">
</div>
<div class="form-group col-md-6">
<label for="">رقم المنتج</label>
  <input type="text" name="code" required="true" id="name" class="form-control" placeholder="اسم المنتج" aria-describedby="helpId">
</div>
<div class="form-group col-md-6">
        <label for="">التصنيف</label>
        <select class="form-control" name="category">
            <?php foreach($categorys as $category):?>
              <option value="<?= $category->id ?>"><?= $category->name ?></option>
            <?php endforeach; ?>
        </select>
        </div>
        <div class="form-group col-md-6">
        <label for="">السعر</label>
<input type="text" name="price" required="true" id="price" class="form-control" placeholder="السعر" aria-describedby="helpId">
</div>



<div class="form-group col-md-6">
        <label for="">المخزن</label>
        <select class="form-control" name="stock_id">
            <?php foreach($stocks as $stock):?>
              <option value="<?= $stock->id ?>"><?= $stock->name ?></option>
            <?php endforeach; ?>
        </select>


</div>

<div class="form-group col-md-6">
        <label for="">الوحده</label>
        <select class="form-control" name="unit_id">
            <?php foreach($units as $unit):?>
              <option value="<?= $unit->id ?>"><?= $unit->name ?></option>
            <?php endforeach; ?>
        </select>


</div>
<div class="form-group col-md-6">
        <label for="">الرف</label>
        <select class="form-control" name="shelve_id">
            <?php foreach($shelves as $shelve):?>
              <option value="<?= $shelve->id ?>"><?= $shelve->name ?></option>
            <?php endforeach; ?>
        </select>
<br>

</div>
<div class="form-group col-md-6">
        <label for="">الكميه الافتتاحيه</label>
<input type="text" name="qyt" required="true" class="form-control" placeholder="الكميه" aria-describedby="helpId">
</div>


<div class="form-group col-md-12">
<button class="btn btn-success">اضافة</button>
</div>
</form>

