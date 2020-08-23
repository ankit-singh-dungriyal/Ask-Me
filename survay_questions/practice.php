<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>quizzbuzz</title>
    </head>
    <body>
        <?php
        for($i=1;$i<=3;$i++)
        {
            $t=$_POST[$i];
            echo $t;
        }
       // echo $_POST['yes'];
       // echo $_POST['no'];
        
        ?>
        
        <form action="practice.php" method="POST">
            11111111111
            <input type="radio" name="1" value="1">hello
            <input type="radio" name="1" value="2">byelaw
            <br/>222222222222
            <input type="radio" name="2" value="1">a
            <input type="radio" name="2" value="2">b
            <br/>333333333333
            <input type="radio" name="3" value="1">c
            <input type="radio" name="3" value="2">d
            
            <input type="submit" value="submit">
        </form>
    </body>
</html>
