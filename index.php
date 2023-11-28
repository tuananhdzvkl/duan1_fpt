<?php
session_start();
ob_start();
include "model/pdo.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/size.php";
include "model/binhluan.php";
include "model/taikhoan.php";
include "view/include/header.php";
    if (isset($_GET['act']) &&($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'home':
                include "view/include/home.php";
                break;
            case 'shop':
                include "view/shop.php";
                break;
                case 'chitietSP':
                    if(isset($_GET['id']) && $_GET['id'] > 0){
                        $id = $_GET['id'];
                        $binhluan = LoadAll_BL_user($id);
                        updat_view($id);
                        $sp = load_sanpham_one($id);
                        $sanpham =  load_sanpham_all();
                        $sizeCounts = tongsp_size();
                        $genderCounts = load_gioitinh_all();
                        // $tongsp_gioitinh = tongsp_gioitinh($id);
                        $img_sp = load_img($id);    
                        $load_size = load_size_ct($id);
                        $load_color = load_color_ct($id);
                        $gioitinh = get_gioitinh_by_id($id);
                
                        // Kiểm tra và khởi tạo $sizeCounts nếu chưa tồn tại
                        if (!isset($sizeCounts)) {
                            $sizeCounts = tongsp_size();
                        }
                
                        include "view/sanpham/sanphamct.php";
                        break;
                    }
                
                case 'thanhtoan':
                    include "view/thanhtoan.php";
                    break;
                case 'CTthanhtoan':
                    include "view/chitietThanhtoan.php";
                    break;
                case 'blog':
                    include "view/blog.php";
                    break;
                case 'chitietBlog':
                    include "view/chitietBlog.php";
                    break;
                case 'wishlist':
                    include "view/wishlist.php";
                    break;
                case 'cart':
                    include "view/cart.php";
                    break;
                case 'login':
                    if (isset($_POST['login']) && ($_POST['login'] != "")) {
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $checkuser = checkuser($username, $password);
                        if (is_array($checkuser)) {
                            $_SESSION['username'] = $checkuser;
                            if ($_SESSION['username']['lock'] == 1) {
                                if (isset($_SESSION["username"])) {
                                    unset($_SESSION["username"]);
                                }
                                echo '<script>alert("Tài Khoản của bạn đã bị khóa")</script>';
                                echo "  <script>window.location.href ='?act=login'</script> ";
                            } else {
    
                                echo "  <script>window.location.href ='index.php'</script> ";
                            }
                        } else {
                            echo '<script>alert("Tên đăng nhập hoặc mật khẩu không đúng")</script>';
                            echo "  <script>window.location.href ='?act=login'</script> ";
                        }
                    }
                    if (isset($_POST['dangky']) && ($_POST['dangky'] != "")) {
                        $email = $_POST['email'];
                        $name = $_POST['name_tk'];
                        $pswd = $_POST['pass'];
                        $pswd1 = $_POST['laimk'];
                        $full_name = $_POST['full_name'];
                        $diachi = $_POST['dia_chi'];
                        if ($pswd !=  $pswd) {
                            echo "  <script>alert('Đăng Ký Không Thành Công') </script> ";
                        } else {
                            dangky_TK($name, $pswd, $full_name, $email, $diachi);
                            echo "  <script>alert('Đăng Ký Thành Công Thành Công') </script> ";
                        }
                    }
                    include "view/Taikhoan/login.php";
                    break;
                    
                    case 'contact':
                        include "view/contact.php";
                        break;

                    case 'thongtin':
                        if(isset($_SESSION['username']['id_tk'])) {
                            $id = $_SESSION['username']['id_tk'];
                            $tk = Load_one_TK($id);
                            include "view/Taikhoan/thongtin.php";
                        } else {
                            // Handle the case when 'username' or 'id_tk' is not set in the $_SESSION array
                            // You might want to redirect the user to a login page or display an error message.
                            echo "<div style='text-align: center; color: red;'> Session data not found. Please log in.</div>";
                        }
                    break;        
                        
                    case 'capnhattk':
                        if (isset($_POST['gui']) && !empty($_POST['gui'])) {
                            $id = isset($_POST['id']) ? $_POST['id'] : null;
                            $full_name = isset($_POST['full-name']) ? $_POST['full-name'] : '';
                            $sdt = isset($_POST['sdt']) ? $_POST['sdt'] : '';
                            $diachi = isset($_POST['diachi']) ? $_POST['diachi'] : '';
                            $email = isset($_POST['email']) ? $_POST['email'] : '';
                            $img = isset($_POST['img_tk']) ? $_POST['img_tk'] : '';
                    
                            // Check if a file was uploaded
                            if (!empty($_FILES['img_tk']['name'])) {
                                $file = $_FILES['img_tk'];
                                if ($file['size'] > 0) {
                                    $img = $file['name'];
                                    move_uploaded_file($file['tmp_name'], "assets/uploads/" . $img);
                                }
                            }
                    
                            if (!empty($id)) {
                                // Perform the update
                                upload_tk_user($id, $sdt, $full_name, $diachi, $email, $img);
                    
                                // Redirect or display a success message
                                echo '<script>alert("Cập nhật Thành Công")</script>';
                                echo '<script>window.location.href = "?act=thongtin"</script>';
                            } else {
                                // Handle the case when the ID is not set
                                echo '<script>alert("Không thể cập nhật thông tin. Vui lòng thử lại.")</script>';
                                echo '<script>window.location.href = "index.php"</script>';
                            }
                        }
                        break;
                    
                    case 'dangxuat':
                        if (isset($_SESSION["username"])) {
                            unset($_SESSION["username"]);
                        }
                        echo "  <script>window.location.href ='?act=login'</script> ";
                        break;
        
                        case 'binhluan':
                            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['gui'])) {
                                $name = htmlspecialchars($_POST['binhluan']); // Sanitize user input
                                $id_tk = $_POST['id_tk'];
                                $id_sp = $_POST['id'];
                        
                                // Ensure that the comment is not empty before adding to the database
                                if (!empty($name)) {
                                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                                    $ngayGioHienTai = date('Y-m-d H:i:s');
                        
                                    // Add the comment to the database
                                    add_bl($name, $id_tk, $id_sp, $ngayGioHienTai);
                        
                                    // Redirect the user to the product details page after submission
                                    header("Location: ?act=chitietSP&id_sp=$id_sp");
                                    exit(); // Ensure that no further code execution occurs after the redirect
                                } else {
                                    // Handle the case where the comment is empty
                                    echo "Bình luận không được để trống.";
                                }
                            }
                            break;

                            case 'doimk':
                                if (isset($_POST['submit'])) {
                                    $id = $_SESSION['username']['id_tk']; // Lấy ID từ session
                                    $password = $_POST['password'];
                                    $newPassword = $_POST['newPassword'];
                                    $confirmPassword = $_POST['confirmPassword'];
                
                                    if ($newPassword === $confirmPassword) {
                                        // Gọi hàm để cập nhật mật khẩu trong session
                                        changepassword($id, $newPassword);
                                        //unset($_SESSION["username"]);
                                        // Sau khi cập nhật session, bạn có thể tiến hành cập nhật trong cơ sở dữ liệu.
                                        // Cần sử dụng câu lệnh SQL UPDATE để cập nhật mật khẩu trong bảng taikhoan
                
                                        // Ví dụ:
                                        // $sql = "UPDATE taikhoan SET pass = '$newPassword' WHERE id_tk = $id";
                                        // pdo_execute($sql);
                
                                        echo '<script>alert("Bạn đã đổi mật khẩu thành công")</script>';
                                        header("refresh:0.08;url=?act=login");
                                    } else {
                                        echo '<script>alert("Xác nhận mật khẩu không khớp")</script>';
                                    }
                                }
                                include "view/Taikhoan/doimk.php";
                                break;    
                    default:
                        break;
            }
    } else {
        $sanpham = load_sanpham_all();
        include "view/include/home.php";
    }
    include "view/include/footer.php"; 
    ?>
