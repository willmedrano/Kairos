@echo off

CD "C:\respaldos\"

"C:\xampp\mysql\bin\mysqldump.exe" -h localhost  kairosbd -i -u root  > "kairos_%1backup.sql"  

exit