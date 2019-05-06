<?php
/*
 * Document     : barcode_helper.php
 * Path		    : /THSW/application/helpers/
 * Create on    : Dec 3, 2016 17:54:13
 * Author       
 *    Name      : Hamzah Tossaro
 *    Email     : hamzah.tossaro@gmail.com
 *    Messenger : shield_zha
 *    Site      : http://tossaro.com/
 * Description  : 
 */

require_once('barcode_class/BCGFontFile.php');
require_once('barcode_class/BCGColor.php');
require_once('barcode_class/BCGDrawing.php');

function barcodeGs1128($ssc='',$gtin='',$prodDate='',$internal='',$serialize=''){
    //type barcode
    require_once('barcode_class/BCGgs1128.barcode.php');

    //data
    $array=[]; $string='';
    if(!empty($gtin)){ $array[]='('.$ssc.')'.$gtin; $string.=$ssc.$gtin; }
    if(!empty($prodDate)){ $array[]='(11)'.$prodDate; $string.='11'.$prodDate; }
    if(!empty($internal)){ $array[]='(91)'.$internal; $string.='91'.$internal; }
    if(!empty($serialize)){ $array[]='(21)'.$serialize; $string.='21'.$serialize; }
    // return $string;
    // The arguments are R, G, and B for color.
    $colorFront = new BCGColor(0, 0, 0);
    $colorBack = new BCGColor(255, 255, 255);
    
    //option
    $code = new BCGgs1128();
    $code->setScale(2);
    $code->setThickness(30);
    $code->setForegroundColor($colorFront);
    $code->setBackgroundColor($colorBack);
    $code->parse($array);
    
    //creating barcode
    $path = './'.config_item('barcode_path').$string.'.png';
    $drawing = new BCGDrawing($path,$colorBack);
    $drawing->setBarcode($code);
    $drawing->draw();
    // header('Content-Type: image/png');
    $drawing->finish(BCGDrawing::IMG_FORMAT_PNG);
    return $string;
}
