<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>showquizz</title>
    </head>
    <body>
        <?php
       require 'connect.inc.php';
       require 'core.inc.php';
       require 'header.php';
//       echo $_SESSION['check'];
       
       if($_GET['val'])
           $query="SELECT id,question FROM questions";
       else
            $query="SELECT id,question FROM questions where id in(select question_id from ".$_SESSION['user_id']."_question) ";
       $query_run= mysqli_query($link, $query);
       if($query_run)
       {
           
           $count=0;
//           echo "query ran successfully<br>";
          while( $get_data= mysqli_fetch_assoc($query_run))
          {
              $ques_id=$get_data['id'];
              echo ++$count." . <a href='showques.php?ques_id=$ques_id'>".$get_data["question"]."</a>";
              echo '<br>';
          }
           
       }
       else
       {
           echo "Error : ".mysqli_error($link);
       }
       
       
       if(isset($_POST['option']))
       { $opt=$_POST['option'];
          if(loggedin())
          {
              
           $query_opt="UPDATE options SET count= count+1 WHERE options='".$opt."'";
           if(mysqli_query($link, $query_opt))
           {
//               echo" asf";
           }
          }
          
       }
       
     require 'footer.php';
       ?>
    </body>
</html>
