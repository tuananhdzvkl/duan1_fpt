<?php
function LoadAll_BL()
{
  $sql = "SELECT * FROM binh_luan ";
  $bl = pdo_query($sql);
  return $bl;
}
function thongke_bl()
{
  $sql = "SELECT danhmuc.id_dm, name_dm, COUNT(binh_luan.id_bl) AS Tong
  FROM danhmuc
  LEFT JOIN sanpham ON sanpham.id_dm = danhmuc.id_dm LEFT JOIN binh_luan ON sanpham.id_sp = binh_luan.id_sp 
  GROUP BY danhmuc.id_dm, name_dm;";
  $dm = pdo_query($sql);

  return $dm;
}
function bl_theo_dm($id)
{
  $sql = "SELECT *
  FROM danhmuc
JOIN sanpham ON sanpham.id_dm = danhmuc.id_dm JOIN binh_luan ON sanpham.id_sp = binh_luan.id_sp JOIN taikhoan 
ON binh_luan.id_tk = taikhoan.id_tk
  WHERE danhmuc.id_dm = $id;";
  $dm = pdo_query($sql);

  return $dm;
}
function xoa_bl($id)
{
  $sql = "DELETE FROM binh_luan WHERE id_bl = $id";
  pdo_execute($sql);
}
