<?php
include_once('sua_sach.php');?>
<form method="post">
  <div class="modal fade" id="b<?php echo $row['id_sach'];?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="padding-bottom: 15px;">
        <h5 class="modal-title" id="exampleModalLabel" style="margin-top: -10px; color:blue;"><b>Sửa sách</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -25px; ">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="font-size: 24px; text-align: left; margin-left: 27px; padding-right: 50px;">
        <input type="hidden" name="id_sach" value="<?php echo $row['id_sach'];?>"/>
        
        <table style="border: 0px;" class="table_2">
          <tr>
            <td> Mã sách: </td>
            <td> <input type="text" name="modal_masach"  value="<?php echo $row['id_sach'];?>" disabled></td>
          </tr>

          <tr>
            <td> Tên sách: </td>
            <td> <input type="text" name="modal_tensach"  value="<?php echo $row['tensach']; ?>" required></td>
          </tr>

          <tr>
            <td> Thể loại: </td>
            <td>
              <select name="modal_theloai">
                <?php
                $sql1 = "SELECT * FROM theloai";
                $run1 = mysqli_query($conn, $sql1);
                while ($row1 = $run1->fetch_assoc()) {
                ?> 
                <option value="<?php echo $row1['id']; ?>" <?php if($row1['id']==$id_tl) {echo "selected";} ?> ><?php echo $row1['tentheloai'] ?></option>
                <?php 
                }
                ?>
              </select>
            </td>
          </tr>

          <tr>
            <td> Số lượng: </td>
            <td> <input type="number" name="modal_solg"  value="<?php echo $row['soluongcon']; ?>" required></td>
          </tr>

           <tr>
            <td> Tác giả: </td>
            <td> <input type="text" name="modal_tg"  value="<?php echo $row['tacgia']; ?>" required></td>
          </tr>

           <tr>
            <td> Nhà xuất bản: </td>
            <td> <input type="text" name="modal_nxb"  value="<?php echo $row['nxb']; ?>" required></td>
          </tr>

           <tr>
            <td> Giá sách:</td>
            <td> <input type="text" name="model_mas"  value="<?php echo $row['gia']; ?>"  required> </td>
          </tr>

           <tr>
            <td> Tình trạng: </td>
            <td>
              <select name="modal_nd">
                <?php
                $sql2 = "SELECT tomtatnoidung FROM sach group by tomtatnoidung";
                $run2 = mysqli_query($conn, $sql2);
                while ($row2 = $run2->fetch_assoc()) {
                ?> 
                <option value="<?php echo $row2['tomtatnoidung']; ?>" <?php if($row2['tomtatnoidung']==$id_nd) {echo "selected";} ?> >
                  <?php if($row2['tomtatnoidung']=='0')  {
                    echo "Mới";
                  }else 
                  {
                    echo "Cũ, nguyên";} ?>
                    
                  </option>
                <?php 
                }
                ?>
              </select> 
            </td>
          </tr>
        </table>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

       <form method="get">
          <input type="submit" name="save_suasach" value="save" style="background-color: #2196f3; color: white; height: 45px; width: 70px; border-radius: 5px; border: 0px; font-size:20px;">
       </form>
      </div>
    </div>
  </div>
</div>
</form>
