<?php
$server   = "dbm2.itc.virginia.edu";
$database = "secure_login";
$username = "afrotc2";
$password = "rage11)plows";

if (extension_loaded('pdo_mysql'))
  echo "PDO loaded";
else {
  echo "PDO NOT loaded";
  // try{
    dl('pdo_mysql.so');
  // }
  // catch(Exception $ex){
  //   echo $ex;
  // }
  if (extension_loaded('pdo_mysql')) {
    echo "Now it's loaded.";
  } else 
    echo "PDO *still* not loaded...";
}
//$mysqlConnection = mysql_connect($server, $username, $password);
//if (!$mysqlConnection)
//{
//  echo "Please try later.";
//}
//else
//{
////mysql_select_db($database, $mysqlConnection);
//  echo "Welp, looks like it works...";
//}

//echo "\n";

try{
    $dbh = new pdo( 'mysql:host='.$server.';dbname='.$database,
                    $username,
                    $password,
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    die(json_encode(array('outcome' => true)));
    echo "PDO works!";
}
catch(PDOException $ex){
    //die(json_encode(array('outcome' => false, 'message' => 'PDO sucks.')));
    echo $ex;
}
?>
