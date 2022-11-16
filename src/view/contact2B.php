<!doctype html>
<html lang="en">

<head>
    <title>Contactez-moi</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-8 m-4">
                <form action="sendEmail.php" method="POST">
                    <div class="form-group">
                        <div class="text-center">
                            <h1>Contactez-moi ! </h1>
                        </div>
                        <div class="d-flex">
                            <input type="text" name="surname" placeholder="Nom" autocomplete="off" class="form-control" />
                            <input type="text" name="firstname" placeholder="Prénom" autocomplete="off" class="form-control" />
                        </div>
                        <br />
                        <input type="email" name="email" placeholder="Email" autocomplete="off" class="form-control" />
                        <br />
                        <textarea rows="10" name="message" placeholder="Votre message" class="form-control"></textarea>
                        <br />
                        <button type="submit" class="btn btn-lg btn-primary">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>

<!-- <html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Comment Créer un beau Formulaire de Contact en HTML & CSS</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />
</head>

<body>
    <form method="POST" action="sendEmail.php">
        <h1>Contactez-nous</h1>
        <div class="separation"></div>
        <div class="corps-formulaire">
            <div class="gauche">
                <div class="groupe">
                    <label>Votre Prénom</label>
                    <input name="name" type="text" autocomplete="off" />
                    <i class="fas fa-user"></i>
                </div>
                <div class="groupe">
                    <label>Votre adresse e-mail</label>
                    <input name="email" type="text" autocomplete="off" />
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="groupe">
                    <label>Subject</label>
                    <input name="subject" type="text" autocomplete="off" />
                    <i class="fas fa-mobile"></i>
                </div>
            </div>

            <div class="droite">
                <div class="groupe">
                    <label>Message</label>
                    <textarea name="body" placeholder="Saisissez ici..."></textarea>
                </div>
            </div>
        </div>

        <div class="pied-formulaire" align="center">
            <button type="submit" name="sendEmail">Envoyer le message</button>
        </div>
    </form>
</body>
<!-- 
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    function sendEmail() {
        var name = $("#name");
        var email = $("#email");
        var subject = $("#subject");
        var body = $("#body");
        if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
            $.ajax({
                url: 'contact.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    name: name.val(),
                    email: email.val(),
                    subject: subject.val(),
                    body: body.val()
                },
                success: function(response) {
                    $('#myForm')[0].reset();
                }
            });
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else {
                caller.css('border', '');
                return true;
            }
        }
    }
</script> -->

</html> -->