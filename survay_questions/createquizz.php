<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>quizzbuzz</title>
        <script type="text/javascript">
          
        </script>
     
        <style>
            
        </style>
    </head>
    
    <body>
         
        <?php
                require 'core.inc.php';
        require 'connect.inc.php';
        require 'header.php';
        if(isset($_POST['ques'])&&isset($_POST['opt1'])&&isset($_POST['opt2'])&&isset($_POST['opt3'])&&isset($_POST['opt4']))
        {
            $ques=$_POST['ques'];
            $opt1=$_POST['opt1'];
            $opt2=$_POST['opt2'];
            $opt3=$_POST['opt3'];
            $opt4=$_POST['opt4'];
            
            if(!empty($ques)&&!empty($opt1)&&!empty($opt2)&&!empty($opt3)&&!empty($opt4))
            {
//                require 'quizzfunction.php';
//                quizz($theme, $no_ques, $quizzname, $no_option);
                   require 'connect.inc.php';
                session_start();
                echo $_SESSION['user_id'];
//                //inserting data in user_quizz table
//               
//                 $query_quizz_no="INSERT INTO quizz_numbers (user_id) VALUES ( '".mysqli_real_escape_string($link,$_SESSION['user_id'])."')";
//                $query_quizz_no_run= mysqli_query($link, $query_quizz_no);
//                if($query_quizz_no_run)
//                {
//                    echo' query run succesfully';
//                    $query_get="SELECT quizz_id , user_id FROM quizz_numbers";
//                    echo $last_quizz_id= mysqli_insert_id($link);
//                }
//                else {
//                    mysqli_errno($link);
//                }
                
                    $query_ques="INSERT INTO questions(question)
                               VALUES ('". mysqli_real_escape_string($link,$ques)."')";
                     $query_ques_run= mysqli_query($link, $query_ques);
                     if($query_ques_run)
                     $ques_id=$link->insert_id;
                     
                     $query_opt="INSERT INTO options (ques_id,options) VALUES ('".
                             mysqli_real_escape_string($link,$ques_id)."','". mysqli_real_escape_string($link,$opt1)."'),"
                             . "('". mysqli_real_escape_string($link,$ques_id)."','". mysqli_real_escape_string($link,$opt2)."'),"
                             . "('". mysqli_real_escape_string($link,$ques_id)."','". mysqli_real_escape_string($link,$opt3)."'),"
                             . "('". mysqli_real_escape_string($link,$ques_id)."','". mysqli_real_escape_string($link,$opt4)."')";
                     $query_opt_run= mysqli_query($link, $query_opt);
                     if($query_opt_run)
                     {
                         echo ' your question created successfully<br>';
                         $_SESSION['check']=0;
                         echo "to see your quizz <a href='showquizz.php'> click here </a> ";
                     }
                     else
                     {
                         echo mysqli_errno($link);
                     }
                     
                     $query2="INSERT INTO ".$_SESSION['user_id']."_question( question_id)".
                             "VALUES ('". mysqli_real_escape_string($link,$ques_id)."')";
                     $query2_run= mysqli_query($link, $query2);
                    
                    
                     if($query2_run)
                     {
//                         echo $last_id= mysqli_insert_id($link);
                         $_SESSION['quizz_id']=$last_id;
                     }
            }
                      
                 
            else 
            {
              echo 'please fill all the fields';    
            }
                
        }    
        
        else
        {
          echo 'please fill all the fields';
        }
      require 'footer.php';  
        ?>
        
        
        
        <h3>
            Ask your question.
        </h3>
        <form  action="createquizz.php" method="POST">
            <ul>
                <li><br> Enter your question :<br>
                    <input  type="text" placeholder="Enter your question" name="ques" maxlength="150">
                </li>
                
                <li>
                   <br> Enter your options:<br>
                   <input  type="text" placeholder="Option 1" name="opt1" maxlength="20"><br>
                   <input  type="text" placeholder="Option 2" name="opt2" maxlength="20"><br>
                   <input  type="text" placeholder="Option 3" name="opt3" maxlength="20"><br>
                   <input  type="text" placeholder="Option 4" name="opt4" maxlength="20"><br>
                   
                </li>
            </ul>
            <input type="submit" value="start">
        </form>
        
        
        
        
        
        
    </body>
</html>
