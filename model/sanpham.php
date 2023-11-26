<?php
function add_sanpham($name, $giam_gia, $mota, $date, $gioitinh, $dm, $gia, $img)
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
function up_sanpham($name, $id, $img, $gioitinh,  $mota, $giam_gia, $gia, $date, $dm)
{
  $sql = "UPDATE sanpham SET name_sp='$name',image_sp='$img',giam_gia=' $giam_gia',gia='$gia',mo_ta=' $mota',ngay_nhap='$date',gioi_tinh='$gioitinh',id_dm='$dm' WHERE id_sp='$id'";
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

function load_danhmuc_all()
{
  $sql = "SELECT * FROM `danhmuc`";
  $load_danhmuc =   pdo_query($sql);
  return $load_danhmuc;
}
function load_size_all()
{
  $sql = "SELECT * FROM `size`";
  $load_size =   pdo_query($sql);
  return $load_size;
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
  $sql = "SELECT DISTINCT gioi_tinh FROM sanpham";
  $load_gioitinh = pdo_query($sql);
  return $load_gioitinh;
}
function updat_view($id)
{
  $sql = "UPDATE `sanpham` SET view = view+1 WHERE id_sp = $id";
   pdo_execute($sql);
}
