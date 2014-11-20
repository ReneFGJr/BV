<!doctype html public "-//w3c//dtd html 4.0 transitional//en">
<html>
<head>
	<title>Sample Partner Application - JOSSO</title>
	<meta name="description" content="Java Open Single Signon">
</head>

<body>
    <h1>This is a very simple PHP JOSSO partner application</h1>
<?php
require("josso.php");

// jossoagent is automatically instantiated by josso.php,
// declared in auto_prepend_file property of php.ini.

// Get current sso user information,
$josso_agent = new jossoagent;

$user = $josso_agent->getUserInSession();

$sessionId = $josso_agent->getSessionId();

// Check if user is authenticated
if (isset($user)) {

    // Display USER INFORMATION

    // Username associated to authenticated user
    echo 'Username : ' . $user->getName() . '<br><br>';

    // Get a specific user property
    echo 'user.name=' . $user->getProperty('user.name') . '<br><br>';

    // Get all user properties
    $properties = $user->getProperties();
    if (is_array($properties)) {
        foreach ($properties as $property) {
            echo $property['name'] . '=' . $property['value'] . '<br>';
        }
    }

	// Get all user roles
	$roles = $josso_agent->findRolesBySSOSessionId($sessionId);
	echo '<h2>Roles</h2>';
	foreach ($roles as $role) {
		echo $role->getName() . '<br>';
	}

	// Check if user belongs to a specific role
	if ($josso_agent->isUserInRole('role1')) {
		echo '<h3>user is in role1</h3>';
	}

	echo 'Click <a href="'.jossoCreateLogoutUrl().'">here</a> to logout ...<br>';

	echo '<p>SSO Session ID : ' . $sessionId . '</p>';


} else {

    // User is unknown..
    echo '<h2>you are an annonymous user ...</h2>';

	echo 'Click <a href="'.jossoCreateLoginUrl().'">here</a> to login ...';

}
?>

</body>
</html>