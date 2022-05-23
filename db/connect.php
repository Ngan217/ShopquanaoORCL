<?php
/*$con = mysqli_connect("localhost","root","","webbanquanao");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
      // Change character set to utf8
    mysqli_set_charset($con,"utf8");
  */

//myconnect
/*
$con=oci_connect('hung','hunghung123','localhost/xe','UTF8');
//check
if(!$con){
  echo"failer to connect oracle".oci_error($con);
}
*/
// else echo"connect scussed";

$con = oci_connect('NGAN217', 'ngan', 'localhost/ORCLShop');
//check
if (!$con) {
    echo 'failer to connect oracle'.oci_error($con);
}

 ?> 
