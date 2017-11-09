<?php

require_once('lib/fb.php');

//////////////////////////////////////////////[edit authentication here]///////////////////////////////////////////
$user		= getenv('FB_USER'); // facebook username / email
$pass 		= getenv('FB_PASS'); // facebook passwod
$r_male		= getenv('R_MALE'); // reaction if user male , like = 1, love = 2, wow = 3, haha = 4, sad = 7, angry = 8
$r_female	= getenv('R_FEMALE'); // reaction if user female , like = 1, love = 2, wow = 3, haha = 4, sad = 7, angry = 8
$max_status	= getenv('MAX_STATUS'); // maximum reacted status
$token 		= getenv('FB_TOKEN');
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$config['cookie_file'] = getenv('COOKIE_FILE');
var_dump($user, $pass, $r_male, $r_female, $max_status, $token, $config['cookie_file']);
if (!file_exists($config['cookie_file'])) {
    $fp = @fopen($config['cookie_file'], 'w');
    @fclose($fp);
}

$reaction = new Reaction();
$reaction->send_reaction($user, $pass, $token, $r_male, $r_female, $max_status);