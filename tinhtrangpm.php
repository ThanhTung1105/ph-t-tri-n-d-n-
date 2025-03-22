<?php
if ($row['tinhtrang']==5) {
    echo $row['tinhtrang']; ?> <a onclick="return confirm('Bạn chắc chắn muốn duyệt độc giả này chứ?')" href='duyet_pm.php?id_ttt=<?php echo $row['id']; ?>&id_dn=<?php echo $tendn; ?>&ngaytra=<?php echo $row['ngaytra']; ?>&ngaymuon=<?php echo $row['ngaymuon']; ?>' style='color: blue;'>Duyệt</a> <?php
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