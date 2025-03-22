<?php
include_once('conn.php');

if(isset($_POST['save_suatl'])){
    $id = trim($_POST['id_tl']);
    $tl = trim($_POST['modal_ttl']);
    $mota = trim($_POST['modal_mota']);
	$sql_ud = "UPDATE `theloai` SET `tentheloai`='$tl', `mota`='$mota' WHERE id='$id' ";
    if (mysqli_query($conn, $sql_ud)) {
       echo "<script type='text/javascript'>alert('Thành công!');</script>";
       echo "<script type='text/javascript'> document.location ='TrangChuThuThu.php?id_dn=$tendn&xtl'; </script>";
    } else {
      $mess = "Lỗi: ".mysqli_error();
    }
}
?>

