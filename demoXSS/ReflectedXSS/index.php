<?php
if(isset($_GET['name'])) {	
	$t = '<pre>Welcome my bro ' . $_GET[ 'name' ] . '!!!!'.'</pre>';
                                        echo $t;
}
else {
   echo 'Welcome my guest';
}

?>
