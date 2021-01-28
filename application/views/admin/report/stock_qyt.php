<div class="col-md-12">
<button  onclick="printDiv('printableArea')" class="btn btn btn-labeled btn-info" href="<?= base_url()?>admin/products_in_add"><i class="btn-label fa fa-print"></i>طباعه</button>
<br>
<br>
<br>

<form action="" method="post">
	<div class="col-xs-12 col-md-12">

    <!-- <div class="form-group col-md-3">
			<label>المخزن</label>
            <select class="form-control" name="stock_id">
            <?php foreach ($stocks as  $stock) : ?>
                    <option value="<?= $stock->name ?>"><?= $stock->name ?></option>
            <?php endforeach; ?>
            </select>
		</div> -->
		
    <!-- <div class="form-group col-md-3">
        <label>الوحده</label>
        <select class="form-control" name="equ">
                <option value="=">يساوي</option>
                <option value=">">اكبر من</option>
                <option value="<">اصغر من</option>
        </select>
    </div> -->
    <div class="form-group col-md-3">
        <label>اقل كميه</label>
        <input type="text" name="qyt" value="0" class="form-control">
    </div>
    <div class="form-group col-md-3">
        <br>
        <input type="submit" value="بحث" class="btn btn-md">
    </div>
		
	</div>
</form>
<br> 
<br>

<div id=printableArea>
<div class="col-xs-12 col-md-12">

	<div id="printableArea">

<div class="col-xs-12 col-md-12">
<center>
<h1>
الكميات الاقل من او يساوى
<?= $this->input->post('qyt'); ?><br>

<?= date("Y-m-d")?>
</h1>
</center>
</div>
<div class="col-xs-12 col-md-12">
	<div class="well with-header  with-footer">
		<div class="header bg-blue">
			تقرير كميات المخازن
		</div>
        <table class="table table-hover">
     <thead>
        <tr>
            <th>#</th>
            <th>المنتج</th>
            
             <th>التصنيف</th>
             <th>الكميه</th>
              <th>سعر الوحدة</th>
              
               <th>المجموع</th>
                <th>المخزن</th>
             <th>الرف</th>
             <th>وحده القياس</th>
             <th>الرقم التسلسلى</th>
           
         
        </tr> 
    </thead>
    <tbody>
           <!--products_in_stock-->
    <?php $i= 1; $sum = 0; foreach ($products as $product) :?> 
    <?php if(products_stocks($product->id ) <= $this->input->post('qyt')) : ?>
    
        <tr>
            <td scope="row"><?= $i++ ?></td>
            <td><?= $product->name ?> </td>
            <td><a href="<?= base_url() ?>admin/category/<?= $product->id ?>"><?= get_categorys($product->category)->name ?></a></td>
            <td><?= products_stocks($product->id ) ?> </td>
             <td>
             <?= $product->price?> 
            
             </td>
             <?php $sum += $product->price* products_stocks($product->id ) ?>
              <td><?= $product->price* products_stocks($product->id ) ?> </td>
               <td>
               <?= get_stock($product->stock_id)->name ?> </td>
            <td>
            <?= get_shelve($product->shelve_id)->name ?> </td>
            <td><?= table_info("units" , $product->unit_id)->name ?> </td>
            <td> <?= $product->code ?> </td>
           
            
        </tr>
        <?php endif; ?>
        
<?php endforeach;?>
    </tbody>
    
</table>
	</div>
</div>
</div>
</div>

<script>
    function printDiv(divName) {
        
        $('.ahmed').css('display', 'none');
        $('.ahme2').css('display', 'block');
        console.log('dddddddddd')
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>