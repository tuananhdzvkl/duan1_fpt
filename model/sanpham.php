<?php
function add_sanpham($name, $giam_gia, $mota, $date, $gioitinh, $dm, $gia, $img, $mota_ct)
{
  $sql = " INSERT INTO sanpham (id_sp, name_sp, image_sp, giam_gia, gia, mo_ta, ngay_nhap, view, gioi_tinh, id_dm) 
    VALUES (NULL, '$name', '$img', '$giam_gia', '$gia', '$mota', '$date', '0', '$gioitinh', '$dm') ";
  $lastInsertedId = pdo_execute_return_lastInsertId($sql);

  return $lastInsertedId;
}
function add_img($name, $id)
{
  $sql = " INSERT INTO img_sp(id_sp, img_url) VALUES ('$id','$name') ";
  pdo_execute($sql);
}
function load_sanpham_all()
{
  $sql = "SELECT * FROM sanpham JOIN danhmuc ON sanpham.id_dm = danhmuc.id_dm";
  $sp =   pdo_query($sql);
  return $sp; 
}
function xoasp($id)
{
  $sql = " DELETE FROM sanpham  WHERE id_sp = $id";
  pdo_query($sql);
}
function load_sanpham_one($id)
{
  $sql = "SELECT * FROM sanpham WHERE id_sp = $id";
  $sp =   pdo_query_one($sql);
  return $sp;
}

function loadone_sanphamCart($idList) {
  $sql = 'SELECT * FROM sanpham WHERE id_sp IN (' . $idList . ')';
  $sanpham = pdo_query($sql);
  return $sanpham;
}

function load_one_bt($id)
{
  $sql = "SELECT * FROM `sanpham_bienthe` WHERE `id_spbt`='$id'";
  $bt =  pdo_query_one($sql);
  return $bt;
}

function sua_spbienthe($id, $size, $color, $soluong)
{
  $sql = "UPDATE `sanpham_bienthe` SET `id_color`=' $color',`id_size`='$size',`soluong`='$soluong' WHERE `id_spbt`='$id' ";
  pdo_execute($sql);
}

function xoa_spbienthe($id)
{
  $sql = "DELETE FROM `sanpham_bienthe` WHERE id_spbt = '$id'";
  pdo_execute($sql);
}
 
function up_sanpham($name, $id, $img, $gioitinh,  $mo_ta, $giam_gia, $gia, $date, $dm, $mota_ct)
{
  $sql = "UPDATE sanpham SET name_sp='$name',mo_ta='$mo_ta' ,image_sp='$img',giam_gia=' $giam_gia',gia='$gia',mota_ct='$mota_ct',ngay_nhap='$date',gioi_tinh='$gioitinh',id_dm='$dm' WHERE id_sp='$id'";
  pdo_execute($sql);
}

function load_img($id)
{
    $sql = "SELECT * FROM `img_sp` WHERE id_sp = '$id'";
    $img = pdo_query($sql);
    return $img;
}

function xoaimgsp($id)
{
  $sql = " DELETE FROM img_sp  WHERE id_sp = $id";
  pdo_query($sql);
}
// biến thể 
function add_spbienthe($id, $size, $color, $soluong)
{
  $sql = "INSERT INTO sanpham_bienthe(id_color, id_size, id_sp, soluong) 
  VALUES ('$color','$size','$id','$soluong')";
  pdo_execute($sql);
}

function delete_spbienthe($id)
{
    $sql = "DELETE FROM sanpham_bienthe WHERE id = $id";
    pdo_execute($sql);
}

function edit_spbienthe($id, $size, $color, $soluong)
{
    $sql = "UPDATE sanpham_bienthe 
            SET id_color = '$color',
                id_size = '$size',  
                soluong = '$soluong' 
            WHERE id_spbienthe = $id";

    pdo_execute($sql);
}

function load_sanphambt_all($id)
{
  $sql = "SELECT * FROM `sanpham_bienthe` JOIN color ON sanpham_bienthe.id_color = color.id_color JOIN size ON size.id_size = sanpham_bienthe.id_size 
  WHERE id_sp = $id GROUP BY id_spbt ASC;";
  $sp =   pdo_query($sql);
  return $sp;
}

function load_sanpham_all_by_gender($gioi_tinh)
{
    $sql = "SELECT * FROM sanpham JOIN danhmuc ON sanpham.id_dm = danhmuc.id_dm WHERE gioi_tinh = '$gioi_tinh'";
    $sp = pdo_query($sql);
    return $sp;
}

function load_sanpham_all_by_views()
{
    $sql = "SELECT * FROM sanpham JOIN danhmuc ON sanpham.id_dm = danhmuc.id_dm ORDER BY view DESC";
    $sp = pdo_query($sql);
    return $sp;
}

