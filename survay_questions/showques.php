<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>showques</title>
    </head>
    <body>
<?php

           require 'core.inc.php';
        require 'connect.inc.php';
    require 'header.php';
    $ques_id=$_GET['ques_id'];
    
    session_start();
    // inserting data in answer table
    $query_ans="INSERT INTO ".$_SESSION['user_id']."_answers(ques_id) VALUES (".$ques_id.")";
    $query_ans_run=mysqli_query($link, $query_ans);
    
    $query="SELECT question from questions where id='".$ques_id."' ";
    $query_run= mysqli_query($link, $query);
    if($query_run)
    {
        $getdata= mysqli_fetch_assoc($query_run);
        $question=$getdata['question'];
        echo " <h4>$question</h4>";
    }
    else
    {
//        echo mysqli_error($link);
    }
    
    $query2="SELECT options,count from options where ques_id=".$ques_id." ";
    $query2_run= mysqli_query($link, $query2);
    $i=0;
    if($query2_run)
    {
      while($get_data= mysqli_fetch_assoc($query2_run))
      {
          $opt[$i]=$get_data['options'];
          $count[$i]=$get_data['count'];
          $i++;
      }
    }
    else
    {
//        echo mysqli_error($link);
    }
    
    require 'footer.php';

       ?>
        <?php
      if($query_ans_run)
      {
      ?>
        <form action="showquizz.php " method="POST">
                 <?php
      }
      ?>
            <input type="radio" name="option" id="option" value="<?php echo $opt[0]?>"> <?php echo $opt[0].'('.$count[0].')'?><br>
            <input type="radio" name="option" id="option" value="<?php echo $opt[1]?>"> <?php echo $opt[1].'('.$count[1].')'?><br>
            <input type="radio" name="option" id="option" value="<?php echo $opt[2]?>"> <?php echo $opt[2].'('.$count[2].')'?><br>
            <input type="radio" name="option" id="option" value="<?php echo $opt[3]?>"> <?php echo $opt[3].'('.$count[3].')'?><br>
           
            <?php
      if($query_ans_run)
      {
      ?>     
            <input type="submit" value="submit"/>
        </form>
             <?php
      }
      ?>
        
      <?php
      if(!$query_ans_run)
      {
          echo 'Sorry you cannot answer. <br> Either you have submitted the answer before or you are not logged in ';
         
      }
      ?>
    </body>
</html>

