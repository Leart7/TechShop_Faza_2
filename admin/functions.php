<?php 
if( empty(session_id()) && !headers_sent()){
  session_start();
}
// session_start();
$dbconn;
dbconn();

function dbconn(){
  global $dbconn;
  $dbconn = mysqli_connect("localhost", "root", "", "techshop");
  if(!$dbconn){
    die("Deshtoi lidhja me DB" . mysqli_error($dbconn));
  }
}

function login($email,$passwordi){
  global $dbconn;
  $sql = "SELECT email, emri, mbiemri,datalindjes,telefoni,adresa, roli FROM perdoruesi";
  $sql .= " WHERE email='$email' AND passwordi='$passwordi'";
  $res = mysqli_query($dbconn, $sql);
  if(mysqli_num_rows($res)==1){
    $perdoruesiInfo = mysqli_fetch_assoc($res);
    $perdoruesi = array();
    $perdoruesi['email']=$perdoruesiInfo['email'];
    $perdoruesi['emri']=$perdoruesiInfo['emri'];
    $perdoruesi['mbiemri']=$perdoruesiInfo['mbiemri'];
    $perdoruesi['datalindjes']=$perdoruesiInfo['datalindjes'];
    $perdoruesi['telefoni']=$perdoruesiInfo['telefoni'];
    $perdoruesi['adresa']=$perdoruesiInfo['adresa'];
    $perdoruesi['roli']=$perdoruesiInfo['roli'];
    $_SESSION['perdoruesi']=$perdoruesi;
    // header("Location: ../index.php");
    if($_SESSION['perdoruesi']['roli']!=1){
      echo("<script>location.href = 'index.php'</script>");
    }else if($_SESSION['perdoruesi']['roli']==1){
      echo("<script>location.href = 'admin/admin.php'</script>");
    }
    }else{
      // echo "<p id='loginerror'>Nuk ka perdorues me keto shenime</p>";
      echo("<script>location.href = '#rightfooter'</script>");
    }
  }


function merrPerdoruesit(){
  global $dbconn;
  $sql = "SELECT p.email, p.emri, p.mbiemri, p.datalindjes, p.telefoni,p.adresa, COUNT(po.email) AS numri_porosive";
  $sql .=" FROM perdoruesi p left join porosia po on p.email = po.email ";
  $sql .=" WHERE p.roli <> 1";
  $sql .=" GROUP BY p.email, p.emri, p.mbiemri, p.datalindjes, p.telefoni";
  return mysqli_query($dbconn, $sql);
}

function merrTeGjithePerdoruesit(){
  global $dbconn;
  $sql = "SELECT p.email, p.emri, p.mbiemri, p.datalindjes, p.telefoni,p.adresa, COUNT(po.email) AS numri_porosive";
  $sql .=" FROM perdoruesi p left join porosia po on p.email = po.email ";
  $sql .=" GROUP BY p.email, p.emri, p.mbiemri, p.datalindjes, p.telefoni";
  return mysqli_query($dbconn, $sql);
}

function merrEmail($email){
  global $dbconn;
  $sql = "SELECT email, emri, mbiemri, datalindjes, telefoni,adresa,roli,passwordi FROM perdoruesi";
  $sql .= " WHERE email='$email'";
  return mysqli_query($dbconn, $sql);
}

function editUsers($email, $emri, $mbiemri, $dataLindjes, $telefoni){
  global $dbconn;
  $sql = "UPDATE perdoruesi SET email = '$email', emri = '$emri', mbiemri = '$mbiemri', datalindjes = '$dataLindjes', telefoni = '$telefoni'";
  $sql.= " WHERE email = '$email'";
  $perdoruesi = mysqli_query($dbconn, $sql);
  if($perdoruesi){
    echo "Perdoruesi u modifikua me sukses";
  }else{
    die("Deshtoi modifikimi i perdoruesit " . mysqli_error($dbconn));
  }
}

