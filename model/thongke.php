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
    $sql = "SELECT SUM(thanh_tien) AS tong, DATE_FORMAT(thoi_gian, '%d-%m-%Y') AS ngay,
            MIN(thoi_gian) AS start_time, MAX(thoi_gian) AS end_time
    FROM `chitiet_donhang`
    WHERE thoi_gian >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND thoi_gian <= CURDATE()
    GROUP BY DATE_FORMAT(thoi_gian, '%d-%m-%Y')
    ORDER BY DATE_FORMAT(thoi_gian, '%d-%m-%Y')";
    return pdo_query($sql);
}


function thongke_tuan()
{
    $sql = "SELECT SUM(thanh_tien) AS tong, CONCAT(YEAR(thoi_gian), '-', WEEK(thoi_gian)) AS tuan,
            MIN(thoi_gian) AS start_time, MAX(thoi_gian) AS end_time
    FROM `chitiet_donhang`
    WHERE thoi_gian >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND thoi_gian <= CURDATE()
    GROUP BY CONCAT(YEAR(thoi_gian), '-', WEEK(thoi_gian))
    ORDER BY CONCAT(YEAR(thoi_gian), '-', WEEK(thoi_gian));";
    return pdo_query($sql);
}

function thongke_thang()
{
    $sql = "SELECT SUM(thanh_tien) AS tong, DATE_FORMAT(thoi_gian, '%m-%Y') AS thang,
            MIN(thoi_gian) AS start_time, MAX(thoi_gian) AS end_time
    FROM `chitiet_donhang`
    WHERE YEAR(thoi_gian) = YEAR(CURDATE())
    GROUP BY DATE_FORMAT(thoi_gian, '%m-%Y')
    ORDER BY DATE_FORMAT(thoi_gian, '%m-%Y');
    ";
    return pdo_query($sql);
}


function thongke_nam()
{
    $sql = "SELECT SUM(thanh_tien) AS tong, YEAR(thoi_gian) AS nam,
            MIN(thoi_gian) AS start_time, MAX(thoi_gian) AS end_time
    FROM `chitiet_donhang`
    GROUP BY YEAR(thoi_gian)
    ORDER BY YEAR(thoi_gian);
    ";
    return pdo_query($sql);
}


