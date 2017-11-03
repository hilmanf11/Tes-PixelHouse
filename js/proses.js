/*
Test Program
Pixel Studio Bandung
Hilman Fadillah
2017
*/

function email(e){
    var email_cek = e.value;
    
    $.ajax({
       type: 'post',
       url: 'conf/get.php',
       data: 'email='+email_cek,
        success: function (data_cek_regist) {
            if(data_cek_regist == "ada"){
                $("#email_notif").html("*Email is already registered!!");
            }else{
                $("#email_notif").html("");
            }
            
        }
    });
}

function register(){
    var email_cek = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var email_re = $.trim($("#email_regist").val());
    var name_re = $("#name_regist").val();
    var pass_re = $("#pass_regist").val();
    
    if(email_re == "" || name_re == "" || pass_re == ""){
        alert("Email, Nama dan Password harus di isi! ");
    }else{
        if(email_cek.test(email_re)){
            $.ajax({
               type: 'post',
               url: 'conf/register.php',
               data: 'email_regist='+email_re+'&name_regist='+name_re+'&pass_regist='+pass_re+'&aksi=true',
                success: function (data_regist) {
                    if(data_regist == "ada"){
                        alert("Email ini sudah Terdaftar!");
                    }else{
                        if(data_regist == "sukses"){
                            alert("Registration successfully done!");
                        }else{
                            alert("Registration Failed!");
                        }
                    }

                    $("input").val("");
                    $("#email_notif").html("");
                }
            });
            
        }else{
            alert('Email Salah!!');
        }
    }
}

function update_status(){
    var txt_status = $("#txt_status").val();
    if(txt_status == ""){
        $("#txt_status").focus();
    }else{
        $.ajax({
           url: 'conf/update.php',
           type: 'post',
           data: 'status='+txt_status+'&aksi=true',
            success: function (data_status) {
                if(data_status == "maaf"){
                    window.location.assign("page.html");
                }else{
                    $("#status_user").html(data_status);
                    $("#txt_status").val("");
                }
            }
        });
    }
}

function login(){
    var email_log = $("#email_log").val();
    var passs_log = $("#pass_log").val();
    
    if(email_log == "" || passs_log == ""){
        alert("Email atau Password harus di Isi. .");
    }else{
        
        $.ajax({
            type: 'post',
            url: 'conf/login.php',
            data: 'email='+email_log+'&pass='+passs_log+'&aksi=true',
             success: function (cek_login) {
                 if(cek_login == "sukses"){
                     window.location.assign("dashboard.html");
                 }else{
                     alert("Email atau Password Salah. .! Silahkan ulang kembali");
                 }
            }
        });
        
    }
}

function muat(){
    $.ajax({
        url: 'conf/status.php',
        success: function (data) {
            if(data == "gagal"){
                window.location.assign("page.html"); 
            }else{
                $("#status_user").html(data);
            }
        }
    });
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#previewing')
                .attr('src', e.target.result)
                .width(300)
                .height(300);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function link_profile(elem){
    var dataId = $(elem).data("id");
    $("#show_profile").load("profile.html");  
    $.ajax({
        type: 'get',
        url: 'conf/get.php',
        data: 'profil='+dataId,
        dataType: 'json',
        success: function (data_profile) {
            $("#profile_id").val(data_profile.id_user);
            $("#profile_email").val(data_profile.email);
            $("#profile_nama").val(data_profile.nama);
            $("#profile_pass").val(data_profile.pass);
            
            var img = data_profile.pass;
            
            if(img == ""){
                $("#previewing").attr("src","image/icon.png");
            }else{
                $("#previewing").attr("src","image/"+data_profile.foto);
            }
        }
    });
}

function kembali(){
    window.location.assign("dashboard.html");
}
