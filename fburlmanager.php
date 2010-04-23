<?php 
require_once 'system/application/libraries/facebook.php';
define('FBAPPID', '111283058909139');
define('FBAPPSECRET', 'b8d26c7a262e8e8cf1f2235344e93c6f');

$facebook = new Facebook(array('appId'=>FBAPPID, 'secret'=>FBAPPSECRET, 'cookie'=>true, ));

session_start();

$session = $facebook->getSession();
$fbOAuthUrl = "https://graph.facebook.com/oauth/authorize?client_id=".FBAPPID."&redirect_uri=http://travelohic.com/fburlmanager.php&scope=email,user_birthday,user_hometown";

$me = null;
// Session based API call.
if ($_GET['code'])
{
    $code = $_GET['code'];
	echo $code;
}
?>
