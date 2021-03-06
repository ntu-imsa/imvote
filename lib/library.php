<?php

require 'settings.php';

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
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

// Login or logout url will be needed depending on current user state.
if ($user) {
  $loginUrl = 'logout.php';
  $loginText = '登出';
} else {
//  $statusUrl = $facebook->getLoginStatusUrl();
  $loginUrl = $facebook->getLoginUrl();
  $loginText = '登入';
}

// This call will always work since we are fetching public data.
// $naitik = $facebook->api('/naitik');

function qMysql($str){
   $link = mysql_connect(DBHOST, DBUSER, DBPASS);
   if (!$link) {
		die('Could not connect: ' . mysql_error());
   }
   mysql_select_db(DBNAME, $link) or die(mysql_error());
   mysql_query("SET NAMES 'utf8'");
   mysql_query("SET CHARACTER_SET_CLIENT=utf8");
   mysql_query("SET CHARACTER_SET_RESULTS=utf8");
   $result = mysql_query($str, $link) or die(mysql_error());
   mysql_close($link);
   return $result;
}

function filterString($str){
return preg_replace("/[^a-zA-z0-9_\-]/", "", $str);
}

function isAdmin($uid){
  if($uid==737861445||$uid==100002099511931){
    return 1;
  }else{
    return 0;
  }
}

function gender_trans($str){
  switch($str){
    case 'male':
      return '男';
      break;
    case 'female':
      return '女';
      break;
  }
}

function voted($type, $user){
  if($user){
    $query = "SELECT voted_".$type." from register WHERE fbid = '".$user."'";
    $result = qMysql($query);
    $row = mysql_fetch_row($result);
    return $row[0];
  }else{
    return 0;
  }
}

function registered($user){
  if($user){
    $query = "SELECT fbid from register WHERE fbid = '".$user."'";
    $result = qMysql($query);
    $row = mysql_fetch_row($result);
    if($row[0] == $user){
      return true;
    }else{
      return false;
    }
  }else{
    return false;
  }
}

function typeof($cid){
  $query = "SELECT type FROM candidate WHERE cid = ".$cid;
  $row = mysql_fetch_assoc(qMysql($query));
  return $row['type'];
}

function eventEnded(){
  return true;
}

?>
