<?php
require 'pdfcrowd.php';

try
{   
    // create an API client instance
    $client = new Pdfcrowd("phputvecklare", "a9e4dd9f665d8b5889c02d2766399de4");

    // convert a web page and store the generated PDF into a $pdf variable
    $pdf = $client->convertURI('http://www.dan-creations.se/delkurs3uppgift/');

    // use Print css file for output
    //$pdf = $client->usePrintMedia(True);

    // set HTTP response headers
    header("Content-Type: application/pdf");
    header("Cache-Control: no-cache");
    header("Accept-Ranges: none");
    header("Content-Disposition: attachment; filename=\"driftstatus.pdf\"");
	
    // send the generated PDF 
    echo $pdf;
}
catch(PdfcrowdException $why)
{
    echo "Pdfcrowd Error: " . $why;
}
?>