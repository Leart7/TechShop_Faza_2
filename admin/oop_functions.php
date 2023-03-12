<?php 
include "connection.php";
if( empty(session_id()) && !headers_sent()){
  session_start();
}

class functions{

  public $sql;

  function merrPerdoruesitoop(){
    global $dbconn;
    $sql = $dbconn->query("SELECT p.email, p.emri, p.mbiemri, p.datalindjes, p.telefoni,p.adresa, COUNT(po.email) AS numri_porosive
                           FROM perdoruesi p left join porosia po on p.email = po.email
                           WHERE p.roli <> 1
                           GROUP BY p.email, p.emri, p.mbiemri, p.datalindjes, p.telefoni");
    return $sql;
  }



  function merrEmailoop($email){
    global $dbconn;
    $sql = $dbconn->query("SELECT email, emri, mbiemri, datalindjes, telefoni,adresa,roli,passwordi FROM perdoruesi
                           WHERE email='$email'");
    return $sql;
  }

  function editUsersoop($email, $emri, $mbiemri, $dataLindjes, $telefoni){
    global $dbconn;
    $sql = $dbconn->query("UPDATE perdoruesi SET email = '$email', emri = '$emri', mbiemri = '$mbiemri', datalindjes = '$dataLindjes', telefoni = '$telefoni'
                          WHERE email = '$email'");

  }

  function deleteUsersoop($email){
    global $dbconn;
    $sql = $dbconn->query("DELETE FROM perdoruesi WHERE email = '$email' ");
  
  }

  function merrPorositeoop($email){
    global $dbconn;
    $sql = $dbconn->query("SELECT p.email, po.dataeporosise, pr.produkti_id, pr.emri, pr.prodhuesi, pr.cmimi
                           FROM produkti pr inner join porosia po on pr.produkti_id = po.produkti_id inner join perdoruesi p on po.email = p.email
                           WHERE p.email = '$email' ");
    return $sql;
  }

  function merrCartAdminoop($email){
    global $dbconn;
    $sql = $dbconn->query("SELECT pr.produkti_id, pr.emri, pr.cmimi,i.image_url
                           from perdoruesi p inner join cart c on p.email = c.email inner join produkti pr on c.produkti_id = pr.produkti_id inner join images i on pr.produkti_id = i.produkti_id
                           WHERE p.email = '$email'");
    return $sql;
  }

  function merrFavoritesAdminoop($email){
    global $dbconn;
    $sql = $dbconn->query("SELECT pr.produkti_id, pr.emri, pr.cmimi, i.image_url
                           from perdoruesi p inner join favorites f on p.email = f.email inner join produkti pr on f.produkti_id = pr.produkti_id inner join images i on pr.produkti_id = i.produkti_id
                           WHERE p.email = '$email'");
    return $sql;
  }

  function merrProduktinoop($produktiid){
    global $dbconn;
    $sql = $dbconn->query("SELECT p.produkti_id, p.emri, p.prodhuesi, p.vitiprodhimit, p.cmimi, p.pershkrimi, k.emri_kategorise,k.kategoria_id, i.image_url FROM images i inner join produkti p on i.produkti_id = p.produkti_id inner join kategoria k on p.kategoria_id = k.kategoria_id
                           WHERE p.produkti_id='$produktiid'");
    return $sql;
  }

  function editCategoryoop($produktiid, $kategoria){
    global $dbconn;
    $sql = $dbconn->query("UPDATE produkti SET kategoria_id = '$kategoria'
                           WHERE produkti_id = '$produktiid'");
     if($dbconn->connect_error){
      die("Deshtoi modifikimi " .$dbconn->connect_error);
    }else{
      echo("<script>location.href = 'admin.php'</script>");
    }
  }

  function editProductsoop($produktiid, $emri, $cmimi, $viti,  $pershkrimi, $prodhuesi){
    global $dbconn;
    $sql = $dbconn->query("UPDATE produkti SET emri='$emri', prodhuesi='$prodhuesi',vitiprodhimit='$viti' ,cmimi= '$cmimi',pershkrimi='$pershkrimi'
                           WHERE produkti_id = '$produktiid'");
     if($dbconn->connect_error){
      die("Deshtoi modifikimi " .$dbconn->connect_error);
    }else{
      echo("<script>location.href = 'admin.php'</script>");
    }
  }

  function merrKategoriteoop($kategoriaid){
    global $dbconn;
    $sql = $dbconn->query("SELECT k.kategoria_id, k.emri_kategorise FROM kategoria k
                           WHERE k.kategoria_id <> '$kategoriaid'");
    return $sql;
  }

  function deleteImageoop($produktiid){
    global $dbconn;
    $sql = $dbconn->query("DELETE FROM images WHERE produkti_id = '$produktiid'");
  }

  function deleteProductsoop($produktiid){
    global $dbconn;
    $sql = $dbconn->query("DELETE FROM produkti  WHERE produkti_id ='$produktiid'");
  }

  function produktiFunditoop(){
    global $dbconn;
    $sql = $dbconn->query("SELECT produkti_id FROM produkti ORDER by produkti_id DESC LIMIT 0,1");
    return $sql;
  }

  function shtoProdukteoop($emri,$prodhuesi,$vitiprodhimit,$cmimi,$pershkrimi,$kategoria){
    global $dbconn;
    $sql = $dbconn->query("INSERT INTO produkti(emri, prodhuesi, vitiprodhimit, cmimi, pershkrimi, kategoria_id) VALUES
                           ('$emri', '$prodhuesi', '$vitiprodhimit', '$cmimi', '$pershkrimi', '$kategoria')");
  }  

  function merrProduktetoop(){
    global $dbconn;
    $sql = $dbconn->query("SELECT p.produkti_id, p.emri, p.cmimi, p.vitiprodhimit, k.emri_kategorise, p.pershkrimi, p.prodhuesi, i.image_url
                           FROM images i inner join produkti p on i.produkti_id = p.produkti_id inner join kategoria k on p.kategoria_id = k.kategoria_id");
    return $sql;
  }

  function loginoop($email, $passwordi){
    global $dbconn;
    $sql = $dbconn->query("SELECT email, emri, mbiemri,datalindjes,telefoni,adresa, roli FROM perdoruesi
                           WHERE email='$email' AND passwordi='$passwordi'");
    if($sql->num_rows == 1){
      $perdoruesiInfo = $sql->fetch_assoc();
      $perdoruesi = array();
      $perdoruesi['email']=$perdoruesiInfo['email'];
      $perdoruesi['emri']=$perdoruesiInfo['emri'];
      $perdoruesi['mbiemri']=$perdoruesiInfo['mbiemri'];
      $perdoruesi['datalindjes']=$perdoruesiInfo['datalindjes'];
      $perdoruesi['telefoni']=$perdoruesiInfo['telefoni'];
      $perdoruesi['adresa']=$perdoruesiInfo['adresa'];
      $perdoruesi['roli']=$perdoruesiInfo['roli'];
      $_SESSION['perdoruesi']=$perdoruesi;

      if($_SESSION['perdoruesi']['roli']!=1){
      echo("<script>location.href = 'index.php'</script>");
    }else if($_SESSION['perdoruesi']['roli'] == 1){
      echo("<script>location.href = 'admin/admin.php'</script>");
    }
    }else{
      // echo "<p id='loginerror'>Nuk ka perdorues me keto shenime</p>";
      echo("<script>location.href = '#rightfooter'</script>");
    }
    }
  
  function merrTeGjithePerdoruesitoop(){
    global $dbconn;
    $sql = $dbconn->query("SELECT p.email, p.emri, p.mbiemri, p.datalindjes, p.telefoni,p.adresa, COUNT(po.email) AS numri_porosive
                           FROM perdoruesi p left join porosia po on p.email = po.email
                           GROUP BY p.email, p.emri, p.mbiemri, p.datalindjes, p.telefoni");
    return $sql;
  }

  function merrFavoritesoop(){
    global $dbconn;
    $perdoruesi = $_SESSION['perdoruesi']['email'];
    $sql = $dbconn->query("SELECT pr.produkti_id, pr.emri, pr.cmimi, i.image_url
                           from perdoruesi p inner join favorites f on p.email = f.email inner join produkti pr on f.produkti_id = pr.produkti_id inner join images i on pr.produkti_id = i.produkti_id
                           WHERE p.email = '$perdoruesi'");
    return $sql;
  }

  function numberofFavoritesoop($perdoruesi){
    global $dbconn;
    $perdoruesi = $_SESSION['perdoruesi']['email'];
    $sql = $dbconn->query("SELECT email, produkti_id FROM favorites
                           WHERE email = '$perdoruesi'");
    $numriFavorites = $sql->num_rows;
    return $numriFavorites;
  }

  function shtoCartoop($perdoruesi,$produktiid){
    global $dbconn;
    $perdoruesi = $_SESSION['perdoruesi']['email'];
    $sql = $dbconn->query("INSERT INTO cart(email, produkti_id) VALUES('$perdoruesi','$produktiid')");
    if($dbconn->connect_error){
      die("Lidhja deshtoi " .$dbconn->connect_error);
    }else{
      echo("<script>location.href = 'index.php'</script>");
    }
  }

  function shtoFavoritesoop($perdoruesi,$produktiid){
    global $dbconn;
    $perdoruesi = $_SESSION['perdoruesi']['email'];
    $sql = $dbconn->query("INSERT INTO favorites(email, produkti_id) VALUES('$perdoruesi','$produktiid')");
    if($dbconn->connect_error){
      die("Lidhja deshtoi " .$dbconn->connect_error);
    }else{
      echo("<script>location.href = 'index.php'</script>");
    }
  }

  function deleteFavoritesoop($perdoruesi,$produktiid){
    global $dbconn;
    $perdoruesi = $_SESSION['perdoruesi']['email'];
    $sql = $dbconn->query("DELETE FROM favorites  WHERE email = '$perdoruesi'and produkti_id ='$produktiid'");
    if($dbconn->connect_error){
      die("Deshtoi fshirja e produktit " .$dbconn->connect_error);
    }else{
      echo("<script>location.href = 'favoriteproducts.php'</script>");
    }
  }

  function merrCartoop(){
    global $dbconn;
    $perdoruesi = $_SESSION['perdoruesi']['email'];
    $sql = $dbconn->query("SELECT pr.produkti_id, pr.emri, pr.cmimi, i.image_url
                           from perdoruesi p inner join cart c on p.email = c.email inner join produkti pr on c.produkti_id = pr.produkti_id inner join images i on pr.produkti_id = i.produkti_id
                           WHERE p.email = '$perdoruesi'");
    return $sql;
  }

  function numberofCartsoop($perdoruesi){
    global $dbconn;
    $perdoruesi = $_SESSION['perdoruesi']['email'];
    $sql = $dbconn->query("SELECT email, produkti_id FROM cart
                           WHERE email = '$perdoruesi'");
    $numriCarts = $sql->num_rows;
    return $numriCarts;
  }

  function deleteCartoop($perdoruesi,$produktiid){
    global $dbconn;
    $perdoruesi = $_SESSION['perdoruesi']['email'];
    $sql = $dbconn->query("DELETE FROM cart  WHERE email = '$perdoruesi'and produkti_id ='$produktiid'");
    if($dbconn->connect_error){
      die("Deshtoi fshirja e produktit " .$dbconn->connect_error);
    }else{
      echo("<script>location.href = 'cartproducts.php'</script>");
    }
  }

  function buyProductsoop($perdoruesi, $produktiid, $data,$shumapageses){
    global $dbconn;
    $perdoruesi = $_SESSION['perdoruesi']['email'];
    $date = date('Y-m-d H:i:s');
    $sql = $dbconn->query("INSERT INTO porosia(email, produkti_id, dataeporosise, shumapageses) VALUES
                           ('$perdoruesi', '$produktiid', '$date', '$shumapageses' )");
    if($dbconn->connect_error){
      die("Deshtoi porosia " .$dbconn->connect_error);
    }else{
      echo("<script>location.href = 'index.php'</script>");
    }
  }

  function shtoPerdoruesoop($email, $password, $emri, $mbiemri, $dataLindjes, $telefoni, $adresa){
    global $dbconn;
    $sql = $dbconn->query("INSERT INTO perdoruesi(email,passwordi, emri, mbiemri, datalindjes, telefoni, adresa) VALUES
                           ('$email', '$password','$emri','$mbiemri','$dataLindjes','$telefoni','$adresa')");
  
  }




}

?>