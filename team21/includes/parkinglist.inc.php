<?php
	require "../../team21/header.php"
?>

<style>
.scrolltable {
  display: block;
  overflow: auto;
}
table {
  width: 1000px; height:1000px;
  border: 1px solid #000;
  border-spacing: 0;
}
th {
  border: 1px solid #000;
  background: #ace;
}
td {
  border: 1px solid #000;
}
</style>

<?php

    if(isset($_POST['filter-submit'])) {

        require '../includes/dbh.inc.php';

        $weekday = $_POST['pay_nm'];
        $saturday = $_POST['saturday_pay_nm'];
        $holiday = $_POST['holiday_pay_nm'];
        $night = $_POST['night_free_open'];
        $addr = "%{$_POST['district']}%";

        if(empty($weekday) || empty($saturday) || empty($holiday) || empty($night)) {
            header("Location: ../../team21/includes/parkinglist.php");
            echo "<script>alert('필터를 선택해주세요');</script>";
            exit();
        }
        else{
        ?>
        <!doctype html>
        <html lang="kr">
        <body class="index">
            <div id="wrapper">
                <?php
                    if(isset($_SESSION['userId'])) {
                ?>
                <div class="row">
                <div class="large-12 columns">
                    <h2>Parking Spaces</h2>         
        <?php
            $sql = "SELECT count(*), avg(rates), max(rates), min(rates) FROM seoulparkings WHERE pay_nm=? and saturday_pay_nm=? and holiday_pay_nm=? and night_free_open=? and addr like ?";
            $stmt = mysqli_stmt_init($conn);
            if(mysqli_stmt_prepare($stmt, $sql)){
                mysqli_stmt_bind_param($stmt, "sssss", $weekday, $saturday, $holiday, $night, $addr);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while($row = mysqli_fetch_array($result)){
                ?>
                <h4> Result (<?php echo $row['count(*)']?>)</h4>
                <h5> <?php echo '지역: '.$_POST['district'].'구, 평일:'.$weekday.', 주말:'.$saturday.', 공휴일: '.$holiday.', 야간개장: '.$night.'<br>';?></h5>
                <?php
                    echo '평균 주차금액 : '. $row['avg(rates)'].'<br>';
                    echo '최고 금액 : '. $row['max(rates)'].'<br>';
                    echo '최저 금액 : '.$row['min(rates)'].'<br>';
                }
            }

            $sql = "SELECT * FROM seoulparkings WHERE pay_nm=? and saturday_pay_nm=? and holiday_pay_nm=? and night_free_open=? and addr like ? group by parking_name";
                $stmt = mysqli_stmt_init($conn);
                if(mysqli_stmt_prepare($stmt, $sql)){
                    mysqli_stmt_bind_param($stmt, "sssss", $weekday, $saturday, $holiday, $night, $addr);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
        ?>
                <?php
                    echo "<style>td { border:1px solid #ccc; padding:5px; }</style><table class='scrolltable'><thead>";
                    echo '<tr>';
                    echo '<td><b>주차장명</b></td><td><b>주소</b></td><td><b>종류</b></td><td><b>운영구분</b></td><td><b>전화번호</b></td><td><b>총 주차면</b></td>';
                    echo '<td><b>유/무료</b></td><td><b>야간개방</b></td><td><b>평일 시작(HHMM)</b></td><td><b>평일 종료(HHMM)</b></td>';
                    echo '<td><b>토요일 유/무료</b></td><td><b>주말 시작(HHMM)</b></td><td><b>주말 종료(HHMM)</b></td>';
                    echo '<td><b>공휴일 유/무료</b></td><td><b>공휴일 시작(HHMM)</b></td><td><b>공휴일 종료(HHMM)</b></td>';
                    echo '<td><b>월 정기금 금액</b></td><td><b>기본 주차 요금</b></td><td><b>기본 주차 시간(분 단위)</b></td><td><b>추가 단위 요금</b></td><td><b>추가 단위 시간(분 단위)</b></td><td><b>일 최대 요금</b></td><td><b>최종 동기화</b></td></tr>';
                    echo '</thead><tbody>';
                    while($row = mysqli_fetch_array($result)){
                        echo '<td>'. $row['parking_name'].'</td><td>'. $row['addr'].'</td><td>'.$row['parking_type'].'</td><td>'. $row['operation_rule_nm'].'</td><td>'. $row['tel']. '</td><td>' . $row['capacity'].'</td>';
                        echo '<td>'. $row['pay_nm'].'</td><td>'. $row['night_free_open'].'</td><td>'. $row['weekday_begin_time'].'</td><td>'. $row['weekday_end_time'].'</td>';
                        echo '<td>'. $row['saturday_pay_nm'].'</td><td>'. $row['weekend_begin_time'].'</td><td>'. $row['weekend_end_time'].'</td>';
                        echo '<td>'. $row['holiday_pay_nm'].'</td><td>'. $row['holiday_begin_time'].'</td><td>'. $row['holiday_end_time'].'</td>';
                        echo '<td>'. $row['fulltime_monthly'].'</td><td>'. $row['rates'].'</td><td>'. $row['time_rate'].'</td><td>'. $row['add_rates'].'</td><td>'. $row['add_time_rate'].'</td><td>'. $row['day_maximum'].'</td><td>'. $row['sync_time'].'</td></tr>';
                    }
                    echo "</tbody></table>";
                    mysqli_stmt_close($stmt);
        			mysqli_close($conn);
                ?>
			</div>
			</div>			
			<?php
            }
        }
    }
            ?>
		</div>
	</body>
	</html>

<?php
	require "../../team21/footer.php"
?>