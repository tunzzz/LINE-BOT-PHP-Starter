<?php
$access_token = 'DcQ2wDzKrXRoE61FJK9ZC42J4dGrCdpsLPhpk0nzZWRzmlhvo4CVOra1cNl8yMtSSRS3eGo4T3sluRCwzNyXDRnjeDrNkFl7bXVZy245nc1Jbz3YWdpinkuq99xu6PjAnrHO9mzZ//Z6+M4Mf6mLIwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;