<?php
require_once('db.php');

$table = $_POST['table'];
$field = $_POST['field'];
$type = $_POST['type'];
$isnullable = $_POST['isnullable'];

if(substr($type,0,7) == 'varchar') $type = 'varchar'; 
if(substr($type,0,4) == 'enum') $type = 'enum'; 

$tables = array();

if(in_array($type,array('varchar','date','datetime','enum')) && $isnullable == 'YES' && in_array($table,$tables)){
    if($type == 'varchar'){
        $sql = "UPDATE $table SET `$field` = NULL WHERE `$field` = ''";
    }if($type == 'enum'){
        $sql = "UPDATE $table SET `$field` = NULL WHERE `$field` = ''";
    }else if($type == 'date'){
        $sql = "UPDATE $table SET `$field` = NULL WHERE `$field` = '0000-00-00'";
    }else if($type == 'datetime'){
        $sql = "UPDATE $table SET `$field` = NULL WHERE `$field` = '0000-00-00 00:00:00'";
    }
    
    $result = $mysqli -> query($sql);
    if($result)
        echo json_encode(array('isOk'=>true, 'respon'=>'done'));
    else echo json_encode(array('isOk'=>false, 'respon'=>'error'));
}else
    echo json_encode(array('isOk'=>true, 'respon'=>'skipped'));
?>