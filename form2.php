<html>
<head>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet"></head>
<style>
  body {
  background:linear-gradient(rgba(0,0,50,0.5),rgba(0,0,50,0.5)),url("bg1.jpg");
  
  background-size: cover;
}

*{
    margin:0px;
    padding:0px;
    box-sizing: border-box;
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
body {
  background:linear-gradient(rgba(0,0,50,0.5),rgba(0,0,50,0.5)),url("bg1.jpg");
  
  background-size: cover;
}
h2{
  margin-top:20px;
}
</style>
<body>  
<?php
// all required variables defined here
$nameError = $emailError = "";
$name = $email = $message = $submited = "";
$errorFlag = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameError = "*Name is mandatory";
    $errorFlag = 1;
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameError = "*Only letters allowed";
      $errorFlag = 1;
    }
  }
  
  if (empty($_POST["email"])) {
    $emailError = "*Email is mandatory";
    $errorFlag = 1;
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailError = "*Invalid email format";
      $errorFlag = 1;
    }
  }
    // if($nameError=="*Only letters allowed" || $emailError=="*Invalid email format"){
      
    //   die('Invalid Data Please Refresh and fill again !');
    // }
  if (empty($_POST["message"])) {
    $message = "";
  } else {
    $message = test_input($_POST["message"]);
  }
 
  $submited = test_input($_POST["submited"]);
}

function test_input($data) {
  $data = trim($data);   
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

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
  $sql = "INSERT INTO inquiry_table (name, email, message)
  VALUES ('$name', '$email', '$message')";
//   if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message']))
//   {
//   die('Please fill all required fields!');
// }
 (mysqli_query($conn, $sql)); 
 }   
  mysqli_close($conn);
  
?>

<!-- Creating a Form -->

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
<h2><u>Database Form</u></h2>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
 
 <span class="fst"> Name<span class="errorColor">*</span> :</span><span class="errorColor"> <?php echo $nameError;?></span>
  <input type="text"  class="edit"name="name">
  
  <br>
  
 <span class="fst"> E-mail<span class="errorColor">*</span> :</span><span class="errorColor"> <?php echo $emailError;?></span>
  <input type="text" class="edit" name="email">
  
  <br>
  
 <span class="fst"> Message :</span> <textarea name="message" class="edit" rows="6" cols="24"></textarea>
  <br>
  
<input type="hidden" name="submited" value="Submitted Successfully"> 
<input type="submit" name="submit" class="button" value="Submit">  
<!-- <?php
echo $emailError;
echo $nameError; ?> -->
</form>
<?php
if($errorFlag==1){
  echo  "<span class='err' id='cl'>ERROR!</span>";
}
else{
  echo "<span class='sub'>$submited</span>"; 
}
?>

</div>
</body>
</html>
