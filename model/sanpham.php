<?php
function add_sanpham($name, $giam_gia, $mota, $date, $gioitinh, $dm, $gia, $img, $mota_n)
{
  $sql = " INSERT INTO sanpham (id_sp, name_sp,mo_ngan, image_sp, giam_gia, gia, mo_ta, ngay_nhap, view, gioi_tinh, id_dm) 
  VALUES (NULL, '$name','$mota_n', '$img', '$giam_gia', '$gia', '$mota', '$date', '0', '$gioitinh', '$dm') ";
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
function up_sanpham($name, $id, $img, $gioitinh,  $mota, $giam_gia, $gia, $date, $dm, $mota_n)
{
  $sql = "UPDATE sanpham SET name_sp='$name',mo_ngan='$mota_n' ,image_sp='$img',giam_gia=' $giam_gia',gia='$gia',mo_ta='$mota',ngay_nhap='$date',gioi_tinh='$gioitinh',id_dm='$dm' WHERE id_sp='$id'";
  pdo_execute($sql);
}

function load_img($id)
{
  $sql = " SELECT * FROM img_sp WHERE id_sp='$id'";
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
function load_sanphambt_all($id)
{
  $sql = "SELECT * FROM `sanpham_bienthe` JOIN color ON sanpham_bienthe.id_color = color.id_color JOIN size ON size.id_size = sanpham_bienthe.id_size 
  WHERE id_sp = $id GROUP BY id_spbt ASC;";
  $sp =   pdo_query($sql);
  return $sp;
}

// function load_sanpham_img($id)
// {
//   $sql = "SELECT * FROM sanpham LEFT JOIN img_sp ON sanpham.id_sp = img_sp.id_sp
//   WHERE sanpham.id_sp = $id";
//   $sp_img = pdo_query_one($sql);
//   return $sp_img;
// }


/// load size bên user 
function load_size_ct($id)
{
  $sql = "SELECT * FROM `sanpham_bienthe` LEFT JOIN size ON sanpham_bienthe.id_size = size.id_size WHERE id_sp = $id GROUP BY sanpham_bienthe.id_size;";
  $sp_img = pdo_query($sql);
  return $sp_img;
}
function updat_view($id)
{
  $sql = "UPDATE `sanpham` SET view = view+1 WHERE id_sp = $id";
  pdo_execute($sql);
}
function sua_spbienthe($id, $size, $color, $soluong)
{
  $sql = "UPDATE `sanpham_bienthe` SET `id_color`=' $color',`id_size`='$size',`soluong`='$soluong' WHERE `id_spbt`='$id' ";
  pdo_execute($sql);
}
function load_one_bt($id)
{
  $sql = "SELECT * FROM `sanpham_bienthe` WHERE `id_spbt`='$id'";
  $bt =  pdo_query_one($sql);
  return $bt;
}
function xoa_spbienthe($id)
{
  $sql = "DELETE FROM `sanpham_bienthe` WHERE id_spbt = '$id'";
  pdo_execute($sql);
}

function load_color_ct($id)
{
  $sql = "SELECT * FROM `sanpham_bienthe` LEFT JOIN color ON sanpham_bienthe.id_color = color.id_color WHERE id_sp = $id GROUP BY sanpham_bienthe.id_color;";
  $sp_img = pdo_query($sql);
  return $sp_img;
}
function loadone_sanphamCart($idList,$mauList,$sizeList) {
  $sql = "SELECT * 
  FROM sanpham 
  JOIN sanpham_bienthe ON sanpham.id_sp = sanpham_bienthe.id_sp 
  WHERE sanpham.id_sp IN ($idList) AND id_color IN ($mauList) AND id_size IN ($sizeList);";
  $sanpham = pdo_query($sql);
  return $sanpham;
}

// Tất cả, nam, nữ 
function loadall_sanpham_tk($keyw="",$id_dm=0,$gioi_tinh=0){
  $sql = "select * from sanpham JOIN danhmuc ON sanpham.id_dm = danhmuc.id_dm where 1";
  if($keyw != ""){
    $sql .= " and name_sp like '%".$keyw."%'";
  }
  if($id_dm > 0){
    $sql .= " and sanpham.id_dm ='".$id_dm."'";
  }
  if($gioi_tinh > 0){
    $sql .= " and gioi_tinh ='".$gioi_tinh."'";
  }
  $sql .= " order by id_sp";
  $listsanpham = pdo_query($sql);
  return  $listsanpham;
}
function tongsp_gioitinh($gioi_tinh = null)
{
    $sql = "SELECT gioi_tinh, COUNT(*) AS total FROM sanpham GROUP BY gioi_tinh";
    $result = pdo_query($sql);

    $gioitinhCounts = [];
    foreach ($result as $row) {
        $gioitinhCounts[$row['gioi_tinh']] = [
            'total' => $row['total'],
        ];
    }

    // If gioi_tinh is null or 3, calculate the total for all genders
    if ($gioi_tinh === null || $gioi_tinh == 0) {
        $totalAllGenders = array_sum(array_column($gioitinhCounts, 'total'));
        $gioitinhCounts[0] = [
            'total' => $totalAllGenders,
        ];
    }

    return $gioitinhCounts;
}



function load_sanpham_top8()
{
  $sql = "SELECT * FROM sanpham JOIN danhmuc ON sanpham.id_dm = danhmuc.id_dm ORDER BY sanpham.id_sp DESC LIMIT 8";
  $sp =   pdo_query($sql);
  return $sp;
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

function load_color_all()
{
  $sql = "SELECT * FROM `color`";
  $load_color =   pdo_query($sql);
  return $load_color;
}

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

