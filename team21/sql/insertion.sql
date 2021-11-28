-- # Test 계정 생성 (웹 사이트에서 직접 회원가입 진행해도 무방)
INSERT INTO 'users'('idUsers', 'uidUsers', 'emailUsers', 'pwdUsers') VALUES ('1','testUser','tset@gmail.com','testtest');

-- # 서울시 공영주차장 데이터 14670건 import
-- # csv 파일 위치는 xampp/mysql/data/team21/seoulparking.csv
LOAD DATA INFILE '../../mysql\\data\\team21\\seoulparking.csv' INTO TABLE seoulparkings FIELDS TERMINATED BY ',';

-- # 서울시설공단 공영주차장 데이터 32건 import
-- # csv 파일 위치는 xampp/mysql/data/team21/remaining.csv
LOAD DATA INFILE '../../mysql\\data\\team21\\remaining.csv' INTO TABLE remaining FIELDS TERMINATED BY ',';

-- # 서울시 문화 축제 데이터 16건 import
-- # csv 파일 위치는 xampp/mysql/data/team21/festival.csv
LOAD DATA INFILE '../../mysql\\data\\team21\\festival.csv' INTO TABLE festival FIELDS TERMINATED BY ',';