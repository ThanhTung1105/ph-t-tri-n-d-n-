<?php
include_once ('conn.php');
if (isset($_GET['id_ttt']) && isset($_GET['id_dn'])) {
	$id_pm = $_GET['id_ttt'];
	$tendn = $_GET['id_dn'];
	$sl_ = "SELECT * FROM phieumuon WHERE id='$id_pm' ";
	$res_= mysqli_query($conn, $sl_);
	while ($row = $res_ -> fetch_assoc()) {
		$id_nm = $row['nguoimuon'];
		$update = "UPDATE `phieumuon` SET `tinhtrang`='1',`canbo`='$tendn' WHERE nguoimuon='$id_nm' and tinhtrang='5' ";
		$tongtien = 0;
		$sql_ = 
		"SELECT sach.gia, phieumuon.soluongmuon FROM phieumuon 
        INNER JOIN sach ON phieumuon.tensach = sach.id_sach
        WHERE phieumuon.nguoimuon = '$id_nm' and tinhtrang='5' ";
        $resss = mysqli_query($conn,$sql_);
        while ($row = $resss -> fetch_assoc()) {
        	$gia = $row['gia'];
        	$solg = $row['soluongmuon'];
        	$tongtien += $gia*$solg;
        }

		if(mysqli_query($conn, $update)) {
			$up_ = "UPDATE `danhsachmuon` SET `tinhtrang`='1' WHERE nm ='$id_nm' and tinhtrang='3' ";
			$conn->query($up_);
			$update_ = "UPDATE `docgia` SET `khoanno`=`khoanno` + '$tongtien' WHERE id ='$id_nm' ";
			$conn->query($update_);

			echo "<script type='text/javascript'>alert('Thành công!');</script>";
			echo "<script type='text/javascript'> document.location ='TrangChuThuThu.php?id_dn=$tendn'; </script>";
		} else {
			echo "<script type='text/javascript'>alert('Lỗi:".mysqli_error()."');</script>";
		}
	}
	
}
?>