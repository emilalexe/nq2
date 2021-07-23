<?php
/**
 * Created by PhpStorm.
 * User: Emil
 * Date: 23.07.2021
 * Time: 22:27
 */
/**
 * This functions is used for sql queries
 */
function db_connect(){
    $con = mysqli_connect('localhost','gniihhdh_nq_admin','2AqU$o*=0wXM','gniihhdh_nq2');
    if(isset($_GET['debug'])){
        if($_GET['debug'] == 1){
            debugMode(1);
        }else{
            debugMode(0);
        }
        header("Location: /");
    }
// Check connection
    if (mysqli_connect_errno()) {
        if(isset($_COOKIE['debug']))
        {
            echo '<script>console.log(' . json_encode('Failed to connect to MySQL: ' . mysqli_connect_error()) . ');</script>';
        }else {
            echo '<script>console.log("Failed to connect to MySQL.");</script>';
        }
        exit();
    }
    return $con;
}

function db_select($sql){
    $conn = db_connect();

    $result = mysqli_query($conn, $sql);
    $rows = array();
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            array_push($rows,$row);
            if(isset($_COOKIE['debug']))
            {
                echo'<script>console.log(\'db_select: '.json_encode($rows).'\');</script>';
            }
        }
    } else {
        if(isset($_COOKIE['debug'])) {
            echo '<script>console.log("db_select: 0 results");</script>';
        }
    }
    return $rows;
    mysqli_close($conn);
}

function db_insert(){

}

function db_delete(){

}

function db_update($sql){
    $conn = db_connect();

    if (mysqli_query($conn, $sql)) {
        if(isset($_COOKIE['debug']))
        {
            echo'<script>console.log("db_update: Update with success.");</script>';
        }
        return 1;
    } else {
        if(isset($_COOKIE['debug']))
        {
            echo'<script>console.log("db_update: '. mysqli_error($conn) . '");</script>';
        }
        return 0;
    }
    mysqli_close($conn);
}
