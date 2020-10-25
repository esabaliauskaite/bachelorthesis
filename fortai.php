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
    <ul class="breadcrumb">
        <li><a href="index.html">Pagrindinis</a></li>
        <li>Fortai</li>
    </ul>
    <h1 class="mainpav">Fortai</h1>
    <?php
        // Attempt select query execution
        $sql = "SELECT * FROM fortai";
        if($result = mysqli_query($conn, $sql)){
            if(mysqli_num_rows($result) > 0){
                echo "<div class='parent-div'><div class='wrapper'>";
                while($row = mysqli_fetch_array($result)){
                    echo "<div class='box'><table>";
                    echo "<tr class='one'>";
                    echo"<img class='cardfoto' src=". $row['foto'] . ">";
                    echo "<td class='attribute'>" . $row['aut'] .$row['teis']  ."</td><br>";
                    echo "<td>" . $row['pavadinimas'] . "</td>";
                    echo "<td><input type='button' class='daugiau' onClick='daugiau(".$row['id'].")' name='Daugiau' value='Daugiau'></td>";
                    echo "</tr>";
                    echo "</table></div>";
                }
                echo "</div></div>";
                // Free result set
                mysqli_free_result($result);
            } else{
            echo "No records matching your query were found.";
            }
        } else{
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
        function daugiau(daugid){
         window.location.href='fortas.php?id=' +daugid+'';
        }
    </script>
    <footer class="footer">
        <p>© Eglė Sabaliauskaitė. Vilniaus Gedimino technikos universitetas <script>document.write(new Date().getFullYear());</script> </p>
    </footer>
    </body>
</html>