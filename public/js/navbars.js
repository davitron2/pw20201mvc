window.onload = function () {
    var currentNavItem = readCookie("navitem");
    if (currentNavItem === null) {
        $("#nav-item-1").addClass("active");
    } else {
        $("#nav-item-1").removeClass("active");
        $("#" + currentNavItem).addClass("active");    
    }
}

$("[id*=nav-item-]").click(function (event) {
    var currentNavItem = readCookie("navitem");
    
    if (currentNavItem === null)
        $("#nav-item-1").removeClass("active");
    else 
        $("#" + currentNavItem).removeClass("active");
    
    $("#" + event.currentTarget.id).addClass("active");
    document.cookie = "navitem=" + encodeURIComponent(event.currentTarget.id);
})

$("#cerrar-sesion").click(function (event) {
    document.cookie = "navitem=; max-age=0"
})

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');

    for (var i = 0; i < ca.length; i++) {

        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) {
            return decodeURIComponent(c.substring(nameEQ.length, c.length));
        }

    }

    return null;
}