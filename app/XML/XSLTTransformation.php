<?php

namespace App\XML;

class XSLTTransformation {
  
  public function __construct($xmlfilename, $xslfilename) {
    $xml = new \DOMDocument();
    $xml->formatOutput = true;
    $xml->preserveWhiteSpace = FALSE;
    $xml->load($xmlfilename);
    
    $xsl = new \DOMDocument();
    $xsl->load($xslfilename);
    
    $proc = new \XSLTProcessor();
    $proc->importStylesheet($xsl);
    
    echo $proc->transformToXml($xml);
  }
}
