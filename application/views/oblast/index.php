<?php
$connect = mysqli_connect("localhost", "root", "", "cesty");
$query = "SELECT Kraj, count(*) as number FROM oblast GROUP BY Kraj";
$result = mysqli_query($connect, $query);
?>



<!DOCTYPE html>
<html lang="en-US">
<head>

    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart()
        {
            var data = google.visualization.arrayToDataTable([
                ['Kraj', 'Number'],
                <?php
                while($row = mysqli_fetch_array($result))
                {
                    echo "['".$row["Kraj"]."', ".$row["number"]."],";
                }
                ?>
            ]);
            var options = {
                title: 'Podieľ jednotlivých krajov',
                //is3D:true,
                pieHole: 0.4
            };
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>









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
                <a class="navbar-brand" href="<?php echo base_url();?>Home.php">Domov</a>
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
            <h1>Zoznam oblastí</h1>

        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default ">
                    <div class="panel-heading">Oblasti <a href="<?php echo site_url('oblast/add'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
                    <table id="usertable" class="table table-striped">
                        <thead>
                        <tr>
                            <th width="5%">Štát</th>
                            <th width="20%">Kraj</th>
                            <th width="20%">Okres</th>
                            <th width="20%">Mesto</th>
                            <th width="20%"></th>
                        </tr>
                        </thead>
                        <tbody id="userData">
                        <?php if(!empty($oblast)): foreach($oblast as $oblast): ?>
                            <tr>

                                <td><?php echo $oblast['Stat']; ?></td>
                                <td><?php echo $oblast['Kraj']; ?></td>
                                <td><?php echo $oblast['Okres'];?></td>
                                <td><?php echo $oblast['Mesto'];?></td>
                                <td>
                                    <a class="btn btn-info btn-xs" href="<?php echo site_url('oblast/view/'.$oblast['idOblast']); ?>">Prehľad</a>
                                    <a class="btn btn-success btn-xs" href="<?php echo site_url('oblast/edit/'.$oblast['idOblast']); ?>" >Upraviť</a>
                                    <a class="btn btn-warning btn-xs" href="<?php echo site_url('oblast/delete/'.$oblast['idOblast']); ?>"  onclick="return confirm('Ste si istý že chcete odstrániť záznam?')">Zmazať</a>
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






    <br /><br />
    <div style="width:900px;">
        <h3 align="center">Koláčový graf rozdelenia krajov</h3>
        <br />
        <div id="piechart" style="width: 900px; height: 500px;"></div>
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


