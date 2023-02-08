<?php

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
      <h1 class="title">Phone Book</h1>
      <a class="header__btn" href="login.php">Log in</a>
    </div>
  </header>

  <main>
    <section class="phonebook">
    <div class="container">
      <form class="search-form" action="" method="GET">
        <div class="form-group">
          <input class="search-input" type="text" name="search" id="search">
          <input class="search-submit" type="submit" value="Search">
        </div>
      </form> 

      <table class="table">
        <tr class="table-row">
          <th class="table-heading">Name</th>
          <th class="table-heading">Surname</th>
          <th class="table-heading">Number</th>
          <th class="table-heading">Comment</th>
        </tr>     
      </table>
    </div>
    </section>
  </main>

</body>
</html>
