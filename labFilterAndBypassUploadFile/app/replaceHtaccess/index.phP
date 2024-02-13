<?php
include '../../config.php';

function deldot($s){
	for($i = strlen($s)-1;$i>0;$i--){
		$c = substr($s,$i,1);
		if($i == strlen($s)-1 and $c != '.'){
			return $s;
		}

		if($c != '.'){
			return substr($s,0,$i+1);
		}
	}
}
$is_upload = false;
$msg = null;
if (isset($_POST['submit'])) {
    if (file_exists(UPLOAD_PATH)) {
        $deny_ext = array(".php",".php5",".php4",".php3",".php2",".php1",".html",".htm",".phtml",".pht",".pHp",".pHp5",".pHp4",".pHp3",".pHp2",".pHp1",".Html",".Htm",".pHtml",".jsp",".jspa",".jspx",".jsw",".jsv",".jspf",".jtml",".jSp",".jSpx",".jSpa",".jSw",".jSv",".jSpf",".jHtml",".asp",".aspx",".asa",".asax",".ascx",".ashx",".asmx",".cer",".aSp",".aSpx",".aSa",".aSax",".aScx",".aShx",".aSmx",".cEr",".sWf",".swf",".ini");
        $file_name = trim($_FILES['upload_file']['name']);
        $file_name = deldot($file_name);// Xóa dấu chấm ở cuối tên tệp
        $file_ext = strrchr($file_name, '.');
        $file_ext = strtolower($file_ext); // Chuyển đổi thành chữ thường
        $file_ext = str_ireplace('::$DATA', '', $file_ext);// Loại bỏ chuỗi::$DATA
        $file_ext = trim($file_ext); // Loại bỏ khoảng trắng ở đầu và cuối chuỗi

        if (!in_array($file_ext, $deny_ext)) {
            $temp_file = $_FILES['upload_file']['tmp_name'];
            $img_path = UPLOAD_PATH.'/'.$file_name;
            if (move_uploaded_file($temp_file, $img_path)) {
                $is_upload = true;
            } else {
                $msg = 'Tải lên gặp lỗi！';
            }
        } else {
            $msg = 'Không được phép tải lên tệp này!';
        }
    } else {
        $msg = UPLOAD_PATH . ' thư mục không tồn tại, vui lòng tạo thủ công！';
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
                <p>Vui lòng chọn hình ảnh để tải lên：<p>
                <input class="input_file" type="file" name="upload_file"/>
                <input class="button" type="submit" name="submit" value="Tải lên"/>
            </form>
            <div id="msg">
              
            </div>
            <div id="img">
                <?php
                    if($is_upload){
                        echo '<img src="'.$img_path.'" width="250px" />';
                    }
                ?>
            </div>
        </li>
       
    </ol>
</div>

