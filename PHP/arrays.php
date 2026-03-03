<?php

// diffent face of array
$cars = array("BMW", "honda" , "Ferrari");
$toys = ["cars", "gun" , "truck"];
$ages = ["peter"=>'26', "john" => '25' , "carlo"=> '30'];
$ages['kevin'] = '41';
$family = [
    "nibato" => [
        "john",
        "carlo",
        "kevin"
    ],
    "doe" => [
        "mary",
        "benny",
        "julius"
    ]
];

echo ' CARS'.'<br>';
echo $cars[0].'<br>';
echo $cars[1].'<br>';
echo $cars[2].'<br>';

echo '<br>'.'TOYS'.'<br>';
echo $toys[0].'<br>';
echo $toys[1].'<br>';
echo $toys[2].'<br>';

echo '<br>'.'Ages'.'<br>';
echo $ages["peter"].'<br>';
echo $ages["john"].'<br>';
echo $ages["carlo"].'<br>';
echo $ages["kevin"].'<br>';

echo '<br>'.'foreach'.'<br>';
foreach( $cars as $car ){
    echo $car. "<br>";
}
echo '<br>';
$i = 0;
while($i < count($toys)){
    echo $toys[$i]. "<br>";
    $i++;
}

echo '<br>';
echo "Is " . $family['nibato'][0] . " a part of the NIBATO family";

echo '<br> <br>';

foreach($family as $surname => $member){
    echo $surname .'<br>';
    foreach($member as $name){
    echo "Is " . $name. " a part of the NIBATO family <br>";
    }
    echo '<br>';
}

?>