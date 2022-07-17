

<?php

include "../session.php";
include "../include/conn.php";

if (
	isset($_POST['currentPassword']) && isset($_POST['newpassword'])
	&& isset($_POST['renewpassword'])
) {

	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	// $currentPassword = validate($_POST['currentPassword']);
	$newpassword = validate($_POST['newpassword']);
	$renewpassword = validate($_POST['renewpassword']);

	if (empty($currentPassword)) {
		header("Location: ../users-password.php?error=Old Password is required");
		exit();
	} else if (empty($newpassword)) {
		header("Location: ../users-password.php?error=New Password is required");
		exit();
	} else if ($newpassword !== $renewpassword) {
		header("Location: ../users-password.php?error=The confirmation password  does not match");
		exit();
	} else {
		// hashing the password
		// $newpassword = md5($newpassword);
		// $currentPassword = md5($currentPassword);
		// $newpassword = password_hash($newpassword, PASSWORD_BCRYPT, array('cost' => 12));  //PASSWORD_ARGON2I//PASSWORD_ARGON2ID
		// $currentPassword = password_hash($currentPassword, PASSWORD_BCRYPT, array('cost' => 12));
		// $newpassword = password_hash($newpassword, PASSWORD_BCRYPT, array('cost' => 12));

		$sql = "SELECT password FROM users WHERE id_number='$verified_session_username' AND password='$currentPassword'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) == 1) {

			$sql_2 = "UPDATE users SET password='$newpassword' WHERE id_number='$verified_session_username'";
			mysqli_query($conn, $sql_2);
			header("Location: ../users-password.php?success=Your password has been changed successfully");
			exit();
		} else {
			header("Location: ../users-password.php?error=Incorrect password");
			exit();
		}
	}
} else {
	header("Location: ../users-password.php");
	exit();
}
