
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
			$flag=0;
				$cid = $_POST['commodityID'];
				$d = $_POST['day'];
				$m = $_POST['month'];
			$flag=0;
		if($cid)
				{

		
		if(!is_numeric($cid))
		{
			$err=$err. "Commodity ID can only be numeric<br />";$flag=1;
			echo $err;
			print( '<a href="form2.html">Go back</a>' ); 
		}
		}
		if($flag==1)
		{
		}
		else
		{
				if(!($d) && !($m))
				{

					echo '<h4> Commodity ID wise Record </h4> ';
					$exists=0;
					$result = mysql_query("SELECT * FROM commodity WHERE commodityID = '$cid'");
					echo '<h2> Commodity </h2> ';
					echo '<table border="4" cellpadding="0" cellspacing="8">';
					echo '<tr><th>Commodity ID</th><th>Commodity Type</th><th>Commodity Quantity</th><th>Commodity Weight</th></tr>';
					while($row = mysql_fetch_row($result,MYSQL_ASSOC))
					{
						$exists=1;
						echo '<tr>';
					    	echo '<td style="text-align:center">',$row['commodityID'],'</td>';
						echo '<td style="text-align:center">',$row['commodityType'],'</td>';
						echo '<td style="text-align:center">',$row['commodityQuantity'],'</td>';
						echo '<td style="text-align:center">',$row['commodityWeight'],'</td>';
						echo '</tr>';
				        } 
					
					if($exists==0)
					{
						echo "Record does not exists!.<br />";
						print( '<a href="form2.html">Go back</a>' ); 
					}
					else
					{
								echo '<h2> Shipment </h2> ';
					$result = mysql_query("SELECT * FROM shipment WHERE commodityID = '$cid'");
					
					echo '<tr><th>Shipment ID</th><th>Income Amount</th><th>Income Title</th><th>Day</th><th>Month</th></tr>';
					while($row = mysql_fetch_row($result,MYSQL_ASSOC))
					{
					    	echo '<tr>';
					    	echo '<td style="text-align:center">',$row['shipID'],'</td>';
						echo '<td style="text-align:center">',$row['incomeAmount'],'</td>';
						echo '<td style="text-align:center">',$row['incomeTitle'],'</td>';
						echo '<td style="text-align:center">',$row['Day'],'</td>';
						echo '<td style="text-align:center">',$row['month'],'</td>';
						echo '</tr>';
				        } 
					echo '</table><br />';
					print( '<a href="form2.html">Go back</a>' ); 
					}
					
				}	
				
		}
				if($d)
				{

					
					echo '<h4> Day-wise Record </h4> ';
					$comID;$existss=0;
						echo '<h2> Shipment </h2> ';
					$result = mysql_query("SELECT * FROM shipment WHERE Day = '$d'");
					echo '<table border="1" cellpadding="0" cellspacing="8" class="db-table">';
					echo '<tr><th>Shipment ID</th><th>Income Amount</th><th>Income Title</th><th>Day</th><th>Month</th></tr>';
					while($row = mysql_fetch_row($result,MYSQL_ASSOC))
					{
						$existss=1;
						echo '<tr>';
					    	echo '<td style="text-align:center">',$row['shipID'],'</td>';
						echo '<td style="text-align:center">',$row['incomeAmount'],'</td>';
						echo '<td style="text-align:center">',$row['incomeTitle'],'</td>';
						echo '<td style="text-align:center">',$row['Day'],'</td>';
						echo '<td style="text-align:center">',$row['month'],'</td>';
						echo '</tr>';
						$comID=$row['commodityID'];
				        } 
					echo '</table><br />';
					if($existss==0)
					{
						echo "Record does not exists!.<br />";
						print( '<a href="form2.html">Go back</a>' ); 
					}
					else
					{
					$result = mysql_query("SELECT * FROM commodity WHERE commodityID = '$comId'");
										echo '<h2> Commodity </h2> ';
					echo '<table border="1" cellpadding="2" cellspacing="8" class="db-table">';
					echo '<tr><th>Commodity ID</th><th>Commodity Type</th><th>Commodity Quantity</th><th>Commodity Weight</th></tr>';
					while($row = mysql_fetch_row($result,MYSQL_ASSOC))
					{
						echo '<tr>';
					    	echo '<td style="text-align:center">',$row['commodityID'],'</td>';
						echo '<td style="text-align:center">',$row['commodityType'],'</td>';
						echo '<td style="text-align:center">',$row['commodityQuantity'],'</td>';
						echo '<td style="text-align:center">',$row['commodityWeight'],'</td>';
						echo '</tr>';
				        } 
					echo '</table><br />';
					$d="";
					print( '<a href="form2.html">Go back</a>' ); 
					}
				}
				
				if($m)
				{

					
					echo '<h4> Month wise Record </h4> ';
					$comID;$exists2=0;
										echo '<h2> Shipment </h2> ';
					echo '<table border="1" cellpadding="0" cellspacing="8" class="db-table">';
					echo '<tr><th>Shipment ID</th><th>Income Amount</th><th>Income Title</th><th>Day</th><th>Month</th></tr>';
					$result = mysql_query("SELECT * FROM shipment WHERE month = '$m'");
					while($row = mysql_fetch_row($result,MYSQL_ASSOC))
					{
						$exists2=1;
					    	echo '<tr>';
					    	echo '<td style="text-align:center">',$row['shipID'],'</td>';
						echo '<td style="text-align:center">',$row['incomeAmount'],'</td>';
						echo '<td style="text-align:center">',$row['incomeTitle'],'</td>';
						echo '<td style="text-align:center">',$row['Day'],'</td>';
						echo '<td style="text-align:center">',$row['month'],'</td>';
						echo '</tr>';
						$comID=$row['commodityID'];
				        } 
					echo '</table><br />';
					if($exists2==0)
					{
						echo "Record does not exists!.<br />";
						print( '<a href="form2.html">Go back</a>' ); 
					}
					else
					{
					$result = mysql_query("SELECT * FROM commodity WHERE commodityID = '$comId'");
										echo '<h2> Commodity </h2> ';
					echo '<table border="1" cellpadding="2" cellspacing="8" class="db-table">';
					echo '<tr><th>Commodity ID</th><th>Commodity Type</th><th>Commodity Quantity</th><th>Commodity Weight</th></tr>';
					while($row = mysql_fetch_row($result,MYSQL_ASSOC))
					{
						echo '<tr>';
					    	echo '<td style="text-align:center">',$row['commodityID'],'</td>';
						echo '<td style="text-align:center">',$row['commodityType'],'</td>';
						echo '<td style="text-align:center">',$row['commodityQuantity'],'</td>';
						echo '<td style="text-align:center">',$row['commodityWeight'],'</td>';
						echo '</tr>';
				        } 
					echo '</table><br />';
					$m="";
					print( '<a href="form2.html">Go back</a>' ); 
					}	
				}


							
			?>
		
			<?php print( '<a href="form2.html">Go back</a>' ); ?>
">

            	<?php endif; ?>
			<div class="clear"></div>
        </form>
	
    </body>
	
</html>





