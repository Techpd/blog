@echo off
cd /d %~dp0
FOR /F "delims=" %%i IN ('Dir *.png *.jpg *.jpeg *.gif /b /s') DO cwebp "%%i" -q 60 -o "%%~dpni.webp"
exit