<?php
    // Include the PDO connection
    include_once "model/pdo.php";

    $error = "";

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['forgot_password'])) {
        // Retrieve the email from the form
        $email = isset($_POST['forgot_email']) ? $_POST['forgot_email'] : '';

        // Check if the email exists in the database
        $sqlSelect = "SELECT * FROM taikhoan WHERE email = ?";
        $stmtSelect = pdo_get_connection()->prepare($sqlSelect);
        $stmtSelect->execute([$email]);
        $user = $stmtSelect->fetch();

        if (!$user) {
            $error = "Email này chưa được đăng kí trên hệ thống vui lòng thử lại!";
        } else {
            $name_tk = $user['name_tk'];

            // Generate a new password
            $newPassword = substr(md5(rand(0, 999999)), 0, 8);

            // Update the password in the database
            $sqlUpdate = "UPDATE taikhoan SET pass=? WHERE email=? AND name_tk = ?";
            $stmtUpdate = pdo_get_connection()->prepare($sqlUpdate);
            $stmtUpdate->execute([$newPassword, $email, $name_tk]);

            // Send the new password via email
            $kq = submitPassword($email, $name_tk, $newPassword);

            if ($kq) {
                echo '<script>';
                echo 'alert("Bạn đã gửi yêu cầu thành công. Vui lòng kiểm tra email để đặt lại mật khẩu!");';
                echo 'setTimeout(function() { window.location.href = "?act=login"; }, 1000);'; // Redirect after 1 second
                echo '</script>';
            } else {
                echo '<script>alert("Có lỗi xảy ra. Vui lòng liên hệ admin!");</script>';
            }
            
        }
    }

    function submitPassword($email, $name_tk, $password)
    {
        require "./src/PHPMailer.php";
        require "./src/SMTP.php";
        require './src/Exception.php';
        $mail = new PHPMailer\PHPMailer\PHPMailer(true); // true: enables exceptions

        try {
            $mail->SMTPDebug = 0; // 0,1,2: chế độ debug
            $mail->isSMTP();
            $mail->CharSet  = "utf-8";
            $mail->Host = 'smtp.gmail.com';  // SMTP servers
            $mail->SMTPAuth = true; // Enable authentication
            $mail->Username = 'anhthu09112k5@gmail.com'; // SMTP username
            $mail->Password = 'fkfq rpno incy hekz';   // SMTP password
            $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
            $mail->Port = 465;  // port to connect to                
            $mail->setFrom('anhthu09112k5@gmail.com', 'Nguyễn Hữu Tuấn Anh');
            $mail->addAddress($email);
            $mail->isHTML(true);  // Set email format to HTML
            $mail->Subject = 'Forgot password?';
            $noidungthu = "<p>Xin chào <strong>{$name_tk}</strong>, <br><br>
            Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu từ website <a href='http://your-website-url.com'>ASCENSION</a> của bạn. </p>
            <p>Mật khẩu mới của bạn là: <strong>{$password}</strong></p>
            <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!</p>
            <a href='https://louisvuitton.com'><img src='https://kenh14cdn.com/thumb_w/800/pr/2023/photo1687429161573-16874291619012009969415-63823052259451.jpg' alt='Your Image Alt Text' style='width:100%; max-width:400px; height:250px;'></a>";
 
            $mail->Body = $noidungthu;
            $mail->smtpConnect(array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            ));
            $mail->send();
            return true;
        } catch (Exception $e) {
            // echo 'Error: ', $mail->ErrorInfo;
            return false;
        }
    }
?>
<style>
    .form-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
        background-color: #f5f5f5;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-container h1 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .form-container span {
        margin-bottom: 10px;
    }

    .forgot-password input,
    .verification-form input {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }

    .confirmation-code-inputs {
        display: flex;
        gap: 10px;
        justify-content: center;
    }

    .confirmation-code-input {
        width: 40px;
        height: 40px;
        text-align: center;
        font-size: 18px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-right: 5px;
    }

    .confirmation-code-input:last-child {
        margin-right: 0;
    }

    .submit-button {
        width: 100%;
        background-color: red;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .toggle-container {
        margin-top: 20px;
    }
  
    .verification-form {
        text-align: center;
        background-color: #f5f5f5;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        max-width: 400px; /* Adjust the max-width as needed */
        margin: 0 auto; /* Center the form horizontally */
    }

    .verification-form h1 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .verification-form span {
        display: block;
        margin-bottom: 10px;
    }

    .confirmation-code-inputs {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .confirmation-code-input {
        flex: 1;
        width: 40px;
        height: 40px;
        text-align: center;
        font-size: 18px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-right: 5px;
    }

    .confirmation-code-input:last-child {
        margin-right: 0;
    }

    .submit-button,
    .forgot-password input[type="submit"],
.verification-form input[type="submit"] {
        width: 100%;
        background-color: red;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    
</style>

<main class="main-content">
    <div class="container2" id="container2">
        <?php if (!isset($_POST['forgot_password']) || !empty($error)) : ?>
            <!-- Display Forgot Password Form -->
            <div class="form-container forgot-password">
                <form method="post" action="?act=quenmk"> 
                    <h1>Quên mật khẩu</h1>
                    <?php
                        if (!empty($error)) {
                            echo "<span class='alert alert-danger' style='color:red; font-weight: 500'>" . $error . "</span>";
                        }
                    ?>
                    <span>Nhập địa chỉ email của bạn để đặt lại mật khẩu</span>
                    <input type="email" name="forgot_email" value="<?php echo isset($email) ? $email : ''; ?>" placeholder="Email" required>
                    <input type="submit" name="forgot_password" value="Gửi yêu cầu" style="background-color: red; color: white;">
                </form>
            </div>
        <?php else : ?>
            <!-- Display Verification Form -->
            <style>
    .confirmation-code-inputs:focus-within input{
        border-color: #007bff; /* Change this color as per your preference */
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Change this shadow as per your preference */
    }
</style>


<div class="form-container verification">
    <form class="verification-form" method="post">
        <h1>Xác nhận yêu cầu</h1>
        <span>Nhập mã xác nhận để đặt lại mật khẩu</span>
        <div class="confirmation-code-inputs">
            <?php for ($i = 1; $i < 7; $i++) : ?>
                <input class="confirmation-code-input" type="text" name="code<?php echo $i; ?>" maxlength="1" required oninput="moveToNext(this, 'code<?php echo $i + 1; ?>')" onkeypress="return isIntegerKey(event)">
            <?php endfor; ?>
        </div>
        <input class="submit-button" type="submit" name="reset_password" value="Send Code">
    </form>
</div>

<!-- <script>
    function moveToNext(currentInput, nextInputName) {
        const nextInput = document.querySelector(`[name="${nextInputName}"]`);

        if (nextInput && currentInput.value.length > 0 && currentInput.value.length >= currentInput.maxLength) {
            nextInput.focus();
        }
    }

    function isIntegerKey(evt) {
        const charCode = (evt.which) ? evt.which : event.keyCode;
        return (charCode >= 48 && charCode <= 57); // Only allow numeric input
    }
</script> -->


          

        <?php endif; ?>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1>ASCENSION Xin Chào </h1>
                    <p>Nếu bạn quên mật khẩu, hãy làm theo các bước theo form hướng dẫn để lấy lại mật khẩu của bạn.</p>
                    <button onclick="redirectToLogin()" class="hidden">Quay Lại</button>
                    <script>
function redirectToLogin() {
                            window.location.href = "?act=login";
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</main>