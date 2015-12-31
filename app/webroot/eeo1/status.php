<?php

define('SUCCESS', 0);
define('SHOULD_LOGIN', 1);
define('INVALID_METHOD', 2);
define('INVALID_PARAM', 3);
define('WX_ACCESS_FAILED', 21);
define('WX_TOKEN_FAILED', 30);
define('WX_USERINFO_FAILED', 31);
define('ACCESS_FAILED', 22);
define('CREATE_USER_FAILED', 23);
define('USER_IS_DISMISS', 24);
define('ACTIVITY_NOT_START', 25);

$STATUS = array (
    SUCCESS => "操作成功",
    SHOULD_LOGIN => '登录后才能操作',
    INVALID_METHOD => "调用非法的方法",
    INVALID_PARAM => '非法的参数',
    WX_ACCESS_FAILED => '微信授权失败',
    WX_TOKEN_FAILED => '微信获取用户授权失败',
    WX_USERINFO_FAILED => '微信获取用户信息失败',    
    ACCESS_FAILED => '访问没有得到授权',
	CREATE_USER_FAILED => '创建用户失败',
    USER_IS_DISMISS => '查询用户失败或者用户不存在',
    ACTIVITY_NOT_START => '活动未开始'
);
?>