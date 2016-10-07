#!/usr/bin/python
import RPi.GPIO as GPIO
from time import sleep

# The script as below using BCM GPIO 00..nn numbers
GPIO.setmode(GPIO.BCM)

#Set relay pins as output
GPIO.setup(17, GPIO.OUT)
GPIO.setup(27, GPIO.OUT)

GPIO.output(17, GPIO.HIGH)
sleep( 1 )
GPIO.output(17, GPIO.LOW)
sleep( 1 )
GPIO.output(27, GPIO.HIGH)
sleep( 1 )
GPIO.output(27, GPIO.LOW)
sleep( 1 )
GPIO.cleanup()
