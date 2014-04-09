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
        
            <!--<table>
                    <tr> 
                        <td>1</td>

                    </tr>
                    <tr style="background-color: silver;"> 
                        <td>1</td>

                    </tr>
                
            </table>-->
        
            <?php
            date_default_timezone_set('America/New_York');
            $today = date("m/d/y g:i a");
            
              for ($i = 1; $i <= 100; $i++) {
                if(($i % 2) == 1)
                {
                    echo "<div>Row: $i - Date: $today </div>";
                }
                else
                {
                    echo "<div style=\"background-color: silver\">Row: $i - Date: $today</div>";
                }
               }
            ?>
    </body>
</html>
