<h5 style="color: blue; margin-top: 20px; margin-left: 30px;"> <b>Verify Email Address</b> </h5>
<form method="post">
    <div style="
        width: 400px;
        padding: 16px;
        border: 1px solid black;
        box-sizing: border-box;
        border-radius: 4px;
        margin-top: 30px;
        margin-left: 360px;
        ">
        <?php
        include_once('conn.php');
        ?>
        <label>Địa chỉ email</label>
        <input type="text" name="otp" placeholder="Enter OTP..." style="width: 366px; border-radius: 4px; background-image:url('img/email.png'); background-size: 24px;background-repeat:no-repeat; background-position: 10px;  padding-left:45px; ">

        <input type="hidden" name="otpcf" value="<?php echo $otp; ?>">
        <input type="hidden" name="email_" value="<?php echo $email; ?>">

        <label style="font-size: 14px; margin-top:10px;">OTP code is a 6 digit number.</label>

        <input type="submit" name="luu_email" value="Lưu thay đổi" style="width: 366px; height: 37px; margin-top: 20px; background-color: #0B74E5; color: white; border: 0px; border-radius: 4px;">

        <?php
           
        ?>
    </div>
    <button type="submit" name="thoat" style="color: blue; border-radius: 4px; border: 1px solid blue; margin-left: 1000px; margin-top: 240px; width: 80px; height: 40px;">Thoát</button>
</form>
<?php 
?>
