<?php

function randomUUID(){
    $id='';
    for( $i= 0; $i< 31; $i++ )
        $id =$id.''.rand(0, 9);
    return $id;
}


?>