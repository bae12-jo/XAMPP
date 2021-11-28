<?php
require "./team21/header.php"; ?>
<main>

    <!doctype html>
    <html lang="kr">

    <body class="index">
        <div id="wrapper">
            <div class="hero">
                <div class="row">
                    <div class="large-12 columns">
                        <h1>&#128664; Find your parking lot &#128664;</h1>
                    </div>
                </div>
            </div>
            <?php if (isset($_SESSION["userId"])) { ?>
            <div class="row">
                <div class="large-12 columns">
                    <h2>Welcome! <?php echo $_SESSION["userUid"]; ?></h2>
                    <div class="text-center" style="height:100px; float:left; width: 50%;">
                        <a href="../../team21/includes/parkinglist.php"> <img width="50" height="50"
                                src="../../team21/images/spots.svg" />Parking Spaces
                            <span>Look around all spaces in Seoul</span>
                        </a>
                    </div>
                    <div class="text-center" style="height:100px; float:left; width: 50%;">
                        <a href="../../team21/includes/remaining.php"> <img width="50" height="50"
                                src="../../team21/images/search.svg" />Remaining Spaces
                            <span>Search remaining parking spaces</span>
                        </a>
                    </div>
                </div>
                <div class="large-12 columns">
                    <div class="text-center" style="height:100px; float:left; width: 50%;">
                        <a href="../../team21/includes/festival.php"> <img width="50" height="50"
                                src="../../team21/images/bookmark.svg" />Festival
                            <span>Find out events near parking spaces</span>
                        </a>
                    </div>
                    <div class="text-center" style="height:100px; float:left; width: 50%;">
                        <a href="../../team21/includes/calculator.php"> <img width="50" height="50"
                                src="../../team21/images/analytics.svg" />Calculator
                            <span>Calculate your rates and record them</span>
                        </a>
                    </div>
                </div>
            </div>
            <?php } else { ?>
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
                        We get parking lot datas from <a href="https://www.data.go.kr/index.do">공공데이터포털</a> and <a
                            href="http://data.seoul.go.kr/dataList/OA-13122/S/1/datasetView.do">서울열린데이터광장</a>, we offers
                        only in Seoul from now on.
                        And we're trying to give remaining parking spots of each parking lot by getting datas from <a
                            href="https://www.sisul.or.kr/open_content/parking/guidance/useable.jsp">서울특별시 공영주차장</a>, as
                        not every parking lot has automation system, we are able to give a few data.
                    </p>
                    <p>
                        Log in to use this service now!
                    </p>
                </div>
            </div>
            <?php } ?>
        </div>
    </body>

    </html>

</main>

<?php require "./team21/footer.php";
?>