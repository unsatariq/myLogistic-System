<?php
$long=$_POST['long']; 
$lat=$_POST['lat']; 

	
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
if($long=="" || $lat=="")
{
}

else
{
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


}					
?> 