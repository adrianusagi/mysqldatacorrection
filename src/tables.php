<?php 
session_start();
?>
<div class="progress" style="margin:20px 0px;">
    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
</div>

<div class="container text-center" style="display:none;">
    <a class="btn btn-primary" href="javascript:;" data-aksi="startId">Start Correction</a>
</div>

<h2>List of Tables</h2>
<table class="table">
    <tr>
        <th>No</th>
        <th>Tables</th>
        <th>Columns</th>
    </tr>
    <?php 
    require_once('db.php');

    // Perform query
    if ($result = $mysqli -> query("SHOW TABLES")) {
        // Numeric array
        $result -> fetch_all(MYSQLI_ASSOC);
        foreach($result as $i=>$row){
            $table = null;
            foreach($row as $val){
                $table = $val;
            }
            $tables = array();
            if(in_array($table,$tables)){
                echo '
                <tr>
                    <td>'.($i+1).'</td>
                    <td class="queue" data-content="table" data-table="'.$table.'">'.$table.'</td>
                    <td><ul></ul></td>';
                echo '</tr>';
            }
        }
    }
?>
</table>
