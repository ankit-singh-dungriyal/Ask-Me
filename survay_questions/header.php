<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Ask your questions</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" type="text/css" href="home.css"/>
    </head>
    <body>
        <?php  error_reporting(0); ?>
        <div class="home">
                
        <h1> AskMe </h1></div>
        <header class="header" id="myHeader">
             <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
            Ask your questions here
        </header>
        <nav>
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                
                  <?php  echo $_SESSION['user_id']?>
                <a href="showquizz.php?val=1">Home</a>
                <?php  if(loggedin()){?>
                <a href="createquizz.php">Ask your question</a>
                <?php }?>
                  <?php if(loggedin()){
                      ?>
                <a href="showquizz.php?val=0">See your question</a>
                <?php }?>
                <?php if(!loggedin()){?>
                <a href="register.php">Register</a>
                 <?php }?>
                <?php  if(!loggedin()){?>
                <a href="loginform.php">Login</a>
                <?php }?>
                 <?php if(loggedin()){?>
                <a href="logout.php">Logout</a>
                  <?php }?>
                
                </div>
        </nav>

