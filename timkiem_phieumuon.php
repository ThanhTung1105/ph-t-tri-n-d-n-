<tr>
    <th><?php echo $row['id']; ?></th>
    <td><?php echo $row['tendg']; ?></td>
    <td><?php echo $row['tensach']; ?></td>
    <td><?php echo $row['tentheloai']; ?></td>
    <td><?php echo $row['soluongmuon']; ?></td>
    <td><?php echo $row['ngaymuon']; ?></td>
    <td><?php echo $row['ngaytra']; ?></td>
    <td>
        <?php
        if ($row['tinhtrang']==5) {
            ?> <a onclick="return confirm('Bạn chắc chắn muốn duyệt độc giả này chứ?')" href='duyet_pm.php?id_ttt=<?php echo $row['id']; ?>&id_dn=<?php echo $tendn; ?>' style='color: blue;'>Duyệt</a> <?php
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
    <td>
        <?php
        $tt1 = $row['tinhtrang'];
        $ngaytra = $row['ngaytra'];
        $datenow = date('Y-m-d');
        $first_date = strtotime($ngaytra);
        $second_date = strtotime($datenow);
        $datediff = abs($first_date - $second_date);
        $songay = floor($datediff / (60*60*24));
        $sotienphat = $songay * 3000;
        $tp = $row['noidung'];
        $tph = $row['tienphat'];
        $gia = $row['gia'];
        $sotienphatms = $gia*2+50000;
        $sotienphathh = $gia + $gia*0.2 + 20000;
        if($tp == 1) {
            if ($tt1==4) {
                echo $sotienphat."đ</br>Đã đóng";
            } elseif ($tt1==2) {
                echo $sotienphatms."đ</br>Đã đóng";
            } elseif ($tt1==3) {
                echo $sotienphathh."đ</br>Đã đóng";
            }
        } else if ($tp == 2) {
            if ($tt1==4) {
                echo "<p style='background-color: yellow;'>".$sotienphat."đ</br>Chưa đóng</p>";
            }elseif ($tt1==2) {
                echo "<p style='background-color: yellow;'>".$sotienphatms."đ</br>Chưa đóng</p>";
            }elseif ($tt1==3) {
                echo "<p style='background-color: yellow;'>".$sotienphathh."đ</br>Chưa đóng</p>";
            }
        } else {}
        
        ?>    
    </td>
    <td style="text-align: center;">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#t<?php echo $row['id']; ?>" style="width: 0px; height: 0px; padding: 0px; border: 0px; "><img src="img\caneta.png" width='20' height='20' style="margin-left: -10px; margin-top: -30px;"></button>

        <?php include 'model_suachitietphieumuon.php'; ?>
    </td>
    
</tr>