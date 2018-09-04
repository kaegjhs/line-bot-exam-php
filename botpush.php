<?php



require "vendor/autoload.php";

$access_token = 'c7FPNNIpO7lYkSVeqjRvQDAsvczv5G70+BDFDCXXVLTazFLNIcD0WwCzoOgW5yJ63MLueTPcfSt9JpgZtekQP87g/zaKxic9TaNp9yK3ab1kPPuQP9ZWI9NlsX9YkXZWn/yfda5jAUDiAr+1Qu6m9gdB04t89/1O/w1cDnyilFU=';

$channelSecret = '82fdafeaf4d24ddf26c1e52026be9586';

$pushID = 'U92e74f8ce3595165ba396dbef155629a';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('สวัสดีจ้า');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







