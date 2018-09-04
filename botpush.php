<?php



require "vendor/autoload.php";

$access_token = '+sDtl9F1rGQZKiRMomzyXbJHY9ktfzCC5OOvs4RMNqswHTjJd4RdABYr3yoQ21f53MLueTPcfSt9JpgZtekQP87g/zaKxic9TaNp9yK3ab0TdoCoI+fJIvCJnM7xBwnsHswCt0jGQSkjeo1QJbZ5wAdB04t89/1O/w1cDnyilFU=';

$channelSecret = '82fdafeaf4d24ddf26c1e52026be9586';

$pushID = 'U92e74f8ce3595165ba396dbef155629a';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('สวัสดีจ้า');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();



   
