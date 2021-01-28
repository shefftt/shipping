<!DOCTYPE html>
<html>

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
    <link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet">


    <!--Basic Styles-->
    <link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/css/bootstrap-rtl.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/css/weather-icons.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet" />

    <!--Fonts-->
    <link
        href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300"
        rel="stylesheet" type="text/css">
    <link href="fonts.googleapis.com/earlyaccess/droidarabickufi.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css" />
    <!--Beyond styles-->
    <link href="<?php echo base_url(); ?>/assets/css/beyond-rtl.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/css/4095-rtl.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>/assets/css/demo.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/css/typicons.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/css/animate.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/froala-editor@3.0.0-beta.0/css/froala_editor.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/vue.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/axios.min.js"></script>



    <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/buttons.print.min.js"></script>

    <link rel="stylesheet" href="/resources/demos/style.css">

    <link id="skin-link" href="#" rel="stylesheet" type="text/css" />
    <style type="text/css">
    html * {
        font-family: 'DroidArabicKufiRegular';
        font-weight: normal;
        font-style: normal;
    }
    .font-size{
        font-size: 20px;
    }

    #car_number {
        font-family: 'Anton', sans-serif;
    }

    .ahme2 {
        display: none
    }
    span {
        /* font-size: 26px; */
    }

    @media print {
        a[href]:after {
            content: none !important;
        }
		.col-md-4{
			float: right;
			text-align: center;
		}
    }
    </style>

</head>
<!-- /Head -->
<!-- Body -->

<body>
    <!-- Loading Container -->
    <div class="loading-container">
        <div class="loader"></div>
    </div>
    <!--  /Loading Container -->
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="navbar-container">
                <!-- Navbar Barnd -->
                <div class="navbar-header pull-right">
                    <a href="#" class="navbar-brand">
                        <h4>OAE</h4>
                    </a>
                </div>
                <!-- /Navbar Barnd -->
                <div class="sidebar-collapse" id="sidebar-collapse">
                    <i class="collapse-icon fa fa-bars"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- /Navbar -->
    <!-- Main Container -->
    <div class="main-container container-fluid">
        <!-- Page Container -->
        <div class="page-container">
            <!-- Page Sidebar -->
            <?php include $sidebar ?>
            <!-- /Page Sidebar -->

            <!-- Page Content -->
            <div class="page-content">
                <!-- Page Breadcrumb -->
                <div class="page-breadcrumbs">
                    <ul class="breadcrumb">
                        <li class="active">لوحة التحكم</li>
                    </ul>
                </div>
                <!-- /Page Breadcrumb -->
                <!-- Page Header -->
                <div class="page-header position-relative">
                    <div class="header-title">
                        <h1 style="color: red; font-style: oblique;">

                        </h1>
                    </div>
                    <!--Header Buttons-->
                    <div class="header-buttons">
                        <a class="sidebar-toggler" href="#">
                            <i class="fa fa-arrows-h"></i>
                        </a>
                        <a class="refresh" id="refresh-toggler" href="#">
                            <i class="glyphicon glyphicon-refresh"></i>
                        </a>
                        <a class="fullscreen" id="fullscreen-toggler" href="#">
                            <i class="glyphicon glyphicon-fullscreen"></i>
                        </a>
                    </div>
                    <!--Header Buttons End-->
                </div>
                <!-- /Page Header -->
                <!-- Page Body -->
                <div class="page-body">
                    <?php
					if (isset($page)) {
						include $page;
					}
					?>
                </div>
                <!-- /Page Body -->
            </div>
            <!-- /Page Content -->
        </div>
        <!-- /Page Container -->
        <!-- Main Container -->

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
    <script src="<?php echo base_url(); ?>assets/js/charts/chartjs/Chart.js"></script>




    <!-- Include JS file. -->
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@3.0.6/js/froala_editor.pkgd.min.js'>
    </script>


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js">
    <!--Page Related Scripts
    -->
    <!--Bootstrap  wysiwig Scripts-->
    <script src="<?= base_url() ?>assets/js/editors/wysiwyg/jquery.hotkeys.js"></script>
    <script src="<?= base_url() ?>assets/js/editors/wysiwyg/prettify.js"></script>
    <script src="<?= base_url() ?>assets/js/editors/wysiwyg/bootstrap-wysiwyg.js"></script>
    <script>
    $(function() {
        function initToolbarBootstrapBindings() {
            var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
                    'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans',
                    'Tahoma', 'Times',
                    'Times New Roman', 'Verdana'
                ],
                fontTarget = $('[title=Font]').siblings('.dropdown-menu');
            $.each(fonts, function(idx, fontName) {
                fontTarget.append($('<li><a data-edit="fontName ' + fontName +
                    '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
            });
            $('a[title]').tooltip({
                container: 'body'
            });
            $('.dropdown-menu input').click(function() {
                    return false;
                })
                .change(function() {
                    $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
                })
                .keydown('esc', function() {
                    this.value = '';
                    $(this).change();
                });

            $('[data-role=magic-overlay]').each(function() {
                var overlay = $(this),
                    target = $(overlay.data('target'));
                overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(
                    target.outerWidth()).height(target.outerHeight());
            });
            if ("onwebkitspeechchange" in document.createElement("input")) {
                var editorOffset = $('#editor').offset();
                $('#voiceBtn').css('position', 'absolute').offset({
                    top: editorOffset.top,
                    left: editorOffset.left + $('#editor').innerWidth() - 35
                });
            } else {
                $('#voiceBtn').hide();
            }
        };

        function showErrorAlert(reason, detail) {
            var msg = '';
            if (reason === 'unsupported-file-type') {
                msg = "Unsupported format " + detail;
            } else {
                console.log("error uploading file", reason, detail);
            }
            $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
                '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
        };
        initToolbarBootstrapBindings();
        $('.wysiwyg-editor').wysiwyg({
            fileUploadError: showErrorAlert
        });
        window.prettyPrint && prettyPrint();
    });
    </script>

    <!--Summernote Scripts-->
    <script src="<?= base_url() ?>assets/js/editors/summernote/summernote.js"></script>
    <script>
    $('#summernote').summernote({
        height: 300
    });
    </script>



    </script>
    <script>
    $(function() {
        var availableTags = [ <?php if (isset($product_arry)) echo $product_arry ?> ];
        $(".tags").autocomplete({
            source: availableTags
        });
    });
    </script>



    <script>
    // $("#drogname").enterKey(function () {
    //     alert('Enter!');
    // })
    </script>
    <script>
    function get_invoice_info(id) {

        $('#invoice_info').html('');

        $.ajax({
            type: 'POST',
            url: "<?= base_url() ?>api/get_invoice_info",
            data: {
                'id': id
            },
            success: function(resultData) {
                $('#drug_id').val("");
                if (resultData === "No") {
                    alert("غقوا رقم الدواء الذى تم ادخاه غير صحيح");
                    return;
                }
                $('#invoice_info').append(resultData)

            }
        });
    }

    $("#insurance_comapnay").change(function() {
        document.getElementById("loc").innerHTML = "You selected: " + document.getElementById(
            "insurance_comapnay").value;
    })
    </script>


</body>
<!--  /Body -->

<!-- Mirrored from beyondadmin-v1.6.0.s3-website-us-east-1.amazonaws.com/index-rtl-ar.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 May 2017 07:23:19 GMT -->

</html>