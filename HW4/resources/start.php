
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Remember the Cow</title>
		<link href="resources/cow-provided.css" type="text/css" rel="stylesheet" />
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
			<p>
				The best way to manage your tasks. <br />
				Never forget the cow (or anything else) again!
			</p>

			<p>
				Log in now to manage your to-do list. <br />
				If you do not have an account, one will be created for you.
			</p>

			<form id="loginform" action="login.php" method="post">
				<div><input name="name" type="text" size="8" autofocus="autofocus" /> <strong>User Name</strong></div>
				<div><input name="password" type="password" size="8" /> <strong>Password</strong></div>
				<div><input type="submit" value="Log in" /></div>
			</form>

			<p>
				<em>(last login from this computer was <?php $x=$_COOKIE['Date']; echo get_time_elapsed($x); ?>)</em>

        	<?php

        if (isset($_GET['empty']))
        {
        	echo "   FIELD IS EMPTY!";
        }
				if (isset($_GET['regex']))
				{
					echo "   REGEX ERROR CHECK SYNTAX!";
				}


				function get_time_elapsed($datetime, $full = false)
				{
				    $now = new DateTime();
					//	echo "now :".$now;
				    $ago = new DateTime($datetime);
					//	echo " ago:".$ago;
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

      </p>


		</div>

		<div class="headfoot">
			<p>
				<q>Remember The Cow is nice, but it's a total copy of another site.</q> - PCWorld<br />
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
