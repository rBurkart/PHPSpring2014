<?php include 'dependency.php'; ?>
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
        <?php
        // put your code here
        
        if ( !isset($_SESSION['validcode']) || !$_SESSION['validcode'] ) {
           Util::redirect('index');
        }
        $address = new AddressBook();
        
        $addressResults = $address->read();
        
        ?>
        
       
        
        <h1>View Address Book</h1>
        
        <?php
        echo '<table border="1">'; 
            echo '<tr><th>Index</th><th>Address</th>';
            echo '<th>City</th><th>State</th><th>ZIP</th><th>name</th><th>Command</th></tr>';
            foreach ($addressResults as $key => $value) {
                echo '<tr>';
                 echo '<td>', $key ,'</td>';
                 
                 echo '<td>', $value['address'] ,'</td>';
                 echo '<td>', $value['city'] ,'</td>';
                 echo '<td>', $value['state'] ,'</td>';          
                 echo '<td>', $value['zip'] ,'</td>';          
                 echo '<td>', $value['name'] ,'</td>';          
                 //echo '<td><a href="updateaddress.php?id=', $value['id'] ,'">Edit</a> </td>';         
                 echo '<td><form name="mainform" action="updateaddress.php" method="get"><input name="id" type="hidden" value="', $value['id'] ,'" /><input type="submit" value="Edit" /></form> </td>';     
                echo '</tr>';
            }
            echo '</table>';
        ?>
        
        <a href="create.php">Create</a>
        
    </body>
</html>
