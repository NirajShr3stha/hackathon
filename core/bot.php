<?php
// Initialize the session
#session_start();
 
// Include config file
require_once "./connection/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Chatsys</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="title">Hospital Chatbot</div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="msg-header">
                    <p>Hello there, how can I help you?</p>

                    <?php
                        if(array_key_exists('button1', $_POST)) {
                            button1();
                        }
                        else if(array_key_exists('button2', $_POST)) {
                            button2();
                        }
                        else if(array_key_exists('button3', $_POST)) {
                            button3();
                        }
                        function button1() {
                            echo "Can i know if any doctors are available?";
                        }
                        function button2() {
                            echo "Can I know your location?";
                        }
                        function button3() {
                            echo "What is your opening hour?";
                        }
                    ?>
                    <br>
                    <form method="post">
                        <button type="submit" name="button1" id="button1">Appointment</button>
                        <button type="submit" name="button2" id="button2">Location</button>
                        <button type="submit" name="button3" id="button3">Opening Hour</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Type your message here.." required>
                <button id="send-btn">Send</button>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function(){
            $("#showData").on("click", function(){
                $value = $("#button1").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#button1").val('');
                
                // start ajax code
                $.ajax({
                    url: './core/message.php',
                    type: 'POST',
                    data: 'text='Appointment,
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
                
                // start ajax code
                $.ajax({
                    url: './core/message.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>
    
</body>
</html>