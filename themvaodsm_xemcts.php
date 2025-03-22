<?php
include_once('conn.php');
    if(isset($_POST['themvaodsm'])) {
        $id = $_POST['id_s'];
        $tendn = trim($_POST['id_dn']);
        $check_sls = "SELECT * FROM sach WHERE id_sach='$id' ";
        $res_check_sls = mysqli_query($conn, $check_sls);
        while ($row=$res_check_sls->fetch_assoc()) {
            $gia = $row['gia'];
            if ($row['soluongcon']==0) {
                echo "<script type='text/javascript'>alert('Sách đang được cập nhập!');</script>";
                echo "<script type='text/javascript'> document.location ='TrangChuDocGia.php?id_dn=$tendn&qlvtt='; </script>";
            } else {
                $sql_check_dxd = "SELECT * from danhsachmuon WHERE tinhtrang='3' and nm = '$tendn' ";
                $res_check_dxd = mysqli_query($conn,$sql_check_dxd);
                if (mysqli_num_rows($res_check_dxd) > 0) {
                    echo "<script type='text/javascript'>alert('Vui lòng chờ xét duyệt!');</script>";
                    echo "<script type='text/javascript'> document.location ='TrangChuDocGia.php?id_dn=$tendn'; </script>";
                } else {
                    $sql_check = "SELECT * FROM danhsachmuon WHERE tensach='$id' and nm = '$tendn' ";
                    $ress = mysqli_query($conn, $sql_check);
                    if (mysqli_num_rows($ress) > 0) {
                        while ($row = $ress -> fetch_assoc()) {
                            $tt_s = $row['tinhtrang'];
                            $slm = $row['soluongmuon'];
                            if ($slm > 2) {
                                include_once('auto_increment_danhsachmuon.php');
                                echo "<script type='text/javascript'>alert('Chỉ được mượn tối đa 3 quyển sách này!');</script>";
                                echo "<script type='text/javascript'> document.location ='TrangChuDocGia.php?id_dn=$tendn&qlvtt='; </script>";
                            } else {
                                $sql_check_money = "SELECT * FROM docgia WHERE id = '$tendn' ";
                                $run_ = mysqli_query($conn, $sql_check_money);
                                while ($row1 = $run_->fetch_assoc()) {
                                    $sd = $row1['sodu'] - $row1['khoanno'] - $gia;
                                    if ($sd >= 0 ) {
                                        if ($tt_s == '') {
                                            $sql_update = "UPDATE `danhsachmuon` SET `soluongmuon`=`soluongmuon`+1 WHERE tensach ='$id' and nm = '$tendn' ";
                                            if (mysqli_query($conn, $sql_update)) {
                                                $sql = "UPDATE `sach` SET `soluongcon`=`soluongcon` - 1 WHERE id_sach='$id' ";
                                                $conn->query($sql);
                                                include_once('auto_increment_danhsachmuon.php');
                                                echo "<script type='text/javascript'>alert('Đã thêm vào danh sách mượn!');</script>";
                                                echo "<script type='text/javascript'> document.location ='TrangChuDocGia.php?id_dn=$tendn'; </script>";
                                            } else {
                                                echo "Lỗi: ".mysqli_error();
                                            }
                                        } else {
                                            $sql_add = "INSERT INTO `danhsachmuon`(`nm`,`tensach`, `soluongmuon`) VALUES ('$tendn','$id','1')";
                                            if (mysqli_query($conn, $sql_add)) {
                                                $sql = "UPDATE `sach` SET `soluongcon`=`soluongcon` - 1 WHERE id_sach='$id' ";
                                                $conn->query($sql);
                                                include_once('auto_increment_danhsachmuon.php');
                                                echo "<script type='text/javascript'>alert('Đã thêm vào danh sách mượn!');</script>";
                                                echo "<script type='text/javascript'> document.location ='TrangChuDocGia.php?id_dn=$tendn'; </script>";
                                            } else {
                                                echo "Lỗi: ".mysqli_error();
                                            }
                                        }
                                    } else {
                                        echo "<script type='text/javascript'>alert('Tài khoản của bạn không đủ vui lòng nạp thêm!');</script>";
                                        echo "<script type='text/javascript'> document.location ='TrangChuDocGia.php?id_dn=$tendn&qlvtt='; </script>";
                                    }
                                }
                                
                            }
                        }
                        
                    } else {
                        $sql_check_money = "SELECT * FROM docgia WHERE id = '$tendn' ";
                        $run_ = mysqli_query($conn, $sql_check_money);
                        while ($row1 = $run_->fetch_assoc()) {
                            $sd = $row1['sodu'] - $row1['khoanno'] - $gia;
                            if ($sd >= 0 ) {
                                $sql_add = "INSERT INTO `danhsachmuon`(`nm`,`tensach`, `soluongmuon`) VALUES ('$tendn','$id','1')";
                                if (mysqli_query($conn, $sql_add)) {
                                    $sql = "UPDATE `sach` SET `soluongcon`=`soluongcon` - 1 WHERE id_sach='$id' ";
                                    $conn->query($sql);
                                    include_once('auto_increment_danhsachmuon.php');
                                    echo "<script type='text/javascript'>alert('Đã thêm vào danh sách mượn!');</script>";
                                    echo "<script type='text/javascript'> document.location ='TrangChuDocGia.php?id_dn=$tendn'; </script>";

                                } else {
                                    echo "Lỗi: ".mysqli_error();
                                }
                            } else {
                                echo "<script type='text/javascript'>alert('Tài khoản của bạn không đủ vui lòng nạp thêm!');</script>";
                                echo "<script type='text/javascript'> document.location ='TrangChuDocGia.php?id_dn=$tendn&qlvtt='; </script>";
                            }
                        }
                    }
                }
            }
        }
    }
?>






