<?php 
require_once 'system/application/libraries/facebook.php';

$this->facebook = new Facebook(array('appId'=>FBAPPID, 'secret'=>FBAPPSECRET, 'cookie'=>true, ));

session_start();

$session = $this->facebook->getSession();
$fbOAuthUrl = "https://graph.facebook.com/oauth/authorize?client_id=".FBAPPID."&redirect_uri=".base_url()."/fburlmanager.php&scope=email,user_birthday,user_hometown";

$me = null;
// Session based API call.
if ($session)
{
    try
    {
        $uid = $facebook->getUser();
        $me = $facebook->api('/me');
    }
    catch(FacebookApiException $e)
    {
        error_log($e);
    }
}
else
{
    redirect($fbOAuthUrl);
}

// login or logout url will be needed depending on current user state.
if ($me)
{
    $logoutUrl = $facebook->getLogoutUrl();
}
else
{
    $loginUrl = $facebook->getLoginUrl();
}

?>
