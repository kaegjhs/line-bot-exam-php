<?php
$access_token = '+sDtl9F1rGQZKiRMomzyXbJHY9ktfzCC5OOvs4RMNqswHTjJd4RdABYr3yoQ21f53MLueTPcfSt9JpgZtekQP87g/zaKxic9TaNp9yK3ab0TdoCoI+fJIvCJnM7xBwnsHswCt0jGQSkjeo1QJbZ5wAdB04t89/1O/w1cDnyilFU=';


$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
