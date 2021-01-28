<form action="<?= base_url() ?>admin/job_post" method="post">
	<div class="form-group col-md-6">
		<label for="">رقم المركبه</label>
		<select class="form-control" name="car_id">
		
	<?php if (login()->level != 'stock') : ?>
			<?php foreach ($cars as $car) : ?>
				<option value="<?= $car->id ?>"><?= $car->number ?></option>
			<?php endforeach; ?>
			<?php else : ?>
			
			<option value="62">منصرفات اخرى</option>
			<?php endif; ?>
		</select>
	</div>

	<div class="form-group col-md-6">
		<label for="">نوع الجوب</label>
		<select class="form-control" name="type">
			<option value="صيانة دورية">صيانة دورية</option>
			<option value="صيانة عامة"> صيانة عامة</option>
		</select>
	</div>
	<?php if (login()->level != 'stock') : ?>
	<div class="form-group col-md-12">
		<label for="">الفنيين</label>
	</div>


	<div class="form-group col-md-12">

		<?php foreach ($egineers as $egineer) : ?>

			<div class="col-md-3">
				<div class="checkbox">
					<label>
						<input type="checkbox" value="<?= $egineer->id ?>" name="engineer_id[]">
						<span class="text"><?= $egineer->name ?></span>
					</label>
				</div>
			</div>
		<?php endforeach; ?>

	</div>
	<?php endif; ?>
	<br>
	<div class="form-group col-md-6">
		<label for="">- الكيلو متر -  المسافة المقطوعة</label>
		<input type="text" name="distance" required="true" id="distance" class="form-control" placeholder="المسافة المقطوعة " aria-describedby="helpId">
	</div>
		<div class="form-group col-md-6">
		<label for="">رقم الجوب</label>
		<input type="text" name="job_number" required="true"  class="form-control" placeholder="رقم الجوب">
	</div>

	<div class="col-lg-12">
		<div class="form-group">
			<label for="exampleInputEmail2">
				<h5>الاعطال</h5>
			</label>
			<span class="input-icon icon-right">
				<textarea id="summernote" class="form-control" rows="4" name="problems"></textarea>

			</span>

		</div>

	</div>




	<div class="col-xs-12 col-md-12">
		<div class="well with-header with-footer">
			<div class="header bordered-success">
				<div class="row">
					<div class="col-md-6">
						الاسبيرات
					</div>
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

		$("#add").on('click', function() {
			var part_number = $("#part_number").val();

			console.log(part_number)
			$.ajax({
				type: 'POST',
				url: "<?= base_url() ?>admin/part_number",
				data: {
					'part_number': part_number
				},

				success: function(resultData) {
					$('#invoice').append(resultData)
					$("#part_number").val('');

				}
			});
		})
	});
</script>