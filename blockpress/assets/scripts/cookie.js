function createCookie(name,value,days,path) {
    var expires;
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        expires = "; expires="+date.toGMTString();
    }
    else expires = "";
    document.cookie = name+"="+value+expires+"; path="+path;
}
/**
 * Read cookie
 * @param string name
 * @returns {*}
 */
function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
var cookieMessage = document.getElementById('cookie-message');

if (typeof(cookieMessage) != 'undefined' && cookieMessage != null){

    var cookie = readCookie('seen-cookie-message');
    if (cookie != null && cookie == 'yes') {
        cookieMessage.style.display = 'none';
    } else {
        cookieMessage.style.display = 'block';
    }
    // Set/update cookie
    var cookieExpiry = cookieMessage.getAttribute('data-cookie-expiry');
    if (cookieExpiry == null) {
        cookieExpiry = 30;
    }
    var cookiePath = cookieMessage.getAttribute('data-cookie-path');
    if (cookiePath == null) {
        cookiePath = "/";
    }
    $(document).on('click','.cookie .btn',function(e){
         createCookie('seen-cookie-message','yes',cookieExpiry,cookiePath);
          //cookieMessage.style.display = 'none';
        $(cookieMessage).fadeOut(350);
    });
}