<?php
ob_start();
session_start();

error_reporting(E_ALL);

if(!defined('DR'))
    define('DR', DIRECTORY_SEPARATOR);

//Define directories
define('BASE_DIR',  realpath(dirname(__FILE__)) . DR);
define('LIB_DIR',   BASE_DIR . 'lib' . DR);


$accounts = array(
    array(
        'consumer_key'      => '',
        'consumer_secret'   => '',
        'authtoken_key'     => '',
        'authtoken_secret'  => '',
    ),
    array(
        'consumer_key'      => '',
        'consumer_secret'   => '',
        'authtoken_key'     => '',
        'authtoken_secret'  => '',
    ),
    array(
        'consumer_key'      => '',
        'consumer_secret'   => '',
        'authtoken_key'     => '',
        'authtoken_secret'  => '',
    ),
);

$account = $accounts[rand(0,count($accounts)-1)];


//Database
$config['db']['host']    = '127.0.0.1';
$config['db']['user']    = '';
$config['db']['pass']    = '';
$config['db']['name']    = 'stamboom';
$config['db']['options'] = array(
    PDO::MYSQL_ATTR_INIT_COMMAND    => 'SET NAMES utf8',
    PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION
);