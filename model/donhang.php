<?php 

function load_don(){
    $sql = "SELECT * FROM `chitiet_donhang` " ; 
    $don = pdo_query($sql) ;
    return $don ; 
}
function load_don_chitiet($id){
    $sql = "SELECT * FROM `don_hang` JOIN sanpham on sanpham.id_sp = don_hang.id_sp WHERE `id_ctd` = '$id' " ;  
    $don = pdo_query($sql) ;
    return $don ; 
}

function chitiet_donhang(){
    $sql = "SELECT chitiet_donhang.ma_don, chitiet_donhang.full_name, chitiet_donhang.phone, chitiet_donhang.dia_chi, chitiet_donhang.thanh_tien, chitiet_donhang.trang_thai, chitiet_donhang.thanh_toan, sanpham.name_sp, sanpham.image_sp, don_hang.so_luong, don_hang.mau_sac, don_hang.kich_co, sanpham.giam_gia, sanpham.mo_ta FROM chitiet_donhang JOIN sanpham JOIN don_hang ON sanpham.id_sp = don_hang.id_sp";
    
    $donmua = pdo_query($sql) ;
    return $donmua ; 
}
function up_don($id,$trang){
    $sql = "UPDATE chitiet_donhang SET trang_thai = $trang WHERE id_ctdon = $id" ;  
    pdo_execute($sql) ;
}
function  xoa_don($id){
    $sql = "DELETE FROM `chitiet_donhang` WHERE id_ctdon = $id" ;  
    pdo_execute($sql) ;
}
?>