<?php 
require 'core/init.php';
$connect = mysqli_connect("localhost", "root", "", "user");
$query = "SELECT machinetype, count(*) as number FROM assets GROUP BY machinetype";
$result = mysqli_query($connect, $query);
$query1 = "SELECT processor, count(*) as number FROM assets GROUP BY processor";
$result1 = mysqli_query($connect, $query1);
$query2 = "SELECT os, count(*) as number FROM assets GROUP BY os";
$result2 = mysqli_query($connect, $query2);
$query3 = "SELECT tyear, count(*) as number FROM assets GROUP BY tyear";
$result3 = mysqli_query($connect, $query3);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Asset Management System</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/screen2.css">
    <link rel="stylesheet" href="css/home.css" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});  
    google.charts.setOnLoadCallback(drawChart);
    function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Machine Type', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["machinetype"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                     var options = {  
                      title: 'Machine Types',  
                      is3D:true,  
                       
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           } 
           google.charts.setOnLoadCallback(drawChart1);
    function drawChart1()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Processor', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result1))  
                          {  
                               echo "['".$row["processor"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                     var options = {  
                      title: 'Processors',  
                      is3D:true,  
                       
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart1'));  
                chart.draw(data, options);  
           }  
           google.charts.setOnLoadCallback(drawChart2);
           function drawChart2()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['O/S', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result2))  
                          {  
                               echo "['".$row["os"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                     var options = {  
                      title: 'O/S',  
                      is3D:true,  
                      
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart2'));  
                chart.draw(data, options);  
           }  
           
           google.charts.setOnLoadCallback(drawChart3);
           function drawChart3()  
           {  
               

                var data = google.visualization.arrayToDataTable([  
                          ['Total Year', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result3))  
                          {
                               echo "['". $row["tyear"] ."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);
               var options = {  
                      title: 'Total Year',  
                      is3D:true,  
                      colors: ['orange','red','limegreen']
                     };      
                    
                     var chart = new google.visualization.PieChart(document.getElementById('piechart3'));  
                     chart.draw(data, options);         
           }  
           </script>  
</head>
<body>

    <div id="page">
        <header>
            <a title="asset" href="home.php">
                <div class="logo">
                    <img src="images/WHITE.png" height="60px" weight="50px" />
            </a>

            <span id="title">Asset Management System</span>
    </div>
            <nav>
                    
                
                <a href="home.php"><input type="image" src="images/icons/home.png" title="home" value="Home" style="margin-left:10px;"/>
                
                <a href="logout.php"><input type="image" src="images/icons/logout.png" title="Logout" value="Sign Out" style="margin-left:10px;"/></a>

            </nav>

        </header>
        <br>
            <table> 
            <td><div id="piechart" style="width: 350px; height: 500px;"></div></td>
            <td><div id="piechart1" style="width: 350px; height: 500px;"></div></td>
            <td><div id="piechart2" style="width: 350px; height: 500px;"></div></td>
            <td><div id="piechart3" style="width: 350px; height: 500px;"></div></td>
        </table>
            
        </div>
        
    </div>
</body>
</html>