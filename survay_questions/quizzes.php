<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>quizzes</title>

    </head>
    <body>
        <?php
        require 'connect.inc.php';
       session_start();
       $quizz_no=$_SESSION['quizz_no'];
       $user=$_SESSION['user'];
       //$inital_querry="SELECT firstname,lastname,email FROM user_login WHERE "
       
       $query="SELECT quizz_id,no_ques,no_option,theme,name_quizz FROM ".$user."_quizz WHERE quizz_no='".$quizz_no."'";
       $query_run= mysqli_query($link, $query);
       
       
       if($query_run)
       {
           $get_data= mysqli_fetch_assoc($query_run);
           $no_ques=$get_data['no_ques'];
           $no_option=$get_data['no_option'];
           $theme=$get_data['theme'];
           $name_quizz=$get_data['name_quizz'];
           $quizz_id=$get_data['quizz_id'];
           echo '<br>=> '.$theme.' - '.$name_quizz.'<br>';
           
           
           for($i=1;$i<=$no_ques;$i++)
           {
               $query2="SELECT  question_id,question FROM ".$user."_question WHERE quizz_id='".$quizz_id.
                       "' AND question_id=". mysqli_real_escape_string($link,$i);
               $query2_run= mysqli_query($link, $query2);
               if($query2_run)
               {
                   $get_data2= mysqli_fetch_assoc($query2_run);
                   $ques[$i]=$get_data2['question'];
                   
               }
               
               for($j=1;$j<=$no_option;$j++)
               {
                   $query3="SELECT  option_id,option FROM ".$user."_option WHERE quizz_id='".$quizz_id.
                           "' AND question_id=". mysqli_real_escape_string($link,$i)." AND option_id=".mysqli_real_escape_string($link,$j);
                   $query3_run= mysqli_query($link, $query3);
                   if($query3_run)
                   {
                       $get_data3= mysqli_fetch_assoc($query3_run);
                       $option[$i][$j]=$get_data3['option'];
                   }
                   echo 'hello ';
               }
               
           }
           
       }
       else
       {
           echo mysqli_error($link);
       }
       
       echo '<form action="showquizz.php" method="POST">';
       for($i=1;$i<=$no_ques;$i++)
       {
           echo $i.'. '.$ques[$i].'<br>';
           for($j=1;$j<=$no_option;$j++)
           {
               echo '<input type="radio" name='.$i.' value="'.$j.'">';
               echo $option[$i][$j].'<br>';
           }
           echo '<br>';
       }
       echo '<input type="submit" value="submit">';
       echo '</form>';
       echo ' by';
      // echo     $_SESSION['quizz_id'];
       
       $query_check="SELECT user_id FROM ".$user."_answers WHERE quizz_id=".$quizz_id;
           $query_check_run= mysqli_query($link, $query_check);
           if($query_check_run)
           {
              $mysqli_num_row= mysqli_num_rows($query_check_run);
             if($mysqli_num_row>=1)
             {
                  if(5)
              {
                  echo '123';
                  if(4)
                  {
                      echo 'check<br>';
                      for($i=1;$i<=$no_ques;$i++)
                      {
                           echo ' no';
                           $get_option=$_POST[$i];
                           echo $_SESSION['user_id'];
                           $query_update="UPDATE ".$user."_answers SET user_id='".mysqli_real_escape_string($link,$_SESSION['user_id']).
                                   "', quizz_id=".mysqli_real_escape_string($link,$_SESSION['quizz_id']).", question_id=".mysqli_real_escape_string($link,$i).
                                   ", option_id=".mysqli_real_escape_string($link,$get_option)." WHERE quizz_id=".mysqli_real_escape_string($link,$_SESSION['quizz_id']).
                                   " AND question_id=".mysqli_real_escape_string($link,$i);
                            /* @var $link type */
                           $query2_update="UPDATE ".$user."_quizz SET person_answered=1 WHERE quizz_id=".$quizz_id;
                           $query2_update_run= mysqli_query($link, $query2_update);
                           if($query2_update_run)
                               echo 'yeeeeeeeeeeeeeeees';
                             
                           $query_update_run= mysqli_query($link, $query_update);
                           if($query_update_run)
                               echo 'okay';
                           else {
                            echo mysqli_error($link);   
                           }
                           echo '<br>';
                      } 
               
                   }
                   else
                   {
                     echo 'please attempt all the questions |';
                   }
              }
              else
              {
                 echo 'error!!!!!!!';
              }
             }
              
              
              else
             {
                 
              if(5)
              {
                  echo '123';
                  if(4)
                  {
                      echo 'check<br>';
                      for($i=1;$i<=$no_ques;$i++)
                      {
                           echo ' no';
                           $get_option=$_POST[$i];
                           echo $_SESSION['user_id'];
                           $query_insert="INSERT INTO ".$user."_answers (user_id,quizz_id,question_id,option_id)"
                            /* @var $link type */
                             . "VALUES( '".mysqli_real_escape_string($link,$_SESSION['user_id'])."', ".mysqli_real_escape_string($link,$_SESSION['quizz_id']).", "
                             .mysqli_real_escape_string($link,$i).", ".mysqli_real_escape_string($link,$get_option)." )" ;
                           $query_insert_run= mysqli_query($link, $query_insert);
                           $query2_update="UPDATE ".$user."_quizz SET person_answered=1 WHERE quizz_id=".$quizz_id;
                           $query2_update_run= mysqli_query($link, $query2_update);
                           if($query2_update_run)
                               echo 'yeeeeeeeeeeeeeeees';
                           if($query_insert_run)
                               echo 'okay';
                           else {
                            echo mysqli_error($link);   
                           }
                           echo '<br>';
                      } 
               
                   }
                   else
                   {
                     echo 'please attempt all the questions |';
                   }
              }
              else
              {
                 echo 'error!!!!!!!';
              }
       
             }
             
           }
       else
                 echo mysqli_error($link);
       
     ?>
    </body>
</html>
