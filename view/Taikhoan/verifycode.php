<?php
    session_start();

    if (!isset($_SESSION['email']) || !isset($_SESSION['name_tk']) || !isset($_SESSION['newPassword'])) {
        // Redirect to the forgot password page if session data is not set
        header("Location: forgot_password.php");
        exit();
    }

    $email = $_SESSION['email'];
    $name_tk = $_SESSION['name_tk'];
    $newPassword = $_SESSION['newPassword'];

    // Clear session data
    session_unset();
    session_destroy();
?>

<!-- HTML content for verify_code.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Code</title>
</head>
<body>
    <h1>Verification Code Page</h1>
    <p>Verification code sent to <?php echo $email; ?> for user <?php echo $name_tk; ?></p>
    <p>New password: <?php echo $newPassword; ?></p>
    <!-- Add additional content or actions as needed -->
</body>
</html>
