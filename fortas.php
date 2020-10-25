<?php
  include_once 'includes/conn.php';
?>
<!DOCTYPE html>
<html lang="lt">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&family=Oswald&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" href="includes/style.css">
    <link rel="shortcut icon" href="1x/vienas.svg" type="image/x-icon" />
    <title>Fortai</title>
  </head>
  <body>
  <header>
      <div id="Nav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content">
          <a href="index.html">Pagrindinis</a>
          <a href="about.html">Apie</a>
          <a href="pilys.php">Pilys</a>
          <a href="fortai.php">Fortai</a>
          <a href="map.html">Žemėlapis</a>
        </div>
      </div>
      <div onclick="openNav()"><i id="bars" class="fas fa-bars"></i></div>
    </header>
    <?php
    // Attempt select query execution
    $sql = "SELECT * FROM fortai WHERE id='".$_GET['id']."'";
    if($result = mysqli_query($conn, $sql)){
      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
          echo "<ul class='breadcrumb'>";
          echo "<li><a href='index.html'>Pagrindinis</a></li>";
          echo " <li><a href='fortai.php'>Fortai</a></li>";
          echo " <li>". $row['pavadinimas'] ."</li>";
          echo " </ul>";
          echo "<input type='button'class='atgal'  onClick='atgal()' name='Atgal' value='Atgal'>";
          echo " <h1 class='mainpav'>". $row['pavadinimas'] ."</h1>";
          echo " <div class='contentwrapper'><div class='table'><table>";
          echo"<tr><td><img class='cardfoto' src=". $row['foto'] . "></tr></td>";
          echo "<tr><td class='attribute'>" . $row['aut'] . $row['teis'] . "</td></tr>";
          echo "<tr><td>" . $row['pavadinimas'] . "</td></tr>";
          echo "<tr><td class='fortinfo'>Data: " . $row['data'] . "</td></tr>";
          echo "<tr><td class='fortinfo'>Vieta: " . $row['vieta'] . "</td></tr>";
          echo "<tr><td class='fortinfo'>Būsena: " . $row['busena'] . "</td></tr>";
          echo "<tr><td class='fortinfo'>Paskirtis: " . $row['paskirtis'] . "</td></tr>";
          echo "</table><br></div>";
          echo "<div class='txtinfo'><h2>Istorija</h2>";
          echo "<p> " . $row['Istorija'] . "</p>";
          if($row['muziejus'] != NULL){
            echo " <h2>Muziejus</h2>";
            echo "<p> " . $row['muziejus'] . "</p>";
          }
          echo "<p class='attribute'> " . $row['info1'] . "</p>";
          if($row['info2'] != NULL){
            echo "<a class='attribute'> " . $row['info2'] . "</a></div></div>";
          }
        }
        // Free result set
        mysqli_free_result($result);
      }else{
        echo "No records matching your query were found.";
      }
    }else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
    // Close connection
    mysqli_close($conn);
    ?>    
    <script>
      function openNav() {
        document.getElementById("Nav").style.width = "100%";
      }
      function closeNav() {
        document.getElementById("Nav").style.width = "0%";
      }
      function atgal(){
        window.location.href='fortai.php';
      }
    </script>
    <footer class="footer">
      <p>© Eglė Sabaliauskaitė. Vilniaus Gedimino technikos universitetas <script>document.write(new Date().getFullYear());</script> </p>
    </footer>
  </body>
</html>