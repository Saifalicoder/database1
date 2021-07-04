
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
.errinvi{
  margin:auto;
  margin-top: 20px;
}
body {
  background:linear-gradient(rgba(0,0,50,0.5),rgba(0,0,50,0.5)),url("bg1.jpg");
  
  background-size: cover;
}

      </style>
  </head>

 
<?php
 $nameError = $emailError = "";

 $name = $email = $yrname= $message  = $yremail=$yrmessage="";
 global $inval;
 $checked ="";
 $errorFlag = 0;
 $invldFlag=0;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameError = "*Name is mandatory";
    $errorFlag = 1;
  } else {
    $name = test_input($_POST["name"]);}
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameError = "*Only letters allowed";
      $errorFlag = 1;
    }
    $inval = test_input($_POST[("invld")]);
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
    
  // SQL query to inserting data in students table.
  if ($errorFlag != 1){
    
    
  $sql = "SELECT * FROM inquiry_table WHERE name = '$name'";
  $result = mysqli_query($conn, $sql);

  
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $yrname=$row["name"];
        $yremail=$row["email"];
        $yrmessage=$row["message"];
        $invldFlag=1;
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
        $checked = test_input($_POST["submited"]);
        }
    } 
    
  } 
  
  
}   


  $conn->close();
  ?>
  
  <body>
  <div class="navbar">
    <div class="nav-list">
        <ul>
        <li><a href="form2.php">Submit here</a></li>
            <li><a href="check.php">Check Data</a></li>
            <li><a href="update.php">Update</a></li>
            <li><a href="delete.php">Delete</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
        <!-- <div class=""><input type="text" placeholder="Search Here!!" class="search"></div>
        <div class="btn"><input type="button" value="Search"class="btn-small"></div> -->
    </div>
</div>
  <div class="container">
<h2>Check your Data</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
 
 <span class="fst"> Name :</span><span class="errorColor"></span>
  <input type="text"  class="edit" name="name">
  <input type="hidden" name="submited" value="Data found  "> 
  <input type="hidden" name="invld" value="Data not found"> 
<input type="submit" name="submit" class="button" value="Check">  
<?php
if($errorFlag==1){
  echo  "<span class='err' id='cl'>ERROR!</span>";
}
if($invldFlag==1){
  echo "<span class='sub'>$checked</span>"; 
  echo "Name : $yrname<br><br>";
  echo "E-mail : $yremail<br><br>";
  echo "Message :$yrmessage<br><br>";
   
}else{
echo "<span class='errorColor errinvi'>$inval</span>"; 
// echo "<span class='err' id='cl'>ERROR!</span>";
}
?>


</form>
  </body>
  </html>

