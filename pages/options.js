"use strict";


var Options = function(){
    var url = "controller/options.ctrl.php";


    let _initOption = () =>{
        console.log("Options");


        // SECTION
        _saveSection();
        _sectionList();


        //GRADE LEVEL
        _saveGradelevel();
        _gradeLevelList();

        //DIVISION 
        _saveDivision();
        _divisionList();


        // GENRE
        _saveGenre();
        _genreList();


        // Language
        _saveLanguage();
        _langList();


        // Classification
        _saveClass();
        _classList();



        // Subject
        _saveSubject();
        _subjectList();

    };


// Subject ===============================================================================

    let _subjectList = () => {
        var data = {
            sublist : "sublist"
        };
        axios.post(url,data).then(data=>{
            // console.log(data.data);
            _optionTable("table-subject",data.data);
            _deleteSubject();
        });
    };

    let _deleteSubject = () => {
        $(".btnDelete").on('click', (e) => {
            var id = ($(e.target).attr("data-id") == undefined) ? $(e.target).parent().attr("data-id") : $(e.target).attr("data-id");
            var data = {
                deletesub: "deletesub",
                id: id
            };
            axios.post(url, data).then(data => {
                // console.log(data.data);
                alert("Successfuly Deleted");
                _subjectList();
            });
            return e.preventDefault();
        });
    };

    let _saveSubject = () => {
        $("#form-subject").submit((e)=>{
            var subject = $("#subject").val();
            if(subject == ""){
                alert("Subject is empty");
            }else{
                var data = {
                    savesubject : 'savesubject',
                    subject :subject
                };
                axios.post(url,data).then(data=>{
                    console.log(data.data);
                    alert("Successfuly Saved");
                    _subjectList();
                    $("#subject").val("");
                });

            }
            return e.preventDefault();
        });
    }

// CLASSIFICATIONS=====================================================================

    let _classList = () => {
        var data = {
            classList : "classList"
        };
        axios.post(url,data).then(data=>{
            // console.log(data.data);
            _optionTable("table-class",data.data);
            _deleteClass();
        });
    };

    let _deleteClass = () => {
        $(".btnDelete").on('click', (e) => {
            var id = ($(e.target).attr("data-id") == undefined) ? $(e.target).parent().attr("data-id") : $(e.target).attr("data-id");
            var data = {
                deleteClass: "deleteClass",
                id: id
            };
            axios.post(url, data).then(data => {
                // console.log(data.data);
                alert("Successfuly Deleted");
                _classList();
            });
            return e.preventDefault();
        });
    };

    let _saveClass = () => {
        $("#form-class").submit((e)=>{
            var xclass = $("#class").val();
            if(xclass == ""){
                alert("Classification is empty");
            }else{
                var data = {
                    savexclass : 'savexclass',
                    xclass :xclass
                };
                axios.post(url,data).then(data=>{
                    // console.log(data.data);
                    alert("Successfuly Saved");
                    _classList();
                    $("#class").val("");
                });

            }
            return e.preventDefault();
        });
    }


// LANGUAGE============================================================================

    let _langList = () => {
        var data = {
            langlist : "langlist"
        };
        axios.post(url,data).then(data=>{
            // console.log(data.data);
            _optionTable("table-language",data.data);
            _deleteLang();
        });
    };


    let _deleteLang = () => {
        $(".btnDelete").on('click', (e) => {
            var id = ($(e.target).attr("data-id") == undefined) ? $(e.target).parent().attr("data-id") : $(e.target).attr("data-id");
            var data = {
                deletelang: "deletelang",
                id: id
            };
            axios.post(url, data).then(data => {
                // console.log(data.data);
                alert("Successfuly Deleted");
                _langList();
            });
            return e.preventDefault();
        });
    };

    let _saveLanguage = () => {
        $("#form-lang").submit((e)=>{
            var lang = $("#lang").val();
            if(lang == ""){
                alert("Language is empty");
            }else{
                var data = {
                    savelang : 'savelang',
                    lang :lang
                };
                axios.post(url,data).then(data=>{
                    // console.log(data.data);
                    alert("Successfuly Saved");
                    _langList();
                    $("#lang").val("");
                });

            }
            return e.preventDefault();
        });
    }


// GENRE===============================================================================
    let _genreList = () => {
        var data = {
            genreList : "genreList"
        };
        axios.post(url,data).then(data=>{
            // console.log(data.data);
            _optionTable("table-genre",data.data);
            _deleteGenre();
        });
    };


    let _deleteGenre = () => {
        $(".btnDelete").on('click', (e) => {
            var id = ($(e.target).attr("data-id") == undefined) ? $(e.target).parent().attr("data-id") : $(e.target).attr("data-id");
            var data = {
                deletegenre: "deletegenre",
                id: id
            };
            axios.post(url, data).then(data => {
                // console.log(data.data);
                alert("Successfuly Deleted");
                _genreList();
            });
            return e.preventDefault();
        });
    };


    let _saveGenre = () => {
        $("#form-genre").submit((e)=>{
            var genre = $("#genre").val();
            if(genre == ""){
                alert("Genre is empty");
            }else{
                var data = {
                    savegenre : 'savegenre',
                    genre :genre
                };
                axios.post(url,data).then(data=>{
                    // console.log(data.data);
                    alert("Successfuly Saved");
                    _genreList();
                    $("#genre").val("");
                });

            }
            return e.preventDefault();
        });
    }






// DIVISION=============================================================================
    let _divisionList = () => {
        var data = {
            divisionList : "divisionList"
        };
        axios.post(url,data).then(data=>{
            // console.log(data.data);
            _optionTable("table-division",data.data);
            _deleleteDivision();
        });
    };

    let _deleleteDivision = () => {
        $(".btnDelete").on('click', (e) => {
            var id = ($(e.target).attr("data-id") == undefined) ? $(e.target).parent().attr("data-id") : $(e.target).attr("data-id");
            var data = {
                deletedivision: "deletedivision",
                id: id
            };
            axios.post(url, data).then(data => {
                // console.log(data.data);
                alert("Successfuly Deleted");
                _divisionList();
            });
            return e.preventDefault();
        });
    };

    let _saveDivision = () => {
        $("#form-division").submit((e)=>{
            var division = $("#division").val();
            if(division == ""){
                alert("Division is empty");
            }else{
                var data = {
                    savedivision : 'savedivision',
                    division :division
                };
                axios.post(url,data).then(data=>{
                    // console.log(data.data);
                    alert("Successfuly Saved");
                    _divisionList();
                    $("#division").val("");
                });

            }
            return e.preventDefault();
        });
    }
    
// GRADE LEVEL==========================================================================


    let _gradeLevelList = () => {
        var data = {
            gradelevelList : "gradelevelList"
        };
        axios.post(url,data).then(data=>{
            // console.log(data.data);
            _optionTable("table-gradelevel",data.data);
            _deleteGradeLevel();
        });
    };

    let _deleteGradeLevel = () => {
        $(".btnDelete").on('click', (e) => {
            var id = ($(e.target).attr("data-id") == undefined) ? $(e.target).parent().attr("data-id") : $(e.target).attr("data-id");
            var data = {
                deletegradelevel: "deletegradelevel",
                id: id
            };
            axios.post(url, data).then(data => {
                // console.log(data.data);
                alert("Successfuly Deleted");
                _gradeLevelList();
            });
            return e.preventDefault();
        });
    };

    let _saveGradelevel = () => {
        $("#form-gradelevel").submit((e)=>{
            var gradelevel = $("#gradelevel").val();
            if(gradelevel == ""){
                alert("Section is empty");
            }else{
                var data = {
                    savegradelevel : 'savegradelevel',
                    gradelevel :gradelevel
                };
                axios.post(url,data).then(data=>{
                    // console.log(data.data);
                    alert("Successfuly Saved");
                    _gradeLevelList();
                    $("#gradelevel").val("");
                });

            }
            return e.preventDefault();
        });
    };



// SECTION===============================================================================

    let _sectionList = () => {
        var data = {
            sectionList : "sectionList"
        };
        axios.post(url,data).then(data=>{
            // console.log(data.data);
            _optionTable("table-sections",data.data);
            _deleteSection();
        });
    };


    let _deleteSection = () => {
        $(".btnDelete").on('click', (e) => {
            var id = ($(e.target).attr("data-id") == undefined) ? $(e.target).parent().attr("data-id") : $(e.target).attr("data-id");
            var data = {
                deletsection: "deletsection",
                id: id
            };
            axios.post(url, data).then(data => {
                // console.log(data.data);
                alert("Successfuly Deleted");
                _sectionList();
            });
            return e.preventDefault();
        });
    };


    let _saveSection = () => {
        $("#form-section").submit((e)=>{
            var section = $("#section").val();
            if(section == ""){
                alert("Section is empty");
            }else{
                var data = {
                    savesection : 'savesection',
                    section :section
                };
                axios.post(url,data).then(data=>{
                    // console.log(data.data);
                    alert("Successfuly Saved");
                    _sectionList();
                    $("#section").val("");
                });

            }
            return e.preventDefault();
        });
    };


// YEAR ==================================================================================
    
    let _yearList = () => {
        var data = {
            yearList : "yearList"
        };
        axios.post(url,data).then(data=>{
            // console.log(data.data);
            _optionTable("table-years",data.data);
            _deleteYear();
        });
    };

    let _deleteYear = () => {
        $(".btnDelete").on('click', (e) => {
            var id = ($(e.target).attr("data-id") == undefined) ? $(e.target).parent().attr("data-id") : $(e.target).attr("data-id");
            var data = {
                deletyear: "deletyear",
                id: id
            };
            axios.post(url, data).then(data => {
                // console.log(data.data);
                alert("Successfuly Deleted");
                _yearList();
            });
            return e.preventDefault();
        });
    };


    let _saveYear = () => {
        $("#form-year").submit((e)=>{
            var year = $("#year").val();
            if(year == ""){
                alert("Year is empty");
            }else{
                var data = {
                    saveyear : 'saveyear',
                    year : year
                };
                axios.post(url,data).then(data=>{
                    console.log(data.data);
                    alert("Successfuly Saved");
                    _yearList();
                    $("#year").val("");
                });
            }
            return e.preventDefault();
        });
    }






 //CATEGORY ==============================================================================   
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

    let _optionTable = (id,data)=>{
        $("#"+id+"").DataTable({
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
                { data : 'name', sTitle : 'Name'},
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

            _yearList();
            _saveYear();
        }

    };

}();


document.addEventListener("DOMContentLoaded",()=>{
    Options.initOptions();
});