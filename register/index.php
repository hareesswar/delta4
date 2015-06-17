<?php
$rollno=$name=$email=$dept=$year="";
$rollerr=$nameerr=$emailerr=$depterr=$yearerr=$passerr=$photoerr="";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
 $success=true;
 if (empty($_POST["name"])) 
  {
     $nameerr= "Name is required";    
     $success=false;
  } 
  else
  {
   $name=$_POST["name"];
  if(!preg_match("/^[a-zA-Z ]*$/",$name)) 
  {
    $nameerr = "Only letters and white space allowed"; 
    $success=false;
  }
  }
  if (empty($_POST["dept"]))
  {
     $depterr="Dept is required";
     $success=false;
  }
  else
  {
  $dept=$_POST["dept"];
  if (!preg_match("/^[a-zA-Z ]*$/",$dept))
  {
    $depterr = "Only letters and white space allowed"; 
   $success=false;
  }
  }
    if(empty($_POST["rollno"]))
  {
   $rollerr="Roll No. is required";
   $success=false;
  }
  else
  {
   $rollno=$_POST["rollno"];	  
  if(!is_numeric($rollno))
  {
  $rollerr="Roll no should be number";
  $success=false;
  }
  }
  if (empty($_POST["email"]))
  {
     $emailerr = "Email is required";
  } 
  else
  {
   $email=$_POST["email"];
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	 {
     $emailerr = "Invalid email format"; 
     }
   }
     if(empty($_POST["year"]))
  {
   $yearerr="year is required";
   $success=false;
  }
  else
  {
  $year=$_POST["year"];
  if(!is_numeric($year))
  {
  $yearerr="Year should be number";
  $success=false;
  }
   if(strlen($year)!=4) {
   $yeareer="The year entered was not 4 digits long";
   $success=false;}
  }
  if(empty($_POST["password"]))
   {
	$passerr="Password is required";
	$success=false;
   }
   if(empty($_FILES["photo"]["name"]))
   {
	$photoerr="Photo is required";
	$success=false;
   }
   else
   {
	if ((!($_FILES['photo']['size']> 0)) && !(($_FILES['photo']['size'] <=500000)))   
     echo "photo size must be less than 500kb";
    else
		$photo=$_FILES["photo"]["name"];
   }
     
 if($success)
 {
 require 'register.php';
 exit();
 }
}
?>
<html>
<head>
<meta charset=utf-8 />
<title>register</title>
<style>
 form label 
 {
  display: inline-block;
  width: 225px;
  font-weight: bold;
 }
</style>
</head>
<body>

 <h2>PLEASE FILL THE FOLLOWING</h2>
  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="rollno">Roll No.:</label>
    <input type="text" id="rollno" name="rollno" value="<?php echo $rollno;?>" /><?php echo $rollerr;?><br />
    <label for="name">Name:</label>
	<input type="text" id="name" name="name" value="<?php echo $name;?>" /><?php echo $nameerr;?><br />
    <label for="dept">Department</label>
    <input type="text" id="dept" name="dept" value="<?php echo $dept;?>" /><?php echo $depterr;?><br />
	<label for="email">e-mail address</label>
    <input type="text" id="email" name="email" value="<?php echo $email;?>" /><?php echo $emailerr;?><br />
    <label for="year">Year of study</label>
    <input type="text" id="year" name="year" value="<?php echo $year;?>" /><?php echo $yearerr;?><br />
    <label for="password">Password</label>
    <input type="password" id="password" name="password" value="" /><?php echo $passerr;?><br />
    <label for="photo">Photo:</label>
	<input type="file" id="photo" name="photo"  /><?php echo $photoerr;?><br />
	<input type="submit" value="submit" name="submit" />
  </form>
</body>
</html>