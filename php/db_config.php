<?php

$hname = 'localhost';
$uname = 'root';
$pass = '';
$db = 'hoteldb';

$con = mysqli_connect($hname, $uname, $pass, $db);

if(!$con){
    die('Не удается подключится к базе данных'.mysqli_connect_error());
}

// фильтрация
function filteration($data){
    foreach($data as $key => $value){
        $data[$key] = trim($value);
        $data[$key] = stripcslashes($value);
        $data[$key] = htmlspecialchars($value);
        $data[$key] = strip_tags($value);
    }
    return $data;
}

// выборка 
function select($sql,$values,$datatypes){
    $con = $GLOBALS['con'];
    if($stmt = mysqli_prepare($con,$sql)){
        mysqli_stmt_bind_param($stmt,$datatypes,... $values);
        if (mysqli_stmt_execute($stmt)){
            $res = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Не удаётся выполнить Select");
        }
    } else {
        die("Не удаётся выполнить Select");
    }}

// обновление 
function update($sql,$values,$datatypes){
    $con = $GLOBALS['con'];
    if($stmt = mysqli_prepare($con,$sql))
    {
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);
        if (mysqli_stmt_execute($stmt))
        {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Не удаётся выполнить Update");
        }
    } else {
        die("Не удаётся выполнить Update");
    }}

// вставка 
function insert($sql,$values,$datatypes){
    $con = $GLOBALS['con'];
    if($stmt = mysqli_prepare($con,$sql))
    {
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);
        if (mysqli_stmt_execute($stmt))
        {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Не удаётся выполнить Insert");
        }
    } else {
        die("Не удаётся выполнить Insert");
    }}

?>