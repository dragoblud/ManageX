<?php
require('core/init.php');
$id = $user_data['id'];
$sql = "SELECT * FROM `assets` WHERE userid=$id";
$res = mysqli_query($con,$sql);
$html='<table><tr><td><b>S.No.</b></td><td><b>User</b></td><td><b>Department</b></td><td><b>Machine Type</b></td><td><b>Manufacturer</b></td><td><b>Machine S/N</b></td><td><b>Processor</b></td><td><b>O/S</b></td><td><b>System Specs</b></td><td><b>Date of Purchase</b></td><td><b>Warranty Status</b></td><td><b>Vendor</b></td><td><b>From Year</b></td><td><b>Total Year</b></td><td><b>Category</b></td></tr>';
while($row=mysqli_fetch_assoc($res)){
	$html.='<tr><td>'.$row['sno'].'</td><td>'.$row['user'].'</td><td>'.$row['department'].'</td><td>'.$row['machinetype'].'</td><td>'.$row['manufacturer'].'</td><td>'. $row['machinesn'] .'</td><td>'.$row['processor'].'</td><td>'.$row['os'].'</td><td>'.$row['systemspecs'].'</td><td>'.$row['dateofpurchase'].'</td><td>'.$row['warrantystatus'].'</td><td>'.$row['vendor'].'</td><td>'.$row['fromyear'].'</td><td>'. 2022 - $row['fromyear'].'</td><td>'.$row['tyear'].'</td></tr>';
}
$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=report.xls');
echo $html;
?>