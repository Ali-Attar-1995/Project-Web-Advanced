<?php
require_once 'php/config.php';
session_start();
$sql = "select * from car limit 0,5";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Rent a Car</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<style>

</style>

<body>
  <header>
    <a href="#" class="logo"><img src="Images/jeep.png" alt="" /></a>
    <div class="fas fa-bars" id="menu-icon"></div>
    <ul class="navbar">
      <li><a href="#home">Home</a></li>
      <li><a href="#ride">Ride</a></li>
      <li><a href="php/customer_page.php">Rent</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#contact">Contact Us</a></li>
    </ul>
    <div class="header-btn">
      <?php

      if (isset($_SESSION['usid'])) {
        echo '<a href="php/signout.php" class="sign-in">Sign out</a>';
      } else {
        echo '<a href="php/login_page.php" class="sign-in">Sign In</a>';
      }
      ?>

    </div>
  </header>

  <section class="home" id="home">
    <div class="text">
      <h1>
        <span>Looking</span> to <br />
        rent a car
      </h1>
      <p>
        Lorem ipsum dolor sit amet consectetur adi <br />
        pisicing elit. Culpa, deleniti perspiciatis.
      </p>
    </div>
    <div class="form-container">
      <form action="">
        <div class="input-box">
          <span>Location</span>
          <select name="location" id="">
            <option value="">Select Location</option>
            <option value="">Beirut</option>
            <option value="">Saida</option>
            <option value="">Sour</option>
            <option value="">Nabatieh</option>
            <option value="">Tripoli</option>
          </select>
        </div>
        <div class="input-box">
          <span>Pick-Up Date</span>
          <input type="date" name="" id="" />
        </div>
        <div class="input-box">
          <span>Return Date</span>
          <input type="date" name="" id="" />
        </div>
        <input type="submit" name="Submit" class="btn" onclick="javascript:alert('You need to Sign In');" />
      </form>
    </div>
  </section>

  <section class="ride" id="ride">
    <div class="heading">
      <span>How It Works</span>
      <h1>Rent With 3 Easy Steps</h1>
    </div>
    <div class="ride-container">
      <div class="box">
        <i class="fas fa-map-pin"></i>
        <h2>Choose A Location</h2>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi vel eaque quidem voluptates,
          a dolore ex excepturi sint placeat harum, quia, commodi aut. Reiciendis, ullam.
        </p>
      </div>
      <div class="box">
        <i class="fas fa-calendar-check"></i>
        <h2>Pick-Up Date</h2>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam non sapiente consequuntur
          saepe laboriosam similique, magnam repudiandae obcaecati. Odio adipisci
        </p>
      </div>
      <div class="box">
        <i class="fas fa-car"></i>
        <h2>Book A Car</h2>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente animi dignissimos, iure expedita
          a perspiciatis quas laborum, ea vero totam dolore odit voluptas, tempore possimus?
        </p>
      </div>
    </div>
  </section>

  <section class="services" id="services">

    <div class="heading">
      <span>Best Services</span>
      <h1>Explore Out Top Deals <br> From Top Rated Dealers</h1>
    </div>

    <div class="services-container">
      <?php
      while ($row = mysqli_fetch_assoc($result)) {
      ?>
        <div class="box">
          <div class="box-img">
            <img src="Images/<?php echo $row["image"]; ?>" alt="">
          </div>
          <p><?php echo $row["model"]; ?></p>
          <h3><?php echo $row["type"]; ?></h3>
          <h2>$<?php echo $row["fee"]; ?> <span>/Day</span></h2>
          <!-- <a href="javascript:alert('You need to Sign In');" class="btn">Rent Now</a> -->
          <?php
          if (isset($_SESSION['usid'])) {
            echo '<a href="php/customer_page.php" class="btn">Rent Now</a>';
          } else {
            echo '<a href="php/login_page.php" class="btn">login Now</a>';
          }
          ?>
        </div>
      <?php
      }
      ?>
    </div>
  </section>

  <section class="about" id="about">
    <div class="heading">
      <span>About Us</span>
      <h1>Best Customer Experience</h1>
    </div>
    <div class="about-container">
      <div class="about-img">
        <img src="Images/about.png" alt="">
      </div>
      <div class="about-text">
        <span>About Us</span>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, velit modi. Aspernatur, ducimus ea, sed explicabo distinctio eligendi dignissimos quisquam itaque quae, mollitia ipsam eos voluptatibus natus quaerat nulla molestiae laudantium! Recusandae, blanditiis ea!</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi eum, tempora doloribus consequuntur nesciunt deleniti numquam mollitia dolores!</p>
        <a href="#" class="btn">Learn More</a>
      </div>
    </div>
  </section>

  <section class="contact" id="contact">
    <div class="heading">
      <h1>Contact <span>US!</span></h1>
    </div>
    <form action="" method="post">

      <div class="inputbox">
        <input type="text" placeholder="Full Name" name="name">
        <input type="email" placeholder="Email Address" name="email">
      </div>
      <div class="inputbox">
        <input type="number" placeholder="Mobile Number" name="phone">
        <input type="text" placeholder="Email Subject" name="subject">
      </div>
      <textarea name="description" id="" cols="30" rows="10" placeholder="Your Message"></textarea>
      <input type="submit" name="submit_m" value="Send Message" class="btn">
    </form>
  </section>
  <?php

  if (isset($_POST['submit_m'])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $subject = $_POST["subject"];
    $description = $_POST["description"];
    $sql = "INSERT INTO messages (name, email, phone, subject, description,status) VALUES ('$name', '$email', '$phone', '$subject', '$description','0')";
    $result = mysqli_query($con, $sql);
    if ($result) {
      echo '<script type="text/javascript">
     alert("Message Sent ") 
     </script>';
    } else {
      echo '<script type="text/javascript">
     alert("Message not Sent ") 
     </script>';
    }
  }

  ?>



  <script src="js/main.js"></script>

</body>
<script src="https://kit.fontawesome.com/096572d129.js" crossorigin="anonymous"></script>

</html>