<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Remember the Cow</title>

		<link href="cow-provided.css" type="text/css" rel="stylesheet" />
		<link href="resources/favicon.ico" type="image/ico" rel="shortcut icon" />
	</head>

	<body>

		<div class="headfoot">
			<h1>
				<img src="resources/logo.gif" alt="logo" />
				Remember<br />the Cow
			</h1>
		</div>

		<div id="main">
			<h2><?php echo $_SESSION['user']; ?>'s To-Do List</h2>

			<ul id="todolist">

				<?php
				$f=$_SESSION['user']."_todolist.txt";
				if (file_exists($f))
				{
					$i=0;
				 $file=fopen($f,"r");
				 while(!feof($file)){

				 ?>
				<li>


					<form action="submit.php" method="post">
						<input type="hidden" name="action" value="delete" />
						<input type="hidden" name="index" value=<?php echo $i; ?> />
						<input type="submit" name="delete" value="Delete" />
					</form>
					<?php echo fgets($file);  ?>
				</li>
				<?php
				$i=$i+1;}}
				?>

				<li>
					<form action="submit.php" method="post">
						<input type="hidden" name="action" value="add" />
						<input name="item" type="text" size="25" autofocus="autofocus" />
						<input type="submit" name="add" value="Add" />
					</form>
				</li>
			</ul>

<?php
function get_time_elapsed($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);
    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;
    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v)
    {
        if ($diff->$k)
        {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        }
        else
        {
            unset($string[$k]);
     }
    }
    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}


?>


			<div>
				<a href="logout.php"><strong>Log Out</strong></a>

				<em>(logged in since <?php echo $_COOKIE['Date']; ?>)</em>
			</div>

		</div>

		<div class="headfoot">
			<p>
				&quot;Remember The Cow is nice, but it's a total copy of another site.&quot; - PCWorld<br />
				All pages and content &copy; Copyright CowPie Inc.
			</p>

			<div id="w3c">
					<a href="http://validator.w3.org/check/referer">
						<img src="resources/w3c-html.png" alt="Valid HTML5" />
					</a>
					<a href="http://validator.w3.org/check/referer">
						<img src="resources/w3c-css.png" alt="Valid CSS" />
					</a>
			</div>
		</div>
	</body>
</html>
