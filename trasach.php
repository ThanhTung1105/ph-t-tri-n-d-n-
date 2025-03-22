<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
include('conn.php');
if (isset($_POST['id'])) {
	$id = $_POST['id'];
	echo "Mã độc giả:&emsp;<input type='text' name='iddg' value=".$id." readonly>";
	$sql = "SELECT phieumuon.id as id_pm, phieumuon.tinhtrang, sach.tensach, phieumuon.soluongmuon as 'soluongmuon' FROM phieumuon JOIN sach ON phieumuon.tensach = sach.id_sach WHERE nguoimuon='$id' and tinhtrang='1' ";
	$run = mysqli_query($conn, $sql);
	$sql1 = "SELECT phieumuon.id as id_pm, phieumuon.tinhtrang, sach.tensach, phieumuon.soluongmuon as 'soluongmuon' FROM phieumuon JOIN sach ON phieumuon.tensach = sach.id_sach WHERE nguoimuon='$id' and tinhtrang='4' ";
	$run1 = mysqli_query($conn, $sql1);
	$count=0;
	if (mysqli_num_rows($run) > 0) {
		while ($row = $run -> fetch_assoc()) {
			$count++;
			$id_pm = $row['id_pm'];
			$ts = $row['tensach'];
			$sl = $row['soluongmuon'];
			echo "</br><input type='checkbox' name='id_pm".$count."' value=".$id_pm.">";
			echo "<label for='id_pm'>&emsp;".$ts." (SL:".$sl.")</label>";
		}
	} else {
		if(mysqli_num_rows($run1) <= 0) {
			echo "</br>Trống!";
		}
	}
		
	if (mysqli_num_rows($run1) > 0) {
		while ($row = $run1 -> fetch_assoc()) {
			$count++;
			$id_pm = $row['id_pm'];
			$ts = $row['tensach'];
			$sl = $row['soluongmuon'];
			echo "</br><input type='checkbox' name='id_pm_qh".$count."' value=".$id_pm.">";
			echo "<label for='id_pm_qh'>&emsp;".$ts." (SL:".$sl."; <span style='background-color: lightblue;'>Quá hạn</sapn>)</label>";
		}
	}
}


if (isset($_POST['trasach'])) {
	$id = $_POST['iddg'];
	
	for ($i=0; $i < 9; $i++) { 
		$id = 'id_pm_qh'.$i;
		$id_pm_qh = $_POST[$id] ?? null;
		if ($id_pm_qh != null) {
			
			$sql = "SELECT phieumuon.id as 'id_pm', phieumuon.nguoimuon, phieumuon.tinhtrang, phieumuon.noidung, sach.id_sach, phieumuon.soluongmuon as 'soluongmuon', phieumuon.ngaytra, sach.soluongcon, sach.gia, docgia.sodu, docgia.khoanno, docgia.id as 'id_dg'
			FROM phieumuon 
			INNER JOIN sach ON phieumuon.tensach = sach.id_sach 
			INNER JOIN docgia ON phieumuon.nguoimuon = docgia.id 
			WHERE phieumuon.id='$id_pm_qh' and tinhtrang='4' ";
			$run = mysqli_query($conn, $sql);
			while ($row = $run->fetch_assoc()) {
				$slm=$row['soluongmuon'];
				$gia = $row['gia'];
				$id_s = $row['id_sach'];
				$id_dg = $row['id_dg'];
				$ngaytra = $row['ngaytra'];
				$datenow = date('Y-m-d');
				$nm = $row['nguoimuon'];
				$slc = $row['soluongcon'] + $slm;
				$tienphat = $gia * $slm - songay($ngaytra, $datenow) * 3000;
				$ud_sach = "UPDATE `sach` SET soluongcon='$slc' WHERE id_sach = '$id_s' ";
				$ud_dg = "UPDATE `docgia` SET sodu=sodu+'$tienphat' WHERE id = '$id_dg' ";
				$ud_pm = "UPDATE `phieumuon` SET tinhtrang='0', noidung='1' WHERE id='$id_pm_qh' ";
				$ud_dspm = "UPDATE `danhsachmuon` SET tinhtrang='2', WHERE nm='$nm' ";
				$conn->query($ud_sach);
				$conn->query($ud_dg);
				$conn->query($ud_pm);
				$conn->query($ud_dspm);
				echo "<script type='text/javascript'>alert('Trả sách qh thành công!');</script>";
			}					
		}

		$id_ = 'id_pm'.$i;
		$id_pm = $_POST[$id_] ?? null;
		if ($id_pm != null) {
			//echo "<script type='text/javascript'>alert('$id_pm');</script>";
			$sql = "SELECT phieumuon.id as 'id_pm', phieumuon.tinhtrang, phieumuon.nguoimuon, phieumuon.noidung, sach.id_sach, phieumuon.soluongmuon as 'soluongmuon', sach.soluongcon, sach.gia, docgia.sodu, docgia.khoanno, docgia.id as 'id_dg' 
			FROM phieumuon 
			JOIN sach ON phieumuon.tensach = sach.id_sach 
			JOIN docgia ON phieumuon.nguoimuon = docgia.id 
			WHERE phieumuon.id='$id_pm' and tinhtrang='1' ";
			$run = mysqli_query($conn, $sql);
			while ($row = $run->fetch_assoc()) {
				$slm=$row['soluongmuon'];
				$gia = $row['gia'];
				$id_s = $row['id_sach'];
				$id_dg = $row['id_dg'];
				$slc = $row['soluongcon'] + $slm;
				$tienphat = $gia * $slm;
				$nmu = $row['nguoimuon'];
				$ud_sach = "UPDATE `sach` SET soluongcon='$slc' WHERE id_sach = '$id_s' ";
				$ud_dg = "UPDATE `docgia` SET sodu=sodu+'$tienphat' WHERE id = '$id_dg' ";
				$ud_pm = "UPDATE `phieumuon` SET tinhtrang='0', noidung='0' WHERE id='$id_pm' ";
				$ud_dspm1 = "UPDATE `danhsachmuon` SET tinhtrang='2', WHERE nm='$nmu' ";
				$conn->query($ud_sach);
				$conn->query($ud_dg);
				$conn->query($ud_pm);	
				echo "<script type='text/javascript'>alert('Trả sách thành công!');</script>";
			}
		}
	}
}


function songay($first, $second)
{
	$first_date = strtotime($first);
	$second_date = strtotime($second);
	$datediff = abs($first_date - $second_date);
	return floor($datediff / (60*60*24));
}
?>



