<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to ChatHub</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <style>
    /* Custom styles can go here */
    body{
      background-color: #1b2944;
    }
    .hero-section {
      padding: 35vh 0;
      text-align: center;
      color: white;
    }
    .feature-section {
      padding: 5px 0;
      background-color: #ffffff;
      text-align: center;
    }
    .footer-section {
      background-color: #343a40;
      color: #ffffff;
      padding: 4px 0;
      text-align: center;
    }
  </style>
</head>
<body>
  
  <!-- Navigation -->
  <?php include 'partials/header.php';?>
  <!-- Hero Section -->
  <section class="hero-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h1>Welcome to ChatHub</h1>
          <p class="lead">Connect and chat with people around the world.</p>
          <a href="/ChatHub/roomaccess.php" class="btn btn-success btn-lg">Get Started</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section class="feature-section" id="features">
    <h1 class="my-4">Features</h1>
    <div class="container py-4 my-4">
      <div class="row">
        <div class="col-lg-4">
          <i class="fas fa-users fa-3x mb-3"></i>
          <h3>Public Chatrooms</h3>
          <p>Join public chatrooms based on your interests.</p>
        </div>
        <div class="col-lg-4">
          <i class="fas fa-comments fa-3x mb-3"></i>
          <h3>Private Messaging</h3>
          <p>Send private messages to your friends.</p>
        </div>
        <div class="col-lg-4">
          <i class="fas fa-lock fa-3x mb-3"></i>
          <h3>Secure and Safe</h3>
          <p>Your privacy is our top priority.</p>
        </div>
      </div>
    </div>
  </section>
  <?php
  include 'partials/footer.php'
  ?>
  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>