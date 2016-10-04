<?php
$valor = $_POST["voz"];
if($valor=="alexa encender luz salón" || $valor=="alexa encender salón" || $valor=="alexa luz salón" || $valor=="alexa encender luz" || $valor=="alexa luz")
{
  exec('sudo bash ../web/scripts/relay/activar_17.sh');
  exec('sudo bash ../web/scripts/relay/encender_salon.sh');
  exec('sudo espeak -ves+f6 "Luz del salon encendida"');

}
if($valor=='alexa apagar luz' || $valor=='alexa apagar luz salon' || $valor=='alexa apagar salon' || $valor=='alexa desactivar')
{

  exec('sudo ./apagar_salon.sh');
  exec('sudo espeak -ves+f6 "Luz del salon apagada"');
}
if($valor=='alexa encender ventilador' || $valor=='alexa ventilador' )
{
  exec('sudo ./encender_ventilador.sh');
  exec('sudo espeak -ves+f6 "Ventilador encendido"');

}
if($valor=='alexa apagar ventilador' || $valor=='alexa apagar el ventilador' )
{
  exec('sudo ./apagar_ventilador.sh');
  exec('sudo espeak -ves+f6 "Ventilador apagado"');

}
?>
