<?php

	
if(isset($_POST)==true && empty($_POST)==false) 
{
	$long=$_POST['long']; 
	$lat=$_POST['lat']; 

	$expt = $_POST['expenseTitle'];
	$expAmt= $_POST['expenseAmount'];			
	$expID= $_POST['expenseID'];			
	$type='Expense';
	$obj=new $type;
	$obj->setTitleAndAmount($expt,$expAmt,$expID,$long,$lat);
	
}
class Expense
{
private $title;
private $amount;
function __construct()
{
}

public static function getTitle()
{
			

}

public static function setTitleAndAmount($expt,$expAmt,$expID,$long,$lat)
{
	$db_hostname='localhost';
$db_database='flower';
$db_username='root';
$db_password='';$author=" ";
$title=" ";
$category=" ";
$year=" ";
$isbn=" ";
$db_server=mysql_connect($db_hostname,$db_username,$db_password);

if(!$db_server)
    echo "cant connect";
    
if(!mysql_select_db("flower")) die("Database not selected ".mysql_error());
	$flag=0;$err="";$flagV=0;$flagC=0;$flagS=0; 
	$table='location'; 
				if(mysql_num_rows(mysql_query("SHOW TABLES LIKE '".$table."'"))==1) 
				{
					}	
				else 
				{
					$query = "CREATE TABLE location (
					Longitude varchar(50),Latitude varchar(50)
					)";
		
					    if(!mysql_query($query,$db_server))
					        echo "creation failed: $query<br />".mysql_error()."<br /><br />";

				}
				

					$sql1 = "UPDATE location SET Longitude='$long'";
					$sql2 = "UPDATE location SET Latitude='$lat'";
					if(!mysql_query($sql1,$db_server))
					{
						   echo "updation failed: $queryy<br />".mysql_error()."<br /><br />";
					}
					if(!mysql_query($sql2,$db_server))
					{
						   echo "updation failed: $queryy<br />".mysql_error()."<br /><br />";
					}
				

	if($expAmt > 10000000)
	{
		$err=$err. "Expense amount cannot exceed 10000000<br />";$flag=1;
	}
	if(!is_numeric($expAmt))
	{
		$err=$err. "Expense amount can only be numeric<br />";$flag=1;
	}
	if(!is_numeric($expID))
	{
		$err=$err. "Expense ID only be numeric<br />";$flag=1;
	}
	
	if(is_numeric($expt))
	{
		$err=$err. "Expense Title can only contain alphabets and digits<br />";$flag=1;
	}
				if($flag==1)
				{
					echo $err;
				}
				else
				{

				$table='expense'; 
				if(mysql_num_rows(mysql_query("SHOW TABLES LIKE '".$table."'"))==1) 
					echo "";
				else 
				{
					$query = "CREATE TABLE expense (
					Expenseamount int,Expensetitle varchar(50), expenseID INT PRIMARY KEY
					)";
		
					    if(!mysql_query($query,$db_server))
					        echo "creation failed: $query<br />".mysql_error()."<br /><br />";

				}
				

				$result = mysql_query("SELECT expenseID FROM shipExp WHERE expenseID = '$expID'");
				if(mysql_num_rows($result) == 0) {
					     echo "invalid expense ID";
				} else {
					$queryy="insert into expense values"."('$expID','$expAmt','$expt')";
					if(!mysql_query($queryy,$db_server))
					{
						   echo "insert failed: $queryy<br />".mysql_error()."<br /><br />";
					}
					    
				}


				
				}	
				
			if($flag==1)
			{
				
			}
			else
			{

					header('Location: formE.html');
					exit;
			
			}
			
			mysql_close($db_server);
			
print( '<a href="formE.html">Go back</a>' ); 
}

public static function setAmount()
{}

public static function getAmount()
{}




}

?>
