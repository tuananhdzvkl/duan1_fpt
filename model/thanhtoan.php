<?php
    function load_location_all()
    {
      $sql = "SELECT * FROM  province";
      $city = pdo_query($sql);
      return $city;
    }
?>