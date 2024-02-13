<?php
include '../../config.php';
?>
<?php
$is_upload = false;
$msg = null;
if (isset($_POST['submit'])) {
    if (file_exists(UPLOAD_PATH)) {
        $temp_file = $_FILES['upload_file']['tmp_name'];
        $img_path = UPLOAD_PATH . '/' . $_FILES['upload_file']['name'];
        if (move_uploaded_file($temp_file, $img_path)) {
            $is_upload = true;
        } else {
            $msg = 'Lỗi！';
        }
    } else {
        $msg = UPLOAD_PATH . ' thư mục không tồn tại, vui lòng tạo thủ công!';
    }
}
?>

<div id="upload_panel">
    <ol>
        <li>
            <p>Tải lên hình đại diện của bạn</p>
        </li>
        <li>
            <form enctype="multipart/form-data" method="post" onsubmit="return checkFile()">
                <p>Chọn hình đại diện của bạn：</p>
                <input class="input_file" type="file" name="upload_file" />
                <input class="button" type="submit" name="submit" value="Tải lên" />
            </form>
            <div id="msg">
                <?php
                if ($msg != null) {
                    echo "Lời nhắc：" . $msg;
                }
                ?>
            </div>
            <div id="img">
                <?php
                if ($is_upload) {
                    echo '<img src="' . $img_path . '" width="250px" alt="đây là ảnh" />';
                }
                ?>
            </div>
        </li>
    </ol>
</div>

<script type="text/javascript">
    function checkFile() {
        var file = document.getElementsByName('upload_file')[0].value;
        if (file == null || file == "") {
            alert("Vui lòng chọn tệp tin cần tải lên!");
            return false;
        }
        var allow_ext = ".jpg|.png|.gif";

        var ext_name = file.substring(file.lastIndexOf("."));

        if (allow_ext.indexOf(ext_name) == -1) {
            var errMsg = "Tệp tin này không được phép tải lên, vui lòng tải lên các loại tệp tin " + allow_ext + ", loại tệp tin hiện tại là: " + ext_name;
            alert(errMsg);
            return false;
        }
    }
</script>