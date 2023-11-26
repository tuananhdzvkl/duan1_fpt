<?php
function loadall_thongke()
{
    $sql = "SELECT danhmuc.id_dm as id, danhmuc.name_dm as tenloai, count(sanpham.id_sp) as countsp,min(sanpham.gia) as minprice, max(sanpham.gia) as maxprice, avg(sanpham.gia) as avgprice";
    $sql .= " FROM sanpham left join danhmuc on danhmuc.id_dm=sanpham.id_dm";
    $sql .= " GROUP BY danhmuc.id_dm order by danhmuc.id_dm desc";
    $listtk = pdo_query($sql);
    return $listtk;
}
function thongke_ngay()
{
    $sql = "SELECT don_hang.id_sp , SUM(thanh_tien) as Tong , SUM(don_hang.so_luong)
     AS so_luong , thoi_gian , trang_thai FROM `chitiet_donhang`  JOIN don_hang  
     ON chitiet_donhang.id_ctdon = don_hang.id_sp  WHERE trang_thai = 3 GROUP BY don_hang.id_sp;";
    $thongke = pdo_query($sql);
    return $thongke;
}