<!--=======================Javascript============================-->

<!--=== jQuery Modernizr Min Js ===-->
<script src="assets/js/modernizr.js"></script>
<!--=== jQuery Min Js ===-->
<script src="assets/js/jquery-main.js"></script>
<!--=== jQuery Migration Min Js ===-->
<script src="assets/js/jquery-migrate.js"></script>
<!--=== jQuery Popper Min Js ===-->
<script src="assets/js/popper.min.js"></script>
<!--=== jQuery Bootstrap Min Js ===-->
<script src="assets/js/bootstrap.min.js"></script>
<!--=== jQuery Ui Min Js ===-->
<script src="assets/js/jquery-ui.min.js"></script>
<!--=== jQuery Swiper Min Js ===-->
<script src="assets/js/swiper.min.js"></script>
<!--=== jQuery Fancybox Min Js ===-->
<script src="assets/js/fancybox.min.js"></script>
<!--=== jQuery Waypoint Js ===-->
<script src="assets/js/waypoint.js"></script>
<!--=== jQuery Parallax Min Js ===-->
<script src="assets/js/parallax.min.js"></script>
<!--=== jQuery Aos Min Js ===-->
<script src="assets/js/aos.min.js"></script>

<!--=== jQuery Custom Js ===-->
<script src="assets/js/custom.js"></script>

<script>
  const container = document.getElementById('container2');
  const registerBtn = document.getElementById('register');
  const loginBtn = document.getElementById('login');

  registerBtn.addEventListener('click', () => {
      container.classList.add("active");
  });

  loginBtn.addEventListener('click', () => {
      container.classList.remove("active");
  });
</script>
</html>