$('input[type=submit]').prop('disabled', true);

$('select[name="game_experience"]').click(function() {
    validate();
});

$('select[name="players"]').click(function() {
    validate();
});

function validate(){
    var valid = true;
   
    if(!$('select[name="game_experience"] option:selected').val() != "") {
       valid = false;
    }
    if(!$('select[name="players"] option:selected').val() != "") {
       valid = false;
    }
    $(':input[type=submit]').prop('disabled', !valid)
}

// function to set a given theme/color-scheme
function setTheme(themeName) {
    localStorage.setItem('theme', themeName);
    $('head link#site-theme').attr('href', 'css/' + themeName + '.css');
    $('body img#logo-image').attr('src', '/resources/vicetrail-logo-' + themeName + '.svg');
}
// function to toggle between light and dark theme
function toggleTheme() {
   if (localStorage.getItem('theme') === 'darkstyles'){
       setTheme('lightstyles');
   } else {
       setTheme('darkstyles');
   }
}
// Immediately invoked function to set the theme on initial load
(function () {
   if (localStorage.getItem('theme') === 'darkstyles') {
       setTheme('darkstyles');
   } else {
       setTheme('lightstyles');
   }
})();