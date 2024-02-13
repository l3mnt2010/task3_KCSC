<?php
include '../../config.php';

$is_upload = false;
$msg = null;
if (isset($_POST['submit'])) {
    if (file_exists(UPLOAD_PATH)) {
        if (($_FILES['upload_file']['type'] == 'image/jpeg') || ($_FILES['upload_file']['type'] == 'image/png') || ($_FILES['upload_file']['type'] == 'image/gif')) {
            $temp_file = $_FILES['upload_file']['tmp_name'];
            $img_path = UPLOAD_PATH . '/' . $_FILES['upload_file']['name'];          
            if (move_uploaded_file($temp_file, $img_path)) {
                $is_upload = true;
            } else {
                $msg = 'Tải lên gặp lỗi!';
            }
        } else {
            $msg = 'Loại tệp không đúng, vui lòng tải lên lại!';
        }
    } else {
        $msg = UPLOAD_PATH.' thư mục không tồn tại, vui lòng tạo thủ công!';
    }
}
?>

<div id="upload_panel">
    <ol>
        <li>
            <h3>Nhiệm vụ</h3>
            <p>Tải lên một <code>webshell</code> lên máy chủ.</p>
        </li>
        <li>
            <h3>Khu vực tải lên</h3>
            <form enctype="multipart/form-data" method="post" onsubmit="return checkFile()">
                <p>Vui lòng chọn ảnh để tải lên：<p>
                <input class="input_file" type="file" name="upload_file"/>
                <input class="button" type="submit" name="submit" value="Tải lên"/>
            </form>
            <div id="msg">
                <?php 
                    if($msg != null){
                        echo "Lời khuyên: ".$msg;
                    }
                ?>
            </div>
            <div id="img">
                <?php
                    if($is_upload){
                        echo '<img src="'.$img_path.'" width="250px" />';
                    }  
                ?>
            </div>
        </li>
       
</div>


