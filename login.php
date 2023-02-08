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
      <h1 class="title">Login</h1>
    </div>
  </header>

  <main>
    <section class="login">
        <div class="container">
            <form class="login-form" action="" method="POST">
                <input class="login-input" type="text" name="email" id="email" placeholder="Enter your email" />
                <input class="login-input" type="password" name="password" id="password" placeholder="Enter your password"/>
                <input class="submit-btn" type="submit" name="login" value="Login" />
              </div>
            </form>
        </div>
    </section>
  </main>

</body>
</html>