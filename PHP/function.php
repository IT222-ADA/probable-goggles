<?php 

function writemsg(){
    echo "HELLO WORLD";
}

function familyname($fname,$mname,$year){
    echo $fname .' '. $mname . ' Nibato , Born in'. $year  .'<br>';
}

function setHeight($minheight = 50){
    echo "The height is : " . $minheight . '<br>';
}

function sum($x , $y){
    $z = $x + $y;
    return $z;
}

function check($num){
    $message = '';
    
    if($num > 0){
        $message = $num . " is Positive " ;
    } else {
        $message = $num . " is Negative ";
    }

    return $message;
}



?>