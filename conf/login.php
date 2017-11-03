<?php

/* 
 * Test Program
 * Pixel Studio Bandung
 * Hilman Fadillah
 * 2017
 */

session_start();
include './koneksi.php';

if(isset($_POST['aksi'])){
    
    $email = htmlspecialchars($_POST['email']);
    $passs = htmlspecialchars(md5($_POST['pass']));
    
    $query = "SELECT email, pass FROM users WHERE email = '$email' and pass = '$passs'";
    $mysql = mysql_query($query);
    $r_cek = mysql_num_rows($mysql);
    
    if($r_cek > 0){
        $_SESSION['email'] = $email;
        echo "sukses";
    }else{
        echo "gagal";
    }
    
}