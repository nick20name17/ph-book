<?php
session_start();
require('../app/app.php');

ensure_user_is_authenticated();

if (is_get()) {
    $key = sanitize($_GET['key']);

    if (empty($key)) {
        redirect('../not_found.php');
        die();
    }

    $contact = Data::get_term($key);

    if ($contact === false) {
        redirect('../not_found.php');
        die();
    }
}

if (is_post()) {
    $name = sanitize($_POST['name']);
    $surname = sanitize($_POST['surname']);
    $number = sanitize($_POST['number']);
    $comment = sanitize($_POST['comment']);
    $original = sanitize($_POST['original-contact']);

    if (empty($name) || empty($surname) || empty($number) || empty($comment) || empty($original)) {
        // TODO: display message
    } else {
        Data::update($original, $name, $surname, $number, $comment);
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
  <title>PhoneBook Edit</title>
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
  <header class="header">
    <div class="container header__container">
      <h1 class="title">Edit Term</h1>
    </div>
  </header>

  <main>
    <section class="phonebook">
    <div class="container">
        <form class="login-form add-form" action="" method="POST">
            <input type="hidden" name="original-contact" value="<?= $contact->id ?>" />
            <div class="form-group">
              <input class="login-input" type="text" name="name" id="name" value="<?= $contact->name ?>" placeholder="Enter your name" />
              <input class="login-input" type="text" name="surname" id="surname" value="<?= $contact->surname ?>" placeholder="Enter your surname"/>
            </div>
            <div class="form-group">
              <input class="login-input" type="text" name="number" id="number" value="<?= $contact->number ?>" placeholder="Enter your number"/>
              <input class="login-input" type="text" name="comment" id="comment" value="<?= $contact->comment ?>" placeholder="Enter your comment"/>
            </div>
            <input class="submit-btn submit-btn_add" type="submit" name="edit" value="Edit" />
        </form>
    </div>
    </section>
  </main>

</body>
</html>