function deleteUsers($email){
  global $dbconn;
  $sql = "DELETE FROM perdoruesi  WHERE email ='$email'";
  $perdoruesi = mysqli_query($dbconn, $sql);
  if($perdoruesi){
    echo "Perdoruesi u fshi me sukses";
    header("Location: users.php");
  }else{
    die ("Deshtoi fshirja e perdoruesit " . mysqli_error($dbconn));
  }
}

function merrPorosite($email){
  global $dbconn;
  $sql = "SELECT p.email, po.dataeporosise, pr.produkti_id, pr.emri, pr.prodhuesi, pr.cmimi";
  $sql .= " FROM produkti pr inner join porosia po on pr.produkti_id = po.produkti_id inner join perdoruesi p on po.email = p.email ";
  $sql .= "WHERE p.email = '$email'";
  return mysqli_query($dbconn,$sql);
}

function merrCartAdmin($email){
  global $dbconn;
  $sql = "SELECT pr.produkti_id, pr.emri, pr.cmimi,i.image_url ";
  $sql .= " from perdoruesi p inner join cart c on p.email = c.email inner join produkti pr on c.produkti_id = pr.produkti_id inner join images i on pr.produkti_id = i.produkti_id";
  $sql .= " WHERE p.email = '$email'";
  return mysqli_query($dbconn,$sql);
}

function merrFavoritesAdmin($email){
  global $dbconn;
  $sql = "SELECT pr.produkti_id, pr.emri, pr.cmimi, i.image_url";
  $sql .= " from perdoruesi p inner join favorites f on p.email = f.email inner join produkti pr on f.produkti_id = pr.produkti_id inner join images i on pr.produkti_id = i.produkti_id";
  $sql .= " WHERE p.email = '$email'";
  return mysqli_query($dbconn,$sql);
}



function merrProduktet(){
  global $dbconn;
  $sql = "SELECT p.produkti_id, p.emri, p.cmimi, p.vitiprodhimit, k.emri_kategorise, p.pershkrimi, p.prodhuesi, i.image_url";
  $sql .= " FROM images i inner join produkti p on i.produkti_id = p.produkti_id inner join kategoria k on p.kategoria_id = k.kategoria_id";
  // $sql .= "WHERE p.produkti_id = '$produktiid'";
  return mysqli_query($dbconn,$sql);
}

function merrProduktin($produktiid){
  global $dbconn;
  $sql = "SELECT p.produkti_id, p.emri, p.prodhuesi, p.vitiprodhimit, p.cmimi, p.pershkrimi, k.emri_kategorise,k.kategoria_id, i.image_url FROM images i inner join produkti p on i.produkti_id = p.produkti_id inner join kategoria k on p.kategoria_id = k.kategoria_id";
  $sql .= " WHERE p.produkti_id='$produktiid'";
  return mysqli_query($dbconn, $sql);
}

function editCategory($produktiid, $kategoria){
  global $dbconn;
  $sql = "UPDATE produkti SET kategoria_id = '$kategoria'";
  $sql .=" WHERE produkti_id = '$produktiid'";
  $product = mysqli_query($dbconn, $sql);
  if($product){
    echo "Produkti u modifikua me sukses";
    header("Location: admin.php");
  }else{
    die("Deshtoi modifikimi i produktit " . mysqli_error($dbconn));
  }
}


function editProducts($produktiid, $emri, $cmimi, $viti,  $pershkrimi, $prodhuesi){
  global $dbconn;
  $sql = "UPDATE produkti SET emri='$emri', prodhuesi='$prodhuesi',vitiprodhimit='$viti' ,cmimi= '$cmimi',pershkrimi='$pershkrimi'";
  $sql.= " WHERE produkti_id = '$produktiid'";
  $product = mysqli_query($dbconn, $sql);
  if($product){
    echo "Produkti u modifikua me sukses";
    header("Location: admin.php");
  }else{
    die("Deshtoi modifikimi i produktit " . mysqli_error($dbconn));
  }
}

