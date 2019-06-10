<?php {
    include 'koneksi.php';

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <style>
        .wrap-all {
            height: 100vh;
            width: 100%;
            margin: 0;
            padding: 0;

        }

        .container {
            display: flex;
            justify-content: center;
            align-content: center;
            justify-items: center;
            justify-self: center;
            align-items: center;

            align-self: center;
        }
    </style>

    <body>
        <div class="wrap-all">
            <div class="container">
                <div>
                    <form action="" method="post" class="form-group">
                        <div>
                            <label>Name</label>
                            <input autocomplete="off" name="user" type="text" class="form-control" />
                        </div>
                        <div>
                            <label>password</label>
                            <input name="pass" type="password" class="form-control" />
                        </div>
                        <div>
                            <label>Repeat Password</label>
                            <input name="passR" type="password" class="form-control" />
                        </div>
                        <br />
                        <input name="btn_log" type="submit" class="btn btn-primary" />
                        <a href="index.php">Have Account? Login</a>
                    </form>
                </div>
            </div>
        </div>
    </body>

    <?php
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $passR = $_POST['passR'];
    $submit = $_POST['btn_log'];

    $get_all = $con->query("select * from user where username='$user'");
    $cek_exist = mysqli_num_rows($get_all);
    if ($submit) {

        if ($cek_exist != 0) {
            ?><script>
                alert('Username Already Exist')
            </script><?php
                } else if ($pass != $passR) {
                    ?><script>
                alert('password did not match')
            </script><?php
                } else {
                    $sql = $con->query("INSERT INTO user (username,password) VALUES('$user',md5('$pass'))");
                    if ($sql == TRUE) {
                        ?><script>
                    alert('Register Successfully');
                </script><?php
                header("location: index.php ");
                    } else {
                        ?><script>
                    alert('Error');
                </script><?php
                    }
                }
            }
            ?>

    </html>

<?php
}
?>