#!/bin/bash 
hora=`date +%H` 
min=`date +%M` 
decir="Son las "$hora" horas con "$min" minutos" 
echo $decir | espeak -ves+m1 -s210
