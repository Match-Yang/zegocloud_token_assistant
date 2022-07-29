<?php
require_once './auto_loader.php';

use ZEGO\ZegoServerAssistant;
use ZEGO\ZegoErrorCodes;

//
// 基础鉴权 token 生成示例
//

// 请将 appID 修改为你的 appId，appid 为 数字
// 举例：1234567890
$appId = 3417014186;

// 请将 serverSecret 修改为你的 serverSecret，serverSecret 为 string
// 举例：'fa94dd0f974cf2e293728a526b028271'
$serverSecret = 'fa4b7e22b9c73dcdb6e7f7f116b9102a';

// 请将 userId 修改为用户的 userId
$userId = $_GET["userID"];
$userName = $_GET["userName"];
$roomID = $_GET["roomID"];
//生成基础鉴权 token时，payload 要设为空字符串
$payload = '';


header('Access-Control-Allow-Origin:*');

// 3600 为 token 过期时间，单位：秒

$token = ZegoServerAssistant::generateToken04($appId, $userId, $serverSecret, 3600, $payload);
if ($token->code == ZegoErrorCodes::success) {
            $data = [
                        'appId'   => $appId,
                        'userId'  => $userId,
                        'userName'    => $userName,
                        'roomID'    => $roomID,
            ];

            // print_r($token);
            $token->token = $token->token . "#" . base64_encode(json_encode($data, JSON_BIGINT_AS_STRING));
}
echo json_encode($token, JSON_BIGINT_AS_STRING);
