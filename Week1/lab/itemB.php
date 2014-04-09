<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       
    <!--array_count_values-->
    <?php
    $array = array(1, "hello", 1, "world", "hello");
    print_r(array_count_values($array));
    ?>
    
    <!--array_flip-->
    <?php
    $trans = array("a" => 1, "b" => 1, "c" => 2);
    $trans = array_flip($trans);
    print_r($trans);
    ?>

    <!--array_key_exists--> 
    <?php
    $a=array("Volvo"=>"XC90","BMW"=>"X5");
    if (array_key_exists("Volvo",$a))
       {
       echo "Key exists!";
       }
    else
       {
       echo "Key does not exist!";
       }
    ?>

    <!--array_map-->
    <?php
    function myfunction($v)
    {
      return($v*$v);
    }

    $a=array(1,2,3,4,5);
    print_r(array_map("myfunction",$a));
    ?> 
    <!--array_rand-->
    <?php
    $input = array("Neo", "Morpheus", "Trinity", "Cypher", "Tank");
    $rand_keys = array_rand($input, 2);
    echo $input[$rand_keys[0]] . "\n";
    echo $input[$rand_keys[1]] . "\n";
    ?>

    <!--array_push-->   
    <?php
    $stack = array("orange", "banana");
    array_push($stack, "apple", "raspberry");
    print_r($stack);
    ?>

    <!--in_array--> 
    <?php
    $os = array("Mac", "NT", "Irix", "Linux");
    if (in_array("Irix", $os)) {
        echo "Got Irix";
    }
    if (in_array("mac", $os)) {
        echo "Got mac";
    }
    ?>

    <!--shuffle-->
    <?php
    $numbers = range(1, 20);
    shuffle($numbers);
    foreach ($numbers as $number) {
        echo "$number ";
    }
    ?>

    <!--count/sizeof-->  
    <?php
    $cars=array("Volvo","BMW","Toyota");
    echo count($cars);
    ?>

    <!--sort-->
    <?php
    $fruits = array("lemon", "orange", "banana", "apple");
    sort($fruits);
    foreach ($fruits as $key => $val) {
        echo "fruits[" . $key . "] = " . $val . "\n";
    }
    ?>

    </body>
</html>
