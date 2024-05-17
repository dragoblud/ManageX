<?php
require 'core/init.php';
//require "..pear/PHP/CodeCoverage/autoload.php";
//require 'export.php';
$connect = mysqli_connect("localhost", "root", "", "user");

$output = '';

if(isset($_POST["import"]))
{
 $extension = end(explode(".", $_FILES["excel"]["name"])); // For getting Extension of selected file
 $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
 if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
 {
  
  $id = $user_data['id'];
  $sql = "DELETE FROM assets WHERE userid='$id'";
  mysqli_query($connect, $sql);
  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
  include("PHPExcel/PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file
  $worksheet = $objPHPExcel->getSheet(0);
  $output .= "<label class='text-success'>Data Inserted</label><br /><table class='table table-bordered'>";

   $highestRow = $worksheet->getHighestDataRow();
   for($row=1; $row<=$highestRow; $row++)
   {
    $output .= "<tr>";
    //$userid = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
    $sno = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
    $user = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
    $department = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
    $machinetype = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
    $manufacturer = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
    $machinesn = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
    $processor = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
    $os = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
    $systemspecs = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
    $dateofpurchase = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(9, $row)->getFormattedValue());
    $warrantystatus = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(10, $row)->getFormattedValue());
    $vendor = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(11, $row)->getValue());
    $fromyear = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(12, $row)->getValue());
    $totalyear = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(13, $row)->getFormattedValue());
    $tyear = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(14, $row)->getFormattedValue());
    $query = "INSERT INTO assets(sno,user,department,machinetype,manufacturer,machinesn,processor,os,systemspecs,dateofpurchase,warrantystatus,vendor,fromyear,totalyear,tyear) VALUES ('".$sno."', '".$user."','".$department."','".$machinetype."','".$manufacturer."','".$machinesn."','".$processor."','".$os."','".$systemspecs."','".$dateofpurchase."','".$warrantystatus."','".$vendor."','".$fromyear."','".$totalyear."','".$tyear."');";
    mysqli_query($connect, $query);
    $new="UPDATE assets SET userid = '$id' WHERE userid = 0";
    mysqli_multi_query($connect, $new); 
    $sql1 = "DELETE FROM assets WHERE sno=0";   
    mysqli_multi_query($connect, $sql1);

    $output .= '<td>'.$sno.'</td>';
    $output .= '<td>'.$user.'</td>';
    $output .= '<td>'.$department.'</td>';
    $output .= '<td>'.$machinetype.'</td>';
    $output .= '<td>'.$manufacturer.'</td>';
    $output .= '<td>'.$machinesn.'</td>';
    $output .= '<td>'.$processor.'</td>';
    $output .= '<td>'.$os.'</td>';
    $output .= '<td>'.$systemspecs.'</td>';
    $output .= '<td>'.$dateofpurchase.'</td>';
    $output .= '<td>'.$warrantystatus.'</td>';
    $output .= '<td>'.$vendor.'</td>';
    $output .= '<td>'.$fromyear.'</td>';
    $output .= '<td>'.$totalyear.'</td>';
    $output .= '<td>'.$tyear.'</td>';
    $output .= '</tr>';
   }
  } 
  $output .= '</table>';
  /*$spreadsheet = new Spreadsheet();
  $sheet = $spreadsheet->getActiveSheet();
  $spreadsheet->createSheet();
  $spreadsheet->setActiveSheetIndex(1);*/
 }
 else
 {
  $output = '<label class="text-danger">Invalid File</label>'; //if non excel file then
 }

?>
<html>
 <head>
  <title>Import Excel to Mysql using PHPExcel in PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <style>
  body
  {
   margin:0;
   padding:0;
   background-color:#f1f1f1;
  }
  .box
  {
   width:700px;
   border:1px solid #ccc;
   background-color:#fff;
   border-radius:5px;
   margin-top:100px;
  }
  
  </style>
 </head>
 <body>
     <div class="container box">
         <h3 align="center">Import Excel to your Table</h3><br />
         <form method="post" enctype="multipart/form-data">
             <label>Select Excel File</label>
             <input type="file" name="excel" />
             <br />
             <input type="submit" name="import" class="btn btn-info" value="Import" />
             <a href="home.php">View Results</a>
            </form>
            <br />
            <br />
            <?php
echo $output;
?>
  </div>
</body>
</html>