<html>
    <head>
    <!-- Uilizamos los CSS de Bootstrap y JavaScript -->
        <title>Proyecto Alexa</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link type="text/css" href="css/bootstrap.css" />
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
            <!-- Estas lineas contienen el menú, para poder navegar-->
            <div class="page-header" align="center">
               <h1 class="text-danger" style="color:#00ACC1">
		Proyecto Alexa </h1>
            </div>
            <div class="tabbable">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab1" datatoggle="tab">Salon</a></li>
                  <li ><a href="#tab2" data-toggle="tab">Ventilador</a></li>
                  <li><a href="#tab3" data-toggle="tab">Silla</a></li>
                </ul>
            <div class="tab-content">
            <!-- Primera opción del menú -->
                       <div class="tab-pane active" id="tab1">
<?php
    /* El while contiene la coockie del inicio de sesión, con esto permitimos que si no se ha iniciado sesión
        no se pueda interactuar con el servidor */
    while (isset($_COOKIE['misitio_userid'])){
    /* Aquí se utiliza el método POST, con botones, en caso de que se pulse el botón de encendercocina
        se registrara una cookie, en el navegador y se actualizará la página, para que se pueda cumplir la siguente condición*/
        if (isset($_POST['encendersalon'])) {
            setcookie('encendersalon', 'SalonEncendido', time() + 4800 );
            header( "refresh:0;" );
            }
    //Guardamos la cookie en una variable      
        $coockie = isset($_COOKIE['encendersalon']);
    /* En caso de que la coockie esté registrada la luz se encenderá y nos mostrará una imagen de una bombilla encendida*/
        if ($coockie == 'SalonEncendido') {
    //Aquí llamamos al Script que contiene la orden de encendido
	    exec("sudo bash scripts/relay/activar_17.sh");
            exec("sudo bash scripts/relay/encender_salon.sh");
            echo "
            <br><br>
            <div class='center-block' align='center'>
            <h1 align='center' style='color:green'>Luz Salon Encendida</h1>
            <a><img src='imagenes/on.png'></a>
            </div>";
                } 
        // En caso de pulsar apagarsalon se elimina la coockie anterior, y se actualiza la página
        if (isset($_POST['apagarsalon'])) {
            setcookie('encendersalon', '', time() - 1000);
            header( "refresh:0;" );
            }
        // En caso de que la coockie se haya borrado, ejecutar apagar, y mostrar el mensaje de Luz apagada.
        if ( $coockie == "" ) { 
        //LLamada al Script para apagar luz.
	    exec("sudo bash scripts/relay/desactivar_17.sh");
            exec("sudo bash scripts/relay/apagar_salon.sh");
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
      <!-- En estas líneas encontramos los diferentes bootones -->
  <form action="" method="post">
         <br><br>
     <div class='center-block' align="center">
        <input type="submit" name="encendersalon" class="btn btn-success btn-lg" value="Encender" align="center" size="18">
      	<input type="submit" name="apagarsalon" value="Apagar" class="btn btn-primary btn-lg" align="center">
          <br><br>
     </div>
          <br>
  </form>
</div>

<div class="tab-pane" id="tab2">
<!-- El procedimiento del ventilador es igual que el anterior -->
<?php
    while (isset($_COOKIE['misitio_userid'])) {
        if (isset($_POST['encenderventilador'])) {
            setcookie('encenderventilador', 'VentiladorEncendido', time() + 4800 );
            header( "refresh:0;" );
                }
        $coockieVentilador = isset($_COOKIE['encenderventilador']);
        if ($coockieVentilador == 'VentiladorEncendido') {
            exec("sudo bash scripts/relay/activar_27.sh");
            exec("sudo bash scripts/relay/encender_ventilador.sh");
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
        if ( $coockieVentilador == "" ) {
	    exec("sudo bash scripts/relay/desactivar_27.sh");
            exec("sudo bash scripts/relay/apagar_ventilador.sh");
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

<div class="tab-pane" id="tab3">

</div>
    </div>
   </div>
  </body>
<html>
