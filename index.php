<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset=" utf-8">
    <meta name="author" content="bienthanhdanh" />
    <link href="/Lab1/site.css" rel="stylesheet" />
    <title>Xếp loại kết quả tuyển sinh</title>
</head>

<body>
    <?php
    $DiemKV = 0;
    $TongDiem = 0;
    ?>
    <div id="wrapper">
        <h2> Xếp loại kết quả tuyển sinh</h2>
        <form action="#" method="post">
            <div class="row">
                <div class="lbltitle">
                    <label>Điểm môn Toán</label>
                </div>
                <div class="lblinput">
                    <input type="number" name="Toan" value="<?php echo isset($_POST["Toan"]) ? $_POST["Toan"] : ""; 
                     ?>" />
                    <?php                        
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if (empty($_POST['Toan']) == false || is_numeric($_POST['Toan'])== false) {
                            echo "KHÔNG ĐƯỢC BỎ TRỐNG";
                        } else {
                            echo "KHÔNG ĐƯỢC NHẬP CHỮ!";
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="lbltitle">
                    <label>Điểm môn Lý</label>
                </div>
                <div class="lblinput">
                    <input type="number" name="Ly" value="<?php echo isset($_POST["Ly"]) ? $_POST["Ly"] : ""; ?>" />
                </div>
            </div>
            <div class="row">
                <div class="lbltitle">
                    <label>Điểm môn Hóa</label>
                </div>
                <div class="lblinput">
                    <input type="number" name="Hoa" value="<?php echo isset($_POST["Hoa"]) ? $_POST["Hoa"] : ""; ?>" />
                </div>
                <div class="row">
                    <div class="lbltitle">
                        <label>Chọn khu vực</label>
                    </div>
                    <div class="lblinput"> <select name="KhuVuc">
                            <option value="" selected>
                            <option value="1">Khu vực 1</option>
                            <option value="2">Khu vực 2</option>
                            <option value="3">Khu vực 3</option>
                            <option value="4">Khu vực 4</option>
                            <option value="5">Khu vực 5</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="submit">
                            <input type="submit" name="btnsubmit" value="Xếp loại" />

                        </div>
                    </div>
        </form>
        <div id="result">
            <h2>Kết quả xếp loại</h2>
            <div class="row">
                <div class="row">
                    <div class="lbltitle">
                        <label>Tổng điểm</label>
                    </div>
                    <div class="lbloutput"> <?php echo isset($_POST["btnsubmit"]) ? $_POST["Toan"] + $_POST["Ly"] + $_POST["Hoa"] : ""; ?> </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="lbltitle">
                <label> Xếp loại </label>
            </div>
            <div class="lbloutput">
                <?php
                if (isset($_POST["btnsubmit"])) {
                    $TongDiem = $_POST["Toan"] + $_POST["Ly"] + $_POST["Hoa"];
                    if ($TongDiem >= 24)
                        echo "Giỏi";
                    else if ($TongDiem >= 21)
                        echo "Khá";
                    else if ($TongDiem >= 15)
                        echo "Trung Bình";
                    else {
                        echo "Yếu";
                    }
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="lbltitle">
                <lable> Điểm Ưu Tiên </label>
            </div>
            <div class="lbloutput">
                <?php
                if (isset($_POST["btnsubmit"])) {
                    $DiemUuTien = empty($_POST["KhuVuc"]) ? 0 : $_POST["KhuVuc"];
                    switch ($DiemUuTien) {

                        case 0:
                        case 4:
                        case 5:
                            $DiemKV = 0;
                            echo "0";
                            break;
                        case 1:
                        case 2:
                            $DiemKV = 5;
                            echo "5";
                            break;
                        case 3:
                            $DiemKV = 3;
                            echo "3";
                            break;
                        default:

                            break;
                    }
                }
                ?>
            </div>
            <div class="row">
                <div class="lbltitle">
                    <lable> Tổng Điểm Đạt Được </label>
                </div>
                <div class="lbloutput">
                    <?php
                    global $diemDau;
                    $diemDau =  $TongDiem + $DiemKV;
                    echo isset($_POST["btnsubmit"]) ? $diemDau : ""; ?>
                </div>
            </div>
            <h2>Xét Tuyển</h2>
            <div class="row">
                <div class="row">
                    <div class="lbltitle">
                        <label>Chọn khu vực</label>
                    </div>
                    <div class="lblinput"> <select name="DiemDH">
                            <option value="" selected>
                            <option value="1">- Đại học Công nghệ TP.HCM </option>
                            <option value="2">- Đại học Kinh tế Luật TP.HCM </option>
                            <option value="3">-Đại học Hoa Sen </option>
                            <option value="4">-Đại học Nông Sen </option>

                        </select>
                    </div>

                    <div class="row">
                        <div class="submit">
                            <input type="submit" name="btnsubmit" value="Xét Tuyển" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="lbltitle">
                            <label> Kết Qủa Xét Tuyển </label>
                        </div>
                        <div class="lbloutput">
                            <?php
                            if (isset($_POST["btnsubmit"])) {
                                $KqDaiHoc = empty($_POST["DiemDH"]) ? 0 : $_POST["DiemDH"];
                                switch ($KqDaiHoc) {
                                    case 0:
                                    case 1:
                                        if ($diemDau > 21) {
                                            echo "Đạt";
                                        } else
                                            echo "Rớt";

                                        break;
                                    case 2:
                                        if ($diemDau  > 24) {
                                            echo "Đạt";
                                        } else
                                            echo "Rớt";
                                        break;
                                    case 3:
                                        if ($diemDau > 18) {
                                            echo "Đạt";
                                        } else
                                            echo "Rớt";
                                        break;
                                    default:

                                        break;
                                }
                            }
                            ?>
                        </div>
                    </div>






