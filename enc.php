
 <?php
 require 'enc_lib.php';
 require 'connect.php';
 
 
if (strlen($_POST["name"]) % 2 ==0) { 
    $sql = "select count(*) as w from logs where enc='".$_POST["name"]."'";
    
    $w = select_onevalue($sql);
     
    if ($w ==0) {
      $sql = "INSERT INTO logs (enc) VALUES ('" . $_POST["name"]."')";
      exec_dml($sql);
      $d= decr($_POST["name"]);
      $empno=substr($d,0,5);
      $date = date('d/m/Y' ,mktime(0,0,0,substr($d,9,2),substr($d,11,2), substr($d,5,4)));
      $invoice =substr($d,13,6);
      $price = (int) substr($d,19,6);
      $f = is_numeric($empno) *is_numeric(substr($d,5,8))*is_numeric($invoice)*is_numeric($price);
      if ($f == 1) {
        echo 'Emp No ' . $empno.'<br>';
        echo 'Date '. $date.'<br>';
        echo 'Invoice No  '. $invoice.'<br>';
        echo 'price  '. $price.'<br>';
        echo '<div>';
        echo '<img ondrag="return false" ondragstart="return false"'.'oncontextmenu="return false"'.
       'galleryimg="no" onmousedown="return false"'.'src="https://mynpc.nasroil.com/emp/pic/'. $empno .
       '.jpg" class="circle" alt="">';
        echo '</div>';
     } else {
         echo 'Wrong Number';
     } 
    }
    else {
        echo 'Dublicated';
    }
    } else {
         echo 'Wrong Number';
     }

    



?>