<?php
/**
 * Created by PhpStorm.
 * User: Emil
 * Date: 06.07.2021
 * Time: 00:40
 */

include_once("sql_queries.php");

function debug(){
    return db_select('SELECT value FROM settings WHERE name = "debug";')[0]["value"];
}

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

$debug = debug();

if($debug){
    debugMode($debug);
    debug_to_console("functions.php");
}else{
    debugMode($debug);
}

function debugMode($value){
    if($value==1){
        setcookie("debug", $value);
        echo'<script>console.log("Debug: ON");</script>';
    }else{
        if(isset($value)){
            unset($_COOKIE['debug']);
            setcookie('debug', null, -1);
            echo'<script>console.log("Debug: OFF");</script>';
        }else{
            unset($_COOKIE['debug']);
            setcookie('debug', null, -1);
        }
    }
}

function _header($debug = 0){
    if($debug){ debug_to_console("header.php");}
    include_once("_template/header.php");
}
function _footer($debug = 0){
    if($debug){ debug_to_console("footer.php");}
    include_once("_template/footer.php");
}
function _menu($debug = 0){
    if($debug){ debug_to_console("menu.php");}
    include_once("_template/menu.php");
}

include_once("assets.php");
