<form action="<?= base_url() ?>admin/new_product_in_job_post" method="post">
	<div class="col-xs-12 col-md-12">
		<div class="well with-header with-footer">
			<div class="header bordered-success">
				<div class="row">
				    <div class="col-md-6">
				        الاسبيرات
				    </div>
				    <input id="id" class="tags form-control input-md" type="hidden" placeholder="" name="job_id" value="<?= $job_id ?>">
				    <div class="col-md-4">
				        	<input id="part_number" class="tags form-control input-md" type="text" placeholder="الاسبير">
				    </div>
				    
				    <div class="col-md-2">
				        	<p id="add" class="btn btn-azure shiny">اضافة</p>
				    </div>
				</div>
				
			</div>
			<div class="table-scrollable">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>الاسم\الرقم </th>
							<th>العدد</th>
						</tr>
					</thead>
					<tbody id="invoice">
					
					</tbody>
				</table>
			</div>
			<div class="footer">
			</div>
		</div>
	</div>
	<br>
	<div class="col-md-12">
	    
	<button class="btn btn-success">اضافة</button>
	</div>
	</div>
</form>


        <script>
     
          $(document).ready(function() {
              
            $("#add").on('click' , function () {
               var part_number = $("#part_number").val();
                
                  console.log(part_number)
              $.ajax({
                type: 'POST',
                url: "<?= base_url() ?>admin/part_number",
                data: {
                  'part_number': part_number
                },
               
                success: function (resultData) {
                  $('#invoice').append(resultData)
                  $("#part_number").val('');
  
                }
              });
            })
          });
          </script> 