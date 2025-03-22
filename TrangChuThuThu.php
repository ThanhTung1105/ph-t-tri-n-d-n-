<?php

include_once('conn.php');
if (isset($_GET['id_dn'])) {
$macb = $_GET['id_dn'];
$sql_cmdg = "SELECT * FROM thuthu WHERE macb='$macb' or id = '$macb' ";
$resss = mysqli_query($conn,$sql_cmdg);
while ($row=$resss->fetch_assoc()) {
    $tendn = $row['id'];
    include_once('themdocgia.php');
    include_once('themsach.php');
    include_once('themtheloai.php');
    include_once('themphieumuon.php');
    include_once('duyet_pm.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Thủ thư</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/tctt.css">
    <style type="text/css">
        .my-custom-scrollbar_pm {
            position: relative;
            height: 320px;
            overflow: auto;
            background-color: white;
        }
        .my-custom-scrollbar_qlmt {
            position: relative;
            height: 399px;
            overflow: auto;
            background-color: white;

        }
        table.table_sua_ctpm, td.td_sua_ctpm {
            border: 0px;
            background-color: white;
            font-size: 18px;
        }
    </style>
    <script src="js/chondocgia.js" type="text/javascript"></script>
</head>


<body style="background-color: #ccccff">
    <header >
        <div>
            <h3 style="padding-top: 25px;">QUẢN LÝ THƯ VIỆN</h3>
            <h3 style="margin-top: -5px;">Đại Học Thủy lợi</h3>
            <div style="margin-top: -80px;position: relative; right: -87%;">
                <form action="index.php">
                    <button onclick="return confirm('Bạn có chắc muốn thoát không?')" class="btn btn-primary" data-toggle="modal" data-target="#exampleModaldx" style="background-color: white; color:blue; margin-left: -20px;">
                        <img src="img\choice.png">
                        <b>Đăng xuất</b>
                    </button>
                </form>
            </div>
            <img src="img\logosp.png" alt="Đại học thủy lợi" width="26%" style="margin-left: 10px; margin-top: -46px;">
        </div>
    </header>

    <article>
        <!--#####################################################################################################################################################-->

        <div class="tab">
            <?php
            if (isset($_POST['themsach']) or isset($_POST['lammoisach)']) or isset($_POST['luufile']) or isset($_POST['themtheloai']) or isset($_POST['timkiem_tl']) or isset($_POST['save_suasach']) or isset($_POST['save_suasac']) or isset($_GET['x']) or isset($_POST['save_suatl']) or isset($_GET['xtl'])  ){
                ?>
                <button class="tablinks" onclick="openQLDG(event,'qldg')"><img src="img\reading.png"> &nbsp; <b>QUẢN LÝ TÀI KHOẢN</b></button>
                <button class="tablinks" onclick="openQLDG(event,'qls')" id="defaultOpenQLDG"><img src="img\books.png"> &nbsp; <b>QUẢN LÝ SÁCH</b></button>
                <button class="tablinks" onclick="openQLDG(event,'qlmt')"><img src="img\exchange.png"> &nbsp; <b>QUẢN LÝ MƯỢN TRẢ</b></button>
                <button class="tablinks" onclick="openQLDG(event,'thongke')"><img src="img\statistics.png"> &nbsp; <b>THỐNG KÊ </b></button>
                <button class="tablinks" onclick="openQLDG(event,'tracuu')"><img src="img\research.png"> &nbsp; <b>TRA CỨU</b></button> 
                <?php
            } elseif(isset($_POST['luachon_tkbd']) or isset($_POST['luachon_tks']) or isset($_POST['luachon_tktp'])) {
                ?>
                <button class="tablinks" onclick="openQLDG(event,'qldg')"><img src="img\reading.png"> &nbsp; <b>QUẢN LÝ TÀI KHOẢN</b></button>
                <button class="tablinks" onclick="openQLDG(event,'qls')"><img src="img\books.png"> &nbsp; <b>QUẢN LÝ SÁCH</b></button>
                <button class="tablinks" onclick="openQLDG(event,'qlmt')"><img src="img\exchange.png"> &nbsp; <b>QUẢN LÝ MƯỢN TRẢ</b></button>
                <button class="tablinks" onclick="openQLDG(event,'thongke')" id="defaultOpenQLDG"><img src="img\statistics.png"> &nbsp; <b>THỐNG KÊ </b></button>
                <button class="tablinks" onclick="openQLDG(event,'tracuu')"><img src="img\research.png"> &nbsp; <b>TRA CỨU</b></button> 
                <?php
            } elseif(isset($_POST['themphieumuon']) or isset($_POST['timkiem_phieumuon']) or isset($_POST['lammoipm']) or isset($_POST['luufile_ctpm']) or  isset($_GET['xpm']) ) {
                ?>
                <button class="tablinks" onclick="openQLDG(event,'qldg')"><img src="img\reading.png"> &nbsp; <b>QUẢN LÝ TÀI KHOẢN</b></button>
                <button class="tablinks" onclick="openQLDG(event,'qls')"><img src="img\books.png"> &nbsp; <b>QUẢN LÝ SÁCH</b></button>
                <button class="tablinks" onclick="openQLDG(event,'qlmt')" id="defaultOpenQLDG"><img src="img\exchange.png"> &nbsp; <b>QUẢN LÝ MƯỢN TRẢ</b></button>
                <button class="tablinks" onclick="openQLDG(event,'thongke')"><img src="img\statistics.png"> &nbsp; <b>THỐNG KÊ </b></button>
                <button class="tablinks" onclick="openQLDG(event,'tracuu')"><img src="img\research.png"> &nbsp; <b>TRA CỨU</b></button> 
                <?php
            } elseif(isset($_POST['timkiem_sach'])) {
                ?>
                <button class="tablinks" onclick="openQLDG(event,'qldg')"><img src="img\reading.png"> &nbsp; <b>QUẢN LÝ TÀI KHOẢN</b></button>
                <button class="tablinks" onclick="openQLDG(event,'qls')"><img src="img\books.png"> &nbsp; <b>QUẢN LÝ SÁCH</b></button>
                <button class="tablinks" onclick="openQLDG(event,'qlmt')"><img src="img\exchange.png"> &nbsp; <b>QUẢN LÝ MƯỢN TRẢ</b></button>
                <button class="tablinks" onclick="openQLDG(event,'thongke')"><img src="img\statistics.png"> &nbsp; <b>THỐNG KÊ </b></button>
                <button class="tablinks" onclick="openQLDG(event,'tracuu')" id="defaultOpenQLDG"><img src="img\research.png"> &nbsp; <b>TRA CỨU</b></button> 
                <?php
            } else {
                ?>
                <button class="tablinks" onclick="openQLDG(event,'qldg')" id="defaultOpenQLDG"><img src="img\reading.png"> &nbsp; <b>QUẢN LÝ TÀI KHOẢN</b></button>
                <button class="tablinks" onclick="openQLDG(event,'qls')"><img src="img\books.png"> &nbsp; <b>QUẢN LÝ SÁCH</b></button>
                <button class="tablinks" onclick="openQLDG(event,'qlmt')"><img src="img\exchange.png"> &nbsp; <b>QUẢN LÝ MƯỢN TRẢ</b></button>
                <button class="tablinks" onclick="openQLDG(event,'thongke')"><img src="img\statistics.png"> &nbsp; <b>THỐNG KÊ </b></button>
                <button class="tablinks" onclick="openQLDG(event,'tracuu')"><img src="img\research.png"> &nbsp; <b>TRA CỨU SÁCH</b></button> 
                <?php
            }
            ?>
        </div>
        <!--tab qldg-->
        <div id="qldg" class="tabcontent">
            <div class="tab2">
                <?php
                if (isset($_POST['timkiem_bandoc'])) {
                    ?>
                    <button class="tablinks1" onclick="openQLDG1(event,'sub-qldg')"><b>Quản lý tài khoản</b></button>
                    <button class="tablinks1" onclick="openQLDG1(event,'xemttdg')" id="defaultOpenQLDG1"><b>Xem thông tin tài khoản</b></button>
                    <?php
                } else {
                    ?>
                    <button class="tablinks1" onclick="openQLDG1(event,'sub-qldg')" id="defaultOpenQLDG1"><b>Quản lý tài khoản</b></button>
                    <button class="tablinks1" onclick="openQLDG1(event,'xemttdg')"><b>Xem thông tin tài khoản</b></button>
                    <?php
                }
                ?>
            </div>

            <div id="sub-qldg" class="tabcontent1">
                <form action="" method="post">
                    <div style="margin-top: 30px; margin-left: 100px;">
                        <p>
                            Mã độc giả: &nbsp;
                            <input type="text" name="madg" id="madg" value="<?php echo isset($_POST['madg']) ? $_POST['madg'] : '' ?>">
                        </p>
                        <p>
                            Mật khẩu: &nbsp;
                            <input type="text" name="mk" id="mk" style="margin-left: 10px;" value="<?php echo isset($_POST['mk']) ? $_POST['mk'] : '' ?>">
                        </p>
                        <p>
                            Tên độc giả: 
                            <input type="text" name="tendg" id="tendg" style="margin-left:5px;" value="<?php echo isset($_POST['tendg']) ? $_POST['tendg'] : '' ?>" >
                        </p>
                        Giới tính:
                        <input type="radio" id="nam" name="gioitinh" value="Nam" checked style="margin-left: 25px;">
                        <label for="nam"> &nbsp;Nam &nbsp;</label>
                        <input type="radio" id="nu" name="gioitinh" value="Nu">
                        <label for="nu"> &nbsp;Nữ &nbsp;</label>
                        <input type="radio" id="khac" name="gioitinh" value="Khac">
                        <label for="khac"> &nbsp;Khác </label><br>

                        <p style="margin-top: 10px;">
                            Vai trò:
                            <select name="role" style="margin-left: 45px; width: 100px;">
                                <option value="0">Thủ thư</option>
                                <option value="1">Độc giả</option>
                            </select> 
                        </p>
                    </div>
                    <div style="margin-left: 580px; margin-top: -219px;">
                        <p>
                            Số điện thoại: 
                            <input type="text" name="sdt" id="sdt" value="<?php echo isset($_POST['sdt']) ? $_POST['sdt'] : '' ?>">
                        </p>
                        <p>
                            Ngày sinh: 
                            <input type="date" name="ngaysinh" min="1990-01-01" max="2022-12-31" style="width: 230px; margin-left: 27px;" value="<?php echo isset($_POST['ngaysinh']) ? $_POST['ngaysinh'] : '2022-09-21' ?>">
                        </p>
                        <p>
                            Địa chỉ: 
                            <input type="text" name="diachi" id="diachi" style="margin-left: 56px;" value="<?php echo isset($_POST['diachi']) ? $_POST['diachi'] : '' ?>">
                        </p>
                        <p>
                            Email: 
                            <input type="Email" name="email" id="email" style="margin-left: 66px;" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
                        </p>
                    </div>
                    <div style="margin-top: 0px;">
                        <div style="margin-left: 580px;">
                            <!-- Thêm độc giả -->
                            <button name="themdg" class="btn btn-primary" data-toggle="modal" style="background-color: white; color: black; margin-left: 80px;"> <img src="img\plus.png"> <b>Thêm</b> </button>                                             
                            <!-- Làm mới qly doc gia-->
                            <button name="lammoidg" type="submit" class="btn btn-primary" style="background-color: white; color: black; margin-left: 20px;"> <img src="img\eraser.png" > <b>Làm mới</b> </button>
                           
                            <button type="submit" onclick="return confirm('Bạn muốn lưu vào file?')" name="luufile_docgia" class="btn btn-primary" style="background-color: white; color: black; margin-left:20px;"> <img src="img\luu.png" width="25" height="25"> <b>Lưu</b> </button>
                            <?php include_once ('luu_file_docgia.php'); ?>
                        </div>
                        <p style="color:red; margin-top: -41px; margin-left: 100px; margin-bottom: -35px;">
                            <!-- echo error -->
                            <?php if(isset($error)) echo "<script type='text/javascript'>alert('".$error."');</script>"; ?> 
                        </p>
                    </div>
                </form>


               
                    <div class="table-wrapper-scroll-y my-custom-scrollbar" style="margin-top: 65px;" >

                        <table class="table table-bordered table-striped mb-0" style="background-color: white;">

                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Mã tài khoản</th>

                                    <th scope="col">Tên tài khoản</th>
                                    <th scope="col">Giới tính</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Ngày sinh</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Vai trò</th>
                                    <th scope="col">Sửa</th>
                                    <th scope="col">Xóa</th>
                                    <th scope="col">Khóa</th>
                                    <th scope="col">Mở khóa</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $sql = "SELECT * FROM docgia";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <th scope='row'><?php echo $row['id']; ?></th>
                                        <td><?php echo $row['madg']; ?></td>
                                        <td><?php echo $row['tendg']; ?></td>
                                        <td><?php echo $row['gioitinh']; ?></td>
                                        <td><?php echo $row['diachi']; ?></td>
                                        <td><?php echo $row['ngaysinh']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td>
                                            <?php 
                                            if($row['role'] == 0) {
                                                echo "Thủ thư";
                                            } else {
                                                echo "Độc giả";
                                            }
                                            ?>
                                            
                                        </td>
                                        <td>
                                            <button class="editbtn" data-toggle="modal" data-target="#exampleModal<?php echo $row['id'] ?>" style="border: 0px; padding: 0px; width: 0px; height: 0px; margin-left: 5px;">
                                                <img src="img\caneta.png" width='20' height='20'>
                                            </button>
                                            <?php include 'model_suadocgia.php'; ?>
                                        </td>
                                        <td style='text-align: center;'>
                                            <a onclick="return confirm('Bạn có chắc muốn xóa tài khoản này không?')" href="delete_docgia.php?iddg=<?php echo $row['id']; ?>&id_dn=<?php echo $tendn; ?>">
                                                <img src='img\xoa.png' width='20' height='20'>
                                            </a>
                                        </td>
                                        <td style='text-align: center;'>
                                            <a onclick="return confirm('Bạn có chắc muốn khóa tài khoản này không?')" href="khoa_docgia.php?iddg=<?php echo $row['id']; ?>&id_dn=<?php echo $tendn; ?>">
                                                <img src='img\block.png' width='20' height='20'>
                                            </a>
                                        </td>
                                        <td style='text-align: center;'>
                                            <a onclick="return confirm('Bạn có chắc muốn mở khóa tài khoản này không?')" href="mokhoa_docgia.php?iddg=<?php echo $row['id']; ?>&id_dn=<?php echo $tendn; ?>">
                                                <img src='img\man.png' width='20' height='20'>
                                            </a>
                                        </td>
                                    </tr>

                                    <?php
                                    

                                }
                                if (isset($mess)) {
                                    echo "<script type='text/javascript'>alert('$mess');</script>";
                                }
                                ?>

                            </tbody>


                        </table>
                    </div> 
                    
            </div>

<!--#####################################################################################################################################################-->

            <div id="xemttdg" class="tabcontent1">
                <!-- xem thong tin doc gia -->
                <form action="" method="post" style="height: 400px;">
                    <div>
                        <p style="color: blue; margin-top: 30px;">
                            <img src="img\light-bulb.png"> 
                            <b> Nhập thông tin bạn đọc: </b> 
                            <input type="text" name="txt_timkiem_bandoc" style="margin-left: 15px;" placeholder=" Nhập...">
                            <input type="submit" name="timkiem_bandoc" value="Xem" style="background-color: white; color: blue; font-weight: bold; margin-left: 20px; width: 80px;">
                        </p>
                    </div>
                    <div class="table_xemttbd">
                        <div class="table-wrapper-scroll-y my-custom-scrollbar_xemttdg">

                            <table class="table table-bordered table-striped mb-0" style="background-color: white;">

                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Mã tài khoản</th>
                                        <th scope="col">Tên tài khoản</th>
                                        <th scope="col">Giới tính</th>
                                        <th scope="col">Địa chỉ</th>
                                        <th scope="col">Ngày sinh</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Vai trò</th>
                                        <th scope="col">Sửa</th>
                                        <th scope="col">Xóa</th>
                                        <th scope="col">Khóa</th>
                                        <th scope="col">Mở khóa</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    if (isset($_POST['timkiem_bandoc'])) {
                                        $txt_timkiem = $_POST['txt_timkiem_bandoc'];

                                        if (!empty($txt_timkiem)) {
                                            $sql1 = "SELECT * FROM docgia WHERE madg LIKE '%$txt_timkiem%' or tendg LIKE '%$txt_timkiem%' or sdt LIKE '%$txt_timkiem%' or email LIKE '%$txt_timkiem%' or diachi LIKE '%$txt_timkiem%'";
                                            $query_tk = mysqli_query($conn, $sql1);
                                            if (mysqli_num_rows($query_tk) > 0 ) {
                                                while ($row = $query_tk->fetch_assoc()) {
                                                    require 'timkiem_bandoc.php';
                                                }
                                            } else {

                                                $sql = "SELECT * FROM docgia";
                                                $result = $conn->query($sql);
                                                while ($row = $result->fetch_assoc()) {
                                                    require 'timkiem_bandoc.php';
                                                }
                                                echo "<script type='text/javascript'>alert('Không tìm thấy kết quả!');</script>";
                                            }

                                        } else {
                                            $sql = "SELECT * FROM docgia";
                                            $result = $conn->query($sql);
                                            while ($row = $result->fetch_assoc()) {
                                                require 'timkiem_bandoc.php';
                                            }
                                            echo "<script type='text/javascript'>alert('Bạn chưa nhập thông tin tìm kiếm!');</script>";
                                        }
                                    } else {
                                        $sql_sl_dg = "SELECT * FROM docgia";
                                        $sql_sl_dg_run = $conn->query($sql_sl_dg);
                                        while ($row = $sql_sl_dg_run->fetch_assoc()) {
                                            require 'timkiem_bandoc.php';
                                        }
                                    }
                                
                                    ?>


                                </tbody>

                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!--#####################################################################################################################################################-->

        <!--qls-->
        <div id="qls" class="tabcontent">
            <div class="tab2">
                <?php
                if(isset($_POST['themtheloai']) or isset($_POST['timkiem_tl']) or isset($_POST['save_suatl']) or isset($_GET['xtl'])) {
                    ?>
                    <button class="tablinks_qls" onclick="openQLDG_qls(event,'sub-qls')"><b>Quản lý sách</b></button>
                    <button class="tablinks_qls" onclick="openQLDG_qls(event,'qltl')" id="defaultOpenQLDG_qls"><b>Quản lý thể loại</b></button>
                    <?php
                } else {
                    ?>
                    <button class="tablinks_qls" onclick="openQLDG_qls(event,'sub-qls')" id="defaultOpenQLDG_qls"><b>Quản lý sách</b></button>
                    <button class="tablinks_qls" onclick="openQLDG_qls(event,'qltl')"><b>Quản lý thể loại</b></button>
                    <?php
                }
                ?>
            </div>
            <!-- sub-qls-->
            <div id="sub-qls" class="tabcontent_qls">
                <div class="table1">
                    <form action="" method="post">  
                        <table style="margin-left:120px">
                            <tr>
                                <td>Tên sách:</td>
                                <td><input type="text" name="tensach" value="<?php echo isset($_POST['tensach']) ? $_POST['tensach'] : '' ?>"></td>
                                </td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>Tác giả:</td>
                                <td><input type="text" name="tacgia" value="<?php echo isset($_POST['tacgia']) ? $_POST['tacgia'] : '' ?>"></td>
                            </tr>

                            <tr>
                                <td>Thể loại:</td>
                                <td>

                                    <select class="form-selec_tl" name="form-select_tl" aria-label="Default select example" style="color: black; margin-left: 0px; width: 230px; height: 35px;" >
                                        <option value="0" disabled selected> Chọn thể loại </option>
                                        <?php
                                        $sql_sl_tentheloai = "SELECT * FROM theloai";
                                        $sql_sl_tentheloai_run = mysqli_query($conn, $sql_sl_tentheloai);
                                        while ($row=$sql_sl_tentheloai_run->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $row['id']; ?>"> <?php echo $row['tentheloai']; ?> </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>Nhà xuất bản:</td>
                                <td><input type="text" name="nxb" value="<?php echo isset($_POST['nxb']) ? $_POST['nxb'] : '' ?>"></td>
                            </tr>

                            <tr>
                                <td>Số lượng:</td>
                                <td>
                                    <input type="text" id="slcon" name="soluongcon" value="<?php echo isset($_POST['soluongcon']) ? $_POST['soluongcon'] : '' ?>">
                                </td>
                                <td></td>
                                <td>&nbsp;</td>
                                <td rowspan="1">Tình trạng:</td>
                                <td rowspan="1">
                                    <select name="tinhtrang_sach" style="width: 200px; height:30px;">
                                        <option value="0">Mới</option>
                                        <option value="1">Cũ, nguyên</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>Giá:</td>
                                <td><input type="number" name="gia"  value="<?php echo isset($_POST['gia']) ? $_POST['gia'] : '0' ?>" min="0">
                                
                            </tr>

                            <tr>
                                
                                <td colspan="4">
                                    <!-- Thêm -->   
                                    
                                </td>
                                <td><button name="themsach" class="btn btn-primary" data-bs-toggle="modal" style="background-color: white; color: black;">
                                        <img src="img\plus.png"><b> Thêm</b>
                                    </button></td>
                                <td style="text-align: center;">                
                                    <!-- Làm mới -->
                                    <button name="lammoisach" type="reset" class="btn btn-primary" style="background-color: white; color: black;"> <img src="img\eraser.png" > <b>Làm mới</b> </button>
                                    <!-- Lưu -->
                                    
                                </td>
                                <td>
                                    <button type="submit" onclick="return confirm('Bạn muốn lưu vào file?')" name="luufile" class="btn btn-primary" style="background-color: white; color: black;"> <img src="img\luu.png" width="25" height="25"> <b>Lưu</b> </button>
                                    <?php include_once ('luu_file.php'); ?>
                                </td>
                            </tr>

                            <tr>
                            </tr>
                        </table>
                    </form>
                    <p style="color:red; margin-top: -50px; margin-bottom: -35px; margin-left: 100px;">
                        <?php if(isset($error1)) echo "<script type='text/javascript'>alert('".$error1."');</script>";?>
                    </p>
                </div>
                <div class="table2">
                    <div class="table-wrapper-scroll-y my-custom-scrollbar_qls" style="margin-top: 65px;">
                        <!-- table thông tin qly sach -->
                        <table class="table table-bordered table-striped mb-0" style="background-color:white;">

                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                
                                <th scope="col">Tên sách</th>
                                <th scope="col">Thể loại</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Tác giả</th>
                                <th scope="col">NXB</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Tình trạng</th>
                                <th scope="col">Sửa</th>
                                <th scope="col">Xóa</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $sql = "SELECT * FROM theloai JOIN sach ON theloai.id = sach.id_theloai ORDER BY id_sach";
                            $result_sql = mysqli_query($conn,$sql);
                            while ($row = $result_sql->fetch_assoc()) {
                                $id_tl = $row['id_theloai'];
                                $id_nd = $row['tomtatnoidung'];
                                ?>    

                                <tr>
                                    <th scope="row"><?php echo $row['id_sach']; ?></th>
                                    
                                    <td><?php echo $row['tensach']; ?></td>
                                    <td><?php echo $row['tentheloai']; ?></td>
                                    <td><?php echo $row['soluongcon']; ?></td>
                                    <td><?php echo $row['tacgia']; ?></td>
                                    <td><?php echo $row['nxb']; ?></td>
                                    <td><?php echo number_format($row['gia'],0)."đ"; ?></td>
                                    <td>
                                        <?php 
                                        if ($row['tomtatnoidung']=="0") {
                                            echo "Mới";
                                        } else {
                                            echo "Cũ, nguyên";
                                        }
                                         
                                        ?>   
                                    </td>

                                    <td style="text-align: center;">
                                        <button name="save_suasach" type="button" class="btn btn-success" data-toggle="modal" data-target="#b<?php echo $row['id_sach'];?>" style="width: 0px; height: 0px; padding: 0px; border: 0px; "><img src="img\caneta.png" width='20' height='20' style="margin-left: -10px; margin-top: -30px;"></button>
                                        <?php include 'model_suasach.php'; ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <form method="get">
                                            <a onclick="return confirm('Bạn có chắc muốn xóa sách này không?')" href="delete_sach.php?ids=<?php echo $row['id_sach']; ?>&id_dn=<?php echo $tendn; ?>">
                                                <img src="img\xoa.png" width="17" height="17">
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            } 
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

<!--#############################################################################################################################################-->

        <!-- quan ly the loai -->
        <div id="qltl" class="tabcontent_qls"> 
          <form method="post">
            <p style="margin-top:35px; text-align: center;"> <img src="img\book _1.png"> <b> Thông tin thể loại sách </b></p>
            <div style="margin-left: 100px;">
                <p style="margin-top: 50px;"> Mã thể loại: &nbsp;<input type="text" name="matheloai" value="<?php echo isset($_POST['matheloai']) ? $_POST['matheloai'] : '' ?>"></p>
                <p style="margin-top: 45px;"> Tên thể loại: <input type="text" name="tentheloai" value="<?php echo isset($_POST['tentheloai']) ? $_POST['tentheloai'] : '' ?>"></p>
                <div style="margin-left: 120px; margin-top:50px;">
                    <button name="themtheloai" style="border: 1px solid blue; color: blue; width: 100px; margin-top: 50px;"><img src="img\plus.png"><b>Thêm</b></button>
                    <button style="border: 1px solid blue; color: blue; width: 100px; margin-left: 20px;"><img src="img\luu.png"><b>Lưu</b></button>
                </div>
            </div>
            <!--table the loai-->
            <div class="table_qltl">
                <div class="table-wrapper-scroll-y my-custom-scrollbar_qltl" style="margin-top:30px;">
                    <table class="table table-bordered table-striped mb-0" style="background-color:white;">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                
                                <th scope="col">Thể loại</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col" style="width: 50px;">Sửa</th>
                                <th scope="col" style="width: 50px;">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if (isset($_POST['timkiem_tl'])) {
                                $txt_timkiem = $_POST['timkiemtl'];

                                if (!empty($txt_timkiem)) {
                                    $sql1 = "SELECT * FROM theloai WHERE id LIKE '%$txt_timkiem%' or tentheloai LIKE '%$txt_timkiem%' ";
                                    $query_tk = mysqli_query($conn, $sql1);
                                    if (mysqli_num_rows($query_tk) > 0 ) {
                                        while ($row = $query_tk->fetch_assoc()) {
                                            require 'timkiem_theloai.php';
                                        }
                                    } else {

                                        $sql = "SELECT * FROM theloai";
                                        $result = $conn->query($sql);
                                        while ($row = $result->fetch_assoc()) {
                                            require 'timkiem_theloai.php';
                                        }
                                        echo "<script type='text/javascript'>alert('Không tìm thấy kết quả!');</script>";
                                    }

                                } else {
                                    $sql = "SELECT * FROM theloai";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        require 'timkiem_theloai.php';
                                    }
                                    echo "<script type='text/javascript'>alert('Bạn chưa nhập thông tin tìm kiếm!');</script>";
                                }
                            } else {
                                $sql_sl_theloai = "SELECT * FROM theloai";
                                $rs_sl_tl = mysqli_query($conn,$sql_sl_theloai);
                                while($row = $rs_sl_tl->fetch_assoc()) {
                                    require 'timkiem_theloai.php';
                                } 
                            }

                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <div>
                <form method="post">
                    <p style="margin-left: 550px; margin-top: 30px;">
                        <input type="text" name="timkiemtl" placeholder=" Tìm kiếm thể loại..." style="width: 330px;">
                        <img src="img\searching.png" style="margin-left: -40px;">
                        <input type="submit" name="timkiem_tl" value="Tìm kiếm" style="border: 1px solid blue; color:blue; margin-left: 20px;">
                    </p>
                </form>
            </div>
        </form>
    </div>
</div>

<!--#######################################################################################################################################-->

<!--quan ly muon tra-->
<div id="qlmt" class="tabcontent">
    <div class="tab2">
        <?php 
        if(isset($_POST['timkiem_phieumuon']) or isset($_GET['xpmct'])) {
            ?>
            <button class="tablinks_qlmt" onclick="openQLDG_qlmt(event,'dspm')"><b>Danh sách phiếu mượn</b></button>
            <button class="tablinks_qlmt" onclick="openQLDG_qlmt(event,'ctpm')" id="defaultOpenQLDG_qlmt"><b>Chi tiết phiếu mượn</b></button> 
            <?php
        } else {
            ?>
            <button class="tablinks_qlmt" onclick="openQLDG_qlmt(event,'dspm')" id="defaultOpenQLDG_qlmt"><b>Danh sách phiếu mượn</b></button>
            <button class="tablinks_qlmt" onclick="openQLDG_qlmt(event,'ctpm')"><b>Chi tiết phiếu mượn</b></button> 
            <?php
        }
        ?>
    </div>

    <div id="dspm" class="tabcontent_qlmt">
        <h5> <b> <img src="img\bill.png"> CÁC PHIẾU MƯỢN ĐÃ ĐĂNG KÝ </b> </h5>
        <div class="table_qlmt">
            <div class="table-wrapper-scroll-y my-custom-scrollbar_qlmt">
            <!-- table thông tin muon tra sach -->
                <table class="table table-bordered table-striped mb-0">

                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Người mượn</th>
                        <th scope="col">Tên sách</th>
                        <th scope="col">Thể loại</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Tình trạng</th>
                        <th scope="col">Cán bộ</th>
                        <th scope="col" style="width: 50px;">Sửa</th>

                    </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sql_sl_phieumuon = "
                        SELECT phieumuon.id,  phieumuon.ngaytra, phieumuon.tinhtrang, docgia.tendg, docgia.madg, sach.tensach, sach.gia, thuthu.tencb, phieumuon.soluongmuon, theloai.tentheloai, phieumuon.noidung, sach.id_sach as 'id_sach', thuthu.id as 'id_thuthu' FROM phieumuon 
                        INNER JOIN docgia ON phieumuon.nguoimuon = docgia.id 
                        INNER JOIN sach ON phieumuon.tensach = sach.id_sach
                        INNER JOIN theloai ON sach.id_theloai = theloai.id
                        INNER JOIN thuthu ON phieumuon.canbo = thuthu.id ORDER BY `phieumuon`.`id` ASC
                        ";


                        $result_sl_pm = mysqli_query($conn, $sql_sl_phieumuon);
                        while ($row = $result_sl_pm->fetch_assoc()) {
                            $tens = $row['id_sach'];
                            $canbo = $row['id_thuthu'];
                            ?>
                            <tr>
                                <th scope="row"><?php echo $row['id']; ?></th>
                                <td><?php echo $row['tendg']; ?></td>
                                <td><?php echo $row['tensach']; ?></td>
                                <td><?php echo $row['tentheloai']; ?></td>
                                <td><?php echo $row['soluongmuon']; ?></td>
                                <td>
                                    <?php
                                    if ($row['tinhtrang']==5) {
                                        ?><a onclick="return confirm('Bạn chắc chắn muốn duyệt độc giả này chứ?')" href='duyet_pm.php?id_ttt=<?php echo $row['id']; ?>&id_dn=<?php echo $tendn; ?>' style='color: blue;'>Duyệt</a>

                                        <?php
                                    } elseif ($row['tinhtrang']==4) {
                                        echo "<p style='background-color: lightblue;'>Quá hạn</p>";
                                    } elseif ($row['tinhtrang']==3) {
                                        echo "Hư hỏng";
                                    } elseif ($row['tinhtrang']==2) {
                                        echo "Mất sách";
                                    } elseif ($row['tinhtrang']==1) {
                                        echo "Chưa trả";
                                    } elseif ($row['tinhtrang']==0) {
                                        echo "Đã trả";
                                    }
                                    include_once('duyet_pm.php');
                                    ?>
                                </td>
                                <td><?php echo $row['tencb'] ?? null; ?></td>
                                <td style="text-align: center;">
                                    <button class="editbtn" data-toggle="modal" data-target="#e<?php echo $row['id'];?>" style="border: 0px; padding: 0px; width: 0px; height: 0px; margin-left: -15px;">
                                        <img src="img\caneta.png" width='20' height='20'>
                                    </button>
                                    <?php include 'model_suaphieumuon.php'; ?>
                                </td>
                                
                            </tr>

                            <?php
                        } 
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
<!--btn them phieu muon -->
        <form method="post">
            <div class="btn_them_phieumuon">
                <div class="container-fluid">
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#flipFlop" style="background-color: white; color: black; margin-left: 900px; margin-top: 20px;">
                        <img src="img\plus.png"><b> Thêm</b>
                    </button>
                    <!-- The modal -->
                    <div class="modal fade" id="flipFlop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="padding: 10px;">
                                    <h5 class="modal-title" id="modalLabel" style="color:blue; margin-top: 10px;"><b>Thêm phiếu mượn</b></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <div style="margin-left: 20px; margin-top: 5px;">
                                        <table class="table_thempm">
                                            <tr>
                                                <td>Mã phiếu mượn: </td>
                                                <td> &nbsp; <input type="text" name="maphieumuon" value="<?php echo isset($_POST['maphieumuon']) ? $_POST['maphieumuon'] : '' ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Mã độc giả: </td>
                                                <td> &nbsp; <input type="text" name="nguoimuon" value="<?php echo isset($_POST['nguoimuon']) ? $_POST['nguoimuon'] : '' ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Tên sách: </td>
                                                <td> &nbsp; <select name="tensach" style="width: 230px; height: 37px;">
                                                        <option value="" disabled selected> Sách </option>
                                                        <?php
                                                        $sl_thuthu = "SELECT * FROM sach";
                                                        $rs_sl_thuthu = mysqli_query($conn, $sl_thuthu);
                                                        while ($row = $rs_sl_thuthu->fetch_assoc()) {
                                                            ?>
                                                            <option value="<?php echo $row['id_sach']; ?>" style="color: black;"> <?php echo $row['tensach']; ?> </option>
                                                            <?php
                                                        } 
                                                        ?>                            
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td>Số lượng mượn: </td>
                                                <td> &nbsp; <input type="text" name="soluongmuon" value="<?php echo isset($_POST['soluongmuon']) ? $_POST['soluongmuon'] : '' ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Ngày trả trước: </td>
                                                <td> &nbsp; <input type="date" name="ngaytrathuc" min="2023-01-01" max="2023-12-31" style="width: 230px; height: 37px;" value="<?php echo isset($_POST['ngaytrathuc']) ? $_POST['ngaytrathuc'] : '2023-09-21'
                                                    ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Cán bộ: </td>
                                                <td> &nbsp; 
                                                    <select name="form-select_canbo" aria-label="Default select example" style="width: 230px; height: 37px;">
                                                        <option value="" disabled selected> Cán bộ </option>
                                                        <?php
                                                        $sl_thuthu = "SELECT * FROM thuthu";
                                                        $rs_sl_thuthu = mysqli_query($conn, $sl_thuthu);
                                                        while ($row = $rs_sl_thuthu->fetch_assoc()) {
                                                            ?>
                                                            <option value="<?php echo $row['id']; ?>" style="color: black;"> <?php echo $row['tencb']; ?> </option>
                                                            <?php
                                                        } 
                                                        ?>                            
                                                    </select>
                                                </td>
                                            </tr>
                                            
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer" style="padding: 5px;">
                                    <input type="submit" name="themphieumuon" value="Thêm" style="background-color: #0B74E5; color: white; border-radius: 5px; border: 0px; height: 37px; width: 80px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn_them_phieumuon">
                <div class="container-fluid">
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#trasach" style="background-color: white; color: black; margin-left: 700px; margin-top: -90px;">
                        <img src="img\return.png" style="height:32px;"><b> Trả sách</b>
                    </button>
                    <!-- The modal -->
                    <div class="modal fade" id="trasach" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="padding: 10px;">
                                    <h5 class="modal-title" id="modalLabel" style="color:blue; margin-top: 10px;"><b>Chọn độc giả</b></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body" style="text-align: center;">
                                    Độc giả: <select name="chondg" id="selected" style="margin-left: 10px; height: 37px;">
                                                <option selected disabled>Chọn độc giả</option>
                                    <?php
                                    $sql_sl_dg_ts = "SELECT * FROM docgia WHERE role = 1";
                                    $run_t = mysqli_query($conn, $sql_sl_dg_ts);
                                    while ($row_=$run_t->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row_['id']; ?>"><?php echo $row_['tendg']; ?></option>
                                        <?php
                                    }
                                    ?> 
                                    </select>
                                </div>

                                <div class="modal-footer" style="padding: 5px;">
                                    <input type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ts1" value="Tiếp" style="background-color: #0B74E5; color: white; border-radius: 5px; border: 0px; height: 37px; width: 80px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         
            <div class="modal fade" id="ts1" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" style="margin-left: 0px;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="padding: 10px;">
                            <h5 class="modal-title" id="modalLabel" style="color:blue; margin-top: 10px;"><b>Chọn sách trả</b></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div id="selected1">
                            
                            </div>
                            <?php include ('trasach.php');?>
                        </div>

                        <div class="modal-footer" style="padding: 5px;">
                            <input type="submit" class="btn btn-primary btn-sm" name="trasach" value="Xác nhận" style="background-color: #0B74E5; color: white; border-radius: 5px; border: 0px; height: 37px; width: 90px;">
                           
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

<!--#####################################################################################################################################################-->

<!-- chi tiet phieu muon -->
    <form method="post">
        <div id="ctpm" class="tabcontent_qlmt"> 
            <div style="margin-left: 50px; margin-top: 20px;">
               

                <p style="margin-left: 43px;"> 
                    Mã độc giả: &nbsp; 
                    <input type="text" name="madg_pm" value="<?php echo isset($_POST['madg_pm']) ? $_POST['madg_pm'] : '' ?>"> 
                </p>

                <p style="margin-left: 10px"> 
                    Ngày trả trước: &nbsp; 
                    <input type="text" name="ngaytrathuc_pm" style="width: 260px;" value="<?php echo isset($_POST['ngaytrathuc_pm']) ? $_POST['ngaytrathuc_pm'] : '' ?>"> 
                </p>
            </div>
            <div style="margin-left: 580px; margin-top: -100px;">
                <p>Tình trạng:</p> 
                <select class="form-select" name="tinhtrang_pm" aria-label="Default select example" style="color: blue; margin-top: -60px; margin-left: 120px; width: 200px;">
                    <option value="" disabled selected> Tình trạng </option>
                    <option value="0" style="color: black;"> Đã trả </option>
                    <option value="1" style="color: black;"> Chưa trả </option>
                    <option value="2" style="color: black;"> Mất sách </option>
                    <option value="3" style="color: black;"> Hư hỏng </option>
                    <option value="4" style="color: black;"> Quá hạn </option>
                    <option value="5" style="color: black;"> Chờ xét duyệt </option>
                </select>
              
              <div style="margin-top: 30px;">
                <button type="submit" name="timkiem_phieumuon" class="btn btn-primary" style="background-color: white; color: black; height: 45px;"> <img src="img\searching.png" style="height:24px; width: 24px;" > <b>Tìm kiếm</b> </button>
                <button type="reset" name="lammoipm" class="btn btn-primary" style="background-color: white; color: black; height: 45px; margin-left: 35px;"> <img src="img\eraser.png"  style="height:24px; width: 24px;"> <b>Làm mới</b> </button>
            </div>

            </div>
            
            <div class="table_phieumuon">
                <div class="table-wrapper-scroll-y my-custom-scrollbar_pm">

                    <table class="table table-bordered table-striped mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Người mượn</th>
                                <th scope="col">Tên sách</th>
                                <th scope="col">Thể loại</th>
                                <th scope="col" style="width: 50px;">Số lượng</th>
                                <th scope="col" style="width: 95px;">Ngày mượn</th>
                                <th scope="col" style="width: 95px;">Ngày trả</th>
                                <th scope="col" style="width: 78px;">Tình trạng</th>
                                <th scope="col">Cán bộ</th>
                                <th scope="col" style="width: 90px;">Tiền phạt</th>
                                <th scope="col" style="width: 40px;">Sửa</th>
                                

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_POST['timkiem_phieumuon'])) {
                             
                                $madg = trim($_POST['madg_pm']);
                                $ngaytra = trim($_POST['ngaytrathuc_pm']);
                                $tt = trim($_POST['tinhtrang_pm'] ?? null);
                                if ( empty($madg) and $tt == null and empty($ngaytra)) {
                                    echo "<script type='text/javascript'>alert('Bạn chưa nhập thông tin!');</script>";
                                    $sql_sl_phieumuon = "
                                    SELECT phieumuon.id, docgia.tendg, docgia.madg, sach.gia, sach.tensach, thuthu.tencb, phieumuon.soluongmuon, theloai.tentheloai, phieumuon.ngaytra, phieumuon.tinhtrang, phieumuon.noidung, phieumuon.ngaymuon, phieumuon.tienphat FROM phieumuon 
                                    INNER JOIN docgia ON phieumuon.nguoimuon = docgia.id 
                                    INNER JOIN sach ON phieumuon.tensach = sach.id_sach
                                    INNER JOIN theloai ON sach.id_theloai = theloai.id
                                    INNER JOIN thuthu ON phieumuon.canbo = thuthu.id ORDER BY `phieumuon`.`id` ASC";
                                    $result_sl_pm = mysqli_query($conn, $sql_sl_phieumuon);
                                    while ($row = $result_sl_pm->fetch_assoc()) {
                                       require 'timkiem_phieumuon.php'; 
                                    } 
                                } elseif ($tt != null) {
                                    $sql_sl_tinhtrang = "
                                            SELECT phieumuon.id, docgia.tendg, docgia.madg, sach.gia, sach.tensach, thuthu.tencb, phieumuon.soluongmuon, theloai.tentheloai, phieumuon.ngaytra, phieumuon.tinhtrang, phieumuon.noidung, phieumuon.ngaymuon, phieumuon.tienphat FROM phieumuon 
                                            INNER JOIN docgia ON phieumuon.nguoimuon = docgia.id 
                                            INNER JOIN sach ON phieumuon.tensach = sach.id_sach
                                            INNER JOIN theloai ON sach.id_theloai = theloai.id
                                            INNER JOIN thuthu ON phieumuon.canbo = thuthu.id 
                                            WHERE tinhtrang = '$tt'
                                            ORDER BY `phieumuon`.`id` ASC
                                        ";
                                    $ress = mysqli_query($conn, $sql_sl_tinhtrang);
                                    if (mysqli_num_rows($ress) > 0) {
                                        while ($row = $ress -> fetch_assoc()) {
                                            require 'timkiem_phieumuon.php';
                                        }
                                    } elseif(mysqli_num_rows($ress) <= 0) {
                                        echo "<script type='text/javascript'>alert('Không tìm thấy!');</script>";
                                    }
                                } elseif (!empty($madg)){
                                    $sql_sl_phieumuon = "
                                        SELECT phieumuon.id, docgia.tendg, docgia.madg, sach.gia, sach.tensach, thuthu.tencb, phieumuon.soluongmuon, theloai.tentheloai, phieumuon.ngaytra, phieumuon.tinhtrang, phieumuon.noidung, phieumuon.ngaymuon, phieumuon.tienphat FROM phieumuon 
                                        INNER JOIN docgia ON phieumuon.nguoimuon = docgia.id 
                                        INNER JOIN sach ON phieumuon.tensach = sach.id_sach
                                        INNER JOIN theloai ON sach.id_theloai = theloai.id
                                        INNER JOIN thuthu ON phieumuon.canbo = thuthu.id 
                                        WHERE madg = '$madg' 
                                        ORDER BY `phieumuon`.`id` ASC
                                    ";
                                    $result_sl_pm = mysqli_query($conn, $sql_sl_phieumuon);
                                    if (mysqli_num_rows($result_sl_pm) > 0) {
                                        while ($row = $result_sl_pm->fetch_assoc()) {
                                            require 'timkiem_phieumuon.php';
                                        }
                                    } else {
                                        echo "<script type='text/javascript'>alert('Không tìm thấy kết quả!');</script>";
                                    }
                                } elseif (!empty($ngaytra)){
                                    $sql_sl_phieumuon = "
                                        SELECT phieumuon.id, docgia.tendg, docgia.madg, sach.gia, sach.tensach, thuthu.tencb, phieumuon.soluongmuon, theloai.tentheloai, phieumuon.ngaytra, phieumuon.tinhtrang, phieumuon.noidung, phieumuon.ngaymuon, phieumuon.tienphat FROM phieumuon 
                                        INNER JOIN docgia ON phieumuon.nguoimuon = docgia.id 
                                        INNER JOIN sach ON phieumuon.tensach = sach.id_sach
                                        INNER JOIN theloai ON sach.id_theloai = theloai.id
                                        INNER JOIN thuthu ON phieumuon.canbo = thuthu.id 
                                        WHERE ngaytra = '$ngaytra' 
                                        ORDER BY `phieumuon`.`id` ASC
                                    ";
                                    $result_sl_pm = mysqli_query($conn, $sql_sl_phieumuon);
                                    if (mysqli_num_rows($result_sl_pm) > 0) {
                                        while ($row = $result_sl_pm->fetch_assoc()) {
                                            require 'timkiem_phieumuon.php';
                                        }
                                    } else {
                                        echo "<script type='text/javascript'>alert('Không tìm thấy kết quả!');</script>";
                                    }
                                } else {
                                     echo "<script type='text/javascript'>alert('Không tìm thấy kết quả!');</script>";
                                }
                            } else {
                                $sql_sl_phieumuon = "
                                    SELECT phieumuon.id, docgia.tendg, docgia.madg, sach.gia, sach.tensach, thuthu.tencb, phieumuon.soluongmuon, theloai.tentheloai, phieumuon.ngaytra, phieumuon.tinhtrang, phieumuon.noidung, phieumuon.ngaymuon, phieumuon.tienphat FROM phieumuon 
                                    INNER JOIN docgia ON phieumuon.nguoimuon = docgia.id 
                                    INNER JOIN sach ON phieumuon.tensach = sach.id_sach
                                    INNER JOIN theloai ON sach.id_theloai = theloai.id
                                    INNER JOIN thuthu ON phieumuon.canbo = thuthu.id ORDER BY `phieumuon`.`id` ASC
                                ";
                                $result_sl_pm = mysqli_query($conn, $sql_sl_phieumuon);
                                while ($row = $result_sl_pm->fetch_assoc()) {
                                   require 'timkiem_phieumuon.php'; 
                                } 
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
                <button type="submit" onclick="return confirm('Bạn muốn lưu vào file?')" name="luufile_ctpm" class="btn btn-primary" style="background-color: white; color: black; margin-left: 1000px; margin-top: 25px;"> <img src="img\luu.png" width="25" height="25"> <b>Lưu</b> </button>
                <?php 
                include_once ('luu_file_pm.php');
                ?>
            </div>
        </div>
    </form>
</div>

<!--#############################################################################################################################################-->

<div id="thongke" class="tabcontent">
    <!-- Thong ke -->
    <div class="tab3">
        <?php
        if (isset($_POST['luachon_tks'])) {
            ?>
            <button class="tablinks_qltk" onclick="openQLDG_qltk(event,'tkbd')"><b>Thống kê bạn đọc</b></button>
            <button class="tablinks_qltk" onclick="openQLDG_qltk(event,'tks')" id="defaultOpenQLDG_qltk"><b>Thống kê sách</b></button>
            <button class="tablinks_qltk" onclick="openQLDG_qltk(event,'tktp')"><b>Thống kê tiền phạt</b></button>
            <?php
        } elseif (isset($_POST['luachon_tktp'])) {
            ?>
            <button class="tablinks_qltk" onclick="openQLDG_qltk(event,'tkbd')"><b>Thống kê bạn đọc</b></button>
            <button class="tablinks_qltk" onclick="openQLDG_qltk(event,'tks')"><b>Thống kê sách</b></button>
            <button class="tablinks_qltk" onclick="openQLDG_qltk(event,'tktp')"  id="defaultOpenQLDG_qltk"><b>Thống kê tiền phạt</b></button>
            <?php
        } else {
            ?>
            <button class="tablinks_qltk" onclick="openQLDG_qltk(event,'tkbd')" id="defaultOpenQLDG_qltk"><b>Thống kê bạn đọc</b></button>
            <button class="tablinks_qltk" onclick="openQLDG_qltk(event,'tks')"><b>Thống kê sách</b></button>
            <button class="tablinks_qltk" onclick="openQLDG_qltk(event,'tktp')"><b>Thống kê tiền phạt</b></button>
            <?php
        }
        ?>
    </div>
    <!-- thong ke ban doc -->
    
    <form method="post">
        <div id="tkbd" class="tabcontent_qltk"> 
            <div class="tkbd-sub">
                <input type="submit" name="luachon_tkbd" value="Xem" style="width: 80px; background-color: white; font-weight: bold; margin-left: 820px; margin-top: 50px">
                <div style="margin-left:-30px;">
                    <p style="margin-top:-33px; margin-left: 300px">
                        <img src="img\book.png"><b>Lựa chọn: </b> 
                    </p>
                    <select class="form-select" name="select_tkbd" aria-label="Default select example" style="color: blue;">
                        <option value="" disabled selected> Thống kê bạn đọc </option>
                        <option value="1" style="color: black;"> Bạn đọc chưa trả sách </option>
                        <option value="2" style="color: black;"> Bạn đọc mượn quá hạn </option>
                        <option value="3" style="color: black;"> Bạn đọc mượn nhiều nhất </option>
                    </select>
                </div>
            </div>
            <!--table thong ke ban doc -->
            <div class="table_tkbd">
                <div class="table-wrapper-scroll-y my-custom-scrollbar">

                    <table class="table table-bordered table-striped mb-0" style="background-color: white;">
                        <thead>
                            <?php $sl_tkbd = $_POST['select_tkbd'] ?? null; 
                            if ($sl_tkbd==3) {
?>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Người mượn</th>
                                <th scope="col">Tên sách</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col" style="width: 95px;">Ngày mượn</th>
                                <th scope="col" style="width: 95px;">Ngày trả</th>
                                
                            </tr><?php
                            } else {
                                ?>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Người mượn</th>
                                <th scope="col">Tên sách</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col" style="width: 95px;">Ngày mượn</th>
                                <th scope="col" style="width: 95px;">Ngày trả</th>
                                <th scope="col">Tình trạng</th>
                            </tr><?php
                            }
                            ?>
                            
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_POST['luachon_tkbd'])) {
                                $sl_tkbd = $_POST['select_tkbd'] ?? null;
                                if ($sl_tkbd == 1) {
                                    $sql_sl_phieumuon = "
                                    SELECT phieumuon.id, docgia.tendg, docgia.madg, sach.gia, sach.tensach, thuthu.tencb, phieumuon.soluongmuon, theloai.tentheloai, phieumuon.ngaytra, phieumuon.ngaymuon, phieumuon.tinhtrang, phieumuon.noidung FROM phieumuon 
                                    INNER JOIN docgia ON phieumuon.nguoimuon = docgia.id 
                                    INNER JOIN sach ON phieumuon.tensach = sach.id_sach
                                    INNER JOIN theloai ON sach.id_theloai = theloai.id
                                    INNER JOIN thuthu ON phieumuon.canbo = thuthu.id 
                                    WHERE phieumuon.tinhtrang = 1
                                    ORDER BY `phieumuon`.`id` ASC
                                    ";

                                    $result_sl_pm = mysqli_query($conn, $sql_sl_phieumuon);
                                    if (mysqli_num_rows($result_sl_pm) > 0) {
                                        while ($row = $result_sl_pm->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $row['id']; ?></th>
                                                <td><?php echo $row['tendg']; ?></td>
                                                <td><?php echo $row['tensach']; ?></td>
                                                <td><?php echo $row['soluongmuon']; ?></td>
                                                <td><?php echo $row['ngaymuon']; ?></td>
                                                <td><?php echo $row['ngaytra']; ?></td>
                                                <td><?php include ("tinhtrangpm.php"); ?></td>
                                            </tr>

                                        <?php
                                        }
                                    } else {
                                        echo "<script type='text/javascript'>alert('Không tìm thấy kết quả!');</script>";
                                        $sql_sl_phieumuon = "
                                        SELECT phieumuon.id, docgia.tendg, docgia.madg, sach.gia, sach.tensach, thuthu.tencb, phieumuon.soluongmuon, theloai.tentheloai, phieumuon.ngaytra, phieumuon.ngaymuon, phieumuon.tinhtrang, phieumuon.noidung FROM phieumuon 
                                        INNER JOIN docgia ON phieumuon.nguoimuon = docgia.id 
                                        INNER JOIN sach ON phieumuon.tensach = sach.id_sach
                                        INNER JOIN theloai ON sach.id_theloai = theloai.id
                                        INNER JOIN thuthu ON phieumuon.canbo = thuthu.id ORDER BY `phieumuon`.`id` ASC
                                        ";

                                        $result_sl_pm = mysqli_query($conn, $sql_sl_phieumuon);
                                        while ($row = $result_sl_pm->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $row['id']; ?></th>
                                                <td><?php echo $row['tendg']; ?></td>
                                                <td><?php echo $row['tensach']; ?></td>
                                                <td><?php echo $row['soluongmuon']; ?></td>
                                                <td><?php echo $row['ngaymuon']; ?></td>
                                                <td><?php echo $row['ngaytra']; ?></td>
                                                <td><?php include ("tinhtrangpm.php"); ?></td>
                                            </tr>

                                            <?php
                                        } 
                                    }
                                } elseif ($sl_tkbd == 2) {
                                    $sql_sl_phieumuon = "
                                    SELECT phieumuon.id, docgia.tendg, docgia.madg, sach.gia, sach.tensach, thuthu.tencb, phieumuon.soluongmuon, theloai.tentheloai, phieumuon.ngaytra, phieumuon.ngaymuon, phieumuon.tinhtrang, phieumuon.noidung FROM phieumuon 
                                    INNER JOIN docgia ON phieumuon.nguoimuon = docgia.id 
                                    INNER JOIN sach ON phieumuon.tensach = sach.id_sach
                                    INNER JOIN theloai ON sach.id_theloai = theloai.id
                                    INNER JOIN thuthu ON phieumuon.canbo = thuthu.id 
                                    WHERE phieumuon.tinhtrang = 4
                                    ORDER BY `phieumuon`.`id` ASC
                                    ";

                                    $result_sl_pm = mysqli_query($conn, $sql_sl_phieumuon);
                                    if (mysqli_num_rows($result_sl_pm) > 0) {
                                        while ($row = $result_sl_pm->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $row['id']; ?></th>
                                                <td><?php echo $row['tendg']; ?></td>
                                                <td><?php echo $row['tensach']; ?></td>
                                                <td><?php echo $row['soluongmuon']; ?></td>
                                                <td><?php echo $row['ngaymuon']; ?></td>
                                                <td><?php echo $row['ngaytra']; ?></td>
                                                <td><?php include ("tinhtrangpm.php"); ?></td>
                                            </tr>

                                        <?php
                                        }
                                    }
                                }elseif ($sl_tkbd == 3) {
                                    $ss = "SELECT phieumuon.nguoimuon, sum(phieumuon.soluongmuon) as 'tongslm' FROM phieumuon";
                                    $run_ss = mysqli_query($conn, $ss);
                                    $ngmuon ="";
                                    $tongslm ="";
                                    while ($row=$run_ss -> fetch_assoc()) {
                                        $ngmuon = $row['nguoimuon'];
                                        $tongslm = $row['tongslm'];
                                    }
                                    $sql_sl_phieumuon = "
                                    SELECT phieumuon.id, docgia.tendg, docgia.madg, sach.gia, sach.tensach, thuthu.tencb, phieumuon.soluongmuon, theloai.tentheloai, phieumuon.ngaytra, phieumuon.ngaymuon, phieumuon.noidung FROM phieumuon 
                                    INNER JOIN docgia ON phieumuon.nguoimuon = docgia.id 
                                    INNER JOIN sach ON phieumuon.tensach = sach.id_sach
                                    INNER JOIN theloai ON sach.id_theloai = theloai.id
                                    INNER JOIN thuthu ON phieumuon.canbo = thuthu.id
                                    WHERE nguoimuon = '$ngmuon'
                                    ORDER BY `phieumuon`.`id` ASC
                                    ";

                                    $result_sl_pm = mysqli_query($conn, $sql_sl_phieumuon);
                                    if (mysqli_num_rows($result_sl_pm) > 0) {
                                        while ($row = $result_sl_pm->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $row['id']; ?></th>
                                                <td><?php echo $row['tendg']; ?></td>
                                                <td><?php echo $row['tensach']; ?></td>
                                                <td><?php echo $row['soluongmuon']; ?></td>
                                                <td><?php echo $row['ngaymuon']; ?></td>
                                                <td><?php echo $row['ngaytra']; ?></td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        echo "<script type='text/javascript'>alert('Không tìm thấy kết quả!');</script>";
                                        $sql_sl_phieumuon = "
                                        SELECT phieumuon.id, docgia.tendg, docgia.madg, sach.gia, sach.tensach, thuthu.tencb, phieumuon.soluongmuon, theloai.tentheloai, phieumuon.ngaytra, phieumuon.ngaymuon, phieumuon.tinhtrang, phieumuon.noidung FROM phieumuon 
                                        INNER JOIN docgia ON phieumuon.nguoimuon = docgia.id 
                                        INNER JOIN sach ON phieumuon.tensach = sach.id_sach
                                        INNER JOIN theloai ON sach.id_theloai = theloai.id
                                        INNER JOIN thuthu ON phieumuon.canbo = thuthu.id ORDER BY `phieumuon`.`id` ASC
                                        ";

                                        $result_sl_pm = mysqli_query($conn, $sql_sl_phieumuon);
                                        while ($row = $result_sl_pm->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $row['id']; ?></th>
                                                <td><?php echo $row['tendg']; ?></td>
                                                <td><?php echo $row['tensach']; ?></td>
                                                <td><?php echo $row['soluongmuon']; ?></td>
                                                <td><?php echo $row['ngaymuon']; ?></td>
                                                <td><?php echo $row['ngaytra']; ?></td>
                                            </tr>

                                            <?php
                                        } 
                                    }
                                } else {
                                    $sql_sl_phieumuon = "
                                    SELECT phieumuon.id, docgia.tendg, docgia.madg, sach.gia, sach.tensach, thuthu.tencb, phieumuon.soluongmuon, theloai.tentheloai, phieumuon.ngaytra, phieumuon.ngaymuon, phieumuon.tinhtrang, phieumuon.noidung FROM phieumuon 
                                    INNER JOIN docgia ON phieumuon.nguoimuon = docgia.id 
                                    INNER JOIN sach ON phieumuon.tensach = sach.id_sach
                                    INNER JOIN theloai ON sach.id_theloai = theloai.id
                                    INNER JOIN thuthu ON phieumuon.canbo = thuthu.id 
                                    ORDER BY `phieumuon`.`id` ASC
                                    ";

                                    $result_sl_pm = mysqli_query($conn, $sql_sl_phieumuon);
                                    while ($row = $result_sl_pm->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $row['id']; ?></th>
                                            <td><?php echo $row['tendg']; ?></td>
                                            <td><?php echo $row['tensach']; ?></td>
                                            <td><?php echo $row['soluongmuon']; ?></td>
                                            <td><?php echo $row['ngaymuon']; ?></td>
                                            <td><?php echo $row['ngaytra']; ?></td>
                                            <td><?php include ("tinhtrangpm.php"); ?></td>
                                        </tr>

                                        <?php
                                    }
                                }
                            } else {
                                $sql_sl_phieumuon = "
                                SELECT phieumuon.id, docgia.tendg, docgia.madg, sach.gia, sach.tensach, thuthu.tencb, phieumuon.soluongmuon, theloai.tentheloai, phieumuon.ngaytra, phieumuon.ngaymuon, phieumuon.tinhtrang, phieumuon.noidung FROM phieumuon 
                                INNER JOIN docgia ON phieumuon.nguoimuon = docgia.id 
                                INNER JOIN sach ON phieumuon.tensach = sach.id_sach
                                INNER JOIN theloai ON sach.id_theloai = theloai.id
                                INNER JOIN thuthu ON phieumuon.canbo = thuthu.id ORDER BY `phieumuon`.`id` ASC
                                ";

                                $result_sl_pm = mysqli_query($conn, $sql_sl_phieumuon);
                                while ($row = $result_sl_pm->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['id']; ?></th>
                                        <td><?php echo $row['tendg']; ?></td>
                                        <td><?php echo $row['tensach']; ?></td>
                                        <td><?php echo $row['soluongmuon']; ?></td>
                                        <td><?php echo $row['ngaymuon']; ?></td>
                                        <td><?php echo $row['ngaytra']; ?></td>
                                        <td><?php include ("tinhtrangpm.php"); ?></td>
                                       
                                    </tr>
                                    <?php
                                } 
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>

            <p style="color:red; margin-top: 50px;  text-align: center;"><img src="img\open-book.png" style="margin-top: -5px;"> Lựa chọn thông tin bạn muốn thống kê!</p>
        </div>
    </form>

    <!--################################################################################################################################################-->

<!-- thong ke sach -->

    <form method="post">
        <div id="tks" class="tabcontent_qltk"> 
            <div class="tks-sub">
                <input type="submit" name="luachon_tks" value="Xem" style="width: 80px; background-color: white; font-weight: bold; margin-left: 820px; margin-top: 50px">
                <div style="margin-left: -30px">
                    <p style="margin-top: -33px; margin-left: 300px">
                        <img src="img\book.png"><b>Lựa chọn: </b> 
                    </p>
                    <select class="form-select" name="select_tks" aria-label="Default select example" style="color: blue;">
                        <option value="" disabled selected> Thống kê sách </option>
                        <option value="0" style="color: black;"> Sách mới </option>
                        <option value="1" style="color: black;"> Sách cũ </option>
                    </select>
                </div>
            </div>
            <!--table thong ke sach -->
            <div class="table_tkbd table_tks">
                <div class="table-wrapper-scroll-y my-custom-scrollbar">

                    <table class="table table-bordered table-striped mb-0" style="background-color: white;">
                       <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên sách</th>
                                <th scope="col">Thể loại</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Tác giả</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Tình trạng</th>
                          

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (isset($_POST['luachon_tks'])) {
                                $select_tks = $_POST['select_tks'] ?? null;
                                if ($select_tks == 0) {
                                    $sql = "SELECT * FROM theloai JOIN sach ON theloai.id = sach.id_theloai
                                    WHERE tomtatnoidung=0
                                    ORDER BY id_sach";
                                    $result_sql = mysqli_query($conn,$sql);
                                    while ($row = $result_sql->fetch_assoc()) {
                                    ?>    

                                        <tr>
                                            <th scope="row"><?php echo $row['id_sach']; ?></th>
                                            
                                            <td><?php echo $row['tensach']; ?></td>
                                            <td><?php echo $row['tentheloai']; ?></td>
                                            <td><?php echo $row['soluongcon']; ?></td>
                                            <td><?php echo $row['tacgia']; ?></td>
                                            <td><?php echo number_format($row['gia'],0)."vnđ"; ?></td>
                                            <td>
                                                <?php 
                                                if ($row['tomtatnoidung']=="0") {
                                                    echo "Mới";
                                                } else {
                                                    echo "Cũ, nguyên";
                                                }
                                                 
                                                ?>   
                                            </td>

                                        </tr>
                                        <?php
                                    } 
                            
                                } elseif ($select_tks == 1) {
                                    $sql = "SELECT * FROM theloai JOIN sach ON theloai.id = sach.id_theloai
                                    WHERE tomtatnoidung=1
                                    ORDER BY id_sach";
                                    $result_sql = mysqli_query($conn,$sql);
                                    while ($row = $result_sql->fetch_assoc()) {
                                    ?>    

                                        <tr>
                                            <th scope="row"><?php echo $row['id_sach']; ?></th>
                                            
                                            <td><?php echo $row['tensach']; ?></td>
                                            <td><?php echo $row['tentheloai']; ?></td>
                                            <td><?php echo $row['soluongcon']; ?></td>
                                            <td><?php echo $row['tacgia']; ?></td>
                                            <td><?php echo number_format($row['gia'],0)."vnđ"; ?></td>
                                            <td>
                                                <?php 
                                                if ($row['tomtatnoidung']=="0") {
                                                    echo "Mới";
                                                } else {
                                                    echo "Cũ, nguyên";
                                                }
                                                 
                                                ?>   
                                            </td>

                                        </tr>
                                        <?php
                                    } 
                            
                                }
                            } else {
                                $sql = "SELECT * FROM theloai JOIN sach ON theloai.id = sach.id_theloai ORDER BY id_sach";
                                $result_sql = mysqli_query($conn,$sql);
                                while ($row = $result_sql->fetch_assoc()) {
                                    ?>    

                                    <tr>
                                        <th scope="row"><?php echo $row['id_sach']; ?></th>
                                        
                                        <td><?php echo $row['tensach']; ?></td>
                                        <td><?php echo $row['tentheloai']; ?></td>
                                        <td><?php echo $row['soluongcon']; ?></td>
                                        <td><?php echo $row['tacgia']; ?></td>
                                        <td><?php echo number_format($row['gia'],0)."vnđ"; ?></td>
                                        <td>
                                            <?php 
                                            if ($row['tomtatnoidung']=="0") {
                                                echo "Mới";
                                            } else {
                                                echo "Cũ, nguyên";
                                            }
                                             
                                            ?>   
                                        </td>

                                    </tr>
                                    <?php
                                } 
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>

            <p style="color:red; margin-top: 50px; text-align: center;"><img src="img\open-book.png" style="margin-top: -5px;"> Lựa chọn thông tin bạn muốn thống kê!</p>

        </div>
    </form>

    <!--########################################################################################################s########################################-->

    <!-- thong ke tien phat -->
    <form method="post">
        <div id="tktp" class="tabcontent_qltk"> 
            <div class="tktp-sub">
                <input type="submit" name="luachon_tktp" value="Xem" style="width: 80px; background-color: white; font-weight: bold; margin-left: 820px; margin-top: 50px">
                <div style="margin-left:-30px">
                    <p style="margin-top: -33px; margin-left: 300px">
                        <img src="img\book.png"><b>Lựa chọn: </b> 
                    </p>
                    <select class="form-select" name="select_tktp" aria-label="Default select example" style="color: blue;">
                        <option value="" disabled selected> Thống kê tiền phạt </option>
                        <option value="1" style="color: black;"> Đã nộp tiền phạt </option>
                        <option value="2" style="color: black;"> Chưa nộp tiền phạt </option>
                    </select>
                </div>
            </div>
            <!--table thong ke tien phat -->
            <div class="table_tkbd table_tktp">
                <div class="table-wrapper-scroll-y my-custom-scrollbar">

                    <table class="table table-bordered table-striped mb-0" style="background-color: white;">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Người mượn</th>
                                <th scope="col">Tên sách</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col" style="width: 95px;">Ngày mượn</th>
                                <th scope="col" style="width: 95px;">Ngày trả</th>
                                <th scope="col">Tình trạng</th>
                                <th scope="col">Cán bộ</th>
                                <th scope="col">Tiền phạt</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_POST['luachon_tktp'])) {
                                $select_tktp = $_POST['select_tktp'] ?? null;
                                if ($select_tktp == 1) {
                                    $sql_sl_phieumuon = "
                                    SELECT phieumuon.id, docgia.tendg, docgia.madg, sach.gia, sach.tensach, thuthu.tencb, phieumuon.soluongmuon, theloai.tentheloai, phieumuon.ngaytra, phieumuon.tinhtrang, phieumuon.ngaymuon, phieumuon.noidung FROM phieumuon 
                                    INNER JOIN docgia ON phieumuon.nguoimuon = docgia.id 
                                    INNER JOIN sach ON phieumuon.tensach = sach.id_sach
                                    INNER JOIN theloai ON sach.id_theloai = theloai.id
                                    INNER JOIN thuthu ON phieumuon.canbo = thuthu.id 
                                    WHERE phieumuon.noidung = 1
                                    ORDER BY `phieumuon`.`id` ASC
                                    ";
                                    $result_sl_pm = mysqli_query($conn, $sql_sl_phieumuon);
                                    if (mysqli_num_rows($result_sl_pm) > 0) {
                                        while ($row = $result_sl_pm->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $row['id']; ?></th>
                                                <td><?php echo $row['tendg']; ?></td>
                                                <td><?php echo $row['tensach']; ?></td>
                                                <td><?php echo $row['soluongmuon']; ?></td>
                                                <td><?php echo $row['ngaymuon']; ?></td>
                                                <td><?php echo $row['ngaytra']; ?></td>
                                                <td><?php include ('tinhtrangpm.php'); ?></td>
                                                <td><?php echo $row['tencb']; ?></td>
                                                <td>
                                                    <?php 
                                                    if($row['noidung'] == 1) {
                                                        echo "Đã nộp";
                                                    } elseif($row['noidung'] == 2) {
                                                        echo "Chưa nộp";
                                                    } else{}
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php
                                        } 
                                    } 
                                } elseif ($select_tktp == 2) {
                                    $sql_sl_phieumuon = "
                                    SELECT phieumuon.id, docgia.tendg, docgia.madg, sach.gia, sach.tensach, thuthu.tencb, phieumuon.soluongmuon, theloai.tentheloai, phieumuon.ngaytra, phieumuon.ngaymuon, phieumuon.tinhtrang, phieumuon.noidung FROM phieumuon 
                                    INNER JOIN docgia ON phieumuon.nguoimuon = docgia.id 
                                    INNER JOIN sach ON phieumuon.tensach = sach.id_sach
                                    INNER JOIN theloai ON sach.id_theloai = theloai.id
                                    INNER JOIN thuthu ON phieumuon.canbo = thuthu.id 
                                    WHERE phieumuon.noidung = 2
                                    ORDER BY `phieumuon`.`id` ASC
                                    ";
                                    $result_sl_pm = mysqli_query($conn, $sql_sl_phieumuon);
                                    if (mysqli_num_rows($result_sl_pm) > 0) {
                                        while ($row = $result_sl_pm->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $row['id']; ?></th>
                                                <td><?php echo $row['tendg']; ?></td>
                                                <td><?php echo $row['tensach']; ?></td>
                                                <td><?php echo $row['soluongmuon']; ?></td>
                                                <td><?php echo $row['ngaymuon']; ?></td>
                                                <td><?php echo $row['ngaytra']; ?></td>
                                                <td><?php include ('tinhtrangpm.php'); ?></td>
                                                <td><?php echo $row['tencb']; ?></td>
                                                <td>
                                                    <?php 
                                                    if($row['noidung'] == 1) {
                                                        echo "Đã nộp";
                                                    } elseif($row['noidung'] == 2) {
                                                        echo "Chưa nộp";
                                                    } else{}
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php
                                        } 
                                    } 
                                } else {
                                    $sql_sl_phieumuon = "
                                    SELECT phieumuon.id, docgia.tendg, docgia.madg, sach.gia, sach.tensach, thuthu.tencb, phieumuon.soluongmuon, theloai.tentheloai, phieumuon.ngaytra, phieumuon.ngaymuon, phieumuon.tinhtrang, phieumuon.noidung FROM phieumuon 
                                    INNER JOIN docgia ON phieumuon.nguoimuon = docgia.id 
                                    INNER JOIN sach ON phieumuon.tensach = sach.id_sach
                                    INNER JOIN theloai ON sach.id_theloai = theloai.id
                                    INNER JOIN thuthu ON phieumuon.canbo = thuthu.id 
                                    ORDER BY `phieumuon`.`id` ASC
                                    ";
                                    $result_sl_pm = mysqli_query($conn, $sql_sl_phieumuon);
                                    if (mysqli_num_rows($result_sl_pm) > 0) {
                                        while ($row = $result_sl_pm->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $row['id']; ?></th>
                                                <td><?php echo $row['tendg']; ?></td>
                                                <td><?php echo $row['tensach']; ?></td>
                                                <td><?php echo $row['soluongmuon']; ?></td>
                                                <td><?php echo $row['ngaymuon']; ?></td>
                                                <td><?php echo $row['ngaytra']; ?></td>
                                                <td><?php include ('tinhtrangpm.php'); ?></td>
                                                <td><?php echo $row['tencb']; ?></td>
                                                <td>
                                                    <?php 
                                                    if($row['noidung'] == 1) {
                                                        echo "Đã nộp";
                                                    } elseif($row['noidung'] == 2) {
                                                        echo "Chưa nộp";
                                                    } else{}
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php
                                        } 
                                    }
                                }     
                            } else {
                                $sql_sl_phieumuon = "
                                SELECT phieumuon.id, docgia.tendg, docgia.madg, sach.gia, sach.tensach, thuthu.tencb, phieumuon.soluongmuon, theloai.tentheloai, phieumuon.ngaytra, phieumuon.ngaymuon,phieumuon.tinhtrang, phieumuon.noidung FROM phieumuon 
                                INNER JOIN docgia ON phieumuon.nguoimuon = docgia.id 
                                INNER JOIN sach ON phieumuon.tensach = sach.id_sach
                                INNER JOIN theloai ON sach.id_theloai = theloai.id
                                INNER JOIN thuthu ON phieumuon.canbo = thuthu.id 
                                WHERE phieumuon.noidung <> ''
                                ORDER BY `phieumuon`.`id` ASC
                                ";

                                $result_sl_pm = mysqli_query($conn, $sql_sl_phieumuon);
                                while ($row = $result_sl_pm->fetch_assoc()) {
                                    ?>
                                     <tr>
                                        <th scope="row"><?php echo $row['id']; ?></th>
                                        <td><?php echo $row['tendg']; ?></td>
                                        <td><?php echo $row['tensach']; ?></td>
                                        <td><?php echo $row['soluongmuon']; ?></td>
                                        <td><?php echo $row['ngaymuon']; ?></td>
                                        <td><?php echo $row['ngaytra']; ?></td>
                                        <td><?php include ('tinhtrangpm.php'); ?></td>
                                        <td><?php echo $row['tencb']; ?></td>
                                        <td>
                                            <?php 
                                            if($row['noidung'] == 1) {
                                                echo "Đã nộp";
                                            } elseif($row['noidung'] == 2) {
                                                echo "Chưa nộp";
                                            } else{}
                                            ?>
                                        </td>
                                    </tr>

                                    <?php
                                } 
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>

            <p style="color:red; margin-top: 50px; text-align: center;"><img src="img\open-book.png" style="margin-top: -5px;"> Lựa chọn thông tin bạn muốn thống kê!</p>
        </div>
    </form>
</div>

<!--################################################################################################################################################-->

<div id="tracuu" class="tabcontent">
    <!-- tra cuu -->
    <div class="timkiem">
        <form method="post">
            <p style="color: blue; margin-top: 50px;">
                <img src="img\searching.png"> 
                <b>Tìm kiếm sách </b> 
                <input type="text" name="timkiem" style="margin-left: 15px;" placeholder=" Nhập...">
                <input type="submit" name="timkiem_sach" value="Tìm kiếm" style="background-color: white; color: blue; font-weight: bold; margin-left: 20px">
            </p>
            <p style= "margin-top: 35px; margin-left: 40px; color: blue;">
                Lọc theo thể loại 
                <select class="form-select1" name="form-select_tl" id="form-select_tl" aria-label="Default select example" style="color: black; margin-left: 3px;">
                    <option value="" disabled selected> Tìm theo thể loại </option>
                    <option value="1"> Giáo trình học </option>
                    <option value="2"> Sách tham khảo </option>
                    <option value="3"> Văn hóa lịch sử </option>
                    <option value="4"> Chính trị, Pháp luật </option>
                    <option value="5"> Tạp chí </option>
                </select>
                
            </p>
        </form>
    </div>
    <div class="table_tc">
        <div class="table-wrapper-scroll-y my-custom-scrollbar_tc">

            <table class="table table-bordered table-striped mb-0">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên sách</th>
                        <th scope="col">Thể loại</th>
                        <th scope="col">Tác giả</th>
                        <th scope="col">Nhà xuất bản</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 

                    if (isset($_POST['timkiem_sach'])) {
                        $txt_timkiem = $_POST['timkiem'];
                        $tl = $_POST['form-select_tl'] ?? null;
                        if ($txt_timkiem!='' and $tl!=null) {
                            $sql1 = "SELECT * FROM sach JOIN theloai ON sach.id_theloai = theloai.id WHERE gia LIKE '%$txt_timkiem%' and id_theloai = '$tl' or tensach LIKE '%$txt_timkiem%' and id_theloai = '$tl' or tacgia LIKE '%$txt_timkiem%' and id_theloai = '$tl' or nxb LIKE '%$txt_timkiem%' and id_theloai = '$tl' or gia LIKE '%$txt_timkiem%' and id_theloai = '$tl' ORDER BY id_sach";
                            $query_tk = mysqli_query($conn, $sql1);
                            if (mysqli_num_rows($query_tk) > 0 ) {
                                while ($row = $query_tk->fetch_assoc()) {
                                    require 'timkiemsach_thuthu.php';
                                }
                            } else {

                                $sql = "SELECT * FROM sach JOIN theloai ON sach.id_theloai = theloai.id ORDER BY id_sach";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    require 'timkiemsach_thuthu.php';
                                }
                                echo "<script type='text/javascript'>alert('Không tìm thấy kết quả!');</script>";
                            }

                        } elseif ($tl!=null) {
                            $sql1 = "SELECT * FROM sach JOIN theloai ON sach.id_theloai = theloai.id WHERE id_theloai = '$tl' ORDER BY id_sach";
                            $query_tk = mysqli_query($conn, $sql1);
                            if (mysqli_num_rows($query_tk) > 0 ) {
                                while ($row = $query_tk->fetch_assoc()) {
                                    require 'timkiemsach_thuthu.php';
                                }
                            } else {

                                $sql = "SELECT * FROM sach JOIN theloai ON sach.id_theloai = theloai.id ORDER BY id_sach";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    require 'timkiemsach_thuthu.php';
                                }
                                echo "<script type='text/javascript'>alert('Không tìm thấy kết quả!');</script>";
                            }
                        } elseif($txt_timkiem!='') {
                            $sql1 = "SELECT * FROM sach JOIN theloai ON sach.id_theloai = theloai.id WHERE gia LIKE '%$txt_timkiem%' or tensach LIKE '%$txt_timkiem%' or tacgia LIKE '%$txt_timkiem%' or nxb LIKE '%$txt_timkiem%' ORDER BY id_sach";
                            $query_tk = mysqli_query($conn, $sql1);
                            if (mysqli_num_rows($query_tk) > 0 ) {
                                while ($row = $query_tk->fetch_assoc()) {
                                    require 'timkiemsach_thuthu.php';
                                }
                            } else {

                                $sql = "SELECT * FROM sach JOIN theloai ON sach.id_theloai = theloai.id ORDER BY id_sach";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    require 'timkiemsach_thuthu.php';
                                }
                                echo "<script type='text/javascript'>alert('Không tìm thấy kết quả!');</script>";
                            }
                        } else {
                            $sql = "SELECT * FROM sach JOIN theloai ON sach.id_theloai = theloai.id ORDER BY id_sach";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                require 'timkiemsach_thuthu.php';
                            }
                            echo "<script type='text/javascript'>alert('Bạn chưa nhập thông tin tìm kiếm!');</script>";
                        }
                    } else {
                        $sql_sl_sach = "SELECT * FROM sach JOIN theloai ON sach.id_theloai = theloai.id ORDER BY id_sach";
                        $result_r = mysqli_query($conn,$sql_sl_sach);
                        while ($row=$result_r->fetch_assoc()) {
                            require 'timkiemsach_thuthu.php';
                        }
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>        
</div>
<!-- <img src="img\thuvien.png" width="380px" height="299px" style="margin-top:-332px;"> -->
</article>

<!--################################################################################################################################################-->

<footer style="margin-top: -30px; background-color: #95a4cf; width: 100%; height: 220px;" >

    <img src="img\footer.jpg" style="width: 100%; height: 220px; margin-top: 5px;">
    <div class="footer-" style="margin-top: -210px; margin-left: 200px;">
        <!-- <a href="TrangChuThuThu.php?id_dn=<?php echo $tendn; ?>"><img src="img\logosp.png" width="50px" height="50px"></a> -->
        <a href="TrangChuThuThu.php?id_dn=<?php echo $tendn; ?>">
                        <!-- <img src="img\logosp.png" width="50px" height="50px"> -->
                         Nhóm 15
                    </a>
        <div style="margin-left:100px; margin-top: -21px;">
            <h6 style="color: white;"> Bản đồ chỉ dẫn</h6>
            <p style="color: white; font-size: 14px; margin-top: -8px;">Trường Đại Học Thủy lợi</p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.637489337418!2d105.82223027599817!3d21.00716368851848!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac8109765ba5%3A0xd84740ece05680ee!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBUaOG7p3kgbOG7o2k!5e0!3m2!1svi!2s!4v1741601959155!5m2!1svi!2s"  width="250px" height="150px" style="border:0; margin-top: -10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                <div style="color: white; margin-left: 300px; margin-top: -203px"> 
                            <h6>Trụ sở chính</h6>
                            <p style="font-size: 14px;">
                                175 Tây Sơn, Đống Đa, Hà Nội <br> 
                                Điện thoại: (024) 38522201 - Fax: (024) 35633351 <br>
                                Email: phonghcth@tlu.edu.vn
                            </p>
                            <h6>Các cơ sở khác</h6>
                            <!-- <p style="font-size:14px;">
                                Cơ sở 2: Phường Tây Tựu, Bắc Từ Liêm, Hà Nội <br> 
                                Cơ sở 3: Lê Hồng Phong, TP. Phủ Lý, Hà Nam
                            </p> -->
                            <div style="margin-left: 400px; margin-top: -134px">
                                <h6>Liên kết site</h6>
                                <p style="font-size: 14px;">
                                    <a href="https://www.tlu.edu.vn/">Trường Đại Học Thủy lợi</a><br>
                                    <a href="https://www.tlu.edu.vn/">Cổng thông tin tuyển sinh</a> <br>
                                    <a href="https://www.tlu.edu.vn/">Hành chính điện tử</a> <br>
                                    <a href="https://www.tlu.edu.vn/">Đào tạo trực tuyến</a> <br>
                                    <a href="https://www.tlu.edu.vn/">Cổng thông tin đào tạo</a> <br><br>
                                    <a href="https://www.tlu.edu.vn/"><img src="https://www.haui.edu.vn/dnn/web/haui/assets/images/svg/facebook.svg" width="32px" height="32px"></a>
                                    <a href="https://www.tlu.edu.vn/" style="margin-left:10px;"><img src="https://www.haui.edu.vn/dnn/web/haui/assets/images/svg/youtube.svg" width="32px" height="32px"></a>
                                </p>
                            </div>
                        </div>

        </div>

    </div>
</footer>

<!--#############################################################################################################################################-->

<section style="width: 100%; height:28px; background-color: #083970; color: white; font-size:16px; margin-top: 5px; text-align: center;">
   Copyright © 2025 <a href="#" style="color: white;">Đại Học Thủy lợi</a>
</section>

<!--###############################################################################################################################################-->

<script>
//tab quan ly doc gia
    function openQLDG(evt, funcName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(funcName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpenQLDG").click();

    //tab-sub quan ly doc gia
    function openQLDG1(evt, funcName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent1");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks1");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active1", "");
        }
        document.getElementById(funcName).style.display = "block";
        evt.currentTarget.className += " active1";
    }
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpenQLDG1").click();

    // tab-sub quan ly sach
    function openQLDG_qls(evt, funcName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent_qls");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks_qls");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active_qls", "");
        }
        document.getElementById(funcName).style.display = "block";
        evt.currentTarget.className += " active_qls";
    }
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpenQLDG_qls").click();

    // tab-sub danh sach phieu muon
    function openQLDG_qlmt(evt, funcName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent_qlmt");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks_qlmt");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active_qlmt", "");
        }
        document.getElementById(funcName).style.display = "block";
        evt.currentTarget.className += " active_qlmt";
    }
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpenQLDG_qlmt").click();

    // tab-sub danh sach thong ke        
    function openQLDG_qltk(evt, funcName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent_qltk");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks_qltk");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active_qltk", "");
        }
        document.getElementById(funcName).style.display = "block";
        evt.currentTarget.className += " active_qltk";
    }
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpenQLDG_qltk").click();
</script>

<!--###############################################################################################################################################-->

</body>
</html>

<?php
    } //while
} //if
date_default_timezone_set('Asia/Ho_Chi_Minh');
$sql = "SELECT id, ngaytra FROM phieumuon WHERE tinhtrang = 1";
$run = mysqli_query($conn, $sql);
while($row = $run->fetch_assoc()) {
    $d1 = new DateTime($row['ngaytra']);
    $d2 = date('Y-m-d');
    if ($d1->format('Y-m-d') < $d2) {
        $id = $row['id'];
        $sql1_update = "UPDATE `phieumuon` SET `tinhtrang`='4' WHERE id = '$id' ";
        $conn->query($sql1_update);
    }
}
?>