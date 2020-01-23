<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = IOFactory::load( '404-error.xlsx' );
$url = $spreadsheet->getActiveSheet('Sheet1')->rangeToArray( 'H7:H21' );

foreach ( $url as $value ) {
    $old_url = str_replace( 'https://avalonhosting.services/', '/', $value[0] );
    $array_url = explode( '/', $old_url );
    if ( $array_url[count( $array_url )-1] == '' ) {
        $new_url = $array_url[count( $array_url )-2];
    } else {
        $new_url = $array_url[count( $array_url )-1];
    }
    echo 'Redirect 301 '.str_replace( 'https://avalonhosting.services/', '/', $value[0] ) .' /'.$new_url.''.'</br>';
}