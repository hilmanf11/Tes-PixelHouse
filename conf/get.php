<?php

/* 
 * Test Program
 * Pixel Studio Bandung
 * Hilman Fadillah
 * 2017
 */

session_start();
include './koneksi.php';

if(isset($_POST['email'])){
    $email = htmlspecialchars($_POST['email']);
    
    $query = "SELECT email FROM users WHERE email = '$email'";
    $mysql = mysql_query($query);
    $rowss = mysql_num_rows($mysql);
    
    if($rowss > 0){
        echo "ada";
    }else{
        echo "tidak ada";
    }
    
}elseif($_GET['profil']){
    
    $eml = $_GET['profil'];
    $query = "SELECT * FROM users WHERE email = '$eml'";
    $mysql = mysql_query($query);
    $dataa = mysql_fetch_assoc($mysql);
    
    echo json_encode($dataa);
    
}else{
    echo "gagal";
}
