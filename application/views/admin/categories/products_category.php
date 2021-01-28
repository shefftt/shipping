
<div class="col-m-12">
<button  onclick="printDiv('printableArea')" class="btn btn btn-labeled btn-info" href="<?= base_url()?>admin/products_in_add"><i class="btn-label fa fa-print"></i>طباعه</button>

</div>
<br>
<div id="printableArea">
  <h3>
<?= date("Y-m-d")?></h3>

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
             <th>الوحده</th>
             <th>الكود</th>
           
         
        </tr> 
    </thead>
    <tbody>
           <!--products_in_stock-->
    <?php $i= 1; $sum = 0; foreach ($products as $product) :?> 
    <?php if($product->qyt > 0) : ?>
        <tr>
            <td scope="row"><?= $i++ ?></td>
            <td><?= $product->name ?> </td>
            <td><a href="<?= base_url() ?>admin/category/<?= $product->id ?>"><?= get_categorys($product->category)->name ?></a></td>
            <td><?=  $product->qyt  ?> </td>
             <td>
             <?= $product->price?> 
            
             </td>
             <?php $sum += $product->price* $product->qyt ?>
              <td><?= $product->price* $product->qyt ?> </td>
               <td>
               <?= get_stock($product->stock_id)->name ?> </td>
            <td><?= get_shelve($product->shelve_id)->name ?> </td>
            <td><?= table_info("units" , $product->unit_id)->name ?> </td>
            <td>
             <?= $product->code?> 
            
             </td>
            
        </tr>
        <?php endif; ?>
<?php endforeach;?>
    </tbody>
    
</table>
<br>
<br>
 <h1  style="
    margin-top: 0.5rem;
">
                                               المجموع الكلي = <?=  $sum?> 
                                            </h1>
</div>
<br>
<br><br>
<br><br>
<br>
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