"use strict";


var Students = function(){
    const url = "controller/student.ctrl.php";
    var id = "";
    let _initStudents = () =>{
        console.log("Students");
    };




    let _listStudents = () => {
        var data = {
            gstudentlist: "gstudentlist",
        };
        axios.post(url, data).then(data => {
            // console.log(data.data);
            _talbeStudents(data.data);
            _deleteBook();
            _editBook();
        });
    }


    let _editBook = () => {
        $(".btnEdit").on('click', (e) => {
            var xid = ($(e.target).attr("data-id") == undefined) ? $(e.target).parent().attr("data-id") : $(e.target).attr("data-id");
            id = xid;
            var data = {
                editStudent: "editStudent",
                id: id
            };
            axios.post(url, data).then(data => {
                var form = $("#form-student")[0];
                form[0].value = data.data.no;
                form[1].value = data.data.firstname;
                form[2].value = data.data.lastname;
                form[3].value = data.data.middlename;
                form[4].value = data.data.dob;
                form[5].value = data.data.contactno;
                form[6].value = data.data.address;
            });
            return e.preventDefault();
        });
    }


    let _deleteBook = () => {
        $(".btnDelete").on('click', (e) => {
            var id = ($(e.target).attr("data-id") == undefined) ? $(e.target).parent().attr("data-id") : $(e.target).attr("data-id");
            var data = {
                deletStudent: "deletStudent",
                id: id
            };
            axios.post(url, data).then(data => {
                // console.log(data.data);
                alert("Successfuly Deleted");
                _listStudents();
            });
            return e.preventDefault();
        });
    }



    let _saveUpdateStudents = () => {
        $("#form-student").submit((e) => {
            var no = $(e.target[0]).val();
            var firstname = $(e.target[1]).val();
            var lastname = $(e.target[2]).val();
            var middlename = $(e.target[3]).val();
            var dob = $(e.target[4]).val();
            var contactno = $(e.target[5]).val();
            var address = $(e.target[6]).val();
            if (no == '' || firstname == '' || lastname == '' || middlename == '' || dob == '') {
                alert("Some Field(s) is empty");
            } else {
                var data = {
                    saveupdatestudent: "saveupdatestudent",
                    id : id,
                    no : no,
                    firstname: firstname,
                    lastname: lastname,
                    middlename: middlename,
                    dob: dob,
                    contactno : contactno,
                    address : address
                };
                axios.post(url, data).then(data => {
                    id = "";
                    alert("Successfuly Saved");
                    $("#form-student").trigger("reset");
                    _listStudents();
                });
            }

            return e.preventDefault();
        });
    };



    //INIT DATATABLE JS========================================
    let _talbeStudents = (data) => {
        var table = $("#table-students").DataTable({
            data: data,
            columnDefs: [{
                targets: [5],
                data: data,
                render: (x) => {
                    if(access == "admin"){
                        return `
                                <button data-toggle="modal" data-target="#add-student-modal" type="button" data-id="` + x.id + `" class="btn btn-light btnEdit"><i class="bx bx-pencil"></i></button>
                                <button type="button" data-id="` + x.id + `" class="btn btn-light btnDelete"><i class="bx bx-trash"></i></button>
                            `;
                    }else{
                        return `
                                <button data-toggle="modal" data-target="#add-student-modal" type="button" data-id="` + x.id + `" class="btn btn-light btnEdit"><i class="bx bx-pencil"></i></button>
                        `;
                    }
                }
            }],
            columns: [{
                    data: 'no',
                    sTitle: "Student No."
                },
                {
                    data: 'firstname',
                    sTitle: "Firstname"
                },
                {
                    data: 'lastname',
                    sTitle: "Lastname"
                },
                {
                    data: 'middlename',
                    sTitle: "Middlename"
                },
                {
                    data: 'dob',
                    sTitle: "Date of Birth"
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
        initStudents : () => {
            _initStudents();
            _listStudents();
            _saveUpdateStudents();
        }
    }

}();


document.addEventListener("DOMContentLoaded",()=>{
    Students.initStudents();
});