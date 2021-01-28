<form action="<?= base_url()?>admin/car_add_post" method="post">
<div class="row">
<div class="form-group col-md-6">
        <input type="text" name="number" required="true" id="number" class="form-control" placeholder="رقم اللوحه" aria-describedby="helpId">
        </div>

<div class="form-group col-md-6">
    <input type="text" name="driver_name" required="true" class="form-control" placeholder="اسم السائق">
</div>

<div class="form-group col-md-6">
 <label for="">شكل المركبه</label>
        <select class="form-control" name="form">
          <?php foreach ($shapes as $shape): ?>
            
          <option value="<?= $shape->id ?>"><?= $shape->name ?> </option>
          <?php endforeach ?>
        </select>
        </div>

<div class="form-group col-md-6">
        <label for="">النوع</label>
        <select class="form-control" name="type">
           <?php foreach ($types as $type): ?>
            
          <option value="<?= $type->id ?>"><?= $type->name ?> </option>
          <?php endforeach ?>
        </select>
 </div>

<div class="form-group col-md-6">
        <label>الشركه المنصعه - البران</label>
    
 <select class="form-control" name="company">
           <?php foreach ($brands as $brand): ?>
            
          <option value="<?= $brand->id ?>"><?= $brand->name ?> </option>
          <?php endforeach ?>
        </select>
        </div>

<div class="form-group col-md-6">
<label>تغير الزيت</label>
        <input type="text" name="oil_change" required="true" id="oil_change" class="form-control" placeholder="فترة تغير الزيت " aria-describedby="helpId">

</div>


<div class="form-group col-md-6">
<label>اخر تغير زيت</label>
    <input type="text" name="last_change" required="true" class="form-control" placeholder="اخر تغير زيت">
</div>

<div class="form-group col-md-6">
<label>العداد العالى ( الكيلو متر)</label>
    <input type="text" name="distance" required="true" class="form-control" placeholder="العداد العالى ( الكيلو متر)">
</div>

<div class="form-group col-md-6">
<label>رقم الشاسى</label>
    <input type="text" name="chassis_no" required="true" class="form-control" placeholder="رقم الشاسى">
</div>
<div class="form-group col-md-12">

  <button class="btn btn-success">اضافة</button>
</div>
</div>
</form>


