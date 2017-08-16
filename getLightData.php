<?php
include "db.php";
include "JSdate.php";
$sel = "SELECT * FROM `light` WHERE datetime >= DATE_SUB(NOW(),INTERVAL 12 HOUR);";
$sel_run = mysqli_query($conn,$sel);


$table = array();
$table['cols']=array(
    array('id' => '', 'label' => 'time', 'type' => 'datetime'),
    array('id' => '', 'label' => 'light sensor 1', 'type' => 'number'),
    array('id' => '', 'label' => 'light sensor 2', 'type' => 'number'),
    array('id' => '', 'label' => 'light sensor 3', 'type' => 'number')
);

$rows = array();
while($row = mysqli_fetch_assoc($sel_run)){
    $datetime = JSdate($row['datetime'],"datetime");
    $tmp = array();
    $tmp[] = array('v' => (string) $datetime);
    $tmp[] = array('v' => (float) $row['ldr1']);
    $tmp[] = array('v' => (float) $row['ldr2']);
    $tmp[] = array('v' => (float) $row['ldr3']);
    $rows[] =array('c' => $tmp);
};


$table['rows'] =$rows;
$jsonTable = json_encode($table,true);
echo $jsonTable;
//echo "hello";

?>