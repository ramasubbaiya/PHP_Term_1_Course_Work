<?php

session_start();
if($_SESSION['user']){
    header('location:../../../Project');
    
}
require '../src/facebook.php';

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '541457832663644',
  'secret' => 'd8d97cf6a5517ceb1e830d38813699db',
));

// Get User ID
$user = $facebook->getUser();

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
    $_SESSION['user']=$user_profile['name'];
    //header('location:../../../Project');
    //$user_name = $facebook->api('/me/friends'); 
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

// Login or logout url will be needed depending on current user state.
//if(isset($_SESSION['user'])){
   //header('location:http://www.facebook.com/dialog/oauth?client_id=541457832663644&amp;redirect_uri=http%3A%2F%2F174.79.32.158%3A10088%2Fstudents%2Fphp02%2Fproject%2Ffacebook%2Fexamples%2Fexample.php&amp;state=ea0269bcb485af971fe832394299ac1f&amp;sdk=php-sdk-3.2.3');
  //  header('location:../../../Project');
 //else{  
 //$param='https://www.facebook.com/dialog/oauth?client_id=541457832663644&amp;redirect_uri=http%3A%2F%2F174.79.32.158%3A10088%2Fstudents%2Fphp02%2Fproject%2Ffacebook%2Fexamples%2Fexample.php&amp;state=0f4e7db0a20cd0af3a51d73c3548dced&amp;sdk=php-sdk-3.2.3';
   
   //$loginUrl = $facebook->getLoginUrl($param);
//}
//}
 if ($user) {
    
    $_SESSION['user']=$user_profile['name'];
    header('location:../../../Project');
    $logoutUrl = $facebook->getLogoutUrl();

}

else{
   // header('location:../../../Project');
$loginUrl = $facebook->getLoginUrl();
//$loginUrl=header('location:https://www.facebook.com/dialog/oauth?client_id=541457832663644&amp;redirect_uri=http%3A%2F%2F174.79.32.158%3A10088%2Fstudents%2Fphp02%2Fproject%2Ffacebook%2Fexamples%2Fexample.php&amp;state=0f4e7db0a20cd0af3a51d73c3548dced&amp;sdk=php-sdk-3.2.3');
}

// This call will always work since we are fetching public data.
$rama = $facebook->api('/ramasubbaiya');

?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>Facebook Login</title>
    <style>
      body {
        font-family: 'Lucida Grande', Verdana, Arial, sans-serif;
      }
      h1 a {
        text-decoration: none;
        color: #3b5998;
      }
      h1 a:hover {
        text-decoration: underline;
      }
    </style>
  </head>     
  <body>
    <h1>Facebook Login</h1>

    <?php if ($user): ?>
      <a href="<?php echo $logoutUrl; ?>">Logout</a>
    <?php else: ?>
      <div>
      
        <a href="<?php echo $loginUrl; ?>">Login with Facebook</a>
      </div>
    <?php endif ?>

    <h3>PHP Session</h3>
    <pre><?php print_r($_SESSION); ?></pre>

    <?php if ($user): ?>
      <h3>You</h3>
      <img src="https://graph.facebook.com/<?php echo $user; ?>/picture">
       <?php print_r($user_profile['name']);
       
       $_SESSION['user']=$user_profile['name'];
                //echo'hi'.$_SESSION['user'];
       ?>
      <h3>Your User Object (/me)</h3>
      <pre><?php print_r($user_profile); ?></pre>
    <?php else: ?>
      <strong><em>You are not Connected.</em></strong>
    <?php endif ?>

    <h3>&copy; App Created by Ramasubbaiya</h3>
   
  <?php //session_destroy();
    function login(){
        return $loginUrl;
        
    }
       ?>
  </body> 
</html>
