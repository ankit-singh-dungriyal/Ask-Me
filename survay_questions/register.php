<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>quizzbuzz</title>
    </head>
    <body>
        <?php
                require 'core.inc.php';
        require 'connect.inc.php';
        require 'header.php';
        if (isset($_POST['firstname'])&&isset($_POST['lastname'])&&isset($_POST['email'])&&isset($_POST['pass'])&&isset($_POST['confirm_pass']))
        {
            $firstname=$_POST['firstname'];
            $lastname=$_POST['lastname'];
            $email=$_POST['email'];
            $md5_pass=md5($_POST['pass']);
            $md5_confirm_pass=md5($_POST['confirm_pass']);
            require 'connect.inc.php';
         if(!empty($firstname)&&!empty($lastname)&&!empty($email)&&!empty($_POST['pass'])&&!empty($_POST['confirm_pass']))  
         {
              
            if($md5_confirm_pass!=$md5_pass)
            {
                echo '<br> confirmation password does\'nt match ';
            }  
            else
            { 
                $query_check="SELECT email FROM user_login WHERE email='".$email."'";
                $query_check_run= mysqli_query($link, $query_check);
                if(mysqli_num_rows($query_check_run)==1)
                {
                    echo ' This email already exist. Please enter another email';
                }
                else
                {
                    $query_register="INSERT INTO user_login (firstname, lastname, email, password)"
                      ." VALUES ('".mysqli_real_escape_string($link,$firstname)."','".mysqli_real_escape_string($link,$lastname)."','"
                      .mysqli_real_escape_string($link,$email)."','".mysqli_real_escape_string($link,$md5_pass). "') ";
              
                    $query_register_run= mysqli_query($link, $query_register);
                  if($query_register_run)
                  {
                      echo "<br> You have registered successfully . <a href='index.php'> click here </a> to login";
                      
                        $query_select="SELECT id,firstname FROM user_login WHERE email='".mysqli_real_escape_string($link,$email)."' AND password='".mysqli_real_escape_string($link,$md5_pass)."'";
                        $query_select_run= mysqli_query($link, $query_select);
                        if($query_select_run)
                        {
                             $mysqli_num_row= mysqli_num_rows($query_select_run);
                             if($mysqli_num_row==1)
                             {
                                  $row= mysqli_fetch_assoc($query_select_run);
                                  $id=$row['id'];
                                  $user_name=$row['firstname'];
                                  session_start();
                                  $_SESSION['user_id']=$id.'_'.$user_name;
                                  
                                  echo $_SESSION['user_id'];
                             }
                        }
                
          
                 $query2 = 'CREATE TABLE '.$_SESSION['user_id'].'_question( `S.no` INT NOT NULL AUTO_INCREMENT , `question_id` INT NOT NULL ,  `person_answered` INT NOT NULL, PRIMARY KEY (`S.no`));';
                 $query2_run= mysqli_query($link, $query2);
//                  $query3 = 'CREATE  TABLE '.$_SESSION['user_id'].'_option( `S.no` INT NOT NULL AUTO_INCREMENT , `question_id` INT NOT NULL , `option_id` INT NOT NULL , `option` VARCHAR(50) NOT NULL , PRIMARY KEY (`S.no`));';
//                 $query3_run= mysqli_query($link, $query3);
                  $query4 = 'CREATE TABLE '.$_SESSION['user_id'].'_answers( `ques_id` INT NOT NULL , `options` INT NOT NULL, PRIMARY KEY (`ques_id`));';
                 $query4_run= mysqli_query($link, $query4);
                  }
                  else
                  {
//                      echo '<br>'.mysqli_error($link);
                  }
                }  
            } 
         }
         else
         {
            echo '<br> Please fill all the fields';
         }
        }
     
        
 require 'footer.php';
        ?>
        
        <h3> Register yourself : </h3>
        <form action="register.php" method="POST">
           <br> Firstname : <input type="text" name="firstname" maxlength="15" value="<?php if(isset($firstname)){echo $firstname;} ?>"></br>
           <br> Lastname : <input type="text" name="lastname" maxlength="15" value="<?php if (isset($lastname)){echo $lastname;} ?>"></br>
           <br> Email    :<input type="text" name="email" maxlength="40"></br>
           <br> Password :<input type="text" name="pass" maxlength="50"></br>
           <br> Confirm Password :<input type="text" name="confirm_pass" maxlength="50"> </br>
           <br> <input type="submit" value="Register">
        </form>
    </body>
</html>
