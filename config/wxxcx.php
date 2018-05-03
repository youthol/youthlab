<?php

return [
	/**
	 * 小程序APPID
	 */
    'appid' => 'wx02e80bfe731c15ce',
    /**
     * 小程序Secret
     */
    'secret' => '895a3f909457f69b81872b0f0abbf317',
    /**
     * 小程序登录凭证 code 获取 session_key 和 openid 地址，不需要改动
     */
    'code2session_url' => "https://api.weixin.qq.com/sns/jscode2session?appid=%s&secret=%s&js_code=%s&grant_type=authorization_code",
];
