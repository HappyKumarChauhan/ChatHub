<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ChatHub- About Us</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <style>
    /* Custom styles can go here */
    body{
      background-color: #1b2944;
      color: white;
    }
    .developer-image img{
      border-radius: 50%;
    }
    .footer-section {
      background-color: #343a40;
      color: #ffffff;
      padding: 4px 0;
      text-align: center;
      bottom: 0px;
    }
  </style>
</head>
<body>
  
  <!-- Navigation -->
  <?php include 'partials/header.php';?>
  <div class="container my-4 bg-gradient p-3">
    <h1 class="text-center">Developed By:</h1>
    <div class="developer-image text-center">
      <img src="dhiraj.jpeg" width="25%" alt="">
    </div>
    <div class="container about-developer">
      <h2 class="text-center">Dhiraj Kumar Maurya</h2>
      <h4 class="text-center text-secondary">(Full Stack Web Developer)</h4>
      <div class="container text-center">
        <a className="m-1" href="https://www.linkedin.com/in/happy-kumar-1773a228a/"><img width="30" src="linkedin.svg"
          alt="LinkedIn"></a>
        <a className="m-1" href="https://www.facebook.com/profile.php?id=100014221995587"><img width="30" src="facebook.svg"
                alt="Facebook"></a>
        <a className="m-1" href="https://www.instagram.com/iamhappychauhan/"><img width="30" src="instagram.svg"
                alt="Instagram"></a>
        <a className="m-1" href="https://x.com/HappyKu11114713"><img width="30" src="twitter.svg" alt="Twitter"></a>
      </div>
    </div>
  </div>
        
  <?php
  include 'partials/footer.php'
  ?>
  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>