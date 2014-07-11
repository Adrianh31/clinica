<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Login - Bootstrap Admin Template</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes"> 

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

        <link href="assets/css/font-awesome.css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">

        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <link href="assets/css/pages/signin.css" rel="stylesheet" type="text/css">

    </head>

    <body>

        <div class="navbar navbar-fixed-top">

            <div class="navbar-inner">

                <div class="container">            
                    <a class="brand" href="index.html">
                        <?php echo $this->config->item('name_company'); ?>               
                    </a>        
                </div> <!-- /container -->

            </div> <!-- /navbar-inner -->

        </div> <!-- /navbar -->



        <div class="account-container">

            <div class="content clearfix">

                <form action="<?php echo base_url('login/ingresar') ?>" method="post">

                    <h1>Login Empleados</h1>       

                    <div class="login-fields">

                        <p>Digite sus Credenciales</p>

                        <div class="field">
                            <label for="username">Usuario</label>
                            <input type="text" id="username" name="username" value="" placeholder="Usuario" class="login username-field" />
                        </div> <!-- /field -->

                        <div class="field">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field"/>
                        </div> <!-- /password -->

                    </div> <!-- /login-fields -->

                    <div class="login-actions">

<!--<span class="login-checkbox">
    <input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
    <label class="choice" for="Field">Keep me signed in</label>
</span>-->

                        <button class="button btn btn-success btn-large">Ingresar</button>

                    </div> <!-- .actions -->



                </form>

            </div> <!-- /content -->

        </div> <!-- /account-container -->



        <script src="assets/js/jquery-1.7.2.min.js"></script>
        <script src="assets/js/bootstrap.js"></script>

        <script src="assets/js/signin.js"></script>

    </body>

</html>
