
    <?php
    session_start();
    ob_start();
    include "model/pdo.php";
    include "model/sanpham.php";
    include "model/thanhtoan.php";
    include "model/danhmuc.php";
    include "model/size.php";
    include "model/color.php";
    include "model/binhluan.php";
    include "model/taikhoan.php";
    $dm = LoadAll_DM();
    include "view/include/header.php";
    if (isset($_POST['keyword']) &&  $_POST['keyword'] != 0) {
        $kyw = $_POST['key'];
        $dssp = loadall_sanpham_tk($kyw);
        $count = COUNT($dssp);
        include "view/shop.php";
    } else {
        $kyw = "";
    }
    if (isset($_GET['id_dm']) && ($_GET['id_dm'] > 0)) {
        $id = $_GET['id_dm'];
    } else {
        $id = 0;
    }
     // tất cả nam nữ 
     if(isset($_GET['gioi_tinh']) && ($_GET['gioi_tinh']>0)){
        $gioi_tinh=$_GET['gioi_tinh'];
    }
    else {
        $gioi_tinh=0;
    }
    // hết 
    if (isset($_GET['act']) && ($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'home':
                $sp = load_sanpham_view_top8();
                include "view/include/home.php";
                break;
            case 'shop':
                $dssp=loadall_sanpham_tk($kyw,$id,$gioi_tinh);
                $count = COUNT($dssp);
                include "view/shop.php";
                break;
            case 'chitietSP':
                $id = $_GET['id_sp'];
                $id_dm = $_GET['id_dm'];
                $load_color = load_color_ct($id);
                $sanpham = load_sanpham_all_dm($id_dm);
                $binhluan =  LoadAll_BL_user($id);
                updat_view($id);
                $sp_img = load_sanpham_one($id);
                $img = load_img($id);
                $load_size = load_size_ct($id);
                include "view/sanpham/sanphamct.php";
                break;
            case 'thanhtoan':
                if (isset($_POST['dathang']) && ($_POST['dathang'] != "")) {
                    // Function to generate a random string
                    function generateRandomString($length = 3)
                    {
                        $characters = '0123456789';
                        $randomString = '';
                    
                        for ($i = 0; $i < $length; $i++) {
                            $randomString .= $characters[rand(0, strlen($characters) - 1)];
                        }
                    
                        return $randomString;
                    }
                    
                    // Check if the form is submitted for payment
                    if (isset($_POST['dathang']) && !empty($_POST['dathang'])) {
                        // Get user ID if logged in, otherwise set to 0
                        $id_tk = isset($_SESSION['username']) ? $_SESSION['username']['id_tk'] : 0;
                    
                        // Get form data
                        $diachi = $_POST['customInput'];
                        $name = $_POST['name'];
                        $phone = $_POST['sdt'];
                        $ghichu = $_POST['ghichu'];
                        $thanhtoan = $_POST['payment_method'];
                        $tong_tien = $_POST['tong'];
                    
                        // Generate a random order number
                        $ma_don = generateRandomString(3);
                        $don_ma = "#Don" . $ma_don;

                        // 65 is ASCII code for 'A', and 90 is ASCII code for 'Z'
                        $char1 = chr(rand(65, 90));
                        $char2 = chr(rand(65, 90));
                        $digits = "";
                        for ($i = 0; $i < 10; $i++) {
                            $digits .= rand(0, 9);
                        }

                        // Combine characters and digits to form the fax number
                        $faxNumber = $char1 . $char2 . $digits;
                    
                        // Get the current date and time
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $thoigian = date('Y-m-d H:i:s');
                    
                        // Add a new order to the database
                        $id_don = add_bill($id_tk, $diachi, $name, $phone, $ghichu, $thanhtoan,  $don_ma, $thoigian, $tong_tien, $faxNumber);
                    
                        // Add order details for each item in the cart
                        foreach ($_SESSION['cart'] as $item) {
                            $id_sp = $item['id'];
                            $so_luong = $item['quantity'];
                            $id_mau = $item['mau'];
                            $id_size = $item['size'];
                            add_bill_ct($id_sp, $so_luong, $id_mau, $id_size, $id_don);
                        }
                    
                        // Clear the shopping cart
                        unset($_SESSION["cart"]);
                    
                        // Set up error reporting
                        error_reporting(E_ALL);
                        ini_set('display_errors', 1);
                        
                        // Check the payment method
                        if ($thanhtoan == 0) {
                            // Handle Momo payment
                            include "view/xulymomo.php";
                        } else {
                            // Redirect to the order details page
                            echo "<script>window.location.href ='?act=lichsumua'</script>";
                            exit(); // Ensure that the script stops after the redirect
                        }
                    }
                    
                 
                }
                break;
            case 'lichsumua':
                $mau1 = LoadAll_color();
                $size1 = LoadAll_size();
                if (isset($_GET['bill'])) {
                    $keyw = $_GET['bill'];
                } else {
                    $keyw = "";
                }
               // echo $keyw ; 
                $id = $_SESSION['username']['id_tk'];
                $don = load_all_bill($keyw,$id);
                include "view/thanhtoan/lichsumua.php";
            break;

            case 'chitietmua':
                $mau1 = LoadAll_color();
                $size1 = LoadAll_size();
                $id = $_GET['id_don'];
                $ctdon = chitietmua_ctdon($id);
                $donhang = loadd_bill_ct($id);
                $sanpham_lq = loadd_bill_lq_ct($id);
                // echo "<pre>";
                // var_dump($sanpham_lq,$donhang);
                // echo"</pre>";
                include "view/thanhtoan/chitietdonhang.php";   
            break;

            case 'CTthanhtoan':
                if (!empty($_SESSION['cart'])) {
                    $cart = $_SESSION['cart'];
                    $mau1 = LoadAll_color();
                    $size1 = LoadAll_size();
                    // Tạo mảng chứa ID các sản phẩm trong giỏ hàng
                    $productId = array_column($cart, 'id');
                    $mau = array_column($cart, 'mau');
                    $size = array_column($cart, 'size');
                    // var_dump($productId, $mau, $size);
                    // Chuyển đôi mảng  thành một cuỗi để thực hiện truy vấn
                    $idList = implode(',', $productId);
                    $mauList = "'" . implode("','", $mau) . "'";
                    $sizeList = "'" . implode("','", $size) . "'";
                    //$id_spList = "'" . implode("','", $id_sp) . "'";
                    // Lấy sản phẩm trong bảng sản phẩm theo id
                    $dataDb = loadone_sanphamCart($idList, $mauList, $sizeList);
                }
                include "view/thanhtoan/chitietThanhtoan.php";
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
                if (!empty($_SESSION['cart'])) {
                    $cart = $_SESSION['cart'];
                    $mau1 = LoadAll_color();
                    $size1 = LoadAll_size();
                    // Tạo mảng chứa ID các sản phẩm trong giỏ hàng
                    $productId = array_column($cart, 'id');
                    $mau = array_column($cart, 'mau');
                    $size = array_column($cart, 'size');
                    // var_dump($productId, $mau, $size);
                    // Chuyển đôi mảng  thành một cuỗi để thực hiện truy vấn
                    $idList = implode(',', $productId);
                    $mauList = "'" . implode("','", $mau) . "'";
                    $sizeList = "'" . implode("','", $size) . "'";
                    //$id_spList = "'" . implode("','", $id_sp) . "'";
                    // Lấy sản phẩm trong bảng sản phẩm theo id
                    $dataDb = loadone_sanphamCart($idList, $mauList, $sizeList);
                }
                include "view/giohang/cart.php";
                break;
            
            case 'xoaallgio':

                if (isset($_SESSION["cart"])) {
                    unset($_SESSION["cart"]);
                    echo '<script>alert("Đã Dọn Dẹp Giỏ Hàng ! ")</script>';
                    echo "  <script>window.location.href ='?act=cart'</script> ";
                }


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
                        unset($_SESSION["username"]);
                        move_uploaded_file($file['tmp_name'], "assets/uploads/" . $img);
                    }
                    upload_tk_user($id, $sdt, $full_name, $diachi, $email, $img);
                    if (empty($_SESSION['username'])) {
                        $username = $_POST['tk'];
                        $password = $_POST['mk'];
                        $checkuser = checkuser($username, $password);
                        if (is_array($checkuser)) {
                            $_SESSION['username'] = $checkuser;
                        }
                    }
                    // echo $img;


                }

                echo '<script>alert("Cập nhật Thành Công")</script>';
                echo "  <script>window.location.href ='index.php'</script> ";
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
                    $id_dm = $_POST['id_dm'];
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $ngayGioHienTai = date('Y-m-d H:i:s');
                    add_bl($name, $id_tk, $id_sp, $ngayGioHienTai);
                    echo "  <script>window.location.href ='?act=chitietSP&id_sp=$id_sp&id_dm=$id_dm'</script> ";
                }

                break;
            case 'quenmk':
                include "./view/taikhoan/quenmk.php";
                break;
            case 'doimk':
                if (isset($_POST['submit'])) {
                    $id = $_SESSION['username']['id_tk']; // Lấy ID từ session
                    $password = $_POST['password'];
                    $newPassword = $_POST['newPassword'];
                    $confirmPassword = $_POST['confirmPassword'];

                    if ($_SESSION['username']['pass'] == $password) {
                        if ($newPassword === $confirmPassword) {
                            // Gọi hàm để cập nhật mật khẩu trong session
                            changepassword($id, $newPassword);
                            //unset($_SESSION["username"]);
                            // Sau khi cập nhật session, bạn có thể tiến hành cập nhật trong cơ sở dữ liệu.
                            // Cần sử dụng câu lệnh SQL UPDATE để cập nhật mật khẩu trong bảng taikhoan

                            // Ví dụ:
                            // $sql = "UPDATE taikhoan SET pass = '$newPassword' WHERE id_tk = $id";
                            // pdo_execute($sql);
                            if (isset($_SESSION["username"])) {
                                unset($_SESSION["username"]);
                            }
                            echo '<script>alert("Bạn đã đổi mật khẩu thành công")</script>';
                            header("refresh:0.08;url=?act=login");
                        } else {
                            echo '<script>alert("Xác nhận mật khẩu không khớp")</script>';
                        }
                    } else {
                        echo '<script>alert("Mật Khẩu cũ Không đúng ")</script>';
                    }
                }
                include "view/Taikhoan/doimk.php";
                break;
            default:
                break;
        }
    } else {
        $sp = load_sanpham_view_top8();
        include "view/include/home.php";
    }
    include "view/include/footer.php";
    ?>


  