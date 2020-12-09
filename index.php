<!DOCTYPE html>
<html>
 <head>
  <link rel="stylesheet" href="style.css">
</head> 

<body>
<!-- Header section -->
<header>
  <h1>
    <img src="https://www.wildcodeschool.com/assets/logo_main-e4f3f744c8e717f1b7df3858dce55a86c63d4766d5d9a7f454250145f097c2fe.png" alt="Wild Code School logo" />
    Les Argonautes
  </h1>
</header>

<!-- Main section -->
<main>
  
  <!--Connect to bdd-->
  <?php
      $servername = 'localhost';
      $username = 'root';
      $password = '';
      $dbname = 'listedejason';
      
      //On établit la connexion
      $conn = mysqli_connect($servername, $username, $password, $dbname);
      
      //On vérifie la connexion
      if($conn->connect_error){
          die('Erreur : ' .$conn->connect_error);
    }
  ?>

  <!-- New member form -->
  <h2>Ajouter un(e) Argonaute</h2>
  <form class="new-member-form" method="post" action="">
    <label for="name">Nom de l&apos;Argonaute</label>
    <input id="name" name="name" type="text" placeholder="Charalampos" />
    <button type="submit">Envoyer</button>
  </form>

  <?php
//Retrieve values of user :
$name = isset($_POST['name']) ? $_POST['name'] : NULL;
 
//SQL insertion command
$sql = 'INSERT INTO argonauts (name) VALUES("'.$name.'")';
 
//Check the connection
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
 

?>






  
  <!-- Member list -->
  <h2>Membres de l'équipage</h2>
  <section class="member-list">
    <?php
    $sql = 'SELECT name FROM argonauts';
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
       while($row = mysqli_fetch_assoc($result)) {
          echo "<div class=\"member-item\">" . $row["name"]. "</div>";
       }
    } else {
       echo "0 results";
    }
    mysqli_close($conn);
    ?>
  </section>
</main>

<footer>
  <p>Réalisé par Jason en Anthestérion de l'an 515 avant JC</p>
</footer>
</body>
</html>