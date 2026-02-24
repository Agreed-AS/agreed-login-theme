document.addEventListener("DOMContentLoaded", function() {
    var form = document.getElementById('loginform');
    var nav = document.getElementById('nav');
    var back = document.getElementById('backtoblog');
    var lang = document.getElementById('language-switcher');

    // Move the links inside the form element at the end
    if (form && nav) form.appendChild(nav);
    if (form && back) form.appendChild(back);
    if (form && lang) form.appendChild(lang);
});

document.addEventListener("DOMContentLoaded", function() {
    var form = document.getElementById('lostpasswordform');
    var nav = document.getElementById('nav');
    var back = document.getElementById('backtoblog');
    var lang = document.getElementById('language-switcher');

    // Move the links inside the form element at the end
    if (form && nav) form.appendChild(nav);
    if (form && back) form.appendChild(back);
    if (form && lang) form.appendChild(lang);
});