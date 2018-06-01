<?php
if (!isset($_SESSION['user'])) {
	require_once( COMPONENTS . "/user/class.user.php" );
	require_once( COMPONENTS . "/project/class.project.php" );

	$_SESSION['user'] = $_SERVER['PHP_AUTH_USER'];
	$_SESSION['lang'] = 'en';
	$_SESSION['theme'] = 'default';
	$_SESSION['project'] = "auto_" . $_SESSION['user'];

  // Prep a new user
	$User = new User();
	$User->username = $_SESSION['user'];
	// Check if it already exists
	if ($User->CheckDuplicate()) {
		// Will be true the user does not exists, so:
    // - create the new user
		$User->Create();
    // - prepare a project for the new user
		// - make sure it exists, create it if necessary
    $Project = new Project();
    $Project->name = $_SESSION['user'];
    $Project->path = "auto_".$_SESSION['user'];
		$Project->Create();
    // - remove admin privileges
		// - restrict access to the auto_* project only
    $User->projects = array( $Project->path );
    $User->Project_Access();
	}
}
?>
