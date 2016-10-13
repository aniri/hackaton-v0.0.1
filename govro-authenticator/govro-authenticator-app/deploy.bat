cd /d %~dp0

echo "BUILD CORDOVA APP"

call cordova clean android --verbose
call cordova build android --verbose

rem start "Cordova clean" /wait "cordova" clean android --verbose
rem start "Cordova build" /wait "cordova" build android --verbose

rem cordova clean android --verbose
rem cordova build android --verbose

echo "RENAME APKS"

SETLOCAL ENABLEDELAYEDEXPANSION

cd /d platforms\android\build\outputs\apk
ren *.apk %date:~10,4%%date:~4,2%%date:~7,2%*.apk
cd /d %~dp0

echo "CHANGE APK RIGHTS"

Icacls "platforms\android\build\outputs\apk\*.apk" /T /grant:r everyone:R

echo "COPY APKS"

robocopy %~dp0\platforms\android\build\outputs\apk \\devss01\qa.devss01\LMS.Web\Downloads *.apk /E /SEC /Z /R:10

