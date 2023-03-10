<?php include 'adminheader.php' ?>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<?php if(!isset($_SESSION['perdoruesi']) || $_SESSION['perdoruesi']['roli']==0){
    header("Location: ../index.php");
}
?>
<link rel="stylesheet" href="styles/users.css">
<table id="members">
  <thead>
    <tr>
      <th>Email</th>
      <th>Emri</th>
      <th>Mbiemri</th>
      <th>Adresa</th>
      <th>Numri i telefonit</th>
      <th>Numri Porosive</th>
      <th></th>
    </tr>
</thead>
    
    <?php  
   
    $perdoruesit = merrPerdoruesit();
    $i=0;
    while($perdoruesi = mysqli_fetch_assoc($perdoruesit)){
      if($i%2==0){
        echo "<tr>";
      }else{
        echo "<tr class='alt'>";
      }
      $email = $perdoruesi['email'];
      echo "<td>" . $perdoruesi['email'] . "</td>";
      echo "<td>" . $perdoruesi['emri'] . "</td>";
      echo "<td>" . $perdoruesi['mbiemri'] . "</td>";
      echo "<td>" . $perdoruesi['adresa'] . "</td>";
      echo "<td>" . $perdoruesi['telefoni'] . "</td>";
      echo "<td>" . $perdoruesi['numri_porosive'] . "</td>";
      echo "<td class='editicon' style='width:20px'><a href='editoperdoruesit.php?em=$email'><i class='far fa-edit' style='font-size:115%' ></i></a></td>";
      echo "</tr>";
      $i++;
     
    }
   
    ?>
  </table>

  