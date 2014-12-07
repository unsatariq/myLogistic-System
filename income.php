<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
	<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <title>Dynamic Form Processing with PHP | Tech Stream</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="css/default.css"/>
    </head>
    <body>    
        <form action="" class="register">
			<?php 
$flag=0;$err="";$flagV=0;$flagC=0;$flagS=0; $err1="";
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
			if(isset($_POST)==true && empty($_POST)==false): 
				$iamt = $_POST['incomeAmount'];
				if($iamt > 10000000)
				{
					$err=$err. "Income amount cannot exceed 10000000<br />";$flag=1;
				}
				if(!is_numeric($iamt))
				{
					$err=$err. "Income amount can only be numeric<br />";$flag=1;
				}	

				$ititle = $_POST['incomeTitle'];
			        if(is_numeric($ititle))
				{
					$err=$err. "Income Title can only contain alphabets and digits<br />";$flag=1;
				}
				

				$shipID = $_POST['shipmentID'];
				if(!is_numeric($shipID))
				{
					$err=$err. "Shipment ID can only be numeric<br />";$flag=1;
				}
				

				$tID = $_POST['trackingID'];
				if(!is_numeric($tID))
				{
					$err=$err. "Tracking ID can only be numeric<br />";$flag=1;
				}
				$cid=$_POST['commodityID'];
				if(!is_numeric($cid))
				{
					$err=$err. "Commodity ID can only be numeric<br />";$flag=1;
				}
				$ctype = $_POST['commodityType'];
				if(is_numeric($ctype))
				{
				
					$err=$err. "Commodity Type can only contain alphabets and digits<br />";$flag=1;	    
				}
				$cquantity = $_POST['commodityQuantity'];
				if(!is_numeric($cquantity))
				{
					$err=$err. "Commodity Quantity can only be numeric<br />";$flag=1;
				}
				
				$cweight = $_POST['commodityWeight'];
				if(!is_numeric($cweight))
				{
					$err=$err. "Commodity Weight can only be numeric<br />";$flag=1;
				}
				
				
				$day=$_POST['day'];
				$month=$_POST['month'];
				$expID=$_POST['expenseID'];
				
				if($flag==1)
				{
					echo $err;
				}
				else
				{
				$table='vehicle'; 
				if(mysql_num_rows(mysql_query("SHOW TABLES LIKE '".$table."'"))==1) 
					echo "";
				else 
				{
					$query = "CREATE TABLE vehicle (
					tID INT PRIMARY KEY, shipID int
					)";
		
					    if(!mysql_query($query,$db_server))
					        echo "creation failed: $query<br />".mysql_error()."<br /><br />";

				}
				$query="insert into vehicle values"."('$tID','$shipID')";
				if(!mysql_query($query,$db_server))
				{
					   $err1=$err1. "insert failed: $query<br />".mysql_error()."<br /><br 						/>";$flagV=1;
				}
					
										
				
				$table='commodity'; 
				if(mysql_num_rows(mysql_query("SHOW TABLES LIKE '".$table."'"))==1) 
					echo "";
				else 
				{
					$query = "CREATE TABLE commodity (
					commodityID INT PRIMARY KEY,commodityType varchar(50), commodityQuantity double, commodityWeight double
					)";
		
					    if(!mysql_query($query,$db_server))
					        echo "creation failed: $query<br />".mysql_error()."<br /><br />";

				}

				$queryy="insert into commodity values"."('$cid','$ctype','$cquantity','$cweight')";
				if(!mysql_query($queryy,$db_server))
				{
					   echo "insert failed: $queryy<br />".mysql_error()."<br /><br />";
				}
				
				$table='shipExp'; 
				if(mysql_num_rows(mysql_query("SHOW TABLES LIKE '".$table."'"))==1) 
					echo "";
				else 
				{
					$query = "CREATE TABLE shipExp (
					shipmentID INT PRIMARY KEY,expenseID int
					)";
		
					    if(!mysql_query($query,$db_server))
					        echo "creation failed: $query<br />".mysql_error()."<br /><br />";

				}

				$query="insert into shipExp values"."('$shipID','$expID')";
				if(!mysql_query($query,$db_server))
				{
					   echo "insert failed: $queryy<br />".mysql_error()."<br /><br />";
				}
				
				$table='shipment'; 
				if(mysql_num_rows(mysql_query("SHOW TABLES LIKE '".$table."'"))==1) 
					echo "";
				else 
				{
					$query = "CREATE TABLE shipment (
					shipID INT PRIMARY KEY, incomeAmount double, incomeTitle varchar(50),  Day varchar(50), month varchar(50), commodityID int
					)";
		
					    if(!mysql_query($query,$db_server))
					        echo "creation failed: $query<br />".mysql_error()."<br /><br />";

				}

				$queryy="insert into shipment values"."('$shipID','$iamt' ,'$ititle' ,'$day' ,'$month','$cid')";
				if(!mysql_query($queryy,$db_server))
				{
					   echo "insert failed: $queryy<br />".mysql_error()."<br /><br />";
				}
					
				}				
			if($flag==1)
			{
				
			}
			else
			{

					header('Location: formI.html');
					exit;
			
			}
		
			mysql_close($db_server);
			
			
			?>
		
			<?php print( '<a href="formI.html">Go back</a>' ); ?>
">

            	<?php endif; ?>
			<div class="clear"></div>
        </form>
	
    </body>
	
</html>





