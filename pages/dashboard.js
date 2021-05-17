"use strict";


var Dashboard = function(){
    var url = "controller/dashboard.ctrl.php";

    let _initDashboard = ()=>{
        console.log("Dashboard");
    };

    let _countingDash = () => {
        var data = {
            gcounting : 'getcounting'
        };
        axios.post(url,data).then(data=>{
            var dashboardCount = data.data;
            $("#d_bbooks").html(data.data[0]);
            $("#d_rbooks").html(data.data[1]);
            $("#d_students").html(data.data[2]);
            $("#d_users").html(data.data[3]);
        });
    };

    return {
        initDash : ()=>{
            _initDashboard();
            _countingDash();
        }
    }
}();


document.addEventListener("DOMContentLoaded",()=>{
    Dashboard.initDash();
});


