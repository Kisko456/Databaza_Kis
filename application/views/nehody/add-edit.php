<!DOCTYPE html>
<html lang="en-US">
<head>

    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

</head>
<body>





<div class="container">
    <div class="row">

        <div class="span12">

            <div class="well">
                <h1 style="text-align: center;"> Doprava na Slovensku </h1>


            </div>
        </div>
    </div>



    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url() ?>Home.php">Domov</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a class="glyphicon glyphicon-globe" href="<?php echo site_url('oblast/index'); ?>" class="active"> Oblasti</a></li>
                    <li><a class="glyphicon glyphicon-filter" href="<?php echo site_url('kategorie/index'); ?>" class="active"> Kategórie</a></li>
                    <li><a class="glyphicon glyphicon-alert" href="<?php echo site_url('nehody/index'); ?>" class="active"> Nehody</a></li>
                    <li><a class="glyphicon glyphicon-exclamation-sign" href="<?php echo site_url('uzavery/index'); ?>" class="active"> Uzávery</a></li>
                    <li><a class="glyphicon glyphicon-road" href="<?php echo site_url('cesty/index'); ?>" class="active"> Cesty</a></li>
                    <li><a class="glyphicon glyphicon-transfer" href="<?php echo site_url('premavka/index'); ?>" class="active"> Premávka</a></li>

                </ul>


                <form class="navbar-form navbar-left">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Hľadať">
                    </div>
                    <button type="submit" class="btn btn-default">Potvrdiť</button>
                </form>



            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="container">
        <div class="row"><br></div>
        <div class="col-xs-12">
            <?php
            if(!empty($success_msg)){
                echo '<div class="alert alert-success">'.$success_msg.'</div>';
            }elseif(!empty($error_msg)){
                echo '<div class="alert alert-danger">'.$error_msg.'</div>';
            }
            ?>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo $action; ?> nehodu <a href="<?php echo site_url('nehody/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
                    <div class="panel-body">
                        <form method="post" action="" class="form">

                            <div class="form-group">
                                <label for="title">Číslo cesty</label>
                                <input type="text" class="form-control" name="idCesty" id="idCesty" placeholder="Zadajte číslo cesty" value="<?php echo !empty($post['idCesty'])?$post['idCesty']:''; ?>">
                                <?php echo form_error('idCesty','<p class="help-block text-danger">','</p>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="title">Dátum</label>
                                <input type="text" class="form-control" name="Datum" placeholder="Zadajte dátum nehody" value="<?php echo !empty($post['Datum'])?$post['Datum']:''; ?>">
                                <?php echo form_error('Datum','<p class="help-block text-danger">','</p>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="title">Čas</label>
                                <input type="text" class="form-control" name="Cas" placeholder="Zadajte čas v minútach" value="<?php echo !empty($post['Cas'])?$post['Cas']:''; ?>">
                                <?php echo form_error('Cas','<p class="help-block text-danger">','</p>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="title">Zdržanie</label>
                                <input type="text" class="form-control" name="Zdrzanie" placeholder="Zadajte zdržanie v minútach" value="<?php echo !empty($post['Zdrzanie'])?$post['Zdrzanie']:''; ?>">
                                <?php echo form_error('Zdrzanie','<p class="help-block text-danger">','</p>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="title">Kilometer nehody</label>
                                <input type="text" class="form-control" name="KM_nehody" placeholder="Zadajte kilometer nehody" value="<?php echo !empty($post['KM_nehody'])?$post['KM_nehody']:''; ?>">
                                <?php echo form_error('KM_nehody','<p class="help-block text-danger">','</p>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="title">Príčina</label>
                                <input type="text" class="form-control" name="pricina" placeholder="Zadajte príčinu" value="<?php echo !empty($post['pricina'])?$post['pricina']:''; ?>">
                                <?php echo form_error('pricina','<p class="help-block text-danger">','</p>'); ?>
                            </div>



                            <input type="submit" name="postSubmit" class="btn btn-primary" value="Potvrdiť"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src= "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>



    <script type="text/javascript">
        $(document).ready(function() {
            $('#usertable').DataTable();
        });
    </script>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>

    <!--
    <div class="row">
        <div class="span12">
            <div class="well">
                <center><h3> Copyright &copy; Michal Kis </center></h3>
            </div>
            </div>
            </div>
    </div>
    -->

</body>
</html>
