document.addEventListener('DOMContentLoaded', function() {
    var allowButton = document.querySelector('.allow-button');
    var declineButton = document.querySelector('.decline-button');

    allowButton.addEventListener('click', function() {
        // Enable cookies
        document.cookie = "cookiesAccepted=true; path=/";
        document.querySelector('.cookieconsent_msg').style.display = 'none';
        document.querySelector('.backtotop').classList.add('cookieaccepted');

    });

    declineButton.addEventListener('click', function() {
        // Handle cookie rejection without setting any cookies
        // Optionally clear existing cookies
        clearCookies();
        document.querySelector('.cookieconsent_msg').style.display = 'none';
        localStorage.setItem('cookieConsent', 'declined');
        document.querySelector('.backtotop').classList.add('cookieaccepted');
    });

    // Check cookie settings on page load
    var cookiesAccepted = getCookie("cookiesAccepted");
    if (cookiesAccepted === "true") {
        // User has accepted cookies
        document.querySelector('.cookieconsent_msg').style.display = 'none';
        document.querySelector('.backtotop').classList.add('cookieaccepted');
    } else {
        clearCookies();
    }
    //hide if declined and clear cookies
    var cookieConsent = localStorage.getItem('cookieConsent');
    if (cookieConsent === 'declined') {
        clearCookies();
        document.querySelector('.cookieconsent_msg').style.display = 'none';
        document.querySelector('.backtotop').classList.add('cookieaccepted');
    }
    // If cookiesAccepted is false or undefined, do not set cookies
});

function getCookie(name) {
    var value = "; " + document.cookie;
    var parts = value.split("; " + name + "=");
    if (parts.length === 2) return parts.pop().split(";").shift();
}

function clearCookies() {
    var cookies = document.cookie.split(";");
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";
    }
}
