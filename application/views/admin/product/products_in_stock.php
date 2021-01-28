<form action="<?= base_url()?>admin/products_in_add_post" method="post">

        <div class="form-group col-md-4">
        <label for="">المنتج</label>
        <select class="form-control" name="product_id">
            <?php foreach($products as $product):?>
            <option value="<?= $product->id ?>"><?= $product->name ?></option>
            <?php endforeach; ?>
        </select>
        </div>
        
         <div class="form-group col-md-4">
              <label for="">الكمية</label>
          <input type="text" name="qyt" required="true"  class="form-control" placeholder="الكميه" >
          </div>
          <div class="form-group col-md-4">
          <button class="btn btn-success">اضافة</button>
          </div>

 </form>  