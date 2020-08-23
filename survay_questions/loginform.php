<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>logingform</title>
    </head>
    <body>
        <?php
        require 'core.inc.php';
        require 'connect.inc.php';
           require 'header.php';
        if(isset($_POST['email'])&&isset($_POST['password']))
        {
            $email=$_POST['email'];
            $md5_password= md5($_POST['password']);
            if(!empty($email)&&!empty($_POST['password']))
            {
                require 'connect.inc.php';
                $query="SELECT id,firstname FROM user_login WHERE email='".mysqli_real_escape_string($link,$email)."' AND password='".mysqli_real_escape_string($link,$md5_password)."'";
                $query_run= mysqli_query($link, $query);
                if($query_run)
                {
                    $mysqli_num_row= mysqli_num_rows($query_run);
                    if($mysqli_num_row==1)
                    {
                        $row= mysqli_fetch_assoc($query_run);
                        $id=$row['id'];
                        $user_name=$row['firstname'];
                        $_SESSION['user_id']=$id.'_'.$user_name;
                        header('Location:index.php');
                        
                    }
                    else
                    {
                        echo 'you are not registered';
                        echo '<a href="register.php"> click here </a> to register';
                    }
                }
            }
            else
            {
                echo'Please fill the all fields';
            }
        }
        require 'footer.php';
        ?>
        <form action="<?php echo $current_file ?>" method="POST">
           <br> Email : <input type="text" placeholder="Enter your email" name="email" maxlength="40"></br>
           <br> Password : <input type="password" placeholder="password" name="password" maxlength="50"></br>
           <br> <input type="submit" value="Login">
        </form>
    </body>
</html>
