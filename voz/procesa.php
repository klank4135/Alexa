<?php
$valor = $_POST["voz"];
if($valor=="Hola Alexa"){
  exec('sudo espeak -ves+f5 -s210 "Hola! Como te puedo ayudar hoy?"');
}else if($valor=="inicia sistema"){
  exec('sudo python ../tests/gpio_tests.py');
  exec('sudo espeak -ves+f5 -s210 "Sistemas inicializados, los G P I O activados en modo B C M son 17, 18, 22, 23 y 27"');

}else if($valor=="qué hora es"){
  exec('sudo bash ../web/scripts/decir-hora.sh');

}else if($valor=="enciende la luz"){
  exec('sudo bash ../web/scripts/relay/encender_salon.sh');
  exec('sudo espeak -ves+f5 -s210 "Luz de la sala encendida"');

} else if($valor=="apaga la luz"){
  exec('sudo bash ../web/scripts/relay/apagar_salon.sh');
  exec('sudo espeak -ves+f5 -s210 "Luz de la sala apagada"');

} else if($valor=="enciende el ventilador"){
  exec('sudo bash ../web/scripts/relay/encender_ventilador.sh');
  exec('sudo espeak -ves+f5 -s210 "Ventilador encendido"');

} else if($valor=="Apaga el ventilador"){
  exec('sudo bash ../web/scripts/relay/apagar_ventilador.sh');
  exec('sudo espeak -ves+f5 -s210 "Ventilador apagado"');

} else if ($valor=="silla avanzar"){
  exec('sudo python ../web/scripts/silla/silla.py f1 2>/dev/null');
  exec('sudo espeak -ves+f5 -s210 "Silla avanzando"');

} else if ($valor=="silla retroceder"){
  exec('sudo python ../web/scripts/silla/silla.py r1 2>/dev/null');
  exec('sudo espeak -ves+f5 -s210 "Precaucion silla retrocediendo"');

} else if ($valor=="silla girar izquierda"){
  exec('sudo python ../web/scripts/silla/silla.py p1 2>/dev/null');
  exec('sudo espeak -ves+f5 -s210 "Girando la silla hacia la izquierda"');

} else if ($valor=="silla girar derecha"){
  exec('sudo python ../web/scripts/silla/silla.py o1 2>/dev/null');
  exec('sudo espeak -ves+f5 -s210 "Girando la silla hacia la derecha"');

} else if ($valor=="detener"){
  exec('sudo python ../web/scripts/silla/silla.py s 2>/dev/null');
  exec('sudo espeak -ves+f5 -s210 "La silla se ha detenido"');
}else if ($valor=="Adiós Alexa"){
  exec('sudo espeak -ves+f5 -s210 "Gracias por venir, espero que vuelvas pronto"');
}
else{
  exec('sudo espeak -ves+f5 -s210 "Lo siento, no entendi tu comando"');

}
?>
