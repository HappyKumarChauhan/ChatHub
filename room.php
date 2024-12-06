<?php
session_start();
?>
<?php
if (isset($_POST['createRoom'])) {
    $roomName = $_POST['newRoomName'];
    $createdBy = $_POST['newName'];
    if (strlen($roomName) <= 2 || strlen($roomName) > 12) {
        echo '<script>
                alert("Please enter a valid roomName (minimum 3 characters and maximum 12 characters)");
                window.location.href="/ChatHub/roomaccess.php";
                </script>';
    } else {
        include 'partials/dbconnect.php';
        if (!$conn) {
            die("Failed to connect" . mysqli_connect_error());
        } else {
            $sql = "SELECT * FROM `rooms` WHERE room_name='$roomName'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo '<script>
                    alert("This room name already exists please choose a different room name");
                    window.location.href="/ChatHub/roomaccess.php";
                    </script>';
            } else {
                $password = $_POST['newPassword'];
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `rooms` (`room_name`, `password`, `created_by`, `timestamp`) VALUES ('$roomName', '$hash', '$createdBy', current_timestamp());";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $_SESSION['loggedIn'] = true;
                    $_SESSION['sender'] = $createdBy;
                    ?>
                    <script>
                        alert("Room is created successfully. You can chat now.");
                    </script>
                    <?php
                }
            }
        }
    }
}
if (isset($_POST['joinRoom'])) {
    $roomName = $_POST['roomName'];
    $name = $_POST['name'];
    include 'partials/dbconnect.php';
    $sql = "SELECT * FROM `rooms` WHERE room_name='$roomName'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        echo '<script>
            alert("This room does not exist please join with a valid room name or create a new room.");
            window.location.href="/ChatHub/roomaccess.php";
            </script>';
    } else {
        $row = mysqli_fetch_assoc($result);
        $password = $_POST['password'];
        $hash = $row['password'];
        if (password_verify($password, $row['password'])) {
            // session_start();
            $_SESSION['loggedIn'] = true;
            $_SESSION['sender'] = $name;
            ?>
            <script>
                alert("You have entered into room. You can chat now.");
            </script>
            <?php
        } else {
            echo '<script>
                alert("You have entered incorrect password please login with correct password.");
                window.location.href="/ChatHub/roomaccess.php";
                </script>';
        }
    }
}
?>
<?php
if (!(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true)) {
    echo '<script>
                alert("You are not logged in please login with valid room name and password first.");
                window.location.href="/ChatHub/roomaccess.php";
            </script>';
} else {
    $sender = $_SESSION['sender'];
    $ip = $_SERVER['REMOTE_ADDR'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatroom- <?php echo $roomName; ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom styles -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .chat-container {
            overflow-y: scroll;
            max-width: 800px;
            margin: auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .chat-messages {
            height: 350px;
            overflow-y: auto;
            padding-right: 20px;
        }

        .message {
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .message .meta {
            font-size: 0.8em;
            color: #999;
        }

        .message .username {
            font-weight: bold;
            color: #007bff;
        }

        .message .message-content {
            margin-top: 5px;
        }

        .message .ip-address {
            font-size: 0.8em;
            color: #aaa;
        }

        .message .message-time {
            font-size: 0.8em;
            float: right;
            color: #999;
        }

        .chat-form {
            margin-top: 20px;
            border-top: 1px solid #eee;
            padding-top: 20px;
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
    <?php include 'partials/header.php'; ?>
    <h2 class="text-center my-4">Welcome to the room- <?php echo $roomName; ?></h2>
    <div class="container chat-container my-4">

        <div class="chat-messages my-3" id="chat-messages">

        </div>

        <div class="form-row py-4 border">
            <div class="col">
                <input type="text" class="form-control" id="message" placeholder="Type your message..." required>
            </div>
            <div class="col-auto">
                <button type="submit" id="sendMsg" class="btn btn-success">Send</button>
            </div>
        </div>
    </div>
    <?php include 'partials/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        // Function to scroll to the bottom of the chat container
        function scrollToBottom() {
            var chatContainer = document.getElementById("chat-messages");
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }

        // Call scrollToBottom initially to scroll to the bottom of existing messages
        scrollToBottom();

        // check for new messages every second
        setInterval(() => {
            $.post("chatcontainer.php",
                {
                    roomName: "<?php echo $roomName; ?>"
                },
                function (data, status) {
                    document.getElementsByClassName("chat-messages")[0].innerHTML = data;
                    scrollToBottom();
                });
        }, 1000)

        // using enter button to send message
        var input = document.getElementById("message");
        input.addEventListener("keypress", function (event) {
            if (event.key === "Enter") {
                event.preventDefault();
                document.getElementById("sendMsg").click();
            }
        });

        // sending message through post request
        $('#sendMsg').click(() => {
            var clientMessage = $('#message').val();
            document.getElementById("message").value = "";
            // alert(clientMessage);
            $.post("chats.php",
                {
                    sender: "<?php echo $sender; ?>",
                    message: clientMessage,
                    roomName: "<?php echo $roomName; ?>",
                    ip: "<?php echo $ip; ?>"
                },
                function (data, status) {
                    document.getElementsByClassName("chat-messages")[0].innerHTML = data;
                });
            return false;
        });
    </script>

</body>

</html>