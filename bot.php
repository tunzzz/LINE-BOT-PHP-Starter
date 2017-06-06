<?php
$access_token = 'wXJv89YEfDj9rVxMv4zlo/hp1gMLxLN6I9Wvdmhjli9z7MdVRDjBaQ/08hiHDL/7SRS3eGo4T3sluRCwzNyXDRnjeDrNkFl7bXVZy245nc1J60AT1qdFYNsXr2Z++Aet1HhOaYQPnA3bOU3hwaxlTgdB04t89/1O/w1cDnyilFU=';

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
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			
			//test api
			$service_url = 'https://api.nicehash.com/api?method=stats.provider&addr=1FWYJ7W7wj8EaaMBtUo8dzJ3EvSX2wU1dE';
      //next example will recieve all messages for specific conversation
$curl = curl_init($service_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$curl_response = curl_exec($curl);
//if ($curl_response === false) {
//    $info = curl_getinfo($curl);
//    curl_close($curl);
//    die('error occured during curl exec. Additioanl info: ' . var_export($info));
//}
//curl_close($curl);
//$decoded = json_decode($curl_response);
//if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
//    die('error occured: ' . $decoded->response->errormessage);
//}
//echo 'response ok!';
//var_export($decoded->response);
			//test api
			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $curl_response
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
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
		}
	}
}
echo "OK";
