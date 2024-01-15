<?php
define("db_SERVER", "127.0.0.1");
define("db_USER","root");
define("db_PASSWORD","");
define("db_DBNAME" , "rental");

$con = mysqli_connect(db_SERVER,db_USER , db_PASSWORD, db_DBNAME)
or die ("Error " . mysqli_error($con));

?>