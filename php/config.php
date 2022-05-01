<?php

define('SERVER_DOMAIN','Bluehawkの声保管して委員会(仮称)');
define('SERVER_SITE_NAME','Bluehawk Archives');
define('SERVER_USER_NAME','Bluehawk');
define('SERVER_VOICE_URL','voice/bluehawk/');

if($_SERVER['HTTP_HOST'] === 'localhost' || $_SERVER['HTTP_HOST'] === '127.0.0.1'){
    define('SERVER_URL','./');
}else{
    define('SERVER_URL','https://steam.moe/blue/');
}

?>