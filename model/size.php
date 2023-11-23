<?php

function LoadAll_size()
{
  $sql = "SELECT * FROM size ";
  $dm = pdo_query($sql);
  return $dm;
}

function delete_size($id)
{

  $sql = " DELETE FROM size  WHERE id_size = $id";
  pdo_query($sql);
}
function add_size($name)
{

  $sql = " INSERT INTO size(name_size) VALUES ('$name') ";
  pdo_query($sql);
}
function Loadone_size($id)
{
  $sql = "SELECT * FROM size WHERE id_size = $id";
  $dm = pdo_query_one($sql);
  return $dm;
}
function edit_size($idsize, $name)
{
  $sql = "UPDATE size SET name_size='$name' WHERE id_size='$idsize' ";
 pdo_execute($sql);
 
}