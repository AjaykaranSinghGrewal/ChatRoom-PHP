<?php
    include 'db.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Chat Room</title>
        <style>
        *{
            padding: 0;
            margin: 0;
            border: 0;
        }

        body{
            background: silver;
        }

        #container{
            width: 40%;
            background: white;
            margin: 0 auto;
            padding: 20px;
        }

        #chat_box{
            width: 95%;
            height: 400px;
            overflow-y: auto;
            overflow-x: hidden;
        }

        input[type='text']{
            width: 100%;
            height: 40px;
            border: 1px solid grey;
            border-radius: 5px;
        }

        button{
            width: 100%;
            height: 40px;
            border: 1px solid grey;
            border-radius: 5px;
        }

        input[type='textarea']{
            width: 100%;
            height: 40px;
            border: 1px solid grey;
            border-radius: 5px;
        }

        #chat_data{
            width: 100%;
            padding: 5px;
            margin-bottom: 5px;
            border-bottom: 1px solid silver;
        }
        </style>
    </head>
    
    <body>    
        <div id="container">
            <div id="chat_box">
            <div id="messages">
            
            </div>                
            </div>
        
        
        <form method="post" action="index.php">
            <input type="text" id="name" name="name" placeholder="Enter your name"/>
            <input type="textarea" id="message" name="message" placeholder="Enter Message"/>
            <button type="submit" name="submit" value="Send It">Send It</button>
            <button name="delete" value="Delete">Delete</button>
        </form>
            
        <?php
            if(isset($_POST['submit'])) {
                $name = $_POST['name'];
                $msg = $_POST['message'];
                
                $query = "INSERT INTO chat (name, msg) values ('$name','$msg')"; 
                
                $run = $connection->query($query);
                
                if($run) {
                    echo " <embed loop='false' src='chat.wav' hidden='true' autoplay='true'> ";
                }
            }
            
            if(isset($_POST['delete'])) {
                $query = "DELETE FROM chat";
                $run = $connection->query($query);            
            }
        ?>
                
        </div>
        
        <script src="http://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>
        
        <script>
            $(document).ready(function(){
                
               var interval = setInterval(function(){
                    $.ajax({
                        url: 'chat.php',
                        success: function(data) {
                            $('#messages').html(data);
                        }
                    });
                }, 800); 
            });
        </script>
      </body>
</html>