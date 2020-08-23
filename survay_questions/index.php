<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>quizzbuzz</title>
        <script type="text/javascript">
           
            
        </script>
        
    </head>
    <body>
        <?php
        require 'core.inc.php';
        require 'connect.inc.php';
        
//        echo file_get_contents("header.html");
require 'header.php';
        if(loggedin())
        {
            echo 'You are loggedin<br>';
            echo 'Ask any question for a <a href="createquizz.php">survey</a> <br>';
            
            echo "<a href='showquizz.php?val=1'>see all the questions </a>";
            
            
        }
        else
        {
            echo "<a href='showquizz.php?val=1'>see all the questions </a>";
          
           
            
            
        }
//        echo file_get_contents("footer.html");
require 'footer.php';
        ?>
        
    </body>
</html>
