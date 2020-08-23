<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>quizzfunction</title>
    </head>
    <body>
        <?php

        session_start();
        require 'connect.inc.php';
            $query_select="SELECT quizz_id,no_ques,no_option FROM ".$_SESSION['user_id']."_quizz WHERE quizz_id='".$_SESSION['quizz_id']."'";
                         $query_select_run= mysqli_query($link, $query_select);
                         if($query_select_run)
                       {
                            
                           $rowdata= mysqli_fetch_assoc($query_select_run);
                          // $quizz_id=$rowdata;
                           $no_ques=$rowdata['no_ques'];
                           $no_option=$rowdata['no_option'];
                          // session_start();
                           //echo $_SESSION['quizz_id']=$quizz_id;
                       }
                  echo   $check_isseet=  question_isset($no_ques, $no_option);
                  echo $no_ques.'<br>';
                  echo $no_option;
         
         if(4)
         {
             
             if(2)
             {
                
                 echo '<br>........................'.$_SESSION['quizz_id'];
               
                 require 'testing.php';
                require 'connect.inc.php';
                for($i=1;$i<=$no_ques;$i++)
                {
                   $query="INSERT INTO ".$_SESSION['user_id']."_question (quizz_id,question_id,question)"
                        /* @var $link type */
                        . "VALUES(".mysqli_real_escape_string($link,$_SESSION['quizz_id']).", ".mysqli_real_escape_string($link,$i).",'"
                           .mysqli_real_escape_string($link,$ques[$i])."' )" ;
                  $query_run= mysqli_query($link, $query);
                  if($query_run)
                  {
                       echo 'ok, ';
                  }
                  else
                     echo mysqli_error ($link);
                }
                
                for($i=1;$i<=$no_ques;$i++)
                {
                    for($j=1;$j<=$no_option;$j++)
                    {
                        $query2="INSERT INTO ".$_SESSION['user_id']."_option (quizz_id,question_id,option_id,option)"
                            . "VALUES(".mysqli_real_escape_string($link,$_SESSION['quizz_id']).", ".mysqli_real_escape_string($link,$i).","
                            .mysqli_real_escape_string($link,$j).",'".mysqli_real_escape_string($link,$option[$i][$j]). "')" ;
                        $query2_run= mysqli_query($link, $query2);
                        if($query2_run)
                         {
                            echo 'ok2, ';
                         }
                         else
                             echo '<br>'.mysqli_error ($link);
                    }
                }
                        

                echo'<br> your quizz is created successfully . <a href="showquizz.php">click herer</a> to visit and answer it';
                $query_quizz_no="INSERT INTO quizz_numbers (user_id, quizz_id) VALUES ( '".mysqli_real_escape_string($link,$_SESSION['user_id']).
                        "',".mysqli_real_escape_string($link,$_SESSION['quizz_id']).")";
                $query_quizz_no_run= mysqli_query($link, $query_quizz_no);
                if($query_quizz_no_run)
                    echo' query run succesfully';
             }
             else
             {
                 echo '<br> Please fill all the fields.';
             }
         }
        
         else
                {
                    echo '!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!';
                }      
        
     //  question_isset($no_ques, $no_option); 
 function question_isset($no_ques,$no_option)
{
$count=0;
for($i=1;$i<=$no_ques;$i++)
{
    echo "(isset(\$_POST['".$i."ques'])) &&";
  
   
    for($j=1;$j<=$no_option;$j++)
    {
        echo "(isset(\$_POST['".$i.$j."opt']))";
         if($count<(($no_ques*$no_option)-1))
      echo " &&";
         $count++;

    }
}


}
function question_notempty($no_ques,$no_option)
{
$count=0;
for($i=1;$i<=$no_ques;$i++)
{
    echo "(!empty(\$_POST['".$i."ques'])) && ";
  
   
    for($j=1;$j<=$no_option;$j++)
    {
        echo "(!empty(\$_POST['".$i.$j."opt']))";
         if($count<(($no_ques*$no_option)-1))
      echo " && ";
         $count++;

    }
}

  

}

        
        
        ?>
    </body>
</html>
