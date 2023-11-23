<?php
function LoadAll_TK()
{
  $sql = "SELECT * FROM taikhoan ";
  $tk = pdo_query($sql);
  return $tk;
}
function Load_one_TK($id)
{
  $sql = "SELECT * FROM taikhoan WHERE id_tk = $id";
  $tk = pdo_query_one($sql);
  return $tk;
}
function xoa_TK($id)
{
  $sql = "DELETE FROM taikhoan  WHERE id_tk = $id";
  $tk = pdo_query_one($sql);
  return $tk;
}
function checkuser($username, $password)
{
  $sql = "SELECT *FROM taikhoan where name_tk ='" . $username . "' AND pass ='" . $password . "'";
  $sp = pdo_query_one($sql);
  return $sp;
}
function upload_tk($id, $name)
{
  $sql = "UPDATE `taikhoan` SET chucvu ='$name' WHERE id_tk = $id";
  pdo_execute($sql);
}
function mo_TK($id,$name)
{
  $sql = "UPDATE `taikhoan` SET `lock`='$name' WHERE id_tk = $id;";
  pdo_execute($sql);
}