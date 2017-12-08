
function createCookie(uid,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = "user_unique_id=" + uid + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
        c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
    }
    }
    return "";
}

function checkCookie() {
    var user_uid=getCookie("user_unique_id");
    if (user_uid == "") {
        createCookie(generateUUID(),30);
    } 
    
}

function generateUUID() {
    var d = new Date().getTime();
    var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
        var r = (d + Math.random()*16)%16 | 0;
        d = Math.floor(d/16);
        return (c=='x' ? r : (r&0x3|0x8)).toString(16);
    });
    return uuid;
}

function toogleAndDisplayUID(){
     //alert(getCookie("user_unique_id"))
    var span_uid = document.getElementById("display_uid_span");
    var span_uid_class=span_uid.className;
    
    if (span_uid_class === "dispIDSpanHidden") {
        span_uid.className = "dispIDSpan";
        span_uid.textContent=getCookie("user_unique_id");
    } else {
        span_uid.className = "dispIDSpanHidden";
        
    }
       
}
