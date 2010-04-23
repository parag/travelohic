<?php 
require 'system/application/libraries/facebook.php';

// Create our Application instance.
$facebook = new Facebook(array('appId'=>'111283058909139', 'secret'=>'b8d26c7a262e8e8cf1f2235344e93c6f', 'cookie'=>true, ));

// We may or may not have this data based on a $_GET or $_COOKIE based session.
//
// If we get a session here, it means we found a correctly signed session using
// the Application Secret only Facebook and the Application know. We dont know
// if it is still valid until we make an API call using the session. A session
// can become invalid if it has already expired (should not be getting the
// session back in this case) or if the user logged out of Facebook.
$session = $facebook->getSession();

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

if ($me)
{
    header("Location: http://travelohic.com/index.php/accounts/fb_register/".$me["name"]."/".$me["email"]."/".$me["id"]."/".$me["birthday"]);
}
else
{
    die("Unknown Error occured. Error has been logged and we are working to make your experience better");
}

?>
