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



<main class="main-content">
    <div class="container2" id="container2">
        <div class="form-container forgot-password">
            <form method="post" action="?act=quenmk"> <!-- Update the action attribute -->
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
