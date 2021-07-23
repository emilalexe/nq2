<?php
/**
 * Created by PhpStorm.
 * User: Emil
 * Date: 06.07.2021
 * Time: 00:40
 */
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
debug_to_console("functions.php");

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

function assets($file = null ,$type="/",$dir = "assets"){
    //$files1 = _scandir($dir);

    listFolderFiles($dir);
   // print_r($files1);
}

function listFolderFiles($dir){
    $ffs = scandir($dir);

    unset($ffs[array_search('.', $ffs, true)]);
    unset($ffs[array_search('..', $ffs, true)]);

    // prevent empty ordered elements
    if (count($ffs) < 1)
        return;

    if (count($ffs) > 2) echo '<ol>';
    foreach($ffs as $ff){
        if(!is_dir($dir.'/'.$ff)) echo '<li>'.$ff;
        if(is_dir($dir.'/'.$ff)) listFolderFiles($dir.'/'.$ff);
        if(!is_dir($dir.'/'.$ff))echo '</li>';
    }
    if (count($ffs) > 2) echo '</ol>';
}

function _scanDir($dir) {
    if(is_dir($dir)){

        $files = glob( $dir . '*', GLOB_MARK ); //GLOB_MARK adds a slash to directories returned

        foreach( $files as $file )
        {
           _scanDir( $file );
        }
        print_r($files);
        return $files;
    }

}