// function load_danhmuc_all()
// {
//   $sql = "SELECT * FROM `danhmuc`";
//   $load_danhmuc =   pdo_query($sql);
//   return $load_danhmuc;
// }
function load_size_with_total_products()
{
    $sql = "SELECT size.*, COUNT(sanpham_bienthe.id_spbt) AS total_products
            FROM size
            LEFT JOIN sanpham_bienthe ON size.id_size = sanpham_bienthe.id_size
            WHERE sanpham_bienthe.soluong > 0
            GROUP BY size.id_size";

    $result = pdo_query($sql);
    return $result;
}

function load_sanpham_all_size($id_size)
{
    $sql = "SELECT * FROM sanpham_bienthe WHERE id_size = $id_size";
    $sp = pdo_query($sql);
    return $sp;
}




function load_size_ct($id)
{
  $sql = "SELECT * FROM `sanpham_bienthe` LEFT JOIN size ON sanpham_bienthe.id_size = size.id_size WHERE id_sp = $id GROUP BY sanpham_bienthe.id_size;";
  $sp_img = pdo_query($sql);
  return $sp_img;
}

function load_color_all()
{
  $sql = "SELECT * FROM `color`";
  $load_color =   pdo_query($sql);
  return $load_color;
}
function load_color_ct($id)
{
    $sql = "SELECT * FROM `sanpham_bienthe` LEFT JOIN color ON sanpham_bienthe.id_color = color.id_color WHERE id_sp = $id GROUP BY sanpham_bienthe.id_color;";
    $sp_color = pdo_query($sql);
    return $sp_color;
}
function load_gioitinh_all()
{
  $sql = "SELECT DISTINCT gioi_tinh, CASE gioi_tinh
      WHEN 0 THEN 'Unisex'
      WHEN 1 THEN 'Nam'
      WHEN 2 THEN 'Nữ'
      ELSE 'Unknown'
  END AS name_gt FROM sanpham; ";
  $load_gioitinh = pdo_query($sql);
  return $load_gioitinh;
}
function updat_view($id)
{
  $sql = "UPDATE `sanpham` SET view = view+1 WHERE id_sp = $id";
   pdo_execute($sql);
}

function search_sanpham_by_keyword($keyword)
{
    // Sử dụng LIKE để tìm kiếm các sản phẩm có tên hoặc mô tả chứa từ khóa
    $sql = "SELECT * FROM sanpham JOIN danhmuc ON sanpham.id_dm = danhmuc.id_dm WHERE name_sp LIKE '%$keyword%' OR mo_ta LIKE '%$keyword%'";
    $result = pdo_query($sql);

    return $result;
}

function get_gioitinh_by_id($id)
{
    $sql = "SELECT gioi_tinh FROM sanpham WHERE id_sp = $id";
    $result = pdo_query_one($sql);

    return $result['gioi_tinh'];
}

function tongsp_gioitinh()
{
    $sql = "SELECT gioi_tinh, COUNT(*) AS total FROM sanpham GROUP BY gioi_tinh";
    $result = pdo_query($sql);

    $gioitinhCounts = [];
    foreach ($result as $row) {
        $gioitinhCounts[$row['gioi_tinh']] = [
            'total' => $row['total'],
        ];
    }

    return $gioitinhCounts;
}


function load_sanpham_all_gioitinh($gioi_tinh)
{
    // Lấy chi tiết sản phẩm theo giới tính
    $sql = "SELECT * FROM sanpham WHERE gioi_tinh = :gioi_tinh";
    $result = pdo_query($sql, array(':gioi_tinh' => $gioi_tinh));

    return $result;
}




function tongsp_size()
{
    $sql = "SELECT size.id_size, size.name_size, COUNT(sanpham_bienthe.id_spbt) AS tong_sp
            FROM size LEFT JOIN sanpham_bienthe ON size.id_size = sanpham_bienthe.id_size
            WHERE sanpham_bienthe.soluong > 0 GROUP BY size.id_size";

    $result = pdo_query($sql);

    $sizeCounts = [];
    foreach ($result as $row) {
        $sizeCounts[$row['id_size']] = [
            'Tong' => $row['tong_sp'],
        ];
    }

    return $sizeCounts;
}


function loadall_sanpham_tk($keyw="",$id_dm=0){
  $sql = "select * from sanpham JOIN danhmuc ON sanpham.id_dm = danhmuc.id_dm where 1";
  if($keyw != ""){
    $sql .= " and name_sp like '%".$keyw."%'";
  }
  if($id_dm > 0){
    $sql .= " and sanpham.id_dm ='".$id_dm."'";
  }
  $sql .= " order by id_sp";
  $listsanpham = pdo_query($sql);
  return  $listsanpham;
}