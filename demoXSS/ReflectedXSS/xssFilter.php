<?php
if(isset($_GET['name'])) {
                                        $_GET[ 'name' ] = str_replace( '<script>', '', $_GET[ 'name' ] );	
	$t = '<pre>Welcome my bro ' . $_GET[ 'name' ] . '!!!!'.'</pre>';
                                        echo $t;
}
else {
   echo 'Welcome my guest';
}

?>