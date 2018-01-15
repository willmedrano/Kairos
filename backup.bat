@echo off

CD "C:\respaldos\"

"C:\xampp\mysql\bin\mysqldump.exe" -h localhost  kairosbd -i -u root  > "kairos_%1backup_%date:~0,2%-%date:~3,2%-%date:~6,4%.sql"  

exit