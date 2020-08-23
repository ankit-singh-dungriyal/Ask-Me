<?php

$host='localhost';
$user='Ankit';
$password='8954206060';
$database='quizz';

$link= mysqli_connect($host, $user, $password, $database);
if(!$link)
{
    die(mysqli_error($link));
}

