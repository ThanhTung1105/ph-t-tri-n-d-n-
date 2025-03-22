<?php
include_once('conn.php');

if(isset($_POST['save_suasach'])){
    $mas = trim($_POST['model_mas']);
    $ts = trim($_POST['modal_tensach']);
    $tl = $_POST['modal_theloai'];
    $sl = trim($_POST['modal_solg']);
    $tg = trim($_POST['modal_tg']);
    $nxb = trim($_POST['modal_nxb']);
    $nd = trim($_POST['modal_nd']) ?? null;
    $id = trim($_POST['id_sach']) ?? null;
    	
	$id_tl = $row['id'];
	$sql_ud = "UPDATE `sach` SET `gia`='$mas',`tensach`='$ts',`soluongcon`='$sl',`tacgia`='$tg',`nxb`='$nxb',`tomtatnoidung`='$nd',`id_theloai`='$id_tl' WHERE id_sach='$id' ";
    if (mysqli_query($conn, $sql_ud)) {
       echo "<script type='text/javascript'>alert('Sửa sách thành công!');</script>";
       echo "<script type='text/javascript'> document.location ='TrangChuThuThu.php?id_dn=$tendn&x'; </script>";
    } else {
      $mess = "Lỗi: ".mysqli_error();
    }
}

?>

