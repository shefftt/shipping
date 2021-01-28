<!DOCTYPE html>

<head>
	<meta charset="utf-8" />
	<title><?php if (isset($title)) echo $title;
			else echo "منظمه انسان"; ?></title>

	<meta name="description" content="Dashboard" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/img/favicon.png" type="image/x-icon">




	<link href="<?php echo base_url(); ?>/assets/css/jquery.dataTables.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>/assets/css/buttons.dataTables.min.css" rel="stylesheet" />


	<!--Basic Styles-->
	<link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>/assets/css/bootstrap-rtl.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>/assets/css/font-awesome.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>/assets/css/weather-icons.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet" />

	<!--Fonts-->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css">
	<link href="fonts.googleapis.com/earlyaccess/droidarabickufi.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css" />
	<!--Beyond styles-->
	<link href="<?php echo base_url(); ?>/assets/css/beyond-rtl.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>/assets/css/4095-rtl.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>/assets/css/demo.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>/assets/css/typicons.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>/assets/css/animate.min.css" rel="stylesheet" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/vue.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/axios.min.js"></script>

	<link id="skin-link" href="#" rel="stylesheet" type="text/css" />
	<style type="text/css">
		html * {
			font-family: 'DroidArabicKufiRegular';
			font-weight: normal;
			font-style: normal;
		}
	</style>

</head>
<!-- /Head -->
<!-- Body -->

<body>

<div class="login-container animated fadeInDown">
    <?php if($this->session->flashdata('login_error')) : ?>
    <div class="logobox">
        <div class="alert alert-danger fade in">
            <button class="close" data-dismiss="alert">
                ×
            </button>
            <i class="fa-fw fa fa-times"></i>
            <strong>عفواً!</strong>
            <?= $this->session->flashdata('login_error') ?>
        </div>
    </div>
    <?php endif; ?>
	<div class="loginbox bg-white">
		<div class="loginbox-title">
			<h4>
				تسجيل دخول
			</h4>
		</div>
		<br>
		<form action="<?= base_url() ?>login/login_post" method="post">
			<div class="loginbox-textbox">
				<input type="text" name="email" class="form-control" placeholder="البريد الالكتروني">
			</div>
			<div class="loginbox-textbox">
				<input type="password" name="pass" class="form-control" placeholder="كلمه السر">
			</div>
			<div class="loginbox-submit">
				<input type="submit" class="btn btn-primary btn-block" value="دخول">
				
			</div>
		</form>
	</div> 
	
</div>


	<!--Basic Scripts-->
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/slimscroll/jquery.slimscroll.min.js"></script>

	<!--Beyond Scripts-->
	<script src="<?php echo base_url(); ?>assets/js/skins.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/beyond.min.js"></script>





	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/highcharts.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/buttons.print.min.js"></script>



	<script>
		$(document).ready(function() {
			$('#myTable').DataTable({
				dom: 'Bfrtip',
				paging: false,
				text: 'Export',
				buttons: [
					'copy',
					'excel',
					'csv',
					'pdf',
					'print'
				]
			});
		});

		function printData() {
			var divToPrint = document.getElementById("printTable");
			newWin = window.open("");
			newWin.document.write(divToPrint.outerHTML);
			newWin.print();
			newWin.close();
		}
	</script>



</body>
<!--  /Body -->

<!-- Mirrored from beyondadmin-v1.6.0.s3-website-us-east-1.amazonaws.com/index-rtl-ar.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 07:23:19 GMT -->

</html>
