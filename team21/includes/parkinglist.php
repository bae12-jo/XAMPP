<?php
	require "../../team21/header.php"
?>

<main>

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
                <h3> Search Filter </h3>
                <form action = "../../team21/includes/parkinglist.inc.php" name="searchfilter" method="POST">
                    <fieldset style = "width:150">
                        <legend>Filter</legend>
                        <!-- <b>주차장명</b><input type = "text" name="parking_name" required><br> -->
                        <b>평일</b>
                        <input type="radio" name="pay_nm" value="유료"/>유료
                        <input type="radio" name="pay_nm" value="무료"/>무료<br><br>
                        <b>토요일</b>
                        <input type="radio" name="saturday_pay_nm" value="유료"/>유료
                        <input type="radio" name="saturday_pay_nm" value="무료"/>무료<br><br>
                        <b>공휴일</b>
                        <input type="radio" name="holiday_pay_nm" value="유료"/>유료
                        <input type="radio" name="holiday_pay_nm" value="무료"/>무료<br><br>
                        <b>야간개장</b>
                        <input type="radio" name="night_free_open" value="Y"/>Y
                        <input type="radio" name="night_free_open" value="N"/>N<br><br>
                        <b>지역</b>
                        <select name="district">
                            <option value = "강남">강남구</option>
                            <option value = "강동">강동구</option>
                            <option value = "강북">강북구</option>
                            <option value = "강서">강서구</option>
                            <option value = "관악">관악구</option>
                            <option value = "광진">광진구</option>
                            <option value = "구로">구로구</option>
                            <option value = "금천">금천구</option>
                            <option value = "노원">노원구</option>
                            <option value = "도봉">도봉구</option>
                            <option value = "동대문">동대문구</option>
                            <option value = "동작">동작구</option>
                            <option value = "마포">마포구</option>
                            <option value = "서대문">서대문구</option>
                            <option value = "서초">서초구</option>
                            <option value = "성동">성동구</option>
                            <option value = "성북">성북구</option>
                            <option value = "송파">송파구</option>
                            <option value = "양천">양천구</option>
                            <option value = "영등포">영등포구</option>
                            <option value = "용산">용산구</option>
                            <option value = "은평">은평구</option>
                            <option value = "종로">종로구</option>
                            <option value = "중구">중구</option>
                            <option value = "중랑">중랑구</option>
                            <input type = "submit" value="submit" name="filter-submit"/>
                            <input type = "reset" value="reset"/>
                </fieldset>
                </form>
                <!-- <?php
                    require '../includes/dbh.inc.php';
                    $sql = "SELECT * from seoulparkings group by parking_name;";
                    $mysqli_result = mysqli_query($conn, $sql);
                    $total_rows = mysqli_num_rows($mysqli_result);
                ?>
                <h5> List (Total: <?php echo $total_rows ?>)</h5>
                <?php
                    echo "<style>td { border:1px solid #ccc; padding:5px; }</style><table class='scrolltable'><thead>";
                    echo '<tr>';
                    echo '<td><b>주차장명</b></td><td><b>주소</b></td><td><b>종류</b></td><td><b>운영구분</b></td><td><b>전화번호</b></td><td><b>총 주차면</b></td>';
                    echo '<td><b>유/무료</b></td><td><b>야간개방</b></td><td><b>평일 시작(HHMM)</b></td><td><b>평일 종료(HHMM)</b></td>';
                    echo '<td><b>토요일 유/무료</b></td><td><b>주말 시작(HHMM)</b></td><td><b>주말 종료(HHMM)</b></td>';
                    echo '<td><b>공휴일 유/무료</b></td><td><b>공휴일 시작(HHMM)</b></td><td><b>공휴일 종료(HHMM)</b></td>';
                    echo '<td><b>월 정기금 금액</b></td><td><b>기본 주차 요금</b></td><td><b>기본 주차 시간(분 단위)</b></td><td><b>추가 단위 요금</b></td><td><b>추가 단위 시간(분 단위)</b></td><td><b>일 최대 요금</b></td><td><b>최종 동기화</b></td></tr>';
                    echo '</thead><tbody>';
                    while($row = mysqli_fetch_array($mysqli_result)){
                        echo '<td>'. $row['parking_name'].'</td><td>'. $row['addr'].'</td><td>'.$row['parking_type'].'</td><td>'. $row['operation_rule_nm'].'</td><td>'. $row['tel']. '</td><td>' . $row['capacity'].'</td>';
                        echo '<td>'. $row['pay_nm'].'</td><td>'. $row['night_free_open'].'</td><td>'. $row['weekday_begin_time'].'</td><td>'. $row['weekday_end_time'].'</td>';
                        echo '<td>'. $row['saturday_pay_nm'].'</td><td>'. $row['weekend_begin_time'].'</td><td>'. $row['weekend_end_time'].'</td>';
                        echo '<td>'. $row['holiday_pay_nm'].'</td><td>'. $row['holiday_begin_time'].'</td><td>'. $row['holiday_end_time'].'</td>';
                        echo '<td>'. $row['fulltime_monthly'].'</td><td>'. $row['rates'].'</td><td>'. $row['time_rate'].'</td><td>'. $row['add_rates'].'</td><td>'. $row['add_time_rate'].'</td><td>'. $row['day_maximum'].'</td><td>'. $row['sync_time'].'</td></tr>';
                    }
                    echo "</tbody></table>";
                ?> -->
			</div>
			</div>			
			<?php
			}
			else{
			?>
			<div class="row">
			<div class="large-12 columns">
				<h2>Are you struggling with car park?</h2>
			</div>
			</div>
			<div class="row">
			<div class="large-12 columns">
				<p>
				Team21 suggests data analytics of parking lot around you. 
				</p>
				<p>
				We get parking lot datas from <a href="https://www.data.go.kr/index.do">공공데이터포털</a> and <a href="http://data.seoul.go.kr/dataList/OA-13122/S/1/datasetView.do">서울열린데이터광장</a>, we offers only in Seoul from now on.
				And we're trying to give remaining parking spots of each parking lot by getting datas from <a href="https://www.sisul.or.kr/open_content/parking/guidance/useable.jsp">서울특별시 공영주차장</a>, as not every parking lot has automation system, we are able to give a few data.
				</p>
				<p>
				Log in to use this service now!
				</p>
			</div>
			</div>
			<?php
            }
            ?>
		</div>
	</body>
	</html>

</main>

<?php
	require "../../team21/footer.php"
?>