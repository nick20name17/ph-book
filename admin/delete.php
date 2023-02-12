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

    $contact = Data::get_contact($key);

    if ($contact === false) {
        redirect('../not_found.php');
        die();
    }

}

if (is_post()) {
    $contact = sanitize($_POST['contact']);

    if (empty($contact)) {
       return;
    } else {
        Data::delete_contact($contact);
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
  <title>PhoneBook Delete</title>
  <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
  <header class="header">
    <div class="container header__container">
      <h1 class="title">Are you sure you want to delete <span><?= $contact->name ?></span></h1>
    </div>
  </header>

  <main>
    <section class="phonebook">
      <div class="container">
        <form action="" method="POST">
          <input type="hidden" name="contact" value="<?= $contact->id ?>" />
            <div class="form-group">
              <input class="submit-btn" type="submit" value="Delete">
            </div>
        </form>
      </div>
    </section>
  </main>

</body>
</html>