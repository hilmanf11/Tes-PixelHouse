<?php

/* 
 * Test Program
 * Pixel Studio Bandung
 * Hilman Fadillah
 * 2017
 */

session_start();
include './koneksi.php';

if(isset($_POST['save'])){
    $id_us = $_POST['profile_id'];
    $email = $_POST['profile_email'];
    $namaa = $_POST['profile_nama'];
    $paswo = $_POST['profile_pass'];
    $pic_p = $_FILES['upload']['name'];
    $size  = $_FILES['upload']['size'];
    $tipe  = $_FILES['upload']['type'];
    $valid = array('jpg','png','gif','jpeg'); 
    
    $p_ft  = explode(".", $pic_p);
    $exten = end($p_ft);
    $tempo = time().'.'.$exten;
    
    $cek_d = mysql_query("SELECT * FROM users WHERE id_user = '$id_us'");
    $dat_d = mysql_fetch_array($cek_d);
    
    if($dat_d['pass'] == "$paswo"){
        $pass = $paswo;
    }else{
        $pass = md5($paswo);
    }
    
    if($pic_p == ""){
        $foto = $dat_d['foto'];
        $query = "UPDATE users SET email='$email', nama='$namaa', pass='$pass', foto='$foto' WHERE id_user='$id_us'";
        $mysql = mysql_query($query);
        
        if($mysql){
            echo '<script>alert("Update Profile Success!");window.location.assign("../dashboard.html");</script>';
        }else{
            echo '<script>alert("Update Profile Failed!");window.location.assign("../dashboard.html");</script>';
        }
        
    }else{
        $foto = $tempo;
        if(in_array($exten, $valid)){
            if($size<5000000){
                $query = "UPDATE users SET email='$email', nama='$namaa', pass='$pass', foto='$foto' WHERE id_user='$id_us'";
                $mysql = mysql_query($query);
                
                $move = move_uploaded_file($_FILES['upload']['tmp_name'], '../image/'.$foto);
                
                if($mysql){
                    echo '<script>alert("Update Profile Success!");window.location.assign("../dashboard.html");</script>';
                }else{
                    echo '<script>alert("Update Profile Failed!");window.location.assign("../dashboard.html");</script>';
                }
            }else{
                echo '<script>alert("Ukuran gambar terlalu besar!");window.location.assign("../dashboard.html");</script>';
            }
        }else{
            echo '<script>alert("File yang di perbolehkan berformat jpg, png, gif dan jpeg!");window.location.assign("../dashboard.html");</script>';
        }
    }
}
