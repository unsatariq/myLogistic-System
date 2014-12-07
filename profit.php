
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
			$flag=0;$expense;$income;
				$Sid = $_POST['shipmentID'];
				
			$flag=0;
				if($Sid)
				{

		
					if(!is_numeric($Sid))
					{
						$err=$err. "Shipment ID can only be numeric<br />";$flag=1;
						echo $err;
						print( '<a href="profit.html">Go back</a>' ); 
					}
				}
		if($flag==1)
		{
		}
		else
		{
					$exists=0;
					$result = mysql_query("SELECT * FROM shipExp WHERE shipmentID = '$Sid'");
					
					while($row = mysql_fetch_row($result,MYSQL_ASSOC))
					{
						$exists=1;
						$shipID=$row['shipmentID'];
						$expID=$row['expenseID'];
						echo '</tr>';
				        } 
					
					if($exists==0)
					{
						echo "Record does not exists!.<br />";
					}
					else
					{
					
						$result = mysql_query("SELECT * FROM shipment WHERE shipID = '$shipID'");
					
					
						while($row = mysql_fetch_row($result,MYSQL_ASSOC))
						{
					    
							$income=$row['incomeAmount'];
					        } 
					
						
						
						$result = mysql_query("SELECT * FROM expense WHERE expenseID = '$expID'");
					
					
						while($row = mysql_fetch_row($result,MYSQL_ASSOC))
						{
					    
							$expense=$row['Expenseamount'];
					        } 
						$profit=$income-$expense;
						if($profit>0)
							echo "<h1>Profit: $profit</h1>"."<br />";
						else
							echo "<h1>Loss: $profit</h1>"."<br />";
						
					}
					
					
				
		}
		

							
			?>
		
			<?php print( '<a href="profit.html">Go back</a>' ); ?>
">

            	<?php endif; ?>
			<div class="clear"></div>
        </form>
	
    </body>
	
</html>





