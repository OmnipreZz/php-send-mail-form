<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SendMail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>

<h1 class="text-center text-danger mb-4 mt-4">Send Mail</h1>
    <form class="text-center mx-auto p-5" action="./" method="POST" style="width: 600px; box-shadow: 2px 2px 2px gray; background-color: #E98989;">
        <div class="form-group">
            <label for="mail">Mail</label>
            <input type="email" class="form-control" id="mail" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
        </div>
        <div class="form-group">
            <label for="sujet">Sujet</label>
            <input type="text" class="form-control" id="sujet" name="sub" required>
        </div>
        <div class="form-group">
            <label for="message">Votre message</label>
            <textarea class="form-control" id="message" name="msg" maxlength="500" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-danger">Envoyez</button>
    </form>
    <br>
    
    <?php
    
    if (isset($_POST['email'])) {
    $to = $_POST['email'];
    $subject = $_POST['sub'];
    $message = $_POST['msg'];
    $headers = 'From: omni@webmaster.com' . "\r\n" .
     'Reply-To: omni@webmaster.com' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);

        //exception qui test si le message est vide !!
        function emptyMsg($message) {
            if (!$message) {
                throw new Exception('Le message est vide');
            } else {
                echo '<p class="text-center text-danger">Message bien envoyé</p>';
            }
            
        }
        try {
            emptyMsg($_POST['msg']);
        }catch (Exception $e) {
            echo '<p class="text-center text-danger">Message d\'erreur : ', $e->getMessage().'</p>';
        }
    }

    ?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>
</html>