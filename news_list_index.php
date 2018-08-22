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

<table border="1" cellpadding="0" cellspacing="0" class="table table-hover table-bordered">
    <thead>
        <tr>
            <th align="center" width="8%">วัน/เดือน/ปี</th>
            <th>รายละเอียด</th>
        </tr>
    </thead>

    <?php $i = 1;
    do {
        ?>
        <tr>
            <td align="center"><?php echo date('d/m/Y', strtotime($row_listnews['n_datesave'])); ?></td>
            <!-- <td align="center"><img src="news/<?php echo $row_listnews['n_img'] ?>" width="100px"></td> -->
            <td><?php echo $row_listnews['n_title']; ?>
                <a href="news.php?id=<?php echo $row_listnews['n_id']; ?>" target="_blank" class="btn btn-info btn-xs">
                    อ่านต่อ</a>
            </td>
        </tr>
        <?php $i++;
    } while ($row_listnews = mysql_fetch_assoc($listnews));
    ?>
</table>

<?php
mysql_free_result($listnews);
?>
