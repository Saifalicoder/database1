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
       height:400px;
       width:30%;
       margin-top:100px;
       padding-bottom:20px;
       padding-top:20px;
   }
body{
    background-color: indianred;
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
.button {
  border-radius: 19px;
  width: 70px;
  border: 2px solid black;
  padding: 6px;
  margin-top: 10px;
  cursor: pointer;
  transition: 0.5s;
  color: black;
  font-size: 13px;
}
.errinvi{
  margin:auto;
  margin-top: 20px;
}
body {
  background:linear-gradient(rgba(0,0,50,0.5),rgba(0,0,50,0.5)),url("bg1.jpg");
  
  background-size: cover;
}

      </style>
      <?php
     
      $name = $pass = "";  
      $nameError = $passError = "";
      $submited ="";
      $inval ="";
      $errorFlag = 0;
      $passFlag=0;
      $errorFlagname=0;
      
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
          $nameError = "*Username is mandatory";
          $errorFlag = 1;
          $errorFlagname=1;
        }
          else{
              $errorFlag=2;
              $errorFlagname=2;
            $name = test_input($_POST["name"]);
          }
        }
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["paswd"])) {
          $passError = "*Please Enter Password";
          $errorFlag=1;
        }
          else{
            $errorFlag=2;
            $pass = test_input($_POST["paswd"]);
          }
        }
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
      ?>
<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "formdb";
  
  // I am Creating a connection here with MySQL.
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  
  // I am Checking connection here. 
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    else{
  // SQL query to inserting data in students table.
  
    $sql = "SELECT * FROM user_table WHERE name = '$name'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num==1){
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
       $inval= test_input($_POST["invld"]);
    }

    }   
    else{ if($errorFlag==2 && $errorFlagname==2){
        $reg = "INSERT INTO user_table (name,password)
        VALUES ('$name', '$pass')";
         mysqli_query($conn, $reg);
         if ($_SERVER["REQUEST_METHOD"] == "POST") 
         {
         $submited = test_input($_POST["submited"]);
         }
    }
    }

    }
  ?>
  </head>
  <body>
  
</div>
  <div class="container">
<h2><u>Sign up</u></h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
 
 <span class="fst"> User Name :</span><span class="errorColor"> <?php echo $nameError;?></span></span>
  <input type="text"  class="edit"name="name">
 <span class="fst"> Password :</span><span class="errorColor"> <?php echo $passError;?></span></span>
  <input type="password"  class="edit" name="paswd">
  <a href="login.php" >Already Signed in? clickhere.</a>
  <input type="hidden" name="submited" value="Sign in Successfully!!"> 
  <input type="hidden" name="invld" value="Username already taken!!"> 
<input type="submit" name="submit" class="button" value="Sign up">  

<?php
if($errorFlag==1){
  
}
else{
 
    echo "<span class='sub'>$submited</span>"; 

// echo "<span class='err' id='cl'>ERROR!</span>";
}
if($num==1){
    echo "<span class='errorColor errinvi'>$inval</span>"; 
}
if($errorFlag==2 && $errorFlagname==2){
  header('Location:form2.php');
}
?>

</form>



  </body>
  </html>