function merrKategorite($kategoriaid){
  global $dbconn;
  $sql = "SELECT k.kategoria_id, k.emri_kategorise FROM kategoria k";
  $sql .=" WHERE k.kategoria_id <> '$kategoriaid'";
  return mysqli_query($dbconn,$sql);
}

function deleteImage($produktiid){
  global $dbconn;
  $sql = "DELETE FROM images WHERE produkti_id = '$produktiid'";
  $produkti = mysqli_query($dbconn, $sql);
  if($produkti){
    echo "Perdoruesi u fshi me sukses";
  }else{
    die ("Deshtoi fshirja e perdoruesit " . mysqli_error($dbconn));
  }
}

function deleteProducts($produktiid){
  global $dbconn;
  $sql = "DELETE FROM produkti  WHERE produkti_id ='$produktiid'";
  $produkti = mysqli_query($dbconn, $sql);
  if($produkti){
    echo "Perdoruesi u fshi me sukses";
  }else{
    die ("Deshtoi fshirja e perdoruesit " . mysqli_error($dbconn));
  }
}

function numberofProducts(){
  global $dbconn;
  $sql = "SELECT produkti_id FROM produkti";
  $rezultati = mysqli_query($dbconn, $sql);
  $numriProdukteve = mysqli_num_rows($rezultati);
  return $numriProdukteve;
  
}

function numberofFavorites($perdoruesi){
  global $dbconn;
  $perdoruesi = $_SESSION['perdoruesi']['email'];
  $sql = "SELECT email, produkti_id FROM favorites";
  $sql .= " WHERE email = '$perdoruesi'";
  $rezultati = mysqli_query($dbconn,$sql);
  $numriFavorites = mysqli_num_rows($rezultati);
  return $numriFavorites;
}

function numberofCarts($perdoruesi){
  global $dbconn;
  $perdoruesi = $_SESSION['perdoruesi']['email'];
  $sql = "SELECT email, produkti_id FROM cart";
  $sql .= " WHERE email = '$perdoruesi'";
  $rezultati = mysqli_query($dbconn,$sql);
  $numriCarts = mysqli_num_rows($rezultati);
  return $numriCarts;
}

function shtoProdukte($emri,$prodhuesi,$vitiprodhimit,$cmimi,$pershkrimi,$kategoria){
  global $dbconn;
  $sql = "INSERT INTO produkti(emri, prodhuesi, vitiprodhimit, cmimi, pershkrimi, kategoria_id) VALUES";
  $sql .=" ('$emri', '$prodhuesi', '$vitiprodhimit', '$cmimi', '$pershkrimi', '$kategoria')";
  $produkti = mysqli_query($dbconn, $sql);
  if($produkti){
    echo "Produkti u shtua me sukses";
  }else{
    die ("Deshtoi shtimi i produktit " . mysqli_error($dbconn));
  }
}

function shtoPerdorues($email, $password, $emri, $mbiemri, $dataLindjes, $telefoni, $adresa){
  global $dbconn;
  $sql = "INSERT INTO perdoruesi(email,passwordi, emri, mbiemri, datalindjes, telefoni, adresa) VALUES";
  $sql .=" ('$email', '$password','$emri','$mbiemri','$dataLindjes','$telefoni','$adresa')";
  $perdoruesi = mysqli_query($dbconn, $sql);
  if($perdoruesi){
    echo "Regjistrimi u be me sukses";
  }else{
    header("Location:signup.php");
  }
}

function shtoFavorites($perdoruesi,$produktiid){
  global $dbconn;
  $perdoruesi = $_SESSION['perdoruesi']['email'];
  $sql = "INSERT INTO favorites(email, produkti_id) VALUES('$perdoruesi','$produktiid')";
  $favorite = mysqli_query($dbconn,$sql);
  if($favorite){
    echo("<script>location.href = 'index.php'</script>");
  }else{
    die ("Deshtoi favorite" . mysqli_error($dbconn));
  }
}

