<?php
/**
 * Example VATSIM SSO Script package.
 * Configuration file for OAuth integration
 *
 * @author Kieran Hardern
 * @version 0.2
 */
 //===============================================
 /*define('AUTH_PROVIDER', 'https://cert.vatsim.net/sso/');
 define('AUTH_KEY', 'VATSIM_PAC');
 define('AUTH_SECRET', 'gwPes]53>RN2j,?,ZT4!>bfB');*/
/*
 * Contains all temporary config variables
 */
$sso = array();

/*
 * The location of the VATSIM OAuth interface
 */
$sso['base'] = 'https://cert.vatsim.net/sso/';

/*
 * The consumer key for your organisation (provided by VATSIM)
 */
$sso['key'] = '';

/*
 * The secret key for your orgnisation (provided by VATSIM)
 * Do not give this to anyone else or display it to your users. It must be kept server-side
 */
$sso['secret'] = '';

/*
 * The key for whic temporary (token) details for each user will be stored e.g. $_SESSION['mykey']
 * If you chose to handle the tokens yourself by another method, you can remove this
 */
define('SSO_SESSION', 'oauth');

/*
 * The URL users will be redirected to after they log in, this should
 * be on the same server as the request
 */

// Using https or http?
$http = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']) ? 'https://' : 'http://';

// determing location from URL (comment out if manually defining - example below)
//$sso['return'] = $http.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'].'?return';
//$sso['return'] =  $http.$_SERVER['SERVER_NAME'] . '/tms/login/sso?return';

/*
 * The signing method you are using to encrypt your request signature.
 * Different options must be enabled on your account at VATSIM.
 * Options: RSA / HMAC
 */
$sso['method'] = 'RSA';

/*
 * Your RSA **PRIVATE** key
 * If you are not using RSA, this value can be anything (or not set)
 */
$sso['cert'] =
?>
