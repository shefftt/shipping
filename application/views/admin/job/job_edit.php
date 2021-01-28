<form action="<?= base_url() ?>admin/job_edit_post" method="post">
<input name="job_id" value="<?= $job->id ?>" type="hidden">
	<div class="form-group col-md-6">
		<label for="">رقم المركبه</label>
		<select class="form-control" name="car_id">
			<?php foreach ($cars as $car) : ?>
				<option <?php if($job->car_id == $car->id) : ?> selected="true" <?php endif; ?> value="<?= $car->id ?>"><?= $car->number ?></option>
			<?php endforeach; ?>
		</select>
	</div>

	<div class="form-group col-md-6">
		<label for="">نوع الجوب</label>
		<select class="form-control" name="type">
			<option <?php if($job->type == "صيانة دورية") : ?> selected="true" <?php endif; ?> value="صيانة دورية">صيانة دورية</option>
			<option <?php if($job->type == "صيانة عامة") : ?> selected="true" <?php endif; ?> value="صيانة عامة"> صيانة عامة</option>
		</select>
	</div>




	<div class="col-lg-12">
		<div class="form-group">
			<label for="exampleInputEmail2">
				<h5>الاعطال</h5>
			</label>
			<span class="input-icon icon-right">
				<textarea id="summernote" class="form-control"  rows="4" name="problems"><?= $job->problems ?></textarea>

			</span>

		</div>

	</div>



	<br>
	<div class="col-md-12">

		<button class="btn btn-success">تعديل</button>
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