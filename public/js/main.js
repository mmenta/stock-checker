// load scripts
var cachebuster = Math.floor((Math.random() * 100000000) + 1);
head.load(
    // load all dependencies
    "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js",
    function() {
        // global
        head.load('/js/global/global.js?'+cachebuster);

        // page specific
        var home = document.getElementById("home");
        if ( home ) {
            head.load("/views/pages/home/js/local.js?"+cachebuster);
        }
    }
);