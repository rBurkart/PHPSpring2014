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
        <title>SaaS Project - Admin</title>
        <link rel="stylesheet" type="text/css" href="css/admin.css" />
    </head>
    <body>
                 
        <h1 id="logo"><span>&#x2728;</span>SaaS Project</h1>
        
        <div id="corner"><a href="?logout=1">Logout</a></div>
        
         <fieldset>
        
        <legend> Edit your Page</legend>
                
        
        <div id="preview"> <a href="index.php?page=sdafdsf" target="popup">View Page</a></div>
        
         <form name="mainform" action="#" method="post">
             <?php
        // put your code here
        
        Util::confirmAccess();
      
        
         $admin = new Admin();
                
         $adminmodelselect = new AdminModel($admin->select($_SESSION['user_id']));
         
         if ( Util::isPostRequest() ) {
             
              $adminmodel = new AdminModel(filter_input_array(INPUT_POST));
              
              if ( $admin->update($adminmodel) ) {
                  echo '<p>Page updated</p>';
              } else {
                   echo '<p>Page Could not update</p>';
              }
          }
         
        
         
        ?>
            
             <label> Title:</label> <input type="text" name="title" value="<?php echo $adminmodelselect->title; ?>" /><br />            
             <label> Theme:</label> <select name="theme">
                <option value="theme1" selected="selected">Theme 1</option>
                <option value="theme2" >Theme 2</option>
                 </select>
            <br />
            
            <label> Address:</label> <input type="text" name="address" value="<?php echo $adminmodelselect->address; ?>" /><br /> 
            <label> Phone:</label> <input type="text" name="phone" value="<?php echo $adminmodelselect->phone; ?>" /><br /> 
            <label> Email:</label> <input type="text" name="email" value="<?php echo $adminmodelselect->email; ?>" /><br /> 
            <label> About:</label><br />
            <textarea name="about" cols="50" rows="10"><?php echo $adminmodelselect->about; ?></textarea><br /> 
            
            <input type="submit" value="Submit" />
            
        </form>
        
         </fieldset>
        
    </body>
</html>

<!-- Hosting24 Analytics Code -->
<script type="text/javascript" src="http://stats.hosting24.com/count.php"></script>
<!-- End Of Analytics Code -->