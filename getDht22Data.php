<?php
include "../../db/db.php";
include "JSdate.php";
$sel = "SELECT * FROM `dht22` WHERE datetime >= DATE_SUB(NOW(),INTERVAL 12 HOUR);";
$sel_run = mysqli_query($conn,$sel);


$table = array();
$table['cols']=array(
    array('id' => '', 'label' => 'time', 'type' => 'datetime'),
    array('id' => '', 'label' => 'temperature', 'type' => 'number'),
    array('id' => '', 'label' => 'humidity', 'type' => 'number')
);

$rows = array();
while($row = mysqli_fetch_assoc($sel_run)){
    $datetime = JSdate($row['datetime'],"datetime");
    $tmp = array();
    $tmp[] = array('v' => (string) $datetime);
    $tmp[] = array('v' => (float) $row['temperature']);
    $tmp[] = array('v' => (float) $row['humidity']);
    $rows[] =array('c' => $tmp);
};


$table['rows'] =$rows;
$jsonTable = json_encode($table,true);
echo $jsonTable;
//echo "hello";

?>
