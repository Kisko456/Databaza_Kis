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
                    <li><a class="glyphicon glyphicon-globe" href="<?php echo site_url('oblast/index'); ?>" class="active">Oblasti</a></li>
                    <li><a class="glyphicon glyphicon-filter" href="<?php echo site_url('kategorie/index'); ?>" class="active">Kategórie</a></li>
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
        <?php if(!empty($success_msg)){ ?>



            <div class="col-xs-12">
                <div class="alert alert-success"><?php echo $success_msg; ?></div>
            </div>
        <?php }elseif(!empty($error_msg)){ ?>
            <div class="col-xs-12">
                <div class="alert alert-danger"><?php echo $error_msg; ?></div>
            </div>
        <?php } ?>
        <div class="row">
            <h1>Zoznam kategórií</h1>

        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default ">
                    <div class="panel-heading">Kategórie <a href="<?php echo site_url('kategorie/add'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
                    <table id="usertable" class="table table-striped">
                        <thead>
                        <tr>
                            <th width="20%">Kategória cesty</th>
                            <th width="20%">Číslo cesty</th>
                            <th width="20%">Dĺžka cesty v KM</th>


                        </tr>
                        </thead>
                        <tbody id="userData">
                        <?php if(!empty($kategorie)): foreach($kategorie as $kategorie): ?>
                            <tr>

                                <td><?php echo $kategorie['Kategoria']; ?></td>
                                <td><?php echo $kategorie['Cislo_cesty']; ?></td>
                                <td><?php echo $kategorie['Dlzka_cesty'];?></td>

                                <td>
                                    <a class="btn btn-info btn-xs" href="<?php echo site_url('kategorie/view/'.$kategorie['idKategorie']); ?>">Prehľad</a>
                                    <a class="btn btn-success btn-xs" href="<?php echo site_url('kategorie/edit/'.$kategorie['idKategorie']); ?>" >Upraviť</a>
                                    <a class="btn btn-warning btn-xs" href="<?php echo site_url('kategorie/delete/'.$kategorie['idKategorie']); ?>"  onclick="return confirm('Ste si istý že chcete odstrániť záznam?')">Zmazať</a>
                                </td>
                            </tr>
                        <?php endforeach; else: ?>
                            <tr><td colspan="4">Záznam nebol nájdený......</td></tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
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


