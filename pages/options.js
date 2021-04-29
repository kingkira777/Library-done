"use strict";


var Options = function(){
    var url = "controller/options.ctrl.php";


    let _initOption = () =>{
        console.log("Options");
    };

    let _categoryList = () => {
        var data = {
            catlist : "categorylist"
        };
        axios.post(url,data).then(data=>{
            // console.log(data.data);
            _categoryTable(data.data);
            _deleteCat();
        });
    };

    let _deleteCat = () => {
        $(".btnDelete").on('click', (e) => {
            var id = ($(e.target).attr("data-id") == undefined) ? $(e.target).parent().attr("data-id") : $(e.target).attr("data-id");
            var data = {
                deletCat: "deletCat",
                id: id
            };
            axios.post(url, data).then(data => {
                // console.log(data.data);
                alert("Successfuly Deleted");
                _categoryList();
            });
            return e.preventDefault();
        });
    };

    let _saveCategory = () => {
        $("#form-category").submit((e)=>{
            var cat = $(e.target[0]).val();
            if(cat == ""){
                alert("Category is empty");
            }else{
                var data = {
                    savecat : "savecategory",
                    cat : cat
                };
                axios.post(url,data).then(data=>{
                    // console.log(data.data);
                    alert("Successfuly Saved");
                    $("#form-category").trigger("reset");
                    _categoryList();
                });
            }
            return e.preventDefault();
        });
    };


    // TABLE ============================================
    let _categoryTable = (data)=>{
        $("#table-category").DataTable({
            data : data,
            columnDefs : [
                {
                    targets : [1],
                    data : data,
                    width : 100,
                    render : (x)=>{
                        return `<button type="button" data-id="` + x.id + `" class="btn btn-light btnDelete"><i class="bx bx-trash"></i></button>`;
                    }
                }
            ],
            columns : [
                { data : 'category', sTitle : 'Category'},
                { data : null , sTitle : 'Option'}
            ],
            bDestroy : true
        })

    };




    return {
        initOptions : () =>{
            _initOption();
            _saveCategory();
            _categoryList();
            
        }

    };

}();


document.addEventListener("DOMContentLoaded",()=>{
    Options.initOptions();
});