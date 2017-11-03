<?php

/* 
 * Test Program
 * Pixel Studio Bandung
 * Hilman Fadillah
 * 2017
 */

include './koneksi.php';

if(isset($_POST['aksi'])){
    $email = htmlspecialchars($_POST['email_regist']);
    $namaa = htmlspecialchars($_POST['name_regist']);
    $passs = htmlspecialchars(md5($_POST['pass_regist']));
    
    $cekdt = mysql_query("SELECT email FROM users WHERE email = '$email'");
    $rowdt = mysql_num_rows($cekdt);
    
    if($rowdt > 0){
        echo "ada";
    }else{

        $query = "INSERT INTO users (email, nama, pass) VALUES ('$email','$namaa','$passs')";
        $mysql = mysql_query($query);

        if($mysql){
            echo "sukses";
        }else{
            echo "gagal";
        }
    }
}else{
    header("Location: ../page.html");
}

