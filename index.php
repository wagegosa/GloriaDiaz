<?php 
$alert = '';
session_start();
if(!empty($_SESSION['active'])){
  switch ($_SESSION['perfil']) {
    case '1':
      header('location: ./admin/');
      break;

    case '2':
      header('location: ./operario/');
      break;

    case '3':
      header('location: ./empresa/');
      break;
  }
}else{
  if(!empty($_POST)){
    if(empty($_POST['username']) || empty($_POST['pass'])){
      $alert = 'Ingrese su usuario y su calve';
    }else{
      require_once "./config/General/connexion.php";
      $conn= new DataBase();
      $link = $conn->Conectarse();
      $user = $_POST['username'];
      // $pass = md5($_POST['pass']);
      $pass = $_POST['pass'];
      $query = "SELECT idtba_Usuario, perfil, usuario, nom_comple FROM gloriadiaz.tba_usuario WHERE usuario = '$user' AND pass = '$pass'  AND activo = 'Y'";
      $result = mysqli_query($link,$query);
      mysqli_close($link);
      $resulta = mysqli_num_rows($result);
      if($resulta > 0){
        $data = mysqli_fetch_array($result);
        $_SESSION['active'] = true;
        $_SESSION['idUser'] = $data['idtba_Usuario'];
        $_SESSION['perfil'] = $data['perfil'];
        $_SESSION['usuario']  = $data['usuario'];
        $_SESSION['nombre']   = $data['nom_comple'];
        switch ($_SESSION['perfil']) {
          case '1':
            header('location: ./admin/');
            break;
          
          case '2':
            header('location: ./operario/');
            break;

          case '3':
            header('location: ./empresa/');
            break;
        }
      }else{
        $alert = 'El <strong>usuario</strong> o la <strong>clave</strong> son incorrectos';
        session_destroy();
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Asistencias</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="css/login/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/login/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/login/icon-font.min.css">
  <link rel="stylesheet" type="text/css" href="css/login/animate.css">
  <link rel="stylesheet" type="text/css" href="css/login/hamburgers.min.css">
  <link rel="stylesheet" type="text/css" href="css/login/select2.min.css">
  <link rel="stylesheet" type="text/css" href="css/login/util.css">
  <link rel="stylesheet" type="text/css" href="css/login/main.css">
</head>
<body>
  <div class="limiter">
    <div class="container-login100" style="background-image: url('img/gloriadiaz.jpeg');">
      <div class="wrap-login100 p-t-190 p-b-30">
        <form method="post" autocomplete="on" id="frm" action="">
          <div class="login100-form-avatar">
            <img src="img/gloriadiaz.jpeg" alt="AVATAR">
          </div>
          <span class="login100-form-title p-t-20 p-b-45">
            Login
          </span>
          <div class="wrap-input100 validate-input m-b-10" data-validate="Username is required">
            <input class="input100" type="text" name="username" id="username" placeholder="Usuario">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-user"></i>
            </span>
          </div>
          <div class="wrap-input100 validate-input m-b-10" data-validate="Password is required">
            <input class="input100" type="password" name="pass" id="pass" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock"></i>
            </span>
          </div>
          <?php if($alert != "" || $alert != null){ ?>
          <div class="alert alert-warning"><?php echo isset($alert) ? $alert : ''; ?></div>
          <?php } ?>
          <div class="container-login100-form-btn p-t-10">
            <button class="login100-form-btn">
              Login
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="css/login/js/jquery-3.2.1.min.js" type="f5172d9c3efe526f7cda9df6-text/javascript"></script>
  <script src="css/login/js/popper.js" type="f5172d9c3efe526f7cda9df6-text/javascript"></script>
  <script src="css/login/js/bootstrap.min.js" type="f5172d9c3efe526f7cda9df6-text/javascript"></script>
  <script src="css/login/js/select2.min.js" type="f5172d9c3efe526f7cda9df6-text/javascript"></script>
  <script src="css/login/js/main.js" type="f5172d9c3efe526f7cda9df6-text/javascript"></script>
  <script async src="css/login/js/js?id=UA-23581568-13" type="f5172d9c3efe526f7cda9df6-text/javascript"></script>
  <script type="f5172d9c3efe526f7cda9df6-text/javascript">
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-23581568-13');
  </script>
</body>
</html>