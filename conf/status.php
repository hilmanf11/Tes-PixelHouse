<?php

/* 
 * Test Program
 * Pixel Studio Bandung
 * Hilman Fadillah
 * 2017
 */

session_start();
include './koneksi.php';

if(@!$_SESSION['email'] == ""){
    $eml = $_SESSION['email'];
    $t_data = "SELECT a.email, a.status, b.nama, b.foto FROM status as a INNER JOIN users as b ON a.email = b.email ORDER BY a.tgl ASC";
    $s_data = mysql_query($t_data);
    while ($r_data = mysql_fetch_array($s_data)){

        if($r_data['foto'] == ""){
            $img = "icon.png";
        }else{
            $img = $r_data['foto'];
        }

        if($r_data['email'] == $eml){
            echo "<div class='status_me' onclick='link_profile(this)' data-id='$r_data[email]'>"
                . "<img src='image/$img' class='foto-me'>"
                . "<div class='foto-name-me'>"
                . "<ul><li class='nama'>$r_data[nama]</li><li>$r_data[status]</li></ul>"
                . "</div>"
                . "</div>";
        }else{
            echo "<div class='status_user'>"
                . "<img src='image/$img' class='foto'>"
                . "<div class='foto-name'>"
                . "<ul><li class='nama'>$r_data[nama]</li><li>$r_data[status]</li></ul>"
                . "</div>"
                . "</div>";
        }
    }
}else{
    echo "gagal";
}
