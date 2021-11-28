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
                    <h2>Festival</h2>
                    <form action="../../team21/includes/festival.php" name="festival" method="POST">
                        <fieldset style="width:150">
                            <legend>Search Filter</legend>
                            <b>날짜</b>
                            <input type="date" min="2000-01-01" max="2021-12-31" name="date" step="1"><br>
                            <input type="submit" value="submit" name="festival-submit" />
                            <input type="reset" value="reset" />
                        </fieldset>
                    </form>
                    <?php if (isset($_POST["festival-submit"])) {
                      require "../includes/dbh.inc.php";

                      $date = $_POST["date"];
                      if (empty($date)) {
                        header("Location: ../../team21/includes/festival.php");
                        echo "<script>alert('값을 입력해주세요');</script>";
                        exit();
                      } else {
                         ?>
                    <?php
                    $sql =
                      "SELECT count(fst_name) over (partition by begin_day) FROM festival where begin_day=?;";
                    $stmt = mysqli_stmt_init($conn);
                    if (mysqli_stmt_prepare($stmt, $sql)) {
                      mysqli_stmt_bind_param($stmt, "s", $date);
                      mysqli_stmt_execute($stmt);
                      $result = mysqli_stmt_get_result($stmt);
                      $row = mysqli_fetch_array($result);
                      echo $date . "에 열리는 축제 수: ";
                      if ($row == 0) {
                        echo "0";
                      } else {
                        echo $row[
                          "count(fst_name) over (partition by begin_day)"
                        ];
                      }
                    }

                    $sql =
                      "SELECT fst_name, fst_place, begin_day, end_day, count(fst_name) over (partition by begin_day) FROM festival where begin_day=?;";
                    $stmt = mysqli_stmt_init($conn);
                    if (mysqli_stmt_prepare($stmt, $sql)) {
                      mysqli_stmt_bind_param($stmt, "s", $date);
                      mysqli_stmt_execute($stmt);
                      $result = mysqli_stmt_get_result($stmt);
                      echo "<style>td { border:1px solid #ccc; padding:5px; }</style><table class='scrolltable'><thead>";
                      echo "<tr>";
                      echo "<td><b>축제명</b></td><td><b>축제 장소</b></td><td><b>시작일</b></td><td><b>종료일</b></td></thead>";
                      echo "<tbody>";
                      while ($row = mysqli_fetch_array($result)) {
                        if ($row == 0) {
                          echo "표시할 내용 없음";
                        }
                        echo "<td>" .
                          $row["fst_name"] .
                          "</td><td>" .
                          $row["fst_place"] .
                          "</td><td>" .
                          $row["begin_day"] .
                          "</td><td>" .
                          $row["end_day"] .
                          "</td></tr>";
                      }
                      echo "</tbody>";
                    } else {
                      header(
                        "Location: ../../team21/includes/remaining.php?sqlerror"
                      );
                      exit();
                    }

                      }
                    } ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </body>

    </html>
</main>