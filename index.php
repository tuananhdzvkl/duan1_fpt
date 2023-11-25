
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
    if (isset($_GET['act']) && ($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
                case 'home':
                    include "view/include/home.php";
                    break;
            case 'shop':
                include "view/shop.php";
                break;
            case 'chitietSP':
                $id = $_GET['id'];
                $binhluan =  LoadAll_BL_user($id);
                updat_view($id);
                $sp = load_sanpham_one($id);
                $img_sp = load_img($id);
                $load_color = load_color_ct($id);
                $load_size = load_size_ct($id);
                include "view/sanpham/sanphamct.php";
                break;
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
                $id = $_SESSION['username']['id_tk'];
                $tk = Load_one_TK($id);
                include "view/Taikhoan/thongtin.php";
                break;
            case 'capnhattk':
                if (isset($_POST['gui']) && ($_POST['gui'] != "")) {

                    $full_name = $_POST['full-name'];
                    $sdt = $_POST['sdt'];
                    $diachi = $_POST['diachi'];
                    $email = $_POST['email'];
                    $file = $_FILES['img_tk'];
                    $id = $_POST['id'];
                    $img = $_POST['img_tk'];
                    if ($file['size'] > 0) {
                        $img = $file['name'];
                        move_uploaded_file($file['tmp_name'], "assets/uploads/" . $img);
                    }

                    // echo $img;
                    upload_tk_user($id, $sdt, $full_name, $diachi, $email, $img);
                    echo '<script>alert("Cập nhật Thành Công")</script>';
                    echo "  <script>window.location.href ='index.php'</script> ";
                }
                break;
            case 'dangxuat':
                if (isset($_SESSION["username"])) {
                    unset($_SESSION["username"]);
                }
                echo "  <script>window.location.href ='index.php'</script> ";
                break;

            case 'binhluan':
                if (isset($_POST['gui']) && ($_POST['gui'] != "")) {
                    $name = $_POST['binhluan'];
                    $id_tk = $_POST['id_tk'];
                    $id_sp = $_POST['id'];
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $ngayGioHienTai = date('Y-m-d H:i:s');
                    add_bl($name, $id_tk, $id_sp, $ngayGioHienTai);
                    echo "  <script>window.location.href ='?act=chitietSP&id_sp=$id_sp'</script> ";
                }

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