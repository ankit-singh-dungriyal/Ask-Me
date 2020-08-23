<?php
echo $no_option;
echo $no_ques;
    for($i=1;$i<=$no_ques;$i++)
                {
                   $ques[$i]= $_POST[$i.'ques'];
             
                for($j=1;$j<=$no_option;$j++)
                {
                  $option[$i][$j]= $_POST[$i.$j.'opt'];
                }
               
                        
            }
            
            
             for($i=1;$i<=$no_ques;$i++)
                {
                   echo $ques[$i].'<br>';
             
                for($j=1;$j<=$no_option;$j++)
                {
                 echo $option[$i][$j].' , ';
                }
                 echo'<br>';
                        
            }
            
            
            
//question_notempty(3, 4);    
