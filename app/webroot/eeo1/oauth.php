<?php

require_once 'wechat.php';
require_once 'result.php';

$code = $_GET['code'];
$state = $_GET['state'];

if (empty($code)) {
    $rs = new result(WX_ACCESS_FAILED);
    echo $rs->json();
    exit();
}

session_start();
if ($_SESSION['wx_state'] != $state) {
    $rs = new result(WX_ACCESS_FAILED);
    echo $rs->json();
    exit();
}

$token_url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.WX_APP_ID.'&secret='.WX_APP_SECRET.'&code='.$code.'&grant_type=authorization_code';
$token = json_decode(file_get_contents($token_url));
if (isset($token->errcode)) {
    $rs = new result(WX_TOKEN_FAILED, '[' . $token->errcode . ']: ' . $token->errmsg);
    echo $rs->json();
    exit();
}

/*
$user_info_url = 'https://api.weixin.qq.com/sns/userinfo?access_token=' . $token->access_token . '&openid=' . $token->openid . '&lang=zh_CN';
$user_info = json_decode(file_get_contents($user_info_url));
if (isset($user_info->errcode)) {
    $rs = new result(WX_USERINFO_FAILED, '[' . $token->errcode . ']: ' . $token->errmsg);
    echo $rs->json();
    exit();
}
*/

$openid = $token->openid;


if ($openid != null) {
    session_start();
    $_SESSION['open_id'] = $openid;
    echo "<script>location.href='index.php?un=1';</script>";
} else {
    $rs = new result(CREATE_USER_FAILED);
    echo $rs->json();
    exit();
}

?>