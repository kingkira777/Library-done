"use strick";



var Books = function () {
    const url = "controller/books.ctrl.php";
    var id = "";

    let _initBook = () => {
        console.log("BOOKS");
    };


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
                var form = $("#form-book")[0];
                form[0].value = data.data.title;
                form[1].value = data.data.category;
                form[2].value = data.data.author;
                form[3].value = data.data.datepub;
                form[4].value = data.data.quantity;
                form[5].value = data.data.published;
                form[6].value = data.data.price;
                form[7].value = data.data.description;
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
            var title = $(e.target[0]).val();
            var category = $(e.target[1]).val();
            var author = $(e.target[2]).val();
            var datepub = $(e.target[3]).val();
            var quantity = $(e.target[4]).val();
            var published = $(e.target[5]).val();
            var price = $(e.target[6]).val();
            var descriptions = $(e.target[7]).val();

            if (title == '' || category == '' || author == '' || datepub == '' 
                || quantity == '' || published == '' || price == '' || descriptions == '') {
                alert("Some Field(s) is empty");
            } else {
                var data = {
                    saveupdatebooks: "saveupdatebooks",
                    id : id,
                    title: title,
                    category: category,
                    author: author,
                    datepub: datepub,
                    quantity: quantity,
                    published: published,
                    price : price,
                    descriptions : descriptions
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