<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title> Search for contact</title>
</head>
<body bgcolor = "#CCFFFF" text = "#660099">
<h1> Search for Contacts </h1>
<p> Go to <a href="menu.html"> Menu </a></p>
 
<?php
$self = $_SERVER['PHP_SELF'];
?>
 <form action="<?=$self?>" method="GET">
 Enter Name : <input type="text" name="name" />
 <input type="hidden" name="search" />
 
 <input type="submit" value = "Search" />
 </form>
<?php
if(isset($_GET['search'])) { 
$dbh = mysqli_connect("localhost", "root", "")or die(mysqli_error());
 mysqli_select_db('contactDB') or die(mysqli_error());
 
 $nme=$_GET["name"];
 echo "<p>Searching for $nme...</p>";
 $query=mysql_query("SELECT * FROM contact WHERE name like '%$nme%'");
 
 if(mysqli_num_rows($query) > 0) {
?>
 <table border="1" style="border-collapse:collapse; color:#404040">
 <tr>
<th>Name</th> 
<th>Address Line 1</th> 
<th>Address Line 2</th> 
 <th>E-mail</th>
 </tr>
<?php
 while ($row=mysqli_fetch_array($query))
 {
 echo "<tr> <td>$row[0]</td> <td>$row[1]</td>";
 echo "<td>$row[2]</td> <td>$row[3]</td> </tr>";
 }
 } else 
echo "<p><b> No matches found... </b></p>";
 mysql_free_result($row);
 mysql_close($dbh);
} 
?>
 </table>
 </body>
</html>
