
<?php 
require 'core/init.php';
//require 'Import1.php';


if(logged_in() === false){

    session_destroy();
    header('Location:index.php');
    exit();

} 

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
                    <label for="email">Welcome <?php echo $user_data['first_name']; ?> </label>
                
                
                <a href="profile.php"><input type="image" src="images/icons/user.png" title="Profile" value="settings " style="margin-left:10px;"/></a>
                <a href="logout.php"><input type="image" src="images/icons/logout.png" title="Logout" value="Sign Out" style="margin-left:10px;"/></a>

            </nav>

        </header>
        <td id='label-col'>
                           <!-- <label>Spreadsheets</label></td>
                        <td id='input-col'>
                            <a href="printdb.php">
                            <select name='category'>
                                <option value='Sheet1'>Sheet1</option>
                                <option value='Sheet2'>Sheet2</option>
                                <option value='Sheet3'>Sheet3</option>
                                <option value='Sheet4'>Sheet4</option>
                            </select>
                            </a>-->
        

        <div class="content-center">
            <div id="topic">Current Assets</div>
            <a href="add.php"><div id="add-new">Add new asset</div></a>
            <table border=0>
            <tr>
                <th>S. No.</th>
                <th>User</th>
                <th>Department</th>
                <th>Machine Type</th>
                <th>Manufacturer</th>
                <th>Machine S/N</th>
                <th>Processor</th>
                <th>O/S</th>
                <th>Date of Purchase</th>
                <th>Warranty Status</th>
                <th>Vendor</th>
                
                <th>Total Year</th>
                
            </tr>
               <?php
                $id = $user_data['id'];
                $result = getAssets($con, $user_data["id"]);
                $sql="SELECT * from assets WHERE userid=$id"; 
                $result = $con->query($sql);
                /*$id = $user_data['id'];
               //$sql= "SELECT * FROM `assets` WHERE `userid`=$id";
               //$res = mysqli_query($con,$sql);
               //$result = $con->query($sql);
               //$result = getAssets($con, $user_data["id"]);*/
                $i = 1;
                while($row = $result->fetch_assoc()) {
                    echo "<tr style='background-color:";
                    if ($i % 2 == 0) {
                        echo "#f2f2f2";
                    } else {
                        echo "white";
                    }
                    $i++;
                    
                    echo "'>";
                    echo "<td style='text-align: center'>" . $row["sno"] . "</td>";
                    echo "<td style='text-align: center'>" . $row["user"] . '</td>';
                    echo '<td style="text-align: center">' . $row['department'] . '</td>';
                    echo '<td style="text-align: center">' . $row['machinetype'] . '</td>';
                    echo '<td style="text-align: center">' . $row['manufacturer'] . '</td>';
                    echo '<td style="text-align: center">' . $row['machinesn'] . '</td>';
                    echo '<td style="text-align: center">' . $row['processor'] . '</td>';
                    echo '<td style="text-align: center">' . $row['os'] . '</td>';
                  //  echo '<td> <a href="file:///C:\xampp\htdocs\AMS\COPYOFhWLIST.xlsx"> <div style="text-align: center">' . $row['systemspecs'] . '</a></div></td>';
                    echo '<td style="text-align: center">' . $row['dateofpurchase'] . '</td>';
                    echo '<td style="text-align: center">' . $row['warrantystatus'] . '</td>';
                    echo '<td style="text-align: center">' . $row['vendor'] . '</td>';
                  //  echo '<td style="text-align: center">' . $row['fromyear'] . '</td>';
                    echo '<td style="text-align: center">' . 2022 - $row['fromyear'] . '</td>';
                  //  echo '<td style="text-align: center">' . $row['tyear'] . '</td>';
                    echo "<td style='text-align: center'><a href=\"delete.php?id=".$row['id']."\"><img src='images/icons/delete.ico' height='24'/></a></td>";
                    echo "<td style='text-align: center'><a href=\"update.php?id=".$row['id']."\"><img src='images/icons/edit.png' alt='' height='24'/></a></td>";
                  //  echo "<td style='text-align: center'><a href="file:C:\Xampp\htdocs\AMS\COPY OF hW LIST.xlsx - configuration!C3"><img src='images/icons/delete.ico' height='24'/></a></td>";
                    echo '</tr>';
                    
            }
             $con->close();
            ?>
            </table>                  
            <br><br>
            <a href="chart.php"><div class="button">Analysis through Charts</div></a>
            <br>
            <a href="export.php"><div class="button">Export to Excel</div></a>
            <br>
            <a href="Import1.php"><div class="button">Import from Excel</div></a>

        </div>
        
    </div>
</body>
</html>