<?php





$user=$_POST['name'];
$pass=$_POST['password'];




if (empty($user)||empty($pass))
{
  echo "empty";
  echo $user;
  echo $pass;
  header("Location: start.php?empty=1");
  die();
}




$regex="/^[a-z][a-z\d]{2,7}$/";
//$regexx="/^\d.*[^.[a-z][\d]]$/";
$regexx="/\d.{5,11}(?<![a-zA-Z]\d)$/";
if (preg_match($regex,$_POST['name']) &&  (preg_match($regexx,$_POST['password'])))
{




$user=$_POST['name'];
$pass=$_POST['password'];


$u=find_value($user,$pass);
echo " u: ".$u;




if ($u==NULL)
{


$file = 'users.txt';
// The new person to add to the file
$fileuser = $user.":".$pass."\n";

// Write the contents to the file,
// using the FILE_APPEND flag to append the content to the end of the file
// and the LOCK_EX flag to prevent anyone else writing to the file at the same time
file_put_contents($file, $fileuser, FILE_APPEND | LOCK_EX);


}


session_start();

$_SESSION['user']=$user;

setcookie('Date', date("Y-m-d h:i:sa"), time() + (86400 * 7), "/");
header("Location: todolist.php");
die();




    }
    else{
      header("Location: start.php?regex=0");
      die();

    }




    function find_value($input,$pass) {
    // $input is the word being supplied by the user

    $handle = @fopen("users.txt", "r");
    if ($handle) {
      while (!feof($handle)) {

        //$entry_array = explode(":",fgets($handle));
        $entry_array=array_map('trim', explode(':', fgets($handle)));



        if (($entry_array[0] == $input)) {


                if (isset($entry_array[1]))
                {
                  echo "here";
                  //$pass=$pass." ";
                  echo $pass;
                  //trim ($entry_array[1]);
                //echo  urlencode($entry_array[1]);
                echo $entry_array[1]."a";
                  strip_tags($entry_array[1]);
              //    $entry_array[1] = str_replace(" ","",$entry_array[1]);
                  echo $entry_array[1];
                  if ($entry_array[1]==$pass)
                    { echo "here2";
                      return $entry_array[0];
                    }
                }

        }

      }
      fclose($handle);
      }
    return NULL;
    }


 ?>
