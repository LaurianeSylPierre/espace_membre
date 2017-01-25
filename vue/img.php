<?php
require_once ('../controleur/connexionDB.php');
?>

<!doctype html>

<html>
   <head>
      <title>images</title>
   </head>
   <body>
      <h3>Image</h3>
      <form enctype="multipart/form-data" action="#" method="post">
         <input type="hidden" name="filesize" value="150000" />
         <input type="file" name="file" />
         <input type="submit" name="button" value="Changer" />
          <br>
          <br>
          <?php
require_once ('../controleur/imgverif.php');
if (isset($_POST['button'])) {verifimg();}

?>
      </form>
   </body>
</html>
