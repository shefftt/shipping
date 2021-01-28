
<div class="col-m-12">
<a class="btn btn btn-labeled btn-info" href="<?= base_url()?>admin/products_in_add"><i class="btn-label fa fa-plus"></i>اضافة كميه جديده</a>
<button  onclick="printDiv('printableArea')" class="btn btn btn-labeled btn-info" href="<?= base_url()?>admin/products_in_add"><i class="btn-label fa fa-print"></i>طباعه</button>

</div>
<br>
<div id="printableArea">
    <div class="com-md-12 ahme2">
        <center>
            
        <h2>شركه الخير عثمان للنقل</h2>
        </center>
    </div>

<table class="table table-hover">
     <thead>
        <tr>
            <th>#</th>
            <th>المنتج</th>
            
             <th>الكميه</th>
              <th>سعر الوحدة</th>
               <th>المجموع</th>
           
           
            <th class='ahmed'>عرض</th>
        </tr>
    </thead>
    <tbody>
           <!--products_in_stock-->
    <?php $i= 1; foreach ($products as $product) :?> 
    <?php if(products_in_stock($product->id , $stock_id) > 0) : ?>
        <tr>
            <td scope="row"><?= $i++ ?></td>
            <td><?= $product->name ?> </td>
            <td><?= products_in_stock($product->id , $stock_id) ?> </td>
            
             <td>
             <?= $product->price?> 
            
             </td>
              <td><?= $product->price* products_in_stock($product->id , $stock_id) ?> </td>
              
    
            <td class='ahmed'><a href="<?= base_url() ?>admin/product/<?= $product->id ?>">عرض</a></td>
        </tr>
        <?php endif; ?>
<?php endforeach;?>
    </tbody>
    
</table>

 <span class="label label-sky" style="
    margin-top: 0.5rem;
">
                                               المجموع الكلي =   <?= stock_total($stock_id) ?> 
                                            </span>
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