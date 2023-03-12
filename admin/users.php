<?php include 'adminheader.php' ?>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<link rel="stylesheet" href="../styles/users.css">
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

    class users extends functions{
      public $sql;
      public $row;
    }

    $user = new users();
    $users = $user->merrPerdoruesitoop();
   
    $i=0;
    while($perdoruesi = $user->row = $users->fetch_assoc()){
      $email = $user->row['email'];
      $emri = $user->row['emri'];
      $mbiemri = $user->row['mbiemri'];
      $adresa = $user->row['adresa'];
      $telefoni = $user->row['telefoni'];
      $numriPorosive = $user->row['numri_porosive'];
      if($i%2==0){
        echo "<tr>";
      }else{
        echo "<tr class='alt'>";
      }
      $email = $perdoruesi['email'];
      echo "<td>" . $email . "</td>";
      echo "<td>" . $emri . "</td>";
      echo "<td>" . $mbiemri . "</td>";
      echo "<td>" . $adresa . "</td>";
      echo "<td>" . $telefoni . "</td>";
      echo "<td>" . $numriPorosive . "</td>";
      echo "<td class='editicon' style='width:20px'><a href='editoperdoruesit.php?em=$email'><i class='far fa-edit' style='font-size:115%' ></i></a></td>";
      echo "</tr>";
      $i++;
     
    }
   
    ?>
  </table>