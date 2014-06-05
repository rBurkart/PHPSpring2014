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
        <title>SaaS Project - Login</title>
         <link rel="stylesheet" type="text/css" href="css/admin.css" />
    </head>
    <body>
                
        <h1 id="logo"><span>&#x2728;</span>SaaS Project</h1>
        
        <fieldset>
            <legend>Login</legend>
            <p> Not a member, <a href="signup.php">Signup</a></p>

                        
            <form name="mainform" action="#" method="post">
                <?php
        // put your code here
                
            $login = new Login();
            $dataModel = new SignupModel(filter_input_array(INPUT_POST));
            $errors = array();
           
            
            if ( Util::isPostRequest() ) {
                if ( $login->entryIsValid() ) {
              $_SESSION['user_id'] = $login->checkLogin($dataModel);
                    if($_SESSION['user_id'] > 0) {
                        header('Location: admin.php');
                    }
                    else{
                        $errors['login invalid'] = 'login Invalid';
                        
                    }
                } else {
                    $errors = $login->getErrors();
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
<br />
                <label>Email:</label> <input type="text" name="email" value="<?php echo $dataModel->getEmail(); ?>" /> <br />
                <?php echo $login->getErrorMessageHTML('email', $errors); ?>
                <label>Password:</label> <input type="password" name="password" /> <br />
                <?php echo $login->getErrorMessageHTML('password', $errors); ?>

                <input type="submit" value="Submit" />

            </form>
        </fieldset>
    </body>
</html>

<!-- Hosting24 Analytics Code -->
<script type="text/javascript" src="http://stats.hosting24.com/count.php"></script>
<!-- End Of Analytics Code -->