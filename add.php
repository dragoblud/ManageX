<?php
 require 'core/init.php';
// require 'Import1.php';


if(logged_in() === false){

    session_destroy();
    header('Location:index.php');
    exit();

} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Asset Management System</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/screen2.css">
    <link rel='stylesheet' href='css/input_form.css'>
    <script src="js/activation.js"></script>
    <script>
        function validateForm() {
            var quantity = document.forms["add-asset"]["quantity"].value;
            if (!isnum(quantity)) {
                alert("Invalid quantity");
                return false;
            }

            var price = document.forms["add-asset"]["price"].value;
            if (!isnum(price)) {
                alert("Invalid price");
                return false;
            }
        }

        // Returns true if @val contains only numbers. false otherwise.
        function isnum(val) {
            return /^[0-9]+$/.test(val.replace('.',''));    // competible with floating point values
        }
    </script>
</head>
<body>
<div id="page">
        <header>
            <a title="asset" href="">
                <div class="logo">
                    <img src="images/WHITE.png" height="60px" weight="50px" />
                    <span id="title">Asset Management System</span>
                </div>
            </a>

            <nav>

              
                <label for="email"><?php echo $user_data['first_name']; ?> </label>
                <a href="home.php"><input type="image" src="images/icons/home.png" title="Home" value="home " style="margin-left:10px;"/></a>
                <a href="profile.php"><input type="image" src="images/icons/user.png" name="setting" value="settings " style="margin-left:10px;font-weight:bold;"/></a>
                <a href="logout.php"><input type="image" src="images/icons/logout.png" name="logout" value="Sign Out" style="margin-left:10px;font-weight:bold;"/></a>

            </nav>
        </header>
    <br><br>

<?php


            /*if(empty($_POST['add_asset'])===false) {

                $reuired_fields = array('title', 'category', 'quantity', 'price');
                foreach ($_POST as $key => $value) {
                    if (empty($value) && in_array($key, $reuired_fields) === true) {
                        $errors[]='Fields marked with asterisk are required';
                        break 1;
                    }
                }
            }*/
?>

        <h2><center>Enter Your Data</center></h2>
<?php
        
            if (isset($_GET['success']) && empty($_GET['success'])) {
                echo '<center> inserted successfully!!!! </center><br>';
                echo '<center><a href="home.php">View Results</a>'."    ". '<a href="add.php">Add item</a></center>';
                
            }else {

            if (empty($_POST) === false and empty($errors)===true) {
                
                $asset_data = array(
                    'userid'    => $user_data['id'],
                    'sno'     => $_POST['sno'],
                    /*'date'      => $dt,*/
                    'user'  => $_POST['user'],
                    'department'  => $_POST['department'],
                    'machinetype'     => $_POST['machinetype'],
                    'manufacturer'   => $_POST['manufacturer'],
                    'machinesn'  => $_POST['machinesn'],
                    'processor'   => $_POST['processor'],
                    'os'   => $_POST['os'],
                    //'systemspecs'   => $_POST['systemspecs'],
                    'dateofpurchase'   => $_POST['dateofpurchase'],
                    'warrantystatus'   => $_POST['warrantystatus'],
                    'vendor'   => $_POST['vendor'],
                    'fromyear'   => $_POST['fromyear'],
                    'totalyear'   => $_POST['totalyear'],
                    'tyear'   => $_POST['tyear'],
                );


                addAsset($con, $asset_data);
                header('Location:add.php?success');
                exit();

            }else if(empty($errors)===false){

                echo '<center>'.output_errors($errors).'</center>';

            }
?>


    <div id='add-item-form'>
            <form name="add-asset" method='POST' action='add.php' onsubmit="return validateForm()">
                <table border=0>
                <tr>
                        <td id='label-col'>
                            <label>S. No.*</label> </td>
                        <td id='input-col'>
                            <input type='number' name='sno' required maxlength=30 oninput="activate('add-asset', this, 'user')"> </td>
                    </tr>
                    <tr>
                        <td id='label-col'>
                            <label>User*</label> </td>
                        <td id='input-col'>
                            <input type='text' name='user' required maxlength=30 oninput="activate('add-asset', this, 'department')"> </td>
                    </tr>
                    <tr>
                        <td id='label-col'>
                            <label>Department*</label></td>
                        <td id='input-col'>
                            <input type='text' name='department' required disabled oninput="activate('add-asset', this, 'machinetype')"></td>
                    </tr>
                    <tr>
                        <td id='label-col'>
                            <label>Machine Type*</label></td>
                        <td id='input-col'>
                            <input type='text' name='machinetype' required disabled oninput="activate('add-asset', this, 'manufacturer')"></td>
                    </tr>
                    <tr>
                        <td id='label-col'>
                            <label>Manufacturer*</label> </td>
                        <td id='input-col'>
                            <input type='text' name='manufacturer' required disabled oninput="activate('add-asset', this, 'machinesn')"> </td>
                    </tr>
                    <tr>
                        <td id='label-col'>
                            <label>Machine S/N*</label> </td>
                        <td id='input-col'>
                            <input type='text' name='machinesn' required disabled oninput="activate('add-asset', this, 'processor')"> </td>
                    </tr>
                    <tr>
                        <td id='label-col'>
                            <label>Processor*</label> </td>
                        <td id='input-col'>
                            <input type='text' name='processor' required disabled oninput="activate('add-asset', this, 'os')"> </td>
                    </tr>
                    <tr>
                        <td id='label-col'>
                            <label>O/S*</label> </td>
                        <td id='input-col'>
                            <input type='text' name='os' required disabled oninput="activate('add-asset', this, 'dateofpurchase')"> </td>
                    </tr>
                    <tr>
                        <td id='label-col'>
                            <label>Date of Purchase*</label> </td>
                        <td id='input-col'>
                            <input type='text' name='dateofpurchase' required disabled oninput="activate('add-asset', this, 'warrantystatus')"> </td>
                    </tr>
                    <tr>
                        <td id='label-col'>
                            <label>Warranty Status Date*</label> </td>
                        <td id='input-col'>
                            <input type='text' name='warrantystatus' required disabled oninput="activate('add-asset', this, 'vendor')"> </td>
                    </tr>
                    <tr>
                        <td id='label-col'>
                            <label>Vendor*</label> </td>
                        <td id='input-col'>
                            <input type='text' name='vendor' required disabled oninput="activate('add-asset', this, 'fromyear')"> </td>
                    </tr>
                    <tr>
                        <td id='label-col'>
                            <label>From Year*</label> </td>
                        <td id='input-col'>
                            <input type='text' name='fromyear' required disabled oninput="activate('add-asset', this, 'tyear')"> </td>
                    </tr>
                    <tr>
                    <td id='label-col'>
                            <label>Category*</label></td>
                        <td id='input-col'>
                            <select name='tyear'>
                                <option value='Less than 3 years'>Less than 3 years</option>
                                <option value='Between 3 and 4 years'>Between 3 and 4 years</option>
                                <option value='Greater than 4 years'>Greater than 4 years</option>
                            </td></tr>
                </table> 
                <input type='submit' value='Add' name='add_asset'>
            </form>
        </div>


    </div>


<?php } ?>
</body>
</html>