function shtoCart($perdoruesi,$produktiid){
  global $dbconn;
  $perdoruesi = $_SESSION['perdoruesi']['email'];
  $sql = "INSERT INTO cart(email, produkti_id) VALUES('$perdoruesi','$produktiid')";
  $carta = mysqli_query($dbconn,$sql);
  if($carta){
    echo("<script>location.href = 'index.php'</script>");
  }else{
    die ("Deshtoi cart" . mysqli_error($dbconn));
  }
}

function buyProducts($perdoruesi, $produktiid, $data,$shumapageses){
  global $dbconn;
  $perdoruesi = $_SESSION['perdoruesi']['email'];
  $date = date('Y-m-d H:i:s');
  $sql = "INSERT INTO porosia(email, produkti_id, dataeporosise, shumapageses) VALUES";
  $sql .= " ('$perdoruesi', '$produktiid', '$date', '$shumapageses' )";
  $porosia = mysqli_query($dbconn,$sql);
  if($porosia){
    echo "Porosia u be me sukses";
    header("Location: index.php");
  }else{
    die ("Deshtoi porosia" . mysqli_error($dbconn));
  }
}

function merrFavorites(){
  global $dbconn;
  $perdoruesi = $_SESSION['perdoruesi']['email'];
  $sql = "SELECT pr.produkti_id, pr.emri, pr.cmimi, i.image_url";
  $sql .= " from perdoruesi p inner join favorites f on p.email = f.email inner join produkti pr on f.produkti_id = pr.produkti_id inner join images i on pr.produkti_id = i.produkti_id";
  $sql .= " WHERE p.email = '$perdoruesi'";
  $res = mysqli_query($dbconn,$sql);
  return $res;
}

function deleteFavorites($perdoruesi,$produktiid){
  global $dbconn;
  $perdoruesi = $_SESSION['perdoruesi']['email'];
  $sql = "DELETE FROM favorites  WHERE email = '$perdoruesi'and produkti_id ='$produktiid'";
  $favorite = mysqli_query($dbconn, $sql);
  if($favorite){
    echo("<script>location.href = 'favoriteproducts.php'</script>");
  }else{
    die ("Deshtoi fshirja e produktit " . mysqli_error($dbconn));
  }
}

function merrCart(){
  global $dbconn;
  $perdoruesi = $_SESSION['perdoruesi']['email'];
  $sql = "SELECT pr.produkti_id, pr.emri, pr.cmimi, i.image_url";
  $sql .= " from perdoruesi p inner join cart c on p.email = c.email inner join produkti pr on c.produkti_id = pr.produkti_id inner join images i on pr.produkti_id = i.produkti_id";
  $sql .= " WHERE p.email = '$perdoruesi'";
  // $sql .= "WHERE p.produkti_id = '$produktiid'";
  return mysqli_query($dbconn,$sql);
}

function deleteCart($perdoruesi,$produktiid){
  global $dbconn;
  $perdoruesi = $_SESSION['perdoruesi']['email'];
  $sql = "DELETE FROM cart  WHERE email = '$perdoruesi'and produkti_id ='$produktiid'";
  $cart = mysqli_query($dbconn, $sql);
  if($cart){
    echo("<script>location.href = 'cartproducts.php'</script>");
  }else{
    die ("Deshtoi fshirja e produktit " . mysqli_error($dbconn));
  }
}


function produktiFundit(){
  global $dbconn;
  $sql = "SELECT produkti_id FROM produkti ORDER by produkti_id DESC LIMIT 0,1";
  return mysqli_query($dbconn,$sql);
  
}

function checkFavorites($produktiid){
  global $dbconn;
  $perdoruesi = $_SESSION['perdoruesi']['email'];
  $sql = "SELECT p.email, f.produkti_id";
  $sql .=" from perdoruesi p INNER JOIN favorites f on p.email = f.email inner JOIN produkti pr on f.produkti_id = pr.produkti_id";
  $sql .=" WHERE f.produkti_id = '$produktiid'";
  return mysqli_query($dbconn,$sql);
}



?>
