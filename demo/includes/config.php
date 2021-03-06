<?php
/**
* Copyright (c) 2016 Orange
*
* Licensed under the Apache License, Version 2.0 (the "License");
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
*
*   http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
**/
date_default_timezone_set("Europe/Paris");

/**
 * These are the database login details
 */



define('HOST',               'idp_mysql');
define('USER',               'oidcAppli');
define('PASSWORD',           'phpOidcNewPsswd*!');
define('DATABASE', 'demo');    // The database name.

define('CAN_REGISTER', 'any');
define('DEFAULT_ROLE', 'member');
define('SECURE', 'false');

/*
* Specifies the SP's PATH
* 
*/
define("SP_PATH", '/' . basename(dirname($_SERVER['SCRIPT_FILENAME'])));

if (array_key_exists ("HTTP_X_FORWARDED_SERVER", $_SERVER))
{
  $SP_URL="https://".$_SERVER["HTTP_X_FORWARDED_SERVER"]."/demo";
  $IDP_URL="https://".$_SERVER["HTTP_X_FORWARDED_SERVER"]."/phpOp/index.php";
}
else
{
  $SP_URL="https://".$_SERVER["SERVER_NAME"]."/demo";
  $IDP_URL="https://".$_SERVER["SERVER_NAME"]."/phpOp/index.php";
}

$REDIRECT_URI=$SP_URL."/demoback.php";

$CLIENT_ID="demo";
$CLIENT_SECRET="spsecret";

$RESPONSE_TYPE="code";
$RESPONSE_TYPE_SIGNIN="id_token";
$SCOPE="profile openid email";
$SCOPE_LOGIN="openid";

?>
