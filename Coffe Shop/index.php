<?php
$db_name = 'mysql:host=localhost;dbname=contact_db';
$username = 'root';
$password = '';

$conn = new PDO($db_name, $username, $password);

if(isset($_POST['send'])){
  $name = $_POST['name'];
  $name = filter_var($name, FILTER_SANITIZE_STRING);
  $number = $_POST['number'];
  $number = filter_var($number, FILTER_SANITIZE_STRING);
  $guests = $_POST['guests'];
  $guests = filter_var($guests, FILTER_SANITIZE_STRING);

  $select_contact = $conn->prepare("SELECT * FROM 'contact_form' WHERE name = ? AND number = ? AND guests = ?");
  $select_contact->execute([$name, $number, $guests]);

  if($select_contact->rowCount() > 0){
    $message[] = 'Message sent already!';
  }
  else {
    $insert_contact = $conn->prepare("INSERT INTO 'contact_form'(name, number, guests) VALUES (?,?,?)");
    $insert_contact->execute([$name, $number, $guests]);
    $message[] = 'Message sent succesfully!';
  }
}


 ?>

 <!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Raw Coffee Shop</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php

if(isset($message)){
  foreach($message as $message){
    echo'
    <div class="message">
    <span>'.$message.'</span>
    <i class="fas fa-times" onclick="this.parent.Element.remove();"></i>
    </div>
    ';
  }
}
?>

<!-- header section starts  -->

<header class="header">
  <section class="flex">
    <a href="#home" class="logo"><img src="images/logo.png" alt=""></a>

    <nav class="navbar">

      <a href="#home">Home</a>
      <a href="#about">About</a>
      <a href="#menu">Menu</a>
      <a href="#gallery">Gallery</a>
      <a href="#team">Team</a>
      <a href="#contact">Contact</a>

      </nav>

      <div id="menu-btn" class="fas fa-bars"></div>

    </section>

  </header>

  <!-- header section ends -->

  <!-- home section starts  -->

  <!-- home section starts  -->

  <div class="home-bg">
    <section class="home" id="home">
      <div class="content">
        <h3>Coffee Heaven</h3>
        <p>Lorem ipsum dolor</p>
        <a href="#about" class="btn">About us</a>
      </div>
    </section>
  </div>
  <!-- home section ends  -->

  <!-- about section starts  -->

  <section class="about" id="about">
    <div class="image">
      <img src="images/about-img.svg" alt="">
    </div>

    <div class="content">
      <h3>A cup of coffee can complete your day</h3>
      <p>Lorem ipsum dolor sit</p>
      <a href="#menu" class="btn">Our menu</a>
    </div>

    </section>

    <!-- about section ends  -->

    <!-- facility section starts  -->

    <section class="facility">
      <div class="heading">
        <img src="images/heading-img.png" alt="">
        <h3>Our facility</h3>
      </div>

      <div class="box-container">

        <div class="box">
          <img src="images/icon-1.png" alt="">
          <h3>Varieties of coffees</h3>
          <p>Lorem ipsum dolor sit</p>
        </div>

        <div class="box">
          <img src="images/icon-2.png" alt="">
          <h3>Coffee beans</h3>
          <p>Lorem ipsum dolor sit</p>
        </div>

        <div class="box">
          <img src="images/icon-3.png" alt="">
          <h3>Breakfast and sweets</h3>
          <p>Lorem ipsum dolor sit</p>
        </div>

        <div class="box">
          <img src="images/icon-4.png" alt="">
          <h3>Read to go coffee</h3>
          <p>Lorem ipsum dolor sit</p>
        </div>

      </div>

    </section>

        <!-- facility section ends  -->

        <!-- menu section starts  -->

