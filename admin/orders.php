<?php include 'adminheader.php' ?>
<?php if(!isset($_SESSION['perdoruesi']) || $_SESSION['perdoruesi']['roli']==0){
    header("Location: ../index.php");
}
?>
<link rel="stylesheet" href="../styles/orders.css">
<table id="members">
  <thead>
    <tr>
      <th>Data e porosise</th>
      <th>Produkti_ID</th>
      <th>Emri i Produktit</th>
      <th>Prodhuesi</th>
      <th>Cmimi</th>
    </tr>
</thead>
    <?php 

    class orders extends functions{
      public $sql;
      public $row;
    }
    $order = new orders();
    $orders = $order->merrPorositeoop($email);
    if (isset($_GET['em'])){
      $email = $_GET['em'];
      $perdoruesiData = $order->merrEmailoop($email);
      $porosite =$order->merrPorositeoop($email);
    }
    $i=0;
    while($porosia =  $order->row = $porosite->fetch_assoc()){
      $dataEPorosise = $order->row['dataeporosise'];
      if($i%2==0){
        echo "<tr>";
      }else{
        echo "<tr class='alt'>";
      }
      echo "<td>" . $dataEPorosise . "</td>";
      echo "<td>" . $porosia['produkti_id'] . "</td>";
      echo "<td>" . $porosia['emri'] . "</td>";
      echo "<td>" . $porosia['prodhuesi'] . "</td>";
      echo "<td>" . $porosia['cmimi'] . "</td>";
      echo "</tr>";
      $i++;
    }
    ?>
 
    
  </table>