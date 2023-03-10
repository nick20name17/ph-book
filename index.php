<?php
require('app/app.php');

$data = Data::get_contacts();

if (isset($_GET['search'])) {
  $items = Data::search_contacts($_GET['search']);

  $heading = 'Search Results for ' . '<span>' . $_GET['search'] . '</span>';
} else {
  $items = $data;

  $heading = 'Phone Book';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PhoneBook</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <header class="header">
    <div class="container header__container">
      <h1 class="title"><?= $heading ?></h1>
      <a class="header__btn" href="login.php">Log in</a>
    </div>
  </header>

  <main>
    <section class="phonebook">
    <div class="container">
      <form class="search-form" action="" method="GET">
        <div class="form-group">
          <div>
            <input class="search-input" type="text" name="search" id="search">
            <input class="search-submit" type="submit" value="Search">
          </div>
        </div>
      </form> 

      <table class="table">
        <tr class="table-row">
          <th class="table-heading">Name</th>
          <th class="table-heading">Surname</th>
          <th class="table-heading">Number</th>
          <th class="table-heading">Comment</th>
        </tr>    
        <?php foreach ($items as $item) : ?>
          <tr class="table-row">
            <td class="table-item"><?= $item->name ?></td>
            <td class="table-item"><?= $item->surname ?></td>
            <td class="table-item"><?= $item->number ?></td>
            <td class="table-item"><?= $item->comment ?></td>
          </tr>
        <?php endforeach; ?>  
      </table>
    </div>
    </section>
  </main>

</body>
</html>
