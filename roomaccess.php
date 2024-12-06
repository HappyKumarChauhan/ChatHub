<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chatroom - Choose a room</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <style>
    /* Custom styles can go here */
    body{
      background-color: #1b2944;
    }
    .room-form {
      max-width: 400px;
      margin: 50px auto;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
      background-color: #ffffff;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .form-group label {
      font-weight: bold;
    }
    .btn-primary {
      width: 100%;
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

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="room-form" id="joinRoomForm">
          <h2 class="text-center mb-4">Join Chatroom</h2>
          <form action="room.php" method="post">
            <div class="form-group">
              <label for="roomName">Room Name</label>
              <input type="text" class="form-control" id="roomName" placeholder="Enter Room Name (3 to 12 characters)" name="roomName" required>
            </div>
            <div class="form-group">
              <label for="password">Password(optional)</label>
              <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
            </div>
            <div class="form-group">
              <label for="name">Your Name</label>
              <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" required>
            </div>
            <button type="submit" class="btn btn-success" name="joinRoom">Join Room</button>
          </form>
        </div>
        <div class="room-form d-none" id="createRoomForm">
          <h2 class="text-center mb-4">Create Chatroom</h2>
          <form action="room.php" method="post">
            <div class="form-group">
              <label for="newRoomName">Room Name</label>
              <input type="text" class="form-control" id="newRoomName" placeholder="Enter Room Name (3 to 12 characters)" name="newRoomName" required>
            </div>
            <div class="form-group">
              <label for="newRoomPassword">Password(optional)</label>
              <input type="password" class="form-control" id="newRoomPassword" placeholder="Enter Password" name="newPassword">
            </div>
            <div class="form-group">
              <label for="newName">Your Name</label>
              <input type="text" class="form-control" id="newName" placeholder="Enter your name" name="newName" required>
            </div>
            <button type="submit" class="btn btn-success" name="createRoom">Create Room</button>
          </form>
        </div>
        <div class="text-center mt-3">
          <button class="btn btn-outline-primary mb-4" id="toggleFormBtn">Create a Room</button>
        </div>
      </div>
    </div>
  </div>
  <?php include 'partials/footer.php';
  ?>
  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    document.getElementById('toggleFormBtn').addEventListener('click', function() {
      // Toggle between Join Room and Create Room forms
      document.getElementById('joinRoomForm').classList.toggle('d-none');
      document.getElementById('createRoomForm').classList.toggle('d-none');
      
      // Toggle button text based on current form visibility
      if (document.getElementById('joinRoomForm').classList.contains('d-none')) {
        this.textContent = 'Join a Room';
      } else {
        this.textContent = 'Create a Room';
      }
    });
  </script>
</body>
</html>
