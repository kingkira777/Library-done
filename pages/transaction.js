"use strict";



var Transaction = function(){
    const url = "controller/transaction.ctrl.php";
    var borrowed = [], returnedBooks = [];

    let _initTransaction = () => {
        console.log("Transactions");

    };

    let _deleteBorrowedBook = () => {
        $(".btnDelete").on('click', (e) => {
            var id = ($(e.target).attr("data-id") == undefined) ? $(e.target).parent().attr("data-id") : $(e.target).attr("data-id");
            var data = {
                deletTrans: "deletTrans",
                id: id
            };
            axios.post(url, data).then(data => {
                // console.log(data.data);
                alert("Successfuly Deleted");
                _borrowedBookList('borrowed');
            });
            return e.preventDefault();
        });
    };

    let _returnedBorrowedBook = () =>{
        $("#returned-books").click((e)=>{
            if(returnedBooks.length == 0){
                alert("Selected Borrower is empty");
            }else{
                var data = {
                    returnedbooks : "returnedbooks",
                    ids : JSON.stringify(returnedBooks)
                };
                axios.post(url,data).then(data=>{
                    // console.log(data.data);
                    _borrowedBookList("borrowed");
                    _borrowedBookList("returned");
                });
            }
            return e.preventDefault();
        });
    };


    let _saveBorrowed = () => {
        $("#btnBorrowedBooks").click((e)=>{
            var student = $("#student-name").val();
            var notes = $("#notes").val();
            if(student == ""){
                alert("Student name is empty");
            }else if(borrowed.length == 0){
                alert("Theres no selected books");
            }else{
                var data = {
                    saveborrowed : 'saveborrowed',
                    student : student,
                    books : JSON.stringify(borrowed),
                    notes : notes
                };
                axios.post(url,data).then(data=>{
                    console.log(data.data);
                    alert("Successfuly Borrowed");
                    _borrowedBookList("borrowed");
                    _borrowedBookList("returned");
                });   
            }
            return e.preventDefault();
        }); 
    };


    let _borrowedBooks = () => {

        //SELECT TO BE RETURNED BOOKS
        $(".selectBorrowedBook").on("change",(e)=>{
            var ischecked = $(e.target).is(":checked");
            var id = $(e.target).val();
            if(ischecked){
                returnedBooks.push(id)
            }else{
                var index = returnedBooks.indexOf(id);
                returnedBooks.splice(index,1);
            }
            // console.log(returnedBooks);
        });

        //SELECT TO BE BORROWED BOOKS
        $(".selectBook").on("change",(e)=>{
            var ischecked = $(e.target).is(":checked");
            var id = $(e.target).val();
            if(ischecked){
                borrowed.push(id)
            }else{
                var index = borrowed.indexOf(id);
                borrowed.splice(index,1);
            }
        });
    };

    let _studentList = ()=>{
        var htm = `<option value="">Select--></option>`;
        var data = {
            studlist : 'Studenntlist',
        };
        axios.post(url,data).then(data=>{
            var studlist = data.data;
            for(var student in studlist){
                htm += `<option value="`+studlist[student].id+`">`+studlist[student].lastname+`, `+studlist[student].firstname+`</option>`;
            }
            $("#student-name").html(htm);
        });
    };


    let _borrowedBookList = (status)=>{
        var data = {
            bbookslist : 'bbookslist',
            status : status
        };
        axios.post(url,data).then(data=>{
            // console.log(data.data);
            if(status == "borrowed"){
                _tableBorrowedBooks(data.data);
            }else{
                _tableReturnedBooks(data.data);
            }
            _borrowedBooks();
            _deleteBorrowedBook();
        });
    };

    let _bookList = ()=>{
        var data = {
            booklist : 'booklist',
        };
        axios.post(url,data).then(data=>{
            // console.log(data.data);
            _tableBooks(data.data);
            _borrowedBookList("borrowed");
            _borrowedBookList("returned");
        });
    };



    //TABLE INIT===========================================

    let _tableReturnedBooks = (data) => {
        $("#returned-table-books").DataTable({
            data : data, 
            columnDefs : [
                // {
                //     targets : [0],
                //     data : data,
                //     render: (x)=>{
                //         return `<input type="checkbox" class="selectBorrowedBook" value="`+x.id+`" />`;
                //     }
                // },
                {
                    targets : [0],
                    data : data,
                    render: (x)=>{
                        return x.lastname+` `+x.firstname;
                    }
                }
            ],
            columns : [
                { data : null , sTitle : 'Student'},
                { data : 'title', sTitle : 'Book'},
                { data : 'author', sTitle : 'Author'},
                { data : 'category', sTitle : 'Category'},
                { data : 'bdate', sTitle : 'Borrowed Date'},
                { data : 'rdate', sTitle : 'Returned Date'}
            ],
            bDestroy : true
        });
    }


    let _tableBorrowedBooks = (data)=>{
        $("#borrowed-table-books").DataTable({
            data : data, 
            columnDefs : [
                {
                    targets : [0],
                    data : data,
                    render: (x)=>{
                        return `<input type="checkbox" class="selectBorrowedBook" value="`+x.id+`" />`;
                    }
                },
                {
                    targets : [1],
                    data : data,
                    render: (x)=>{
                        return x.lastname+` `+x.firstname;
                    }
                },
                {
                    targets : [6],
                    data :data,
                    render : (x)=>{
                        if(access == "admin"){
                            return `<button type="button" data-id="` + x.id + `" class="btn btn-light btnDelete"><i class="bx bx-trash"></i></button>
                            `
                        }else{
                            return ``;
                        }
                    }
                }
            ],
            columns : [
                { data : null , sTitle : 'Select'},
                { data : null , sTitle : 'Student'},
                { data : 'title', sTitle : 'Book'},
                { data : 'author', sTitle : 'Author'},
                { data : 'category', sTitle : 'Category'},
                { data : 'bdate', sTitle : 'Borrowed Date'},
                { data : null, sTitle : ''}
            ],
            bDestroy : true
        });
    };



    let _tableBooks = (data)=>{
        $("#table-books-borrow").DataTable({
            data : data, 
            columnDefs : [
                {
                    targets : [0],
                    data : data,
                    render: (x)=>{
                        return `<input type="checkbox" class="selectBook" value="`+x.id+`" />`;
                    }
                }
            ],
            columns : [
                { data : null , sTitle : 'Select'},
                { data : 'title', sTitle : 'Title'},
                { data : 'author', sTitle : 'Author'},
                { data : 'category', sTitle : 'Category'},
            ],
            bDestroy : true
        })
    };


    return {
        initTransaction : () => {
            _initTransaction();
            _studentList();
            _bookList();
            _saveBorrowed();
            _borrowedBookList("borrowed");
            _borrowedBookList("returned");
            _returnedBorrowedBook();
        }
    };

}();



document.addEventListener("DOMContentLoaded",()=>{
    Transaction.initTransaction();
});

