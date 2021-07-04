
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="stylesheet" href="style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="style.css">
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
form {
  display: flex;
  flex-direction: column ;
  width: 80%;
  margin: auto;
}
.rad{
    display:inline-block;
    margin-bottom:20px ;
    margin-top:20px ;
}


      </style>

  </head>
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
<h2><u>Update your Data</u></h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
 
 <span class="fst"> Name :</span><span class="errorColor"></span>
 <input type="text"  class="edit"name="name">
 <div class="rad">
 <h4>Select what to update</h4>

 <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" class="check"><span class="check"></span>
  <label for="vehicle1"> Name</label><br>
  <input type="checkbox" id="vehicle2" name="vehicle2" value="Car" class="check"><span class="check"></span>
  <label for="vehicle2">E-mail</label><br>
  <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat" class="check"><span class="check"></span>
  <label for="vehicle3"> Meassage</label><br><br>
  
</div>
  <input type="hidden" name="submited" value="Submitted Successfully"> 
<input type="submit" name="submit" class="button" value="Update">  

</form>
  </body>
  </html>

