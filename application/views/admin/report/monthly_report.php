<form action="" method="post">
	<div class="col-xs-12 col-md-12">

		<div class="form-group col-md-4">
			<label for="">من </label>
			<input class="form-control" type="date" required name="from">
		</div>

		<div class="form-group col-md-4">
			<label>من</label>
			<input class="form-control" type="date" required name="to">

		</div>
		<div class="form-group col-md-4">
			<br>
			<button class="btn btn-md btn-success btn-block" type="submit">بحث</button>
		</div>
	</div>
</form>
<br>
<br>
<div class="col-md-12">
	<center>
		<h3>
			عرض تقارير الصيانه من
			<?= date_format(date_create(date($from_date)), "Y-m-d"); ?>

			الى
			<?= date_format(date_create(date($to_date)), "Y-m-d"); ?>
		</h3>
	</center>
</div>
<div class="col-xs-12 col-md-6">
	<div class="well with-header  with-footer">
		<div class="header bg-blue">
			الصيانة الدورية
		</div>
		<table class="table table-striped table-inverse table-responsive">
			<thead class="bordered-darkorange">
				<tr>
					<th>النوع </th>
					<th>العدد</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($types as $type) : ?>
					<tr>
						<td>
							<?= $type->name ?>
						</td>
						<td>
							<?= trucks_number($from_date, $to_date, $type->id, 'صيانة دورية') ?>
						</td>
					</tr>

				<?php endforeach; ?>

			</tbody>
		</table>
	</div>
</div>
<div class="col-xs-12 col-md-6"></div>
<br>
<br>
<div class="col-xs-12 col-md-6">
	<div class="well with-header  with-footer">
		<div class="header bg-blue">
			الصيانة العامة
		</div>
		<table class="table table-striped table-inverse table-responsive">
			<thead class="bordered-darkorange">
				<tr>
					<th>النوع </th>
					<th>العدد</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($types as $type) : ?>
					<tr>
						<td>
							<?= $type->name ?>
						</td>
						<td>
							<?= trucks_number($from_date, $to_date, $type->id, 'صيانة عامة') ?>
						</td>
					</tr>

				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-md-4">
		<div class="well with-header with-footer">
			<div class="header bg-palegreen">
				عدد مرات دخول الشاحنة داف
			</div>
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>
							#
						</th>
						<th>
							اللوحة
						</th>
						<th>
							العدد
						</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1;
					foreach ($DAF_cars as $car) :  
						if (maintenance_times($from_date, $to_date, $car->id) > 0) : ?>
						<tr>
							<td scope="row"><?= $i++ ?></td>
							<td>
								<?= $car->number ?>
							</td>
							<td>
								<?= maintenance_times($from_date, $to_date, $car->id) ?>
							</td>
						</tr>
						<?php endif; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-xs-12 col-md-4">
		<div class="well with-header with-footer">
			<div class="header bg-palegreen">
				عدد مرات دخول الشاحنة سايلو
			</div>
			<table class="table table-hover table-striped table-bordered">
				<thead class="bordered-blueberry">
					<tr>
						<th>
							#
						</th>
						<th>
							اللوحة
						</th>
						<th>
							العدد
						</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1;
					foreach ($SAYLO_cars as $car) :
					
					if (maintenance_times($from_date, $to_date, $car->id) > 0) : ?>
						<tr>
							<td scope="row"><?= $i++ ?></td>
							<td>
								<?= $car->number ?>
							</td>
							<td>
								<?= maintenance_times($from_date, $to_date, $car->id) ?>
							</td>
						</tr>
					<?php endif; ?>
					<?php endforeach; ?>

				</tbody>
			</table>
		</div>
	</div>


	<div class="col-md-4">
		<div class="well with-header with-footer">
			<div class="header bg-warning">
				هاو
			</div>
			<table class="table table-hover table-striped table-bordered">
				<thead class="bordered-blueberry">
					<tr>
						<th>
							#
						</th>
						<th>
							اللوحة
						</th>
						<th>
							العدد
						</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1;
					foreach ($HOWO_cars as $car) :
						if (maintenance_times($from_date, $to_date, $car->id) > 0) :
					?>
							<!-- اذا كان شكل المركبه داف جدول السيارات حقل فورم جدول البراند -->

							<tr>
								<td scope="row"><?= $i++ ?></td>
								<td>
									<?= $car->number ?>
								</td>
								<td>
									<?= maintenance_times($from_date, $to_date, $car->id) ?>
								</td>
							</tr>

						<?php endif; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>