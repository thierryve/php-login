$(document).ready(function() {

    setInterval(function(){checkSesame();}, 3000);

    function checkSesame() {
        $.getJSON( "/login/ajaxCheckSesame", function(data){
            if(data.loggedin == true) {
                window.location = data.redirecturl;
            }
        });
    }
});
