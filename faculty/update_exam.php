<?php

include '../lib/Session.php';
include 'session.php'; 

include '../lib/Database.php';
include '../class/Format.php';

Session::checkSession();

if (isset($_GET['action']) && isset($_GET['action']) == 'logout') {
    Session::destroy();
    header("Location:index.php");
    exit();
}


include '../class/Exam.php';

$exam = new Exam();

$examId = $_GET['udpateExam'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exam_title = $_POST['exam_title'];
    $qsn1 = $_POST['qsn1'];
    $exam_duration = $_POST['exam_duration'];
    $total_marks = $_POST['total_marks'];
    $exam_declaration_datetime = $_POST['exam_declaration_datetime'];
    $exam_status = $_POST['exam_status'];
    $sol1 = $_POST['sol1'];
    $qsn2 = $_POST['qsn2'];
    $qsn3 = $_POST['qsn3'];
    $sol2 = $_POST['sol2'];
    $sol3 = $_POST['sol3'];
    $qsn4 = $_POST['qsn4'];
    $qsn5 = $_POST['qsn5'];
    $sol4 = $_POST['sol4'];
    $sol5 = $_POST['sol5'];

    $message = $exam->udpateExam($examId, $exam_title, $exam_duration, $total_marks, $exam_declaration_datetime, $exam_status, $qsn1, $sol1,$qsn2, $qsn3, $sol2, $sol3,$qsn4, $qsn5, $sol4, $sol5);
}

if (isset($_GET['udpateExam'])) {
    $result = $exam->getExamById($examId);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Exam</title>

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <!--Navigation part starts-->
<?php include 'navbar.php'; ?>
    <!--Navigation part ends-->

    <div class="container">
        <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h3 class="panel-title">Update Exam</h3>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-10 offset-md-1">


                        <?php
                        if (isset($message)) {
                            echo $message;
                            unset($message);
                        }
                        ?>

                        <form class="row g-3 form-group" action="" method="POST" enctype="multipart/form-data">
                            <?php
                            if ($result) {
                                foreach ($result as $value) {
                            ?>

                                    <div class="col-md-12">
                                        <label for="exam_title" class="form-label">Exam Title</label>
                                        <input type="text" name="exam_title" value="<?php echo $value['exam_title']; ?>" class="form-control" id="exam_title">
                                    </div>
                                    <div class="col-12">
                                        <label for="exam_duration" class="form-label">Exam Duration (Minute)</label>
                                        <input type="number" name="exam_duration" value="<?php echo $value['exam_duration']; ?>" class="form-control" id="exam_duration">
                                    </div>
                                    <div class="col-12">
                                        <label for="total_marks" class="form-label">Exam Marks</label>
                                        <input type="number" name="total_marks" value="<?php echo $value['total_marks']; ?>" class="form-control" id="total_marks">
                                    </div>
                                    <div class="col-12">
                                        <label for="exam_declaration_datetime" class="form-label">Exam Declaration Date</label>
                                        <?php
                                        $date = date("Y-m-d\TH:i:s", strtotime($value['exam_declaration_datetime']));
                                        ?>
                                        <input type="datetime-local" name="exam_declaration_datetime" value="<?php echo $date; ?>" class="form-control" id="exam_declaration_datetime">
                                    </div>
                                    <div class="col-12">
                                        <label for="exam_status" class="form-label">Exam Status</label>
                                        <select class="form-select" name="exam_status" aria-label="Default select example">
                                            <?php
                                            if ($value['exam_status'] == 0) {
                                            ?>
                                                <option selected value="0">Enable</option>
                                                <option value="1">Disable</option>
                                            <?php
                                            } else {
                                            ?>

                                                <option selected value="1">Disable</option>
                                                <option value="0">Enable</option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label for="qsn1" class="form-label">Question 1</label>
                                        <textarea name="qsn1" id="" cols="30" rows="5" class="form-control" id="qsn1"><?php echo $value['qsn1']; ?></textarea>
                                    </div>
                                    <div class="col-12">
                                        <label for="sol1" class="form-label">Solution 1</label>
                                        <textarea name="sol1" id="" cols="30" rows="5" class="form-control" id="sol1"><?php echo $value['sol1']; ?></textarea>
                                    </div>

                                    <div class="col-12">
                                        <label for="qsn2" class="form-label">Question 2</label>
                                        <textarea name="qsn2" id="" cols="30" rows="5" class="form-control" id="qsn2"><?php echo $value['qsn2']; ?></textarea>
                                    </div>
                                    <div class="col-12">
                                        <label for="sol2" class="form-label">Solution 2</label>
                                        <textarea name="sol2" id="" cols="30" rows="5" class="form-control" id="sol2"><?php echo $value['sol2']; ?></textarea>
                                    </div>
                                    
                                    <div class="col-12">
                                        <label for="qsn3" class="form-label">Question 3</label>
                                        <textarea name="qsn3" id="" cols="30" rows="5" class="form-control" id="qsn3"><?php echo $value['qsn3']; ?></textarea>
                                    </div>
                                    <div class="col-12">
                                        <label for="sol3" class="form-label">Solution 3</label>
                                        <textarea name="sol3" id="" cols="30" rows="5" class="form-control" id="sol3"><?php echo $value['sol3']; ?></textarea>
                                    </div>
                                    
                                    <div class="col-12">
                                        <label for="qsn4" class="form-label">Question 4</label>
                                        <textarea name="qsn4" id="" cols="30" rows="5" class="form-control" id="qsn4"><?php echo $value['qsn4']; ?></textarea>
                                    </div>
                                    <div class="col-12">
                                        <label for="sol4" class="form-label">Solution 4</label>
                                        <textarea name="sol4" id="" cols="30" rows="5" class="form-control" id="sol4"><?php echo $value['sol4']; ?></textarea>
                                    </div>
                                    
                                    <div class="col-12">
                                        <label for="qsn5" class="form-label">Question 5</label>
                                        <textarea name="qsn5" id="" cols="30" rows="5" class="form-control" id="qsn5"><?php echo $value['qsn5']; ?></textarea>
                                    </div>

                                    <div class="col-12">
                                        <label for="sol5" class="form-label">Solution 5</label>
                                        <textarea name="sol5" id="" cols="30" rows="5" class="form-control" id="sol5"><?php echo $value['sol5']; ?></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Update Question</button>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>

</body>

</html>