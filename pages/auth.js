"use strict";

var Auth = function(){
    var url = "controller/auth.ctrl.php";


    let _initAuth = ()=>{
        console.log("Auth")
    };


    let _login = () =>{
        $("#btnLogin").click((e)=>{
            var username = $("#username").val();
            var password = $("#password").val();
            if(username == "" || password == ""){
                alert("Some Field(s) is Empty!");
            }else{
                var data = {
                    login : "login",
                    username : username,
                    password : password
                };
                axios.post(url,data).then(data=>{
                    // console.log(data.data);
                    if(data.data == "success"){
                        window.location.href = "index.php";
                    }else{
                        alert("Login Failed");
                    }
                });
            }
            return e.preventDefault();
        });
    };




    return {
        initAuth : ()=>{
            _initAuth();
            _login();
        }
    }

}();



document.addEventListener("DOMContentLoaded",()=>{
    Auth.initAuth();
});