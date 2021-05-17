"use strict";


var Students = function(){
    const url = "controller/student.ctrl.php";
    var id = "";
    let _initStudents = () =>{
        console.log("Students");
        _listGradelevel();
        _listSections();
    };



    // Section List
    let _listSections = () => {
        var htm = '<option value="">Select--></option>';
        var data = {
            sectionlist: "sectionlist",
        };
        axios.post(url, data).then(data => {
            var catarr = data.data;
            for(var cat in catarr){
                htm += '<option value="'+catarr[cat].name+'">'+catarr[cat].name+'</option>';
            }   
            $("#section").html(htm);
        });
    }


    // Grade Level List
    let _listGradelevel = () => {
        var htm = '<option value="">Select--></option>';
        var data = {
            gradelevellist: "gradelevellist",
        };
        axios.post(url, data).then(data => {
            var catarr = data.data;
            for(var cat in catarr){
                htm += '<option value="'+catarr[cat].name+'">'+catarr[cat].name+'</option>';
            }   
            $("#gradelevel").html(htm);
        });
    }



    // LIST STUDENTS
    let _listStudents = () => {
        var data = {
            gstudentlist: "gstudentlist",
        };
        axios.post(url, data).then(data => {
            console.log(data.data);
            _talbeStudents(data.data);
            _deleteBook();
            _editBook();
        });
    }


    // EDIT BOOK
    let _editBook = () => {
        $(".btnEdit").on('click', (e) => {
            var xid = ($(e.target).attr("data-id") == undefined) ? $(e.target).parent().attr("data-id") : $(e.target).attr("data-id");
            id = xid;
            var data = {
                editStudent: "editStudent",
                id: id
            };
            axios.post(url, data).then(data => {
                // console.log(data.data);
                var formdata = document.getElementById("form-student").elements;
                app.addDataForm(formdata,data.data);
            });
            return e.preventDefault();
        });
    }

    // DELETE BOOK
    let _deleteBook = () => {
        $(".btnDelete").on('click', (e) => {
            var formdata = document.getElementById("form-student").elements;
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


    //SAVE UPDATE STUDENTS
    let _saveUpdateStudents = () => {
        $("#form-student").submit((e) => {
            var formdata = document.getElementById("form-student").elements;
            var dataForm = app.serializeForm(formdata);

            if (dataForm.no == '' || dataForm.firstname == '' || dataForm.lastname == '' || dataForm.middlename == '' || dataForm.dob == '') {
                alert("Some Field(s) is empty");
            } else {
                var data = {
                    saveupdatestudent: "saveupdatestudent",
                    id : id,
                    formdata : JSON.stringify(dataForm)
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

    let _addStudentClearData = () => {
        $("#btnAddStudent").click((e)=>{
            id = "";
            $("#form-student").trigger("reset");
            return e.preventDefault();
        });
    };



    //INIT DATATABLE JS========================================
    let _talbeStudents = (data) => {
        var table = $("#table-students").DataTable({
            data: data,
            columnDefs: [{
                targets: [7],
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
                    data: 'section',
                    sTitle: "Section"
                },
                {
                    data: 'gradelevel',
                    sTitle: "Grade Level"
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
            _addStudentClearData();
        }
    }

}();


document.addEventListener("DOMContentLoaded",()=>{
    Students.initStudents();
});