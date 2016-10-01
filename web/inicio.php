<html>
<head>
  <!-- Uilizamos los CSS de Bootstrap y JavaScript -->
  <title>Proyecto Alexa</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link type="text/css" href="css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="css/estilos.css" />
  <script src="js/jquery-1.10.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/npm.js"></script>
  
  <!-- Este script facilita que podamos navegar por el menu sin salir de la página -->
  <script>
  $(function(){
    var hash = window.location.hash;
    hash && $('ul.nav a[href="' + hash + '"]').tab('show');
    $('.nav-tabs a').click(function (e) {
      $(this).tab('show');
      var scrollmem = $('body').scrollTop();
      window.location.hash = this.hash;
      $('html,body').scrollTop(scrollmem);
    });
  });
  </script>
</head>
<body>
  <div class="page-header" align="center">
    <h1 class="text-danger" style="color:#00ACC1">Proyeto Alexa</h1>
  </div>
  <div class="tabbable">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab1" datatoggle="tab">LuzSalon</a></li>
      <li ><a href="#tab2" data-toggle="tab">Luz Cocina</a></li>
      <li><a href="#tab3" data-toggle="tab">Tiempo</a></li>
    </ul>
    <div class="tab-content">
      <!-- Primera opción dl menu -->
      <div class="tab-pane active" id="tab1">
        <?php
        /* El while contiene la cookie del inicio de sesión, con esto permitimos que si no se ha iniciado sesion */
        while (isset($_COOKIE['misitio_userid'])){
          /* Aquí se utiliza el método POST, con botones, en caso de que se pulse el botón de encendercoc
          se registrara una cookie, en el navegador y se actualizará la página, para que se pueda cumplir la siguente condion */
          if (isset($_POST['encendersalon'])) {
            setcookie('encendersalon', 'SalonEncendido', time() + 4800 );
            header( "refresh:0;" );
          }

          //Guardamos la cookie en una variable
          $my_cookie = isset($_COOKIE['encendersalon']);

          /* En caso de que la coockie esté registrada la luz se encenderá y nos mostrará una imagen de una bombilla encendida*/
          if ($my_cookie == 'SalonEncendido') {
            //Aquí llamamos al Script que contiene la orden de encendido.
            exec("sudo ./scripts/relay/encender_salon.sh");
            echo "
            <br><br>
            <div class='center-block' align='center'>
            <h1 align='center' style='color:green'>Luz Salon Encendida</h1>
            <a><img src='images/on.png'></a>
            </div>";
          }

          // En caso de pulsar apagarsalon se elimina la coockie anterior, y se actualiza la página
          if (isset($_POST['apagarsalon'])) {
            setcookie('encendersalon', '', time() - 1000);
            header( "refresh:0;" );
          }

          // En caso de que la coockie se haya borrado, ejecutar apagar, y mostrar el mensaje de Luz apagada.
          if ( $my_cookie == "" ) {
            //LLamada al Script para apagar luz.
            exec("sudo ./scripts/relay/apagar_salon.sh");
            echo "
            <br><br>
            <div class='center-block' align='center'>
            <h1 align='center' style='color:blue'>Luz Salon Apagada</h1>
            <a><img src='images/off.png'></a>
            </div>";
          }
          break;
        }
        ?>
        <!-- En estas líneas encontramos los diferentes botones -->
        <form action="" method="post">
          <br><br>
          <div class='center-block' align="center">
            <input type="submit" name="encendersalon" class="btn btn-success btn-lg" value="Encender" align="center" size="18">
            <input type="submit" name="apagarsalon" value="Apagar" class="btn btn-primary btn-lg" align="center">
            <br><br>
          </div>
          <br>
        </form>

        <!-- El procedimiento del ventilador es igual que el anterior -->
        <?php
        while (isset($_COOKIE['misitio_userid'])) {
          if (isset($_POST['encenderventilador'])) {
            setcookie('encenderventilador', 'VentiladorEncendido', time() + 4800 );
            header( "refresh:0;" );
          }

          $my_cookieVentilador = isset($_COOKIE['encenderventilador']);
          if ($my_cookieVentilador == 'VentiladorEncendido') {
            exec("sudo ./scripts/relay/encender_ventilador.sh");
            echo "
            <br><br>
            <div class='center-block' align='center'>
            <h1 align='center' style='color:green'>Ventilador Encendido</h1>
            <a><img src='images/ventilador.png'></a>
            </div>";
          }

          if (isset($_POST['apagarventilador'])) {
            setcookie('encenderventilador', '', time() - 1000);
            header( "refresh:0;" );
          }

          if ( $my_cookieVentilador == "" ) {
            exec("sudo ./scripts/relay/apagar_ventilador.sh");
            echo "
            <br><br>
            <div class='center-block'>
            <h1 align='center' style='color:blue'>Ventilador Apagado</h1>
            </div>";
          }
          break;
        }
        ?>

        <form action="" method="post">
          <br> <br>
          <div class='center-block' align="center">
            <input type="submit" name="encenderventilador" class="btn btn-success btn-lg" value="Encender" align="center" size="18">
            <input type="submit" name="apagarventilador" value="Apagar" class="btn btn-primary btn-lg" align="center">
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
<html>
