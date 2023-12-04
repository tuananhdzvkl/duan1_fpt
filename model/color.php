<?php

function LoadAll_color()
{
  $sql = "SELECT * FROM color ";
  $dm = pdo_query($sql);
  return $dm;
}

function delete_color($id)
{

  $sql = " DELETE FROM color  WHERE id_color = $id";
  pdo_query($sql);
}
function add_color($name, $mau)
{

  $sql = "INSERT INTO `color`(`name_color`, `mau`) VALUES ('$name', '$mau')";
  pdo_query($sql);
}
function Loadone_color($id)
{
  $sql = "SELECT * FROM color WHERE id_color = $id";
  $dm = pdo_query_one($sql);
  return $dm;
}
function edit_color($idcolor, $name, $mau)
{
  $sql = "UPDATE color SET name_color='$name' , mau='$mau' WHERE id_color='$idcolor' ";
  pdo_execute($sql);
}
