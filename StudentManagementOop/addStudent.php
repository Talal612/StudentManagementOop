<?php
require_once './db.php';
require_once './student.php';

$student = new Student();
$student->create($_POST);

header('Location: ./');