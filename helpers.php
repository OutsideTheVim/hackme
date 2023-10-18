<?php

function displayTemplate($template)
{
    $path = "views";

    return include($path . "/" . $template);
}

function GetJsonContent($file)
{
    if (file_exists('../database/' . $file)) return json_decode(file_get_contents('../database/' . $file));

    echo "ERROR: json content not found" . PHP_EOL;
    return false;
}

function AddJsonContent($file, $content)
{
    $jcontent = GetJsonContent($file);

    $string = json_encode(array_merge($jcontent, [$content]), JSON_PRETTY_PRINT);
    $jsonFile = fopen('../database/' . $file, 'w');

    fwrite($jsonFile, $string);
    fclose($jsonFile);

    return true;
}

function DeleteJsonContent($uniqueID) {
    // voor emails enz later te verwijderen
}

function error()
{
    displayTemplate('error.html');
    header("HTTP/1.1 404 Not Found");
    exit(0);
}
