<?php
/**
 * Created by PhpStorm.
 * User: Emil
 * Date: 06.07.2021
 * Time: 00:41
 */

function assets($file = null ,$type="/",$dir = "assets"){
    listFolderFiles($dir);
}

function listFolderFiles($dir){
    $ffs = scandir($dir);

    unset($ffs[array_search('.', $ffs, true)]);
    unset($ffs[array_search('..', $ffs, true)]);

    // prevent empty ordered elements
    if (count($ffs) < 1)
        return;

    foreach($ffs as $ff){
        if(!is_dir($dir.'/'.$ff)){
            if (strpos($ff, '.min.css') !== false && strpos($ff, '.map') === false && strpos($ff, '.esm') === false) echo '<link rel="stylesheet" type="text/css" href="'.$dir."/".$ff.'">';
            if (strpos($ff, '.min.js') !== false && strpos($ff, '.map') === false && strpos($ff, '.esm') === false) echo '<script src="'.$dir."/".$ff.'"></script>';
        }
        if(is_dir($dir.'/'.$ff)) listFolderFiles($dir.'/'.$ff);
    }
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