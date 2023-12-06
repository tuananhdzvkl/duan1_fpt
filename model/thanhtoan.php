<?php
function  add_bill($id_tk, $diachi, $name, $phone, $ghichu, $thanhtoan,  $don_ma, $thoigian, $tong_tien, $faxNumber)
{
  $sql = " INSERT INTO `chitiet_donhang`(`id_tk`,`ma_don`, `full_name`, `phone`,`ghichu`, `dia_chi`, `thoi_gian`, `thanh_tien`, `trang_thai`, `thanh_toan`,`faxNumber`)
   VALUES ('$id_tk','$don_ma','$name','$phone','$ghichu','$diachi','$thoigian','$tong_tien','0','$thanhtoan','$faxNumber')";
  $lastInsertedId = pdo_execute_return_lastInsertId($sql);
  return $lastInsertedId;
}
function add_bill_ct($id_sp,  $so_luong, $id_mau, $id_size,  $id_don)
{
  $sql = "INSERT INTO `don_hang`(`id_ctd`, `id_sp`, `so_luong`, `mau_sac`, `kich_co`) 
    VALUES ('$id_don','$id_sp','$so_luong','$id_mau','$id_size')";
  pdo_execute($sql);
}
function loadd_bill_ct($id_sp)
{
  $sql = "SELECT * FROM `chitiet_donhang` WHERE `id_ctdon` = '$id_sp'";
 $hi = pdo_query($sql); 
 return $hi;
}

function loadd_bill_lq_ct($id_don)
{
  $sql = "SELECT dh.*, sp.gia, sp.giam_gia, sp.name_sp, sp.image_sp
  FROM don_hang dh INNER JOIN sanpham sp ON dh.id_sp = sp.id_sp
  WHERE dh.id_ctd = '$id_don'";

    $hi = pdo_query($sql);
    return $hi;
}

function chitietmua_ctdon($id_don)
{
  $sql = "SELECT id_ctdon FROM chitiet_donhang ORDER BY id_ctdon DESC LIMIT 1;";

  $hi = pdo_query($sql);
  return $hi;
}

