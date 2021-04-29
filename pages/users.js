"use strict";


var Users = function(){
    const url = "controller/users.ctrl.php";
    var id = "";

    let _initUsers = ()=>{
        console.log("USERS");
    };


    let _listUsers = () => {
        var data = {
            guserlist: "guserlist",
        };
        axios.post(url, data).then(data => {
            _tableUsers(data.data);
            _deleteUsers();
            _editUser();
        });
    };

    let _editUser = () => {
        $(".btnEdit").on('click', (e) => {
            var xid = ($(e.target).attr("data-id") == undefined) ? $(e.target).parent().attr("data-id") : $(e.target).attr("data-id");
            id = xid;
            var data = {
                editusers: "editusers",
                id: id
            };
            axios.post(url, data).then(data => {
                // console.log(data.data);
                var form = $("#form-user")[0];
                form[0].value = data.data.no;
                form[1].value = data.data.name;
                form[2].value = data.data.username;
                form[3].value = data.data.access;
            });
            return e.preventDefault();
        });
    }



    let _deleteUsers = () => {
        $(".btnDelete").on('click', (e) => {
            var id = ($(e.target).attr("data-id") == undefined) ? $(e.target).parent().attr("data-id") : $(e.target).attr("data-id");
            var data = {
                deletUsers: "deletUsers",
                id: id
            };
            axios.post(url, data).then(data => {
                // console.log(data.data);
                alert("Successfuly Deleted");
                _listUsers();
            });
            return e.preventDefault();
        });
    };


    let _saveUpdateUser = () => {
        $("#form-user").submit((e) => {
            var no = $(e.target[0]).val();
            var name = $(e.target[1]).val();
            var username = $(e.target[2]).val();
            var password = $(e.target[3]).val();
            var repassword = $(e.target[4]).val();
            var access = $(e.target[5]).val();
            if (no == '' || name == '' || username == '' || password == '' || repassword == '' || access == '') {
                alert("Some Field(s) is empty");
            } else if(password != repassword){
                alert("Password not matched!");
            } else {
                var data = {
                    saveupdateuser: "saveupdateuser",
                    id : id,
                    no : no,
                    name: name,
                    username: username,
                    password: password,
                    access : access
                };
                axios.post(url, data).then(data => {
                    // console.log(data.data);
                    id = "";
                    alert("Successfuly Saved");
                    $("#form-user").trigger("reset");
                    _listUsers();
                });
            }

            return e.preventDefault();
        });
    };




    let _tableUsers = (data)=>{
        var table = $("#table-users").DataTable({
            data: data,
            columnDefs: [{
                targets: [4],
                data: data,
                render: (x) => {
                    if(access == "admin"){
                        return `
                            <button data-toggle="modal" data-target="#add-users-modal" type="button" data-id="` + x.id + `" class="btn btn-light btnEdit"><i class="bx bx-pencil"></i></button>
                            <button type="button" data-id="` + x.id + `" class="btn btn-light btnDelete"><i class="bx bx-trash"></i></button>
                            `;
                    }else{
                        return `
                            <button data-toggle="modal" data-target="#add-users-modal" type="button" data-id="` + x.id + `" class="btn btn-light btnEdit"><i class="bx bx-pencil"></i></button>
                            `;
                    }
                    
                }
            }],
            columns: [{
                    data: 'no',
                    sTitle: "User No."
                },
                {
                    data: 'name',
                    sTitle: "Name"
                },
                {
                    data: 'username',
                    sTitle: "Username"
                },
                {
                    data: 'access',
                    sTitle: "Access Level"
                },
                {
                    data: null,
                    sTitle: "Options"
                }
            ],
            bDestroy: true
        });
    };





    return {
        initUsers : ()=>{
            _initUsers();
            _saveUpdateUser();
            _listUsers();
        }
    };

}();


document.addEventListener("DOMContentLoaded",()=>{
    Users.initUsers();
});