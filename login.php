<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <style>
          .container{
       
              width:30%;
              margin-top:100px;
              padding-bottom:20px;
              padding-top:20px;
          }
          *{
    margin:0px;
    padding:0px;
    box-sizing: border-box;
}
.container{
       height:300px;
       width:30%;
       margin-top:100px;
       padding-bottom:20px;
       padding-top:20px;
   }
   body {
  background:linear-gradient(rgba(0,0,50,0.5),rgba(0,0,50,0.5)),url("bg1.jpg");
  
  background-size: cover;
}

.navbar{
    display: flex;
    align-items: center;
    justify-content: center;
    position: sticky;
    top: 0;
    background-color: black;
    cursor: pointer;
 border-radius: 10px;
 
    
}
.nav-list{
    width:100%;

    display: flex;
    align-items: center;
}
ul{
  margin:auto;
    display: flex;
}
.nav-list li{
 
    border-radius: 78px;
    flex-direction: row;
    list-style: none;
    padding: 10px 20px;}

.nav-list li a{
     border:hidden;
    border: 2px solid rgb(0, 0, 0);
    border-radius: 25px;
    color: rgb(255, 255, 255);
    text-decoration: none;
    color: white;
    font-size: 20px;
    padding: 3px 10px;
    font-family:'ubuntu';

}
.nav-list li:hover{
    /* border:1px solid aqua; */
 
    transition: 0.7s;

}
.nav-list li a:hover{
    transition: 0.7s;
 
    border: 2px solid aqua;
    border-radius: 25px;
    color: aqua;
}
.search{
    margin-left: 700px;
    /* text-align: center; */
    width: 190px;
    border-radius: 19px;
    border: 2px solid black;
    padding: 5px;
}
.btn-small{
    margin: 10px;
    background-color: aqua;
    padding: 5px;
    border: 1px solid black;
    border-radius: 9px;
    cursor: pointer;
}
.btn-small:hover{
  border-color:aqua;
   background-color: black;
   color: aqua;
    transition: 0.5s;
}
a{
    margin:auto;
    margin-top:10px;
    margin-bottom:10px;
    text-decoration:none;
}
a:hover{
    color:black;

}

      </style>

  </head>
  <body>
  
</div>
  <div class="container">
<h2><u>Login</u></h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
 
 <span class="fst"> Name :</span><span class="errorColor"></span>
  <input type="text"  class="edit"name="name">
 <span class="fst"> Password :</span><span class="errorColor"></span>
  <input type="password"  class="edit" name="pass">
  <a href="signup.php" >Not signed up? clickhere.</a>
  <input type="hidden" name="submited" value="Submitted Successfully"> 
<input type="submit" name="submit" class="button" value="Login">  

</form>
  </body>
  </html>
