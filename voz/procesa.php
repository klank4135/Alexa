<?php
$valor = $_POST["voz"];
if($valor=="Alexa enciende la luz de la sala"){
  exec('sudo bash ../web/scripts/relay/encender_salon.sh');
  exec('sudo espeak -ves+f5 -s210 "Luz de la sala encendida"');

} else if($valor=="Alexa apaga la luz de la sala"){
  exec('sudo bash ../web/scripts/relay/apagar_salon.sh');
  exec('sudo espeak -ves+f5 -s210 "Luz de la sala apagada"');

} else if($valor=="Alexa enciende el ventilador"){
  exec('sudo ./encender_ventilador.sh');
  exec('sudo espeak -ves+f5 -s210 "Ventilador encendido"');

} else if($valor=="Alexa Apaga el ventilador"){
  exec('sudo ./apagar_ventilador.sh');
  exec('sudo espeak -ves+f5 -s210 "Ventilador apagado"');

} else if ($valor=="Alexa mueve silla hacia adelante"){
  exec('sudo espeak -ves+f5 -s210 "Silla avanzando"');

} else if ($valor=="Alexa mueve silla hacia atras"){
  exec('sudo espeak -ves+f5 -s210 "Precaucion silla retrocediendo"');

} else if ($valor=="Alexa gira silla a la izquierda"){
  exec('sudo espeak -ves+f5 -s210 "Girando la silla hacia la izquierda"');

} else if ($valor=="Alexa gira silla a la derecha"){
  exec('sudo espeak -ves+f5 -s210 "Girando la silla hacia la derecha"');

}
else{
  exec('sudo espeak -ves+f5 -s210 "Lo siento, no entendi tu comando"');

}
?>
