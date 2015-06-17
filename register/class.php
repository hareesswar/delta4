<?php
    require 'constants.php';
    class Main
    {
      private $db;
      public function __construct($database)
	  {
        $this->db=$database;
      }
      function check()
      {
	   echo "check successful";	  
      }
	  public function insert()
	  {
		$rollno=$_POST["rollno"];
		$name=$_POST["name"];
		$dept=$_POST["dept"];
		$email=$_POST["email"];
		$year=$_POST["year"];
		$password=$_POST["password"];
		$photo=$_FILES["photo"]["name"];
		$regno=time();
		$qry=$this->db->prepare('INSERT INTO details (rollno,name,dept,email,year,password,photo,regno) VALUES (?,?,?,?,?,?,?,?)');
       	try{
		$qry->execute(array($rollno,$name,$dept,$email,$year,$password,$photo,$regno));
		echo "THANKS FOR REGISTERING WITH THE FOLL. DETAILS: <br>";
		echo "Roll No:".$rollno."<br>";
		echo "Name:".$name."<br>";
		echo "Dept:".$dept."<br>";
		echo "e-mail:".$email."<br>";
		echo "Year:".$year."<br>";
		echo "Registeration no.:".$regno."<br>";
		echo "Profile pic:<br>";
		$target = UPLOADPATH . $photo;
		move_uploaded_file($_FILES['photo']['tmp_name'], $target);
		echo '<img src="' . UPLOADPATH . $photo . '" alt="image" />';
		}
		catch(PDOException $e)
		{
		echo "error inserting";
		return false;
		}
	  }
    }
?>