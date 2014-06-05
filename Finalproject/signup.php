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
        <title>SaaS Project - Sign-up</title>
         <link rel="stylesheet" type="text/css" href="css/admin.css" />
    </head>
    <body>    
        
        <h1 id="logo"><span>&#x2728;</span>SaaS Project</h1>
        
        <fieldset>
            <legend>Signup</legend>
        <p> Already a member, <a href="login.php">Login</a></p>
         <form name="mainform" action="#" method="post">
            <?php
        // put your code here
            
            
            $signup = new Signup();
            $dataModel = new SignupModel(filter_input_array(INPUT_POST));
            $errors = array();
            
            if ( $signup->isPostRequest()  ) {
                 
                if ( $signup->entryIsValid() ) {
                    echo '<div class="success">All fields are good</div>';
                } else {
                  
                  $errors = $signup->getErrors();
                }
            }
              
            if ( Util::isPostRequest() ) {
                if ( $signup->entryIsValid() ) {
              $id = $signup->save($dataModel);
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
             
            <label for="website">Web Site:</label> 
            <input id="website" type="text" name="website" maxlength="30" value="<?php echo $dataModel->getWebsite(); ?>" /> <br />
            <?php echo $signup->getErrorMessageHTML('website', $errors); ?>
            
            <label for="email">Email:</label> 
            <input id="email" type="text" name="email" value="<?php echo $dataModel->getEmail(); ?>" /> <br />
            <?php echo $signup->getErrorMessageHTML('email', $errors); ?>
            
            <label for="password">Password:</label> 
            <input id="password" type="password" name="password" /> <br />
            <?php echo $signup->getErrorMessageHTML('password', $errors); ?>
               
            <input type="submit" value="Submit" />
                        
        </form>
        </fieldset>
    </body>
</html>

<!-- Hosting24 Analytics Code -->
<script type="text/javascript" src="http://stats.hosting24.com/count.php"></script>
<!-- End Of Analytics Code -->