<section class="menu" id="menu">

  <div class="heading">
    <img src="images/heading-img.png" alt="">
    <h3>Popular menu</h3>
  </div>

  <div class="box-container">

    <div class="box">
      <img src="images/menu-1.png" alt="">
      <h3>Love you coffee</h3>
    </div>

    <div class="box">
      <img src="images/menu-2.png" alt="">
      <h3>Cappuccino</h3>
    </div>

    <div class="box">
      <img src="images/menu-2.png" alt="">
      <h3>Mocha coffee</h3>
    </div>

    <div class="box">
      <img src="images/menu-2.png" alt="">
      <h3>Frappuccino</h3>
    </div>

    <div class="box">
      <img src="images/menu-2.png" alt="">
      <h3>Black Coffee</h3>
    </div>

    <div class="box">
      <img src="images/menu-2.png" alt="">
      <h3>Love heart coffee</h3>
    </div>

</div>

</section>

<!-- menu section ends -->

<!-- gallery section starts  -->

<section class="gallery" id="gallery">
  <div class="heading">
    <img src="images/heading-img.png" alt="">
    <h3>Our gallery</h3>
    </div>

    <div class="box-container">
      <img src="images/gallery-1.webp" alt="">
     <img src="images/gallery-2.webp" alt="">
     <img src="images/gallery-3.webp" alt="">
     <img src="images/gallery-4.webp" alt="">
     <img src="images/gallery-5.webp" alt="">
     <img src="images/gallery-6.webp" alt="">
    </div>

    </section>

    <!-- gallery section ends -->

    <!-- team section starts  -->
<section class="team" id="team">
  <div class="heading">
    <img src="images/heading-img.png" alt="">
    <h3>Our team</h3>
  </div>

  <div class="box-container">

    <div class="box">
      <img src="images/our-team-1.jpg" alt="">
      <h3>John Deo</h3>
    </div>

    <div class="box">
      <img src="images/our-team-2.jpg" alt="">
      <h3>John Cena</h3>
    </div>

    <div class="box">
      <img src="images/our-team-3.jpg" alt="">
      <h3>Viorel Gheorghe</h3>
    </div>

    <div class="box">
      <img src="images/our-team-4.jpg" alt="">
      <h3>Stefan Emi</h3>
    </div>

    <div class="box">
      <img src="images/our-team-5.jpg" alt="">
      <h3>Cristian Penoiu</h3>
    </div>

    <div class="box">
      <img src="images/our-team-6.jpg" alt="">
      <h3>Mario Ovidiu Munteanu</h3>
    </div>

  </div>

</section>

<!-- team section ends  -->

<!-- contact section starts  -->

<section class="contact" id="contact">
  <div class="heading">
    <img src="images/heading-img.png" alt="">
    <h3>Contact us</h3>
  </div>

  <div class="row">

    <div class="image">
      <img src="images/contact-img.svg" alt="">
    </div>

    <form action="" method="post">
      <h3>Book a table</h3>
      <input type="text" name="name" required class="box" maxlength="20" placeholder="Enter your name...">
      <input type="number" name="number" required class="box" maxlength="20" placeholder="Enter your number..." min="0" max="999999999999" onkeypress="if(this.value.length == 10) return false">
      <input type="number" name="guests" required class="box" maxlength="20" placeholder="How many guests" min="0" max="99" onkeypress="if(this.value.length == 2) return false">
      <input type="submit" name="send" value="send message" class="btn">
    </form>

  </div>

</section>

<!-- contact section ends  -->

<!-- footer section starts  -->

<section class="footer">

  <div class="footer">

    <div class="box-container">

      <div class="box">
        <i class="fas fa-envelope"></i>
        <h3>Our emails</h3>
        <p>raul_valentin123@yahoo.com</p>
        <p>raulvalentin123@gmail.com</p>
      </div>

      <div class="box">
               <i class="fas fa-clock"></i>
               <h3>Opening hours</h3>
               <p>07:00AM to 09:00PM</p>
      </div>

      <div class="box">
        <i class="fas fa-map-marker-alt"></i>
        <h3>Shop location</h3>
        <p>Craiova, Romania - 200068</p>
      </div>

      <div class="box">
        <i class="fas fa-phone"></i>
        <h3>Our phone</h3>
        <p>0742488300</p>
      </div>

    </div>
    <div class="credit"> &copy; copyright @ 2022 by <span>Raul.Raw</span> | All rights reserved! </div>
  </section>

  <!-- footer section ends -->

  <!-- custom js file link  -->
  <script src="js/script.js"></script>

  </body>
  </html>
