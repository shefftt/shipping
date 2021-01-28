<form action="<?= base_url()?>admin/car_edit_post" method="post">
    <div class="form-group col-md-6">
        <input type="text" name="number" required="true"  class="form-control" value="<?= $car->number ?>">
    </div>
    <div class="form-group col-md-6">
        <input type="text" name="driver_name" required="true"  class="form-control"  value="<?= $car->driver_name ?>">
        <input type="hidden" name="id" required="true"  class="form-control"  value="<?= $car->id ?>">
    </div>
    <div class="form-group col-md-6">
        <label for="">شكل المركبه</label>
        <select class="form-control" name="form">
            <?php foreach ($shapes as $shape): ?>
            <option <?php if($shape->id ==  $car->form ) echo 'selected="true"' ?>  value="<?= $shape->id ?>"><?= $shape->name ?> </option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="form-group col-md-6">
        <label for="">النوع</label>
        <select class="form-control" name="type">
            <?php foreach ($types as $type): ?>
            <option <?php if($type->id ==  $car->type ) echo 'selected="true"' ?> value="<?= $type->id ?>"><?= $type->name ?> </option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="form-group col-md-6">
        <label>الشركه المنصعه - البران</label>

        <select class="form-control" name="company">
            <?php foreach ($brands as $brand): ?>

            <option value="<?= $brand->id ?>" <?php if($brand->id ==  $car->company ) echo 'selected="true"' ?> ><?= $brand->name ?> </option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="form-group col-md-6">
    
    <label>اقصى مسافه لتغير الزيت</label>
        <input type="text" name="oil_change" required="true"  class="form-control" value="<?= $car->oil_change ?>">

    </div>
    <div class="form-group col-md-6">
        <label>اخر تغير زيت</label>
            <input type="text" name="last_change" required="true"  value="<?= $car->last_change ?>" class="form-control" placeholder="اخر تغير زيت">
        </div>

        <div class="form-group col-md-6">
        <label>العداد العالى ( الكيلو متر)</label>
            <input type="text" name="distance" required="true"  value="<?= $car->distance ?>" class="form-control" placeholder="العداد العالى ( الكيلو متر)">
        </div>
        
        <div class="form-group col-md-6">
        <label>رقم الشاسى</label>
            <input type="text" name="chassis_no" required="true" value="<?= $car->chassis_no ?>" class="form-control" placeholder="رقم الشاسى">
        </div>
    <div class="form-group col-md-6">
        <button class="btn btn-success">اضافة</button>
    </div>
</form>