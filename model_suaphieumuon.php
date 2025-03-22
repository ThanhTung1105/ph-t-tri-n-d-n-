<?php
include_once('sua_phieumuon.php');?>
<form method="post">
  	<div class="modal fade" id="e<?php echo $row['id'];?>">
  		<div class="modal-dialog">
    		<div class="modal-content">

      			<div class="modal-header" style="padding-bottom: 15px;">
			        <h5 class="modal-title" id="exampleModalLabel" style="margin-top: -10px; color:blue;"><b>Sửa phiếu mượn</b></h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -25px; ">
			          	<span aria-hidden="true">&times;</span>
			        </button>
      			</div>

      			<div class="modal-body" style="font-size: 18px; text-align: left; margin-left: 27px;">
			       	<table class="table_sua_ctpm">
      					<tr>
      						<td class="td_sua_ctpm">Mã phiếu mượn:</td>
      						<td class="td_sua_ctpm"><input type="text" style="background-color: lightgray;" name="id_pm" value="<?php echo $row['id']; ?>" required readonly/></td>
      					</tr>
      					<tr>
      						<td class="td_sua_ctpm">Mã độc giả:</td>
      						<td class="td_sua_ctpm"><input type="text" name="modal_madg" value="<?php echo $row['madg']; ?>" required></td>
      					</tr>
      					<tr>
      						<td class="td_sua_ctpm">Tên sách:</td>
      						<td class="td_sua_ctpm">
      							<select name="modal_masach" style='width: 200px; height: 30px;'>
      								<?php
      								$sql_r1 = "SELECT * FROM sach";
      								$ru = mysqli_query($conn, $sql_r1);
      								while ($row1=$ru ->fetch_assoc()) {
      									?>
      									<option value="<?php echo $row1['id_sach']; ?>" <?php if($row1['id_sach']==$tens) {
      										echo "selected";
      									} ?>><?php echo $row1['tensach']; ?></option>
      									<?php
      								}
      								?>
      							</select>
      						</td>
      					</tr>
      					<tr>
      						<td class="td_sua_ctpm">Số lượng mượn:</td>
      						<td class="td_sua_ctpm"><input type="number" name="modal_solg" value="<?php echo $row['soluongmuon']; ?>" required></td>
      					</tr>
      					<tr>
      						<td class="td_sua_ctpm">Ngày trả:</td>
      						<td class="td_sua_ctpm"><input type="date" name="modal_tg" style='width: 200px; height: 30px;' value="<?php echo $row['ngaytra']; ?>" required></td>
      					</tr>
      					<tr>
      						<td class="td_sua_ctpm">Tình trạng:</td>
      						<td class="td_sua_ctpm">
      							<?php
					          	if (trim($row['tinhtrang']) == 0) {
					          		echo "
						          		<select id='mySelect' name='tinhtrang' style='width: 200px; height: 30px;'>
									        <option value='0' style='color: black;' selected> Đã trả </option>
									        <option value='1' style='color: black;'> Chưa trả </option>
									        <option value='2' style='color: black;'> Mất sách </option>
									        <option value='3' style='color: black;'> Hư hỏng </option>
									        <option value='4' style='color: black;'> Quá hạn </option>
									    </select>
								    ";
					          	} elseif (trim($row['tinhtrang']) == 1) {
					          		echo "
						          		<select id='mySelect' name='tinhtrang' style='width: 200px; height: 30px;'>
									        <option value='0' style='color: black;'> Đã trả </option>
									        <option value='1' style='color: black;' selected> Chưa trả </option>
									        <option value='2' style='color: black;'> Mất sách </option>
									        <option value='3' style='color: black;'> Hư hỏng </option>
									        <option value='4' style='color: black;'> Quá hạn </option>
									    </select>
								    ";
							    
					          	} elseif (trim($row['tinhtrang']) == 2) {
					          		echo "
						          		<select id='mySelect' name='tinhtrang' style='width: 200px; height: 30px;'>
									        <option value='0' style='color: black;'> Đã trả </option>
									        <option value='1' style='color: black;'> Chưa trả </option>
									        <option value='2' style='color: black;' selected> Mất sách </option>
									        <option value='3' style='color: black;'> Hư hỏng </option>
									        <option value='4' style='color: black;'> Quá hạn </option>
									    </select>
								    ";
					          	} elseif (trim($row['tinhtrang']) == 3) {
					          		echo "
						          		<select id='mySelect' name='tinhtrang' style='width: 200px; height: 30px;'>
									        <option value='0' style='color: black;'> Đã trả </option>
									        <option value='1' style='color: black;'> Chưa trả </option>
									        <option value='2' style='color: black;'> Mất sách </option>
									        <option value='3' style='color: black;' selected> Hư hỏng </option>
									        <option value='4' style='color: black;'> Quá hạn </option>
									    </select>
								    ";
					          	} else {
					          		echo "
						          		<select id='mySelect' name='tinhtrang' style='width: 200px; height: 30px;'>
									        <option value='0' style='color: black;'> Đã trả </option>
									        <option value='1' style='color: black;'> Chưa trả </option>
									        <option value='2' style='color: black;'> Mất sách </option>
									        <option value='3' style='color: black;'> Hư hỏng </option>
									        <option value='4' style='color: black;' selected> Quá hạn </option>
									    </select>
								    ";
					          	}
					          	?>
      						</td>
      					</tr>
      					<tr>
      						<td class="td_sua_ctpm">Cán bộ:</td>
      						<td class="td_sua_ctpm">
      							<select name="modal_cb" style='width: 200px; height: 30px;'>
      								<?php
      								$sql_r1 = "SELECT * FROM thuthu";
      								$ru = mysqli_query($conn, $sql_r1);
      								while ($row1=$ru ->fetch_assoc()) {
      									?>
      									<option value="<?php echo $row1['id']; ?>" <?php if($row1['id']==$canbo) {
      										echo "selected";
      									} ?>><?php echo $row1['tencb']; ?></option>
      									<?php
      								}
      								?>
      							</select>
      						</td>
      					</tr>
      					<tr>
      						<td class="td_sua_ctpm">Nội dung:</td>
      						<td class="td_sua_ctpm">
      							<?php
      							if (trim($row['noidung']) == 1) {
					          		echo "
						          		<select id='mySelect' name='modal_nd' style='width: 200px; height: 30px;'>
									        <option value='0' style='color: black;'></option>
									        <option value='1' style='color: black;' selected> Đã đóng </option>
									        <option value='2' style='color: black;'> Chưa đóng </option>
									    </select>
								    ";
					          	} elseif (trim($row['noidung']) == 2) {
					          		echo "
						          		<select id='mySelect' name='modal_nd' style='width: 200px; height: 30px;'>
									        <option value='0' style='color: black;'></option>
									        <option value='1' style='color: black;'> Đã đóng </option>
									        <option value='2' style='color: black;' selected> Chưa đóng </option>
									    </select>
								    ";
							    
					          	} else {
					          		echo "
						          		<select id='mySelect' name='modal_nd' style='width: 200px; height: 30px;'>
									        <option value='0' style='color: black;' selected></option>
									        <option value='1' style='color: black;'> Đã đóng </option>
									        <option value='2' style='color: black;'> Chưa đóng </option>
									    </select>
								    ";
					          	}
      							?>
      							
      						</td>
      					</tr>
      				</table>
      			</div>

      			<div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

			       	<form method="get">
			          	<input type="submit" name="save_suapm" value="save" style="background-color: #2196f3; color: white; height: 45px; width: 70px; border-radius: 5px; border: 0px; font-size:20px;">
			       	</form>
      			</div>

    		</div>
  		</div>
	</div>
</form>
