<?php
require "../../team21/header.php"; ?>

<main>
    <!doctype html>
    <html lang="kr">

    <body class="index">
        <div id="wrapper">
            <?php
            if (isset($_GET["id"])) {
              $id = $_GET["id"];

              require "../includes/dbh.inc.php";
              $sql = "SELECT * from history where id=?";
              $stmt = mysqli_stmt_init($conn);
              if (mysqli_stmt_prepare($stmt, $sql)) {

                mysqli_stmt_bind_param($stmt, "s", $id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $row = mysqli_fetch_array($result);
                ?>
            <div class="row">
                <div class="large-12 columns">
                    <h2>Update history</h2>
                    <form action="../../team21/includes/update.php" name="updateform" method="POST">
                        <fieldset style="width:150">
                            <legend>Input</legend>
                            <b>주차장명</b><input type="text" name="parking_name" placeholder="<?php echo $row[
                              "parking_name"
                            ]; ?>" required><br>
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
                                <input type="number" min="0" max="1440" step="5" name="minute" placeholder="<?php echo $row[
                                  "park_minute"
                                ]; ?>">
                                <b>주차 금액</b>
                                <input type="number" min="0" max="1440" step="5" name="rates" placeholder="<?php echo $row[
                                  "rates"
                                ]; ?>">
                                <input type="hidden" value="<?php echo $id; ?>" name="id">
                                <input type="submit" value="submit" name="update-submit" />
                                <input type="reset" value="reset" />
                        </fieldset>
                    </form>
                    <?php
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);

              }
            }
            if (isset($_POST["update-submit"])) {
              require "../includes/dbh.inc.php";
              $name = $_POST["parking_name"];
              $day = $_POST["day"];
              $date = $_POST["date"];
              $minute = $_POST["minute"];
              $addr = $_POST["district"];
              $rates = $_POST["rates"];
              $id = $_POST["id"];

              if (
                empty($name) ||
                empty($day) ||
                empty($date) ||
                empty($minute)
              ) {
                header(
                  "Location: ../../team21/includes/update.php?error=noinput"
                );
                echo "<script>alert('값을 입력해주세요');</script>";
                exit();
              } else {
                $sql =
                  "UPDATE history SET parking_name=?, parking_addr=?, park_date=?, park_day=?, park_minute=?, rates=? where id=?";
                $stmt = mysqli_stmt_init($conn);
                if (mysqli_stmt_prepare($stmt, $sql)) {
                  mysqli_stmt_bind_param(
                    $stmt,
                    "sssssss",
                    $name,
                    $addr,
                    $date,
                    $day,
                    $minute,
                    $rates,
                    $id
                  );
                  mysqli_stmt_execute($stmt);
                  $result = mysqli_stmt_get_result($stmt);

                  if ($result == 0) {
                    header(
                      "Location: ../../team21/includes/calculator.php?update=success"
                    );
                    exit();
                  } else {
                    header(
                      "Location: ../../team21/includes/calculator.php?update=fail"
                    );
                    exit();
                  }
                  mysqli_stmt_close($stmt);
                  mysqli_close($conn);
                }
              }
            }
            ?>
                </div>
            </div>
            <?php  ?>
        </div>
    </body>

    </html>
</main>