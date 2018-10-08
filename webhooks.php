<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');
require "test-line-api-e73a3-firebase-adminsdk-6d0vd-e17ebc9e84.json";

$access_token = '+sDtl9F1rGQZKiRMomzyXbJHY9ktfzCC5OOvs4RMNqswHTjJd4RdABYr3yoQ21f53MLueTPcfSt9JpgZtekQP87g/zaKxic9TaNp9yK3ab0TdoCoI+fJIvCJnM7xBwnsHswCt0jGQSkjeo1QJbZ5wAdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = "สวัสดีจ้า";
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];
                        
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken ,
				'messages' => [$messages],
			
			];
			
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}else if ($event['message']['text'] == 'กินข้าวรึยังจ้ะ'){
                
                // Constants firebase
                 $length = 15;
                $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
                // Constants
                   $FIREBASE = "https://test-line-api-e73a3.firebaseio.com/";
                $NODE_PUT = $randomString.".json";
                $randomString2 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 11);
                // Matching nodes updated
                $data = array(
                    "url" => $randomString2
                );
                    // JSON encoded
                $json = json_encode($data);
                // Initialize cURL
                $curl = curl_init();
            //Create
                 curl_setopt( $curl, CURLOPT_URL, $FIREBASE . $NODE_PUT );
                 curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, "PUT" );
                curl_setopt( $curl, CURLOPT_POSTFIELDS, $json);
               // Get return value
                curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
                // Make request
                // Close connection
                $response = curl_exec( $curl );
                curl_close( $curl );
                // Show result
                echo $response . "\n";
		
	}
}
echo "OK";
