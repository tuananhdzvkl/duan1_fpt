<?php
// Include the PDO connection
include_once "model/pdo.php";

// Include PHPMailer dependencies
require "assets/src/PHPMailer.php";
require "assets/src/SMTP.php";
require 'assets/src/Exception.php';

// Start the session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Function to send email using external SMTP service (e.g., Gmail SMTP)
function sendEmail($to, $subject, $message) {
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        // Configure SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = 'phuonglun66666@gmail.com';
        $mail->Password = 'fawv uptv lsqf qxou'; // Replace with your SMTP password

        // Set email details
        $mail->setFrom('phuonglun66666@gmail.com', 'TPT SHORE');
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Send email
        $mail->send();

        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['reset_password'])) {
        // Handle password reset
        $userVerificationCode = '';
        for ($i = 1; $i <= 6; $i++) {
            $userVerificationCode .= isset($_POST["code$i"]) ? $_POST["code$i"] : '';
        }

        // Retrieve the stored verification code from the session or database
        $storedVerificationCode = isset($_SESSION['verification_code']) ? $_SESSION['verification_code'] : '';

        // Compare the user-inputted code with the stored code
        if ($userVerificationCode === $storedVerificationCode) {
            // Verification successful, proceed with password reset
            $email = isset($_POST['forgot_email']) ? $_POST['forgot_email'] : '';
            $name_tk = "";  // Replace this line with the logic to retrieve name_tk from the database

            $newPassword = rand(100000, 999999);

            $sqlUpdate = "UPDATE taikhoan SET pass=? WHERE email=? AND name_tk = ?";
            $stmtUpdate = pdo_get_connection()->prepare($sqlUpdate);
            $stmtUpdate->execute([$newPassword, $email, $name_tk]);

            $kq = sendEmail($email, 'Password Reset', "Your new password is: $newPassword");

            if ($kq) {
                echo '<script>';
                echo 'alert("Bạn đã đặt lại mật khẩu thành công. Vui lòng kiểm tra email để biết mật khẩu mới!");';
                echo '</script>';
            } else {
                echo '<script>alert("Có lỗi xảy ra khi gửi email. Vui lòng liên hệ admin!");</script>';
            }
        } else {
            // Verification failed, display an error message
            echo '<script>alert("Mã xác nhận không đúng. Vui lòng kiểm tra và nhập lại!");</script>';
            // Add JavaScript to prevent form submission
            echo '<script>document.getElementById("verification-form").onsubmit = function(event) { event.preventDefault(); }</script>';
        }
    } elseif (isset($_POST['forgot_password'])) {
        // Handle forgot password
        $email = isset($_POST['forgot_email']) ? $_POST['forgot_email'] : '';

        $sqlSelect = "SELECT * FROM taikhoan WHERE email = ?";
        $stmtSelect = pdo_get_connection()->prepare($sqlSelect);
        $stmtSelect->execute([$email]);
        $user = $stmtSelect->fetch();

        if (!$user) {
            $error = "Email này chưa được đăng kí trên hệ thống. Vui lòng thử lại!";
        } else {
            $name_tk = $user['name_tk'];

            $newPassword = rand(100000, 999999);

            $sqlUpdate = "UPDATE taikhoan SET pass=? WHERE email=? AND name_tk = ?";
            $stmtUpdate = pdo_get_connection()->prepare($sqlUpdate);
            $stmtUpdate->execute([$newPassword, $email, $name_tk]);

            $kq = sendEmail($email, 'Password Reset', "Your verification code is: $newPassword");

            if ($kq) {
                echo '<script>';
                echo 'alert("Bạn đã gửi yêu cầu thành công. Vui lòng kiểm tra email để đặt lại mật khẩu!");';
                echo '</script>';
            } else {
                echo '<script>alert("Có lỗi xảy ra khi gửi email. Vui lòng liên hệ admin!");</script>';
            }
        }
    } elseif (isset($_POST['signup'])) {
        // Handle user signup
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

        // Validate password match
        if ($password !== $cpassword) {
            $errors['password'] = "Confirm password not matched!";
        }

        // Check if email already exists
        $email_check = "SELECT * FROM usertable WHERE email = '$email'";
        $res = mysqli_query($con, $email_check);

        if (mysqli_num_rows($res) > 0) {
            $errors['email'] = "Email that you have entered already exists!";
        }

        // If no errors, proceed with registration
        if (count($errors) === 0) {
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $code = rand(999999, 111111);
            $status = "notverified";
            $insert_data = "INSERT INTO usertable (name, email, password, code, status)
                            VALUES ('$name', '$email', '$encpass', '$code', '$status')";
            $data_check = mysqli_query($con, $insert_data);

            if ($data_check) {
                $subject = "Email Verification Code";
                $message = "Your verification code is $code";

                // Send verification code via email
                if (sendEmail($email, $subject, $message)) {
                    $info = "We've sent a verification code to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    header('location: user-otp.php');
                    exit();
                } else {
                    $errors['otp-error'] = "Failed while sending code!";
                }
            } else {
                $errors['db-error'] = "Failed while inserting data into the database!";
            }
        }
    }elseif (isset($_POST['check-email'])) {
        // Handle checking email for password reset
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM usertable WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);

        if (mysqli_num_rows($run_sql) > 0) {
            $code = rand(999999, 111111);
            $insert_code = "UPDATE usertable SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);

            if ($run_query) {
                $subject = "Password Reset Code";
                $message = "Your password reset code is $code";

                // Send verification code via email using PHPMailer
                if (sendEmail($email, $subject, $message)) {
                    $info = "We've sent a password reset code to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();
                } else {
                    $errors['otp-error'] = "Failed while sending code!";
                }
            } else {
                $errors['db-error'] = "Something went wrong!";
            }
        } else {
            $errors['email'] = "This email address does not exist!";
        }
    } elseif (isset($_POST['check-reset-otp'])) {
        // Handle checking the reset OTP
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if (mysqli_num_rows($code_res) > 0) {
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        } else {
            $errors['otp-error'] = "You've entered an incorrect code!";
        }
    } elseif (isset($_POST['change-password'])) {
        // Handle changing the password
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if ($password !== $cpassword) {
            $errors['password'] = "Confirm password not matched!";
        } else {
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE usertable SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if ($run_query) {
                $info = "Your password has been changed. Now you can log in with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            } else {
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    } elseif (isset($_POST['login-now'])) {
        header('Location: login-user.php');
        exit();
    }
}
?>

<!-- Add your HTML and CSS styles here -->
