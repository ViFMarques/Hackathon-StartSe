<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: dashboard.php");
	} else {
		echo "<script>alert('Senha ou email incorreto.')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="style.css" />

    <title> Entrar </title>
  </head>

  <body>
    <div id="main-container">
        <main id="login">            
            <img src="../img/logo.svg" alt="logo da empresa" />            
            <h1>Entrar</h1>
            <form action="" method="POST" class="login-email">
              <fieldset class="label-float">
                  <input type="email" placeholder="E-mail" name="email" value="<?php echo $email; ?>" required>
                  <label for="email"> E-mail: </label>
              </fieldset>
              <fieldset class="label-float">
                  <input type="password" placeholder="Senha" name="password" value="<?php echo $_POST['password']; ?>" required>
                  <label for="senha"> Senha: </label>
              </fieldset>
              <button type="submit" name="submit">Continue <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="#3A780C" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                  </svg></button>
            </form>
            <a href="index.php"><p>Voltar</p></a>
          </main>    
    </div>    
        
  </body>
</html>
