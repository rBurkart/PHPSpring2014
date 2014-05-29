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
        <link href="css/style.css" media="all" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php
        $signup = new Signup();
        $errors = array();
        $states = new States();
        $states_list = $states->statesList();

        if ( $signup->isPostRequest()  ) {
                 
                if ( $signup->entryIsValid() ) {
                    echo '<div class="success">All fields are good</div>';
                } else {
                  
                  $errors = $signup->getErrors();
                }
            }
            
            if ( count($errors) ) {
                echo '<ul class="error">';
                foreach ($errors as $value) {
                    echo '<li>',$value,'</li>';
                }
                echo '</ul>';
            }

        ?>
        
        <form name="mainform" action="#" method="post"> 
           <fieldset>
		<legend>Sign-up Form:</legend>
                
                <label for="username">Username:</label>
                <input id="username" type="text" name="username" /> <br /> 
                <?php echo $signup->getErrorMessageHTML('username', $errors); ?>
                               
                
                <label for="state_list">State:</label>
                <select name="state">  
                <option selected="selected">Select your state...</option>  
                <?php 
                foreach($states_list as $key => $value) {
                    echo '<option value="'.$key.'">'.$value.'</option>'; 
                }  ?> </select>   <br />
                

                <label for="comment">Comment:</label>
                <textarea name="comment" rows="5" cols="50"></textarea>  <br />
                <?php echo $signup->getErrorMessageHTML('comment', $errors); ?>

                <input type="submit" value="Submit" />
                
                <?php
                date_default_timezone_set('America/New_York');
                $today = date("m/d/y");
                //print_r($_POST);
                if (!empty($_POST))
                {
                echo '<br />', $_POST['username'], '<br />';
                echo $_POST['state'], '<br />';     
                echo $_POST['comment'], '<br />';      
                echo "<div>Date: $today </div>";
                }
                ?>
                
            </fieldset>
        </form>
    </body>
</html>
