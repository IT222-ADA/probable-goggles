<?php 
$i = 0;
while($i <= 5){
    echo "the number " . $i . "<br>";
    $i++;
}

echo '<br>';
for($i=0; $i <= 5; $i++){
    echo "the number " . $i . "<br>";
}

echo '<br>';    
$fruits = ['apple', 'banana', 'cherry'];
foreach($fruits as $fruit){
    echo $fruit . "<br>";
}
