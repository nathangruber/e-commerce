<?php
if(isset($_REQUEST['get_val']))
{
   $term = $_REQUEST['get_val'];
   $find = mysql_query( "select * from language where MATCH(name,description) AGAINST( '$term' )" );
   while($row = mysql_fetch_array($find))
   {
     echo "<a href='fetch.php?findval=".$row['name']."'>";
     echo $row['name']."<br>";
     echo $row['description'];
     echo "</a>";
   }

   exit;
}

if(isset($_REQUEST['findval']))
{
   $findval = $_REQUEST['findval'];
   $find = mysql_query( "select * from language where name = '$findval' " );
   while($row = mysql_fetch_array($find))
   {
     echo $row['name']."<br>";
     echo $row['description'];
     echo "</a>";
   }
   
   exit;
}
?>