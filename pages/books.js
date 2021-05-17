"use strick";



var Books = function () {
    const url = "controller/books.ctrl.php";
    var id = "";

    let _initBook = () => {
        console.log("BOOKS");
        _classificationsList();
        _divisionList();
        _sectionList();
        _yearList();
        _languageList();
        _subjectList();
        _genreList();
    };


     // Genre ============================
     let _genreList = () => {
        var htm = '<option value="">Select--></option>';
        var data = {
            genreList: "genreList",
        };
        axios.post(url, data).then(data => {
            var catarr = data.data;
            for(var cat in catarr){
                htm += '<option value="'+catarr[cat].name+'">'+catarr[cat].name+'</option>';
            }   
            $("#genre").html(htm);
        });
    }

     // Subject ============================
    let _subjectList = () => {
        var htm = '<option value="">Select--></option>';
        var data = {
            subjectlist: "subjectlist",
        };
        axios.post(url, data).then(data => {
            var catarr = data.data;
            for(var cat in catarr){
                htm += '<option value="'+catarr[cat].name+'">'+catarr[cat].name+'</option>';
            }   
            $("#subject").html(htm);
        });
    }

    // Language ============================
    let _languageList = () => {
        var htm = '<option value="">Select--></option>';
        var data = {
            languageList: "languageList",
        };
        axios.post(url, data).then(data => {
            var catarr = data.data;
            for(var cat in catarr){
                htm += '<option value="'+catarr[cat].name+'">'+catarr[cat].name+'</option>';
            }   
            $("#language").html(htm);
        });
    }



    // Year ============================
    let _yearList = () => {
        var htm = '<option value="">Select--></option>';
        var data = {
            yearlist: "yearlist",
        };
        axios.post(url, data).then(data => {
            var catarr = data.data;
            for(var cat in catarr){
                htm += '<option value="'+catarr[cat].name+'">'+catarr[cat].name+'</option>';
            }   
            $("#year").html(htm);
        });
    }



    // Section ============================
    let _sectionList = () => {
        var htm = '<option value="">Select--></option>';
        var data = {
            sectionList: "sectionList",
        };
        axios.post(url, data).then(data => {
            var catarr = data.data;
            for(var cat in catarr){
                htm += '<option value="'+catarr[cat].name+'">'+catarr[cat].name+'</option>';
            }   
            $("#section").html(htm);
        });
    }



    // Division ============================
    let _divisionList = () => {
        var htm = '<option value="">Select--></option>';
        var data = {
            divlist: "divlist",
        };
        axios.post(url, data).then(data => {
            var catarr = data.data;
            for(var cat in catarr){
                htm += '<option value="'+catarr[cat].name+'">'+catarr[cat].name+'</option>';
            }   
            $("#division").html(htm);
        });
    }



    // Classifications ============================
    let _classificationsList = () => {
        var htm = '<option value="">Select--></option>';
        var data = {
            classList: "classList",
        };
        axios.post(url, data).then(data => {
            var catarr = data.data;
            for(var cat in catarr){
                htm += '<option value="'+catarr[cat].name+'">'+catarr[cat].name+'</option>';
            }   
            $("#classification").html(htm);
        });
    }


    //Category List=========================
    let _catList = () => {
        var htm = '<option value="">Select--></option>';
        var data = {
            gcatlist: "gcatlist",
        };
        axios.post(url, data).then(data => {
            var catarr = data.data;
            for(var cat in catarr){
                htm += '<option value="'+catarr[cat].category+'">'+catarr[cat].category+'</option>';
            }   
            $("#category").html(htm);
        });
    }


    //GET BOOK LIST========================================================
    let _listBooks = () => {
        var data = {
            gbooklist: "getbooklist",
        };
        axios.post(url, data).then(data => {
            // console.log(data.data);
            _talbeBook(data.data);
            _deleteBook();
            _editBook();
        });
    }

    let _editBook = () => {
        $(".btnEdit").on('click', (e) => {
            var xid = ($(e.target).attr("data-id") == undefined) ? $(e.target).parent().attr("data-id") : $(e.target).attr("data-id");
            id = xid;
            var data = {
                editbook: "editbook",
                id: id
            };
            axios.post(url, data).then(data => {
                var formdata = document.getElementById("form-book").elements;
                app.addDataForm(formdata,data.data);
            });
            return e.preventDefault();
        });
    }



    // DELETE BOOK=========================================================
    let _deleteBook = () => {

        $(".btnDelete").on('click', (e) => {
            var id = ($(e.target).attr("data-id") == undefined) ? $(e.target).parent().attr("data-id") : $(e.target).attr("data-id");
            var data = {
                deletBook: "deletebook",
                id: id
            };
            axios.post(url, data).then(data => {
                // console.log(data.data);
                alert("Successfuly Deleted");
                _listBooks();
            });
            return e.preventDefault();
        });
    }


    //SAVE UPDATE BOOK========================================================
    let _saveUpdateBook = () => {
        $("#form-book").submit((e) => {
            var formdata = document.getElementById("form-book").elements;
            var dataForm = app.serializeForm(formdata);

            if (dataForm.title == '' || dataForm.category == '' || dataForm.author == '' || dataForm.datepub == '' 
                || dataForm.quantity == '' || dataForm.published == '' || dataForm.price == '' || dataForm.descriptions == '') {
                alert("Some Field(s) is empty");
            } else {
                var data = {
                    saveupdatebooks: "saveupdatebooks",
                    id : id,
                    formdata : JSON.stringify(dataForm)
                };
                axios.post(url, data).then(data => {
                    // console.log(data.data);
                    alert("Successfuly Saved");
                    $("#form-book").trigger("reset");
                    _listBooks();
                    id = "";
                });
            }

            return e.preventDefault();
        });
    };



    //INIT DATATABLE JS========================================
    let _talbeBook = (data) => {
        var table = $("#table-books").DataTable({
            data: data,
            columnDefs: [{
                targets: [8],
                data: data,
                render: (x) => {
                    if(access == "admin"){
                        return `
                            <button data-toggle="modal" data-target="#add-book-modal" type="button" data-id="` + x.id + `" class="btn btn-light btnEdit"><i class="bx bx-pencil"></i></button>
                            <button type="button" data-id="` + x.id + `" class="btn btn-light btnDelete"><i class="bx bx-trash"></i></button>
                            `;
                    }else{
                        return `
                            <button data-toggle="modal" data-target="#add-book-modal" type="button" data-id="` + x.id + `" class="btn btn-light btnEdit"><i class="bx bx-pencil"></i></button>
                            `;
                        
                    }
                    
                }
            }],
            columns: [{
                    data: 'title',
                    sTitle: "Title"
                },
                {
                    data: 'category',
                    sTitle: "Category"
                },
                {
                    data: 'author',
                    sTitle: "Author"
                },
                {
                    data: 'published',
                    sTitle: "Published"
                },
                {
                    data: 'datepub',
                    sTitle: "Date Published"
                },
                {
                    data: 'quantity',
                    sTitle: "Quantity"
                },
                {
                    data: 'price',
                    sTitle: "Price"
                },
                {
                    data: 'description',
                    sTitle: "Description"
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
        initBooks: () => {
            _initBook();
            _listBooks();
            _saveUpdateBook();
            _catList();
        }
    }
}();


document.addEventListener("DOMContentLoaded", () => {
    Books.initBooks();
});