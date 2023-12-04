<?php
function  add_bill($id_tk, $diachi, $name, $phone, $thanhtoan,  $don_ma, $thoigian, $tong_tien)
{
  $sql = " INSERT INTO `chitiet_donhang`(`id_tk`,`ma_don`, `full_name`, `phone`, `dia_chi`, `thoi_gian`, `thanh_tien`, `trang_thai`, `thanh_toan`)
   VALUES ('$id_tk','$don_ma','$name','$phone','$diachi','$thoigian','$tong_tien','0','$thanhtoan')";
  $lastInsertedId = pdo_execute_return_lastInsertId($sql);
  return $lastInsertedId;
}
function add_bill_ct($id_sp,  $so_luong, $id_mau, $id_size,  $id_don)
{
  $sql = "INSERT INTO `don_hang`(`id_ctd`, `id_sp`, `so_luong`, `mau_sac`, `kich_co`) 
    VALUES ('$id_don','$id_sp','$so_luong','$id_mau','$id_size')";
  pdo_execute($sql);
}
