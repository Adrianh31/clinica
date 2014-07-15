<div class="navbar navbar-fixed-top">

    <div class="navbar-inner">

        <div class="container">

            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <a class="brand" href="index.html">
                <?php echo $this->config->item('name_company'); ?>
            </a>        

            <div class="nav-collapse">
                <ul class="nav pull-right">

                    <li class="dropdown">                       
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> 
                                    Ingresar
                            <b class="caret"></b>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url('login') ?>">Login</a></li>
                        </ul>                       
                    </li>
                </ul>


            </div><!--/.nav-collapse -->    

        </div> <!-- /container -->

    </div> <!-- /navbar-inner -->

</div> <!-- /navbar -->