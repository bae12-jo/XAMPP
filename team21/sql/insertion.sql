-- # Test ���� ���� (�� ����Ʈ���� ���� ȸ������ �����ص� ����)
INSERT INTO 'users'('idUsers', 'uidUsers', 'emailUsers', 'pwdUsers') VALUES ('1','testUser','tset@gmail.com','testtest');

-- # ����� ���������� ������ 14670�� import
-- # csv ���� ��ġ�� xampp/mysql/data/team21/seoulparking.csv
LOAD DATA INFILE '../../mysql\\data\\team21\\seoulparking.csv' INTO TABLE seoulparkings FIELDS TERMINATED BY ',';

-- # ����ü����� ���������� ������ 32�� import
-- # csv ���� ��ġ�� xampp/mysql/data/team21/remaining.csv
LOAD DATA INFILE '../../mysql\\data\\team21\\remaining.csv' INTO TABLE remaining FIELDS TERMINATED BY ',';

-- # ����� ��ȭ ���� ������ 16�� import
-- # csv ���� ��ġ�� xampp/mysql/data/team21/festival.csv
LOAD DATA INFILE '../../mysql\\data\\team21\\festival.csv' INTO TABLE festival FIELDS TERMINATED BY ',';