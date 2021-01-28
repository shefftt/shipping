<form action="<?= base_url()?>admin/product_edit_post" method="post">
<div class="form-group col-md-3">
	
	<label>الاسم</label>
<input type="text" name="name" value="<?= $product->name ?>" required="true" class="form-control" placeholder="الاسم">


</div>
<div class="form-group col-md-3">
	
	<label>الكميه</label>
<input type="text" name="qyt" value="<?= $product->qyt ?>" required="true" class="form-control" placeholder="الكميه">


</div>
<div class="form-group col-md-3">
     
			<label>السعر</label>
<input type="text" name="price" value="<?= $product->price ?>" required="true" id="price" class="form-control" placeholder="السعر" aria-describedby="helpId">
<input type="hidden" name="id" value="<?= $product->id ?>">
</div>
<div class="form-group col-md-3">
<label>الكود</label>
<input type="text" name="code" value="<?= $product->code ?>" required="true" class="form-control" placeholder="الكود">

</div>



<div class="form-group col-md-3">
			<label>المخزن</label>
<select class="form-control" name="stock_id">
            <?php foreach ($stocks as  $stock) :  ?>
<option <?php if($product->stock_id == $stock->id) : ?> selected="true" <?php endif; ?> value="<?= $stock->id?>"><?= $stock->name?></option>
            <?php endforeach;  ?>
</select>
		</div>

<div class="form-group col-md-3">
			<label>وحده القياس</label>
<select class="form-control" name="unit_id">
            <?php foreach ($units as  $unit) :  ?>
<option <?php if($product->unit_id == $unit->id) : ?> selected="true" <?php endif; ?> value="<?= $unit->id?>"><?= $unit->name?></option>
            <?php endforeach;  ?>
</select>
		</div>
		<div class="form-group col-md-3">
			<label>المخزن</label>
<select class="form-control" name="shelve_id">
            <?php foreach ($shelves as  $shelve) :  ?>
            <option <?php if($product->shelve_id == $shelve->id) : ?> selected="true" <?php endif; ?> value="<?= $shelve->id?>"><?= $shelve->name?></option>
            <?php endforeach;  ?>
</select>
		</div>
		<div class="form-group col-md-3">
			<label>التصنيف</label>
<select class="form-control" name="category">
            <?php foreach ($categorys as  $category) :  ?>
            <option  <?php if($product->category == $category->id) : ?> selected="true" <?php endif; ?> value="<?= $category->id?>"><?= $category->name?></option>
            <?php endforeach;  ?>
</select>
		</div>

<button class="btn btn-success">تعديل</button>

</form>

  