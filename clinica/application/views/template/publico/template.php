<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title><?php echo $this->config->item('name_company'); ?></title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">    



        <link rel='stylesheet' href="<?php echo base_url('assets/js/full-calendar/lib/cupertino/jquery-ui.min.css') ?>" />
        <link href="<?php echo base_url('assets/js/full-calendar/fullcalendar.css') ?>" rel='stylesheet' />

        <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/bootstrap-responsive.min.css') ?>" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">



        <script src="<?php echo base_url('assets/js/full-calendar/lib/moment.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery-1.7.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery-ui.custom.min.js') ?>"></script>        
        <script src="<?php echo base_url('assets/js/excanvas.min.js') ?>"></script> 
        <script src="<?php echo base_url('assets/js/chart.min.js') ?>"></script> 
        <script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/full-calendar/fullcalendar.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/base.js') ?>"></script> 


        <link href="<?php echo base_url('assets/js/datepicker/css/datepicker.css') ?>" rel="stylesheet">
        <script src="<?php echo base_url('assets/js/datepicker/js/bootstrap-datepicker.js') ?>"></script> 

        <link href="<?php echo base_url('assets/js/timepicker/css/bootstrap-timepicker.min.css') ?>" rel="stylesheet">
        <script src="<?php echo base_url('assets/js/timepicker/js/bootstrap-timepicker.min.js') ?>"></script> 


        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body>


        <!-- Load Header -->
        <?php $this->load->view('template/publico/header'); ?>    
        <!-- Load Header -->


        <!-- Load Menu -->
        <?php $this->load->view('template/publico/menu'); ?>
        <!-- Load Menu -->

        <div class="main">

            <div class="main-inner">

                <div class="container">
                    <?php $this->load->view($contenido); ?>
                </div> <!-- /container -->

            </div> <!-- /main-inner -->

        </div> <!-- /main -->



        <!-- Load Footer -->   
        <?php $this->load->view('template/footer'); ?>
        <!-- Load Footer -->



    </body>

</html>
