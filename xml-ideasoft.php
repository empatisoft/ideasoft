<?php
/**
 * Onur KAYA
 * Webmaster & Web Developer
 * empatisoft@gmail.com
 * www.empatisoft.com
 * Date: 5.05.2016
 * Time: 15:23
 */

$xml = simplexml_load_file("http://www.siteadresi.com/index.php?do=catalog/output&pCode=xxxxx") or die("Error: Cannot create object");
$result = $xml->xpath("item/rootProductId[.='0']/parent::*");

$xml_yaz = new SimpleXMLElement('<xml/>');

foreach($result as $n) {
    $track = $xml_yaz->addChild('item');
    $track->addChild('id', $n->id);
    $track->addChild('Name', "<![CDATA['$n->Name']]>");
    $track->addChild('rootlabel', '<![CDATA['.$n->rootlabel.']]>');
    $track->addChild('status', $n->status);
    $track->addChild('brand', '<![CDATA['.$n->brand.']]>');
    $track->addChild('rootProductId', $n->rootProductId);
    $track->addChild('Retail-Price', '<![CDATA['.$n->{'Retail-Price'}.']]>');
    $track->addChild('price1', $n->price1);
    $track->addChild('tax', $n->tax);
    $track->addChild('currencyAbbr', $n->currencyAbbr);
    $track->addChild('rebatePercent', $n->rebatePercent);
    $track->addChild('stockAmount', $n->stockAmount);
    $track->addChild('Instock', '<![CDATA['.$n->Instock.']]>');
    $track->addChild('stockType', '<![CDATA['.$n->stockType.']]>');
    $track->addChild('Small-Image', '<![CDATA['.$n->{'Small-Image'}.']]>');
    $track->addChild('Big-Image', '<![CDATA['.$n->{'Big-Image'}.']]>');
    $track->addChild('picture3Path', '<![CDATA['.$n->picture3Path.']]>');
    $track->addChild('picture4Path', '<![CDATA['.$n->picture4Path.']]>');
    $track->addChild('picture5Path', '<![CDATA['.$n->picture5Path.']]>');
    $track->addChild('picture6Path', '<![CDATA['.$n->picture6Path.']]>');
    $track->addChild('picture', '<![CDATA['.$n->picture.']]>');
    $track->addChild('Description', "<![CDATA[".html_entity_decode($n->Description)."]]>");
    $track->addChild('fullDetails', "<![CDATA[".html_entity_decode($n->fullDetails)."]]>");
    $track->addChild('Producturl', '<![CDATA['.$n->Producturl.']]>');
    $track->addChild('Categoryname1', '<![CDATA['.$n->Categoryname1.']]>');
    $track->addChild('Categoryid1', $n->Categoryid1);
    $track->addChild('Price', $n->Price);
    $track->addChild('Discount', $n->Discount);
}

Header('Content-type: text/xml; charset=utf-8');
print($xml_yaz->asXML());