<?php

$id =$_GET['id'];
$sql = $conn->query("DELETE FROM tb_dispo WHERE id='$id'");

if ($sql) {
  ?>
  <script type="text/javascript">
  alert("Disposisi berhasil dihapus..!");
  window.location.href="?page=masuk";
  </script>
  <?php
}

 ?>
