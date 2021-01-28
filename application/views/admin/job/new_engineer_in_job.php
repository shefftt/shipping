<form action="<?= base_url() ?>admin/new_engineer_in_job_post" method="post">

<div class="form-group col-md-12">
<input type="hidden" name="job_id" value="<?= $job_id ?>">

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

    <div class="col-md-12">
    
    <button class="btn btn-info">اضافه</button>
    </div>  
    </form>