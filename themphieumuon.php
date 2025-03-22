<?php 
if(isset($_POST['themphieumuon'])) {

    $mapm = trim($_POST['maphieumuon'] ?? null) ;
    $ngm = trim($_POST['nguoimuon'] ?? null);
    $tens = trim($_POST['tensach'] ?? null);
    $slcon = trim($_POST['soluongmuon'] ?? null);
    $ngaytra = trim($_POST['ngaytrathuc'] ?? null);
    $canbo = trim($_POST['form-select_canbo'] ?? null) ;
   
    isset($_POST['form-select_canbo']);

    if(empty($mapm)){
        $error1 = "Mã phiếu mượn trống!";
    } elseif(empty($ngm)){
        $error1 = "Người mượn trống!";
    } elseif(empty($tens)){
        $error1 = "Tên sách trống!";
    } elseif(empty($slcon)){
        $error1 = "Số lượng mượn trống!";
    } elseif($canbo == null){
        $error1 = "Bạn chưa chọn cán bộ!";
    } elseif (!is_numeric($slcon)) {
        $error1 = "Số lượng chỉ được nhập số!";
    } else {
        $select_id_pm = "SELECT * FROM phieumuon WHERE id = '$mapm'";
        $res_id_pm = mysqli_query($conn, $select_id_pm);

        $select_id_dg = "SELECT id FROM docgia WHERE madg = '$ngm'";
        $res_id_dg = mysqli_query($conn, $select_id_dg);

        

        if (mysqli_num_rows($res_id_pm) > 0) {
            $error1 = "Mã phiếu mượn đã tồn tại";
        } elseif (mysqli_num_rows($res_id_dg) <= 0) {
            $error1 = "Mã độc giả không tồn tại";
        } else {                
            while ($row = $res_id_dg -> fetch_assoc()) {
              
                    $id = "".$row['id'];
                   
                    $ngaymuon = date('Y-m-d');
                    $sql = "INSERT INTO `phieumuon`(`id`, `nguoimuon`, `tensach`, `soluongmuon`,`ngaymuon`, `ngaytra`, `tinhtrang`, `canbo`, `noidung`, `tienphat`) VALUES ('$mapm','$id','$tens','$slcon', '$ngaymuon','$ngaytra','1','$canbo','0','0')";
                    
                    if (mysqli_query($conn,$sql)) {
                        include_once('auto_increment_pm.php');
                        $error1 = "Thành công!";
                    } else {
                        $error1 = "Lỗi: ". mysqli_error($conn);
                    }


                
            }
        }
        
    }
}
?>