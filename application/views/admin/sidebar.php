<div style='background-image:url("<?= base_url() ?>/assets/img/bg.png");' class="page-sidebar" id="sidebar">
    <!-- Page Sidebar Header-->
    <!-- /Page Sidebar Header -->
    <!-- Sidebar Menu -->
    <ul class="nav sidebar-menu">

        <!--Dashboard-->
        <li>
            <a href="<?php echo base_url() ?>admin">
                <i class="menu-icon glyphicon glyphicon-home"></i>
                <!-- <img src="<?= base_url() ?>assets/img/Refund_20px.png"> -->
                <span class="menu-text"> الرئسيه</span>
            </a>
        </li>
        <?php if (login()->level == 'stock') : ?>
            <li>
                <a href="<?php echo base_url() ?>admin/stocks">
                    <i class="menu-icon fa fa-home"></i>
                    <!-- <img src="<?= base_url() ?>assets/img/Refund_20px.png"> -->
                    <span class="menu-text"> المخازن</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>admin/job_add">
                    <i class="menu-icon fa fa-home"></i>
                    <!-- <img src="<?= base_url() ?>assets/img/Refund_20px.png"> -->
                    <span class="menu-text"> اضافة مهمه</span>
                </a>
            </li>
              <li>
                <a href="<?php echo base_url() ?>admin/products_stocks">
                    <i class="menu-icon fa fa-home"></i>
                    <!-- <img src="<?= base_url() ?>assets/img/Refund_20px.png"> -->
                    <span class="menu-text">منتجات المخازن</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>admin/products_in_add">
                    <i class="menu-icon fa fa-home"></i>
                    <span class="menu-text"> اضافة كميه</span>
                </a>
            </li>

            <li>
                <a href="<?= base_url() ?>admin/products">
                    <i class="menu-icon fa fa-cubes"></i>
                    <span class="menu-text">المنتجات</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>admin/categories">
                    <i class="menu-icon fa fa-cubes"></i>
                    <span class="menu-text">التصنيفات</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>admin/units">
                    <i class="menu-icon fa fa-cubes"></i>
                    <span class="menu-text">الوحدات</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>admin/add_shelves">
                    <i class="menu-icon fa fa-cubes"></i>
                    <span class="menu-text">الرفوف</span>
                </a>
            </li>
             <li>
                <a href="<?= base_url() ?>admin/out_of_stock">
                    <i class="menu-icon fa fa-cubes"></i>
                    <span class="menu-text">منصرفات لفتره</span>
                </a>
            </li>
            <li>
                        <a href="<?= base_url() ?>admin/stock_qyt">
                    <i class="menu-icon fa fa-cubes"></i>
                            <span class="menu-text">تقرير الكميات</span>
                        </a>
                    </li>
        <?php else : ?>
            <li>
                <a href="#" class="menu-dropdown">
                    <i class="menu-icon fa fa-check-square-o"></i>
                    <span class="menu-text">المهام</span>

                    <i class="menu-expand"></i>
                </a>

                <ul class="submenu">
                    <li>
                        <a href="<?= base_url() ?>admin/job_add">
                            <span class="menu-text">اضافة مهمه</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>admin/open_job">
                            <span class="menu-text">المهام المفتوحه</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>admin/jobs">
                            <span class="menu-text">المهام المنتهيه</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="<?= base_url() ?>admin/cars">
                    <i class="menu-icon fa fa-car"></i>
                    <span class="menu-text"> السيارات</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>admin/egineers">
                    <i class="menu-icon fa fa-group"></i>
                    <span class="menu-text">الفنيين</span>
                </a>


            </li>
            <li>
                <a href="#" class="menu-dropdown">
                    <i class="menu-icon fa fa-pencil-square-o"></i>
                    <span class="menu-text">اعدادات</span>

                    <i class="menu-expand"></i>
                </a>

                <ul class="submenu">
                    <li>
                        <a href="<?= base_url() ?>admin/cars_shape">
                            <span class="menu-text">اشكال السيارت</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>admin/brands">
                            <span class="menu-text">الماركه</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="menu-dropdown">
                    <i class="menu-icon fa fa-pencil-square-o"></i>
                    <span class="menu-text">التقارير</span>

                    <i class="menu-expand"></i>
                </a>

                <ul class="submenu">
                    <li>
                        <a href="<?= base_url() ?>admin/daily_report">
                            <span class="menu-text">التقرير اليومي</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>admin/monthly_report">
                            <span class="menu-text">التقرير لفتره</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>admin/car_report">
                            <span class="menu-text">تقرير للوحده</span>
                        </a>
                    </li>
                  
                </ul>
            </li>
        <?php endif; ?>
        <li>
            <a href="<?php echo base_url() ?>login/logout">

                <img src="<?= base_url() ?>assets/img/Shutdown_20px.png">
                <span class="menu-text">خروج</span>
            </a>
        </li>
    </ul>




    <!--Widgets-->

    </ul>
    <!-- /Sidebar Menu -->
</div>