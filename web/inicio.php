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
    /* El while contiene la coockie del inicio de sesión, con esto permitimos que si no se ha iniciado sesi� */
    while (isset($_COOKIE['misitio_userid'])){
    	/* Aquí se utiliza el método POST, con botones, en caso de que se pulse el botón de encendercoc
        se registrara una cookie, en el navegador y se actualizará la página, para que se pueda cumplir la siguente condion */
        if (isset($_POST['encendersalon'])) {
            setcookie('encendersalon', 'SalonEncendido', time() + 4800 );
            header( "refresh:0;" );
        }

    	//Guardamos la cookie en una variable      
        $coockie = isset($_COOKIE['encendersalon']);
    	
	/* En caso de que la coockie esté registrada la luz se encenderá y nos mostrará una imagen de una bombilla encendida*/
	if ($coockie == 'SalonEncendido') {
    	//Aquí llamamos al Script que contiene la orden de encendido.
            exec("sudo ./encender_salon.sh");
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
        	exec("sudo ./apagar_salon.sh");
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

<!-- El procedimiento del ventilador es igual que el anterior -->
<?php
    while (isset($_COOKIE['misitio_userid'])) {
        if (isset($_POST['encenderventilador'])) {
            setcookie('encenderventilador', 'VentiladorEncendido', time() + 4800 );
            header( "refresh:0;" );
        }

        $coockieVentilador = isset($_COOKIE['encenderventilador']);
        if ($coockieVentilador == 'VentiladorEncendido') {
            exec("sudo ./encender_ventilador.sh");
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
            exec("sudo ./apagar_ventilador.sh");
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

<div class="tab-pane" id="tab2">
<?php
// El mismo procedimiento
    while (isset($_COOKIE['misitio_userid'])){
        if (isset($_POST['encendercocina'])) {
                setcookie('encendercocina', 'CocinaEncendida', time() + 4800 );
                header( "refresh:0;" );
        }
        $coockieCocina = isset($_COOKIE['encendercocina']);
            
		if ($coockieCocina == 'CocinaEncendida') {
                exec("sudo python encender_cocina.py");
                echo "
                <br><br>
                <div class='center-block' align='center'>
                <h1 align='center' style='color:green'>Luz Cocina Encendida</h1>
                <a><img src='images/on.png'></a>
                </div>";
                }               
            
	if (isset($_POST['apagarcocina'])) {

                setcookie('encendercocina', '', time() - 1000);
                header( "refresh:0;" );
        }
            if ( $coockieCocina == "" ) {   
                    echo "
                    <br><br>
                    <div class='center-block' align='center'>
                    <h1 align='center' style='color:blue'>Luz Cocina Apagada</h1>
                    <a><img src='images/off.png'></a>
                    </div>";   
                    exec("sudo python apagar_cocina.py");
            }
        break;
    }
?>

<form action="" method="post">
    <br> <br>
     <div class='center-block' align="center">
       <input type="submit" name="encendercocina" class="btn btn-success btn-lg" value="Encender" align="center" size="18">
       <input type="submit" name="apagarcocina" value="Apagar" class="btn btn-primary btn-lg" align="center">
 </div>
      </br>
 </form>
</div>

<div class="tab-pane" id="tab3">
    <?php
        while (isset($_COOKIE['misitio_userid'])) {
        /* En este caso, utilizamos la función system para llamar al script, ya que esta nos permite visualizar la salida */
    	/* Se ha duplicado el Script que programa el DHT11 "sensor de temperatura y humedad" imprimiendo  en uno solo la salida
    	de la temperatura, y en otro imprimiendo solo la salida de la humedad, así podremos tratarlos como dos variables,
    	y mostrarlas en pantalla de forma independientes. */
                $temp = (system("sudo python /home/pi/temperatura/temp.py"));
    		//Se  crean condiciones para mostrar la salida de colores según la temperatura

                if ($temp <= 15 ){
                    echo "
                    <br><br>
                    <div class='center-block' align='center'>
                    <h1 style='color:blue'> Temperatura:". $temp ."C </h1>
                    </div>
                    <br><br>";
                    }

                if ($temp > 15 and $temp < 24 ){
                    echo "
                    <br><br>
                    <div class='center-block' align='center'>
                    <h1 style='color:orange'> Temperatura:". $temp ."C </h1>
                    </div>
                    <br><br>";
                    }
                
		if ($temp > 24 ){
                    echo "
                    <br><br>
                    <div class='center-block' align='center'>
                    <h1 style='color:red'> Temperatura:". $temp ."C </h1>
                    </div>
                    <br><br>";
                    }

        	    //Muestra la salida de humedad.
                    $hum = system("sudo python /home/pi/temperatura/hum.py");
                    echo "
                    <br><br>
                    <div class='center-block' align='center'>
                    <h1 style='color:green'> Humedad:". $hum ."% </h1>
                    </div>
                    <br><br>";
        break;
        }
    ?>
<!-- Este botón sirve para actualizar el sensor -->
	<form action="" method="post">
     		<br><br>
     	<div class='center-block' align="center">
      		<input type="submit" name="Actualizar" class="btn btn-success btn-lg" value="Actualizar" align="center" size="18">
     	</div>
     		</br>
	</form>
	</div>
</div>
</div>
</body>
<html>
