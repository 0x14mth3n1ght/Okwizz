#!/usr/bin/env bash
cd src
screen -S oquizz -d -m php -S 0.0.0.0:8080
