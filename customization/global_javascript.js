jQuery(window).load(function() {
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
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
function getURLParameter(name) {
  var value = decodeURIComponent((RegExp(name + '=' + '(.+?)(&|$)').exec(location.search) || [, ""])[1]);
  return (value !== 'null') ? value : false;
}
function checkLogin() {
  var visits = getCookie("visits");
  console.log("visits: "+visits)
  if (visits != "") {
    var loginParam = parseInt(getURLParameter('login'));
    console.log("login: "+loginParam)
    if (loginParam == 1)
    {
      document.getElementsByClassName("custom-register-button")[0].click();
      console.log("Open Popup");
    }
    else
      console.log("No action.");
  } else {
    setCookie("visits", 1, 1);
    console.log("Set cookie");
  }
}
checkLogin();
});
