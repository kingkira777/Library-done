window.app = {



    // SET FORM DATA
    addDataForm : (form,values)=>{
        if(values.length === 0){
            for(var i=0;i<form.length;i++){
            var item = form.item(i);
                if(item.type === 'checkbox' || item.type === 'radio'){
                    item.checked = (values[key] === 'true') ? true : false;
                }else{
                    item.value = (values[key] === undefined || values[key] === 'false')? '' : values[key];
                }
            }
        }else{
        for(var i=0;i<form.length;i++){
            var item = form.item(i);
                for (var key in values){
                    if(item.name === key){
                        if(item.type === 'checkbox' || item.type === 'radio'){
                            item.checked = (values[key] === 'true') ? true : false;
                        }else{
                            item.value = (values[key] === undefined || values[key] === 'false')? '' : values[key];
                        }
                    }
                }
            }
        }
    },


    // SERIALIZE FORM
    serializeForm : (data)=>{
        var pusVal = {};
        for(var i=0;i<data.length;i++){
            if(data[i].type === 'checkbox'){
                pusVal[data[i].name]  = (data[i].checked === true)? 'true' : 'false';
            }else if(data[i].type === 'radio'){
                pusVal[data[i].name]  = (data[i].checked === true)? 'true' : 'false';
            }else{
                pusVal[data[i].name] = data[i].value;
            }
        }
        return pusVal;
    }


};