<?php
session_start();
require('../app/app.php');

ensure_user_is_authenticated();
    

if (is_post()) {
    $name = sanitize($_POST['name']);
    $surname = sanitize($_POST['surname']);
    $number = sanitize($_POST['number']);
    $comment = sanitize($_POST['comment']);

    if (empty($name) || empty($surname) || empty($number) || empty($comment)) {
        // TODO: display message
    } else {
        Data::add_term($name, $surname, $number, $comment);
        redirect('index.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PhoneBook Add New</title>
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
  <header class="header">
    <div class="container header__container">
      <h1 class="title">Add New</h1>
      <a class="header__btn" href="../logout.php">Log out</a>
    </div>
  </header>

  <main>
    <section class="phonebook">
    <div class="container">
        <form class="login-form add-form" action="" method="POST">
            <div class="form-group">
              <input class="login-input" type="text" name="name" id="name" placeholder="Enter your name" />
              <input class="login-input" type="text" name="surname" id="surname" placeholder="Enter your surname"/>
            </div>
            <div class="form-group">
              <input class="login-input" type="text" name="number" id="number" placeholder="Enter your number"/>
              <input class="login-input" type="text" name="comment" id="comment" placeholder="Enter your comment"/>
            </div>
            <input class="submit-btn submit-btn_add" type="submit" name="add" value="Add New" />
        </form>

    </div>
    </section>
  </main>

</body>
</html>
