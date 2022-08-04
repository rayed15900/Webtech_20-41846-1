<?php 
$con=mysqli_connect('localhost', 'root', '', 'restaurant_owner');
$Food=mysqli_query($con, "select * from foodmenu");

$xml = new XMLWriter();
$xml->openURI("php://output");
$xml->startDocument();
$xml->setIndent(true);
$xml->startElement('foods');
    while($row=mysqli_fetch_assoc($Food))
    {
        $xml->startElement('food');
            $xml->startElement('ID');
            $xml->writeRaw($row['ID']);
            $xml->endElement();
            $xml->startElement('name');
            $xml->writeRaw($row['name']);
            $xml->endElement();
            $xml->startElement('cat');
            $xml->writeRaw($row['cat']);
            $xml->endElement();
            $xml->startElement('price');
            $xml->writeRaw($row['price']);
            $xml->endElement();
        $xml->endElement();
    }
$xml->endElement();
header('Content-type: text/xml');
$xml->flush();
?>