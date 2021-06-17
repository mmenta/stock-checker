<?php 
// Routing Functions ==================
function parseUrl($currentPage) {
    if (strpos($currentPage, 'tm_source') !== false ) {
        $currentPageArray = explode("?", $currentPage);
        $currentPage = $currentPageArray[0];
    }

    // parse url
    $parsedUrl = explode('/', $currentPage);
    foreach( $parsedUrl as $parsed ) {
        if ( trim($parsed) != '' ) {
            $url[] = strtok(trim(strtolower($parsed)), "?");
        }
    }

    if ( empty($url) ) {
        $url[] = 'home';
    }

    return $url;
}

function getPage($url) {
    if ( isset($url[2]) ) {
        $page = $url[2];
    } else if ( isset($url[1]) ) {
        $page = 'home';
    } else {
        $page = $url[0];
    }

    return $page;
}

// Used to include file with local variable scope
function includeFile($file, $data) {
    extract($data);
    include($file);
}

?>