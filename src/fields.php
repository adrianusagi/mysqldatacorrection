<?php 
session_start();
require_once('db.php');
$table = $_POST['table'];

$columns = $mysqli -> query("DESC ".$table);
$columns -> fetch_all(MYSQLI_ASSOC);
foreach($columns as $j=>$_row){
    echo '<li class="queue" data-field="'.$_row['Field'].'" data-type="'.$_row['Type'].'" data-isnullable="'.$_row['Null'].'">'.$_row['Field'].' |'.$_row['Type'].'</li>';
}
?>

