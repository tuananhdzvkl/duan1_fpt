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
<?php 
    include "controller/controller.php";
?>
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
                    <input type="submit" name="forgot_password" value="Gửi yêu cầu" style="background-color: red; color: white;" onclick="submit();">
                   
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


<!-- <div class="form-container verification">
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
</div> -->

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