<?php require_once('Connections/conn.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
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
$nid = $_GET['id'];

mysql_select_db($database_conn, $conn);
$query_listnews = "SELECT * FROM tbl_news WHERE n_id=$nid ORDER BY n_id DESC LIMIT 5";
$listnews = mysql_query($query_listnews, $conn) or die(mysql_error());
$row_listnews = mysql_fetch_assoc($listnews);
$totalRows_listnews = mysql_num_rows($listnews);
?>

<table border="1" cellpadding="0" cellspacing="0" class="table table-bordered">
  <tr class="info">
    <td width="20%">ภาพ</td>
    <td width="100%">รายละเอียด</td>
  </tr>
  <?php $i=1; do { ?>
    <tr>
      <td align="center">
        <img src="news/<?php echo $row_listnews['n_img'] ?>" width="100%"></td> 
      <td>
      <h4> หัวข้อข่าว : <?php echo $row_listnews['n_title']; ?> </h4>
      <?php echo $row_listnews['n_detail']; ?>
       <br/>
       ไฟล์แนบ : <a href="news/<?php echo $row_listnews['n_file'] ?>" target="_blank"> เปิดดู </a>
       <br/>
       ว/ด/ป : 
       <?php echo date('d/m/Y',strtotime($row_listnews['n_datesave']));?>
      </td>
    </tr>
    <?php $i++; } while ($row_listnews = mysql_fetch_assoc($listnews)); ?>
</table>

<?php
mysql_free_result($listnews);
?>
