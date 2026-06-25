@echo off
echo =========================================
echo   PORTFOLIO SERVER
echo =========================================
echo.
echo Membuka browser...
start http://127.0.0.1:8000/home.html
echo.
echo Server berjalan di http://127.0.0.1:8000
echo Tekan Ctrl+C untuk menghentikan.
echo.
cd /d "%~dp0backend"
php artisan serve --port=8000
pause
php artisan serve --port=8000

