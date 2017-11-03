<?php

/* 
 * Test Program
 * Pixel Studio Bandung
 * Hilman Fadillah
 * 2017
 */


$kon = mysql_connect("localhost", "root", "");
$db = mysql_select_db("db_twitter");

if(!$kon){
    header("location: ../error.php");
}

if(!$db){
    header("location: ../error_database.php");
}