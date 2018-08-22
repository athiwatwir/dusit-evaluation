<?php require_once('Connections/conn.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {

    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
        if (PHP_VERSION < 6) {
            $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
        }

        $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

        switch ($theType) {
            case "text":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "long":
            case "int":
                $theValue = ($theValue != "") ? intval($theValue) : "NULL";
                break;
            case "double":
                $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
                break;
            case "date":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "defined":
                $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
                break;
        }
        return $theValue;
    }

}

mysql_select_db($database_conn, $conn);
$query_listnews = "SELECT * FROM tbl_news ORDER BY n_id DESC";
$listnews = mysql_query($query_listnews, $conn) or die(mysql_error());
$row_listnews = mysql_fetch_assoc($listnews);
$totalRows_listnews = mysql_num_rows($listnews);
?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js">


</script>
<script>

    $(document).ready(function () {
        $('#example').DataTable();
    });

</script>

<table id="example" class="table table-hover table-bordered" cellspacing="0">
    <thead>
        <tr>
            <th align="center" width="12%">วัน/เดือน/ปี</th>
            <th>รายละเอียด</th>
        </tr>
    </thead>
<?php $i = 1;
do { ?>
        <tr>
            <td align="center"><?php echo date('d/m/Y', strtotime($row_listnews['n_datesave'])); ?></td>
            <td><?php echo $row_listnews['n_title']; ?>
                <a href="news.php?id=<?php echo $row_listnews['n_id']; ?>" target="_blank" class="btn btn-info btn-xs">
                    อ่านต่อ</a>
            </td>
        </tr>
    <?php $i++;
} while ($row_listnews = mysql_fetch_assoc($listnews)); ?>
</table>

<?php
mysql_free_result($listnews);
?>
