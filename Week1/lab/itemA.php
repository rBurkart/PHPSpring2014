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
        <!--Explode-->
        <?php
        $pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
        $pieces = explode(" ", $pizza);
        echo "<div>$pieces[2]</div>"; // piece1
        ?>
        
        <!-- sha1-->
        <?php
        $hash = "Hello";
        echo '<div>',sha1($hash),'</div>'; // hash
        ?>

        <!--htmlentities-->
        <?php
        $ent = "A 'quote' is <b>bold</b>";

        // Outputs: A 'quote' is &lt;b&gt;bold&lt;/b&gt;
        echo htmlentities($ent);
        ?>
        
        <!--md5-->
        <?php
        $str = 'apple';

        if (md5($str) === '1f3870be274f6c49b3e31a0c6728957f') {
            echo "<div>Would you like a green or red apple?</div>";
        }
        ?>
        
        <!--strip_tags-->
        <?php
        $text = '<p>Test paragraph.</p><!-- Comment --> <a href="#fragment">Other text</a>';
        echo strip_tags($text);
        echo "\n";

        // Allow <p> and <a>
        echo strip_tags($text, '<p><a>');
        ?>
        
        <!--trim-->
        <?php
        function trim_value(&$value) 
        { 
            $value = trim($value); 
        }

        $fruit = array('apple','banana ', ' cranberry ');
        var_dump($fruit);

        array_walk($fruit, 'trim_value');
        var_dump($fruit);
        ?>
        
        <!--ucwords-->
        <?php
        echo ucwords("hello world");
        ?> 
        
        <!--strlen-->
        <?php
        $str = 'abcdef';
        echo strlen($str); // 6

        $str = ' ab cd ';
        echo strlen($str); // 7
        ?>
        
        <!--str_shuffle-->   
        <?php
        $str = 'abcdef';
        $shuffled = str_shuffle($str);

        // This will echo something like: bfdaec
        echo $shuffled;
        ?>
        
        <!-- ord-->       
        <?php
        $str = "\n";
        if (ord($str) == 10) {
            echo "The first character of \$str is a line feed.\n";
        }
        ?>

        
    </body>
</html>
