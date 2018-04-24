<?php
	/**
	 * GIT DEPLOYMENT SCRIPT
	 *
	 * Used for automatically deploying websites via github or bitbucket, more deets here:
	 * https://gist.github.com/riodw/71f6e2244534deae652962b32b7454e2
	 * How To Use:
	 * https://medium.com/riow/deploy-to-production-server-with-git-using-php-ab69b13f78ad
	 */
	// The commands
	$commands = array(
		'echo $PWD',
		'whoami',
		'sudo git reset --hard HEAD',
		'sudo git pull',
		'git status',
		'sudo git submodule sync',
		'sudo git submodule update',
		'sudo git submodule status',
		'sudo rm -r web',
		'sudo npm install',
		'sudo grunt build:release',
		'sudo cp -r web/* .'
	);
	// $commands = array(
	// 	'echo $PWD',
	// 	'whoami',
	// 	'git pull origin master',
	// 	'chmod +x ./copy_build.sh', 
	// 	'./copy_build.sh'
	// );
	// Run the commands for output
	$output = '';
	foreach($commands AS $command){
		// Run it
		$tmp = shell_exec($command);
		// Output
		$output .= "<span style=\"color: #6BE234;\">\$</span> <span style=\"color: #729FCF;\">{$command}\n</span>";
		$output .= htmlentities(trim($tmp)) . "\n";
	}
	// Make it pretty for manual user access (and why not?)
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>GIT DEPLOYMENT SCRIPT</title>
</head>
<body style="background-color: #000000; color: #FFFFFF; font-weight: bold; padding: 0 10px;">
<pre>
 ____________________________
|                            |
| Git Deployment Script v0.1 |
|      github.com/riodw 2017 |
|____________________________|

<?php echo $output; ?>
</pre>
</body>
</html>