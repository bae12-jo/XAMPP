<?php
require "../../team21/header.php"; ?>

<main>
    <!doctype html>
    <html lang="kr">

    <body class="index">
        <div id="wrapper">
            <?php if (isset($_SESSION["userId"])) { ?>
            <div class="row">
                <div class="large-12 columns">
                    <h2>Calculator</h2>
                    <form action="../../team21/includes/calculator.php" name="searchfilter" method="POST">
                        <fieldset style="width:150">
                            <legend>Input</legend>
                            <b>주차장명</b><input type="text" name="parking_name" required><br>
                            <b>지역</b>
                            <select name="district">
                                <option value="강남">강남구</option>
                                <option value="강동">강동구</option>
                                <option value="강북">강북구</option>
                                <option value="강서">강서구</option>
                                <option value="관악">관악구</option>
                                <option value="광진">광진구</option>
                                <option value="구로">구로구</option>
                                <option value="금천">금천구</option>
                                <option value="노원">노원구</option>
                                <option value="도봉">도봉구</option>
                                <option value="동대문">동대문구</option>
                                <option value="동작">동작구</option>
                                <option value="마포">마포구</option>
                                <option value="서대문">서대문구</option>
                                <option value="서초">서초구</option>
                                <option value="성동">성동구</option>
                                <option value="성북">성북구</option>
                                <option value="송파">송파구</option>
                                <option value="양천">양천구</option>
                                <option value="영등포">영등포구</option>
                                <option value="용산">용산구</option>
                                <option value="은평">은평구</option>
                                <option value="종로">종로구</option>
                                <option value="중구">중구</option>
                                <option value="중랑">중랑구</option>
                                <b>요일 구분</b>
                                <input type="radio" name="day" value="평일" />평일
                                <input type="radio" name="day" value="주말" />주말
                                <input type="radio" name="day" value="공휴일" />공휴일<br><br>
                                <b>날짜 입력</b>
                                <input type="date" min="2000-01-01" max="2021-12-31" name="date" step="1"><br>
                                <b>주차 시간(분)</b>
                                <input type="number" min="0" max="1440" step="5" name="minute">
                                <!-- <b>주차 금액</b>
                                <input type="number" min="0" max="1440" step="5" name="rates"> -->
                                <input type="submit" value="submit" name="calculate-submit" />
                                <input type="reset" value="reset" />
                        </fieldset>
                    </form>
                    <form action="../../team21/includes/calculator.php" name="view" method="POST">
                        <input type="submit" value="My history" name="view-submit" />
                    </form>
                    <?php
                    if (isset($_POST["calculate-submit"])) {
                      require "../includes/dbh.inc.php";

                      $name = $_POST["parking_name"];
                      $day = $_POST["day"];
                      $date = $_POST["date"];
                      $minute = $_POST["minute"];
                      $addr = $_POST["district"];
                      //   $rates = $_POST["rates"];

                      if (
                        empty($name) ||
                        empty($day) ||
                        empty($date) ||
                        empty($minute)
                      ) {
                        header("Location: ../../team21/includes/calculate.php");
                        echo "<script>alert('값을 입력해주세요');</script>";
                        exit();
                      } else {
                        $sql =
                          "SELECT parking_name, rates, time_rate, add_time_rate FROM seoulparkings WHERE parking_name=?";
                        $stmt = mysqli_stmt_init($conn);
                        if (mysqli_stmt_prepare($stmt, $sql)) {
                          mysqli_stmt_bind_param($stmt, "s", $name);
                          mysqli_stmt_execute($stmt);
                          $result = mysqli_stmt_get_result($stmt);
                          $row = mysqli_fetch_array($result);
                          if (
                            $row["time_rate"] !== 0 &&
                            $row["add_time_rate"] !== 0
                          ) {
                            $total_rate =
                              $row["rates"] +
                              $row["time_rate"] *
                                ($minute / $row["add_time_rate"]);

                            $sql =
                              "INSERT INTO history (parking_name, parking_addr, park_date, park_day, park_minute, rates) VALUES (?, ?, ?, ?, ?, ?)";
                            $stmt = mysqli_stmt_init($conn);
                            if (mysqli_stmt_prepare($stmt, $sql)) {
                              mysqli_stmt_bind_param(
                                $stmt,
                                "ssssss",
                                $name,
                                $addr,
                                $date,
                                $day,
                                $minute,
                                $total_rate
                              );
                              mysqli_stmt_execute($stmt);

                              $result = mysqli_stmt_get_result($stmt);

                              if ($result == 1) {
                                header(
                                  "Location: ../../team21/includes/calculator.php?insert=success"
                                );
                                exit();
                              }
                              mysqli_stmt_close($stmt);
                              mysqli_close($conn);
                            }
                          }
                        }
                      }
                    }
                    if (isset($_POST["view-submit"])) {
                      require "../includes/dbh.inc.php";

                      $sql = "SELECT * from history;";
                      $result = mysqli_query($conn, $sql);
                      echo "<style>td { border:1px solid #ccc; padding:5px; }</style><table class='scrolltable'><thead>";
                      echo "<td><b>주차장명</b></td><td><b>지역</b></td><td><b>날짜</b></td><td><b>요일</b></td><td><b>이용 시간(분)</b></td><td><b>주차 금액</b></td><td><b>편집</b></td></thead>";
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tbody><td>" .
                          $row["parking_name"] .
                          "</td><td>" .
                          $row["parking_addr"] .
                          "</td><td>" .
                          $row["park_date"] .
                          "</td><td>" .
                          $row["park_day"] .
                          "</td><td>" .
                          $row["park_minute"] .
                          "</td><td>" .
                          $row["rates"] .
                          '</td><td><a href="../../team21/includes/update.php?id=' .
                          $row["id"] .
                          '">수정
						  <a href="../../team21/includes/delete.inc.php?del=' .
                          $row["id"] .
                          '">삭제</td></tbody>';
                      }
                    }
                    ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </body>

    </html>
</main>