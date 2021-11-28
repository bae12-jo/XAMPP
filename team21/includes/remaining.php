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
                    <h2>Remaining Spaces</h2>
                    <h4>서울시설공단 공영주차장</h4>
                    <h5>2021년 11월 21일 오후 8:40 기준</h5><br>
                    <form action="../../team21/includes/remaining.php" name="remainingfilter" method="POST">
                        <fieldset style="width:150">
                            <legend>Search</legend>
                            <b>잔여수</b>
                            <input type="number" min="0" max="1440" step="5" name="remain">
                            <input type="submit" value="submit" name="remaining-submit" />
                            <input type="reset" value="reset" />
                        </fieldset>
                    </form>
                    <?php if (isset($_POST["remaining-submit"])) {
                  require "../includes/dbh.inc.php";
                  $remain_num = $_POST["remain"];
                  $sql =
                    "SELECT parking_name, remain, rank() over(order by remain desc) FROM `remaining` where remain>?;";
                  $stmt = mysqli_stmt_init($conn);
                  if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, "s", $remain_num);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    echo "잔여 대수 " . $remain_num . "이상 조회 결과";
                    echo "<style>td { border:1px solid #ccc; padding:5px; }</style><table class='scrolltable'><thead>";
                    echo "<tr>";
                    echo "<td><b>추천 순위</b></td><td><b>잔여 주차장</b></td><td><b>현재 잔여수</b></td>";
                    echo "</thead><tbody>";
                    while ($row = mysqli_fetch_array($result)) {
                      echo "<td>" .
                        $row["rank() over(order by remain desc)"] .
                        "</td><td>" .
                        $row["parking_name"] .
                        "</td><td>" .
                        $row["remain"] .
                        "</td></tr>";
                    }
                    echo "</tbody>";
                  } else {
                    header(
                      "Location: ../../team21/includes/remaining.php?sqlerror"
                    );
                    exit();
                  }
                }} ?>
                </div>
            </div>
        </div>
    </body>

    </html>

</main>