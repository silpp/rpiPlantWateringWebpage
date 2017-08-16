<?php
include "db.php";
include "JSdate.php";
$sel = "SELECT * FROM `soil_moisture` WHERE datetime >= DATE_SUB(NOW(),INTERVAL 12 HOUR);";
$sel_run = mysqli_query($conn,$sel);


$table = array();
$table['cols']=array(
    array('id' => '', 'label' => 'time', 'type' => 'datetime'),
    array('id' => '', 'label' => 'soil sensor 1', 'type' => 'number'),
    array('id' => '', 'label' => 'soil sensor 2', 'type' => 'number'),
    array('id' => '', 'label' => 'soil sensor 3', 'type' => 'number')
);

$rows = array();
while($row = mysqli_fetch_assoc($sel_run)){
    $datetime = JSdate($row['datetime'],"datetime");
    $tmp = array();
    $tmp[] = array('v' => (string) $datetime);
    $tmp[] = array('v' => (float) $row['soil1']);
    $tmp[] = array('v' => (float) $row['soil2']);
    $tmp[] = array('v' => (float) $row['soil3']);
    $rows[] =array('c' => $tmp);
};


$table['rows'] =$rows;
$jsonTable = json_encode($table,true);
echo $jsonTable;
//echo "hello";

?>