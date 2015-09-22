<?php

/*

REQUIREMENTS

* A custom slash command on a Slack team
* A web server running PHP5 with cURL enabled

USAGE

* Place this script on a server running PHP5 with cURL.
* Set up a new custom slash command on your Slack team:
	http://my.slack.com/services/new/slash-commands
* Under "Choose a command", enter whatever you want for
	the command. /isitup is easy to remember.
* Under "URL", enter the URL for the script on your server.
* Leave "Method" set to "Post".
* Decide whether you want this command to show in the
	autocomplete list for slash commands.
* If you do, enter a short description and usage hint.

*/

// $command = $_POST['command'];
// $text = $_POST['text'];
// $token = $_POST['token'];

// if($token != 'U7HmTW2Hq7MLbi2sJ134Drle'){
// 	$msg = "The token for the slash command doesn't match. Check your script.";
// 	die($msg);
// 	echo $msg;
// }

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.particle.io/v1/devices/1a002f000447343337373738/status?access_token=c95ac2d07af299fb579aefbd316fd6ee14aa7ae4");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$ch_response = curl_exec($ch);
curl_close($ch);
$response_array = json_decode($ch_response,true);

if($ch_response === FALSE){
	$reply = "Turlet bot not responding. Beep poop.";
} else {
	if($response_array["result"] == 0){
		$reply = ":poop: Yes! Hurry!";
	} else {
		$reply = ":thumbsdown: Nope! Someone else is pooping.";
	}
}

echo $reply;
