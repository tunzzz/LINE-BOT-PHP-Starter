﻿<?php
$access_token = 'wXJv89YEfDj9rVxMv4zlo/hp1gMLxLN6I9Wvdmhjli9z7MdVRDjBaQ/08hiHDL/7SRS3eGo4T3sluRCwzNyXDRnjeDrNkFl7bXVZy245nc1J60AT1qdFYNsXr2Z++Aet1HhOaYQPnA3bOU3hwaxlTgdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
