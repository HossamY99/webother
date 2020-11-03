<?php
session_start();
if (isset($_POST['add']))
{

$f=$_SESSION['user']."_todolist.txt";
echo $f;
  $myfile = fopen($_SESSION['user']."_todolist.txt", "a") or die("Unable to open file!");
  $txt = $_POST['item']."\n";
  fwrite($myfile, $txt);
  fclose($myfile);
  echo"here";
  header("Location: todolist.php");
  die();

}

if (isset($_POST['delete']))
{

$myfile = fopen($_SESSION['user']."_todolist.txt", "r") or die("Unable to open file!");
$i=$_POST['index'];
echo $i;
$str;
$i2=0;
$a=array();
while(!feof($myfile))
{
	$str = fgets($myfile);
  echo "str".$str;
  $str = preg_replace('#\r\n?#', "", $str);
	if($i!= $i2)
	{
    array_push($a,$str);
	}
  $i2++;
}
print_r($a);
$str = implode("", $a);
file_put_contents($_SESSION['user']."_todolist.txt", $str);
//file_put_contents("a.txt", $str);
fclose($myfile);

header("Location: todolist.php");
die();

}

 ?>
