<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', false);
ini_set('auto_detect_line_endings', false);

$school = strtoupper($_GET['school']);
$inputFilename = 'https://docs.anglianlearning.org/csv/calendars/'.$school.'.csv';
// Open csv to read
$inputFile  = fopen($inputFilename, 'rt');

//Check file exists
if (!$inputFile){
    error_log('No file found for calendar');
    die('No file found for calendar');
}
//File is not a resource
if (!is_resource($inputFile)) :
    error_log('File is not a resource');
    die('File is not a resource');
else :
// Get the headers of the file
$headers = fgetcsv($inputFile);

// Create a new dom document with pretty formatting
$doc  = new DomDocument();
$doc->formatOutput   = true;

// Add a root node to the document
$root = $doc->createElement('events');
$root = $doc->appendChild($root);

// Loop through each row creating a <row> node with the correct data
while (($row = fgetcsv($inputFile)) !== FALSE)
{
    $container = $doc->createElement('event');
     foreach($headers as $i => $column){
         $child = $doc->createElement($column);
         $child = $container->appendChild($child);
         $value = $doc->createTextNode($row[$i]);
         $value = $child->appendChild($value);
     }

    $root->appendChild($container);
}

$strxml = $doc->saveXML();
header('Content-type: text/xml');

echo $strxml;
endif;
?>