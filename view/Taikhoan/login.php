<main class="main-content">
  <!--== Start Page Header Area Wrapper ==-->
  <!-- <div class="page-header-area" data-bg-img="assets/img/photos/slider_4.webp">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="page-header-content">
              <h2 class="title" data-aos="fade-down" data-aos-duration="1000">Đăng nhập</h2>
              <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1200">
                <ul class="breadcrumb">
                  <li><a href="index.html">Trang chủ</a></li>
                  <li class="breadcrumb-sep">//</li>
                  <li>Đăng nhập</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div> -->
  <!--== End Page Header Area Wrapper ==-->

  <!--== Start My Account Area Wrapper ==-->
  <div class="container2" id="container2">
    <div class="form-container sign-up">
      <form method="post" action="?act=login">
        <h1>Đăng Ký</h1>
        <div class="social-icons">
          <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>
        <span>hoặc sử dụng email của bạn để đăng ký</span>
        <input type="text" name="name_tk" placeholder="Tên đăng nhập" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="full_name" placeholder="Họ và tên" required>
        <input type="text" name="dia_chi" placeholder="Địa chỉ " required>
        <input type="password" name="pass" placeholder="Mật khẩu" required>
        <input type="password" name="laimk" placeholder="Xác nhận mật khẩu" required>

        <input type="submit" name="dangky" value="Đăng Ký" style="background-color: red; color: white; " >

      </form>

    </div>
    <div class="form-container sign-in">
      <form method="post" action="?act=login">
        <h1>Đăng Nhập</h1>
        <div class="social-icons">
          <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>
        <span>hoặc sử dụng mật khẩu tài khoản của bạn </span>
        <input name="username" type="text" placeholder="Tài khoản" required>
        <input name="password" type="password" placeholder="Mật Khẩu" required>
        <a href="#">Quên mật khẩu?</a>
        <input type="submit" name="login" value="Đăng Nhập" style="background-color: red; color: white; " >

      </form>
    </div>
    <div class="toggle-container">
      <div class="toggle">
        <div class="toggle-panel toggle-left">
          <h1>Welcome Back!</h1>
          <p>Nhập thông tin cá nhân của bạn để sử dụng tất cả các tính năng của trang web</p>
          <button class="hidden" id="login">Đăng nhập</button>
        </div>
        <div class="toggle-panel toggle-right">
          <h1>TPT Shore Xin Chào </h1>
          <p>Nếu chưa có tài khoản hãy đăng ký với thông tin cá nhân của bạn để sử dụng tất cả các tính năng của trang web</p>
          <button class="hidden" id="register">Đăng ký</button>
        </div>
      </div>
    </div>
  </div>
  <!--== End My Account Area Wrapper ==-->
</main>