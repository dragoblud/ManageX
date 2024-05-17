<?php
require 'core/init.php';
error_reporting(0);
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

<div id="page1">
    <header>
        <a title="asset" href="home.php">
            <div class="logo">
                <img src="images/WHITE.png" height="60px" weight="50px" />
                <span id="title">Asset Management System</span>
            </div>
        </a>
        
        <nav>


            <label for="email">Welcome <?php echo $user_data['first_name']; ?> </label>
            
            <a href="home.php"><input type="image" src="images/icons/home.png" title="home" value="Home" style="margin-left:10px;"/></a>
            <a href="profile.php"><input type="image" src="images/icons/user.png" title="Profile" value="settings " style="margin-left:10px;"/></a>
            <a href="logout.php"><input type="image" src="images/icons/logout.png" title="Logout" value="Sign Out" style="margin-left:10px;"/></a>


        </nav>


    </header>
    <?php $id=$_GET['id'];
    $asset_data=asset_data($con,$id);?>

    <div class="content-center">
        <div id="topic"><h3><?php echo $asset_data['title'];?></h3></div>


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
                <th>From Year</th>
                
                <th>Category</th>
                </tr>
                <form action="" method="post">
                    <td><input style="text-align: center" type="text" value="<?php echo $asset_data['sno'];?>" name="sno"></td>
                    <td><input style="text-align: center" type="text" value="<?php echo $asset_data['user'];?>" name="user"></td><br>
                    <td><input style="text-align: center" type="text" value="<?php echo $asset_data['department'];?>" name="department"></td>
                    <td><input style="text-align: center" type="text" value="<?php echo $asset_data['machinetype'];?>" name="machinetype"></td>
                    <td><input style="text-align: center" type="text" value="<?php echo $asset_data['manufacturer'];?>" name="manufacturer"></td>
                    <td><input style="text-align: center" type="text" value="<?php echo $asset_data['machinesn'];?>" name="machinesn"></td>
                    <td><input style="text-align: center" type="text" value="<?php echo $asset_data['processor'];?>" name="processor"></td><br>
                    <td><input style="text-align: center" type="text" value="<?php echo $asset_data['os'];?>" name="os"></td>
                    
                    <td><input style="text-align: center" type="text" value="<?php echo $asset_data['dateofpurchase'];?>" name="dateofpurchase"></td>
                    <td><input style="text-align: center" type="text" value="<?php echo $asset_data['warrantystatus'];?>" name="warrantystatus"></td>
                    <td><input style="text-align: center" type="text" value="<?php echo $asset_data['vendor'];?>" name="vendor"></td>
                    <td><input style="text-align: center" type="text" value="<?php echo $asset_data['fromyear'];?>" name="fromyear"></td>
                    
                    <td><input style="text-align: center" type="text" value="<?php echo $asset_data['tyear'];?>" name="tyear"></td>
                    <td><input type="submit" name="update" value="update"></td>
                </form>
            </table>
        </div>

        <?php
            if(isset($_POST['update'])===true and empty($_POST['update'])=== false){
                $update_data = array(
                    'sno'  => $_POST['sno'],
                    'user'  => $_POST['user'],
                    'department'  => $_POST['department'],
                    'machinetype'     => $_POST['machinetype'],
                    'manufacturer'   => $_POST['manufacturer'],
                    'machinesn'   => $_POST['machinesn'],
                    'processor'   => $_POST['processor'],
                    'os'   => $_POST['os'],
                  //  'systemspecs'   => $_POST['systemspecs'],
                    'dateofpurchase'   => $_POST['dateofpurchase'],
                    'warrantystatus'   => $_POST['warrantystatus'],
                    'vendor'   => $_POST['vendor'],
                    'fromyear'   => $_POST['fromyear'],
                  //  'totalyear'   => $_POST['totalyear'],
                    'tyear'   => $_POST['tyear'],
                );


                update_assets($con,$update_data,$id);
                header('Location:home.php');
                exit();

            }



        ?>
    
    </div>

</div>
</body>
</html>
