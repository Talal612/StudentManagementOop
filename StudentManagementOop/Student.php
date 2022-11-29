<?php

require_once './Db.php';

class Student
{
    protected $db;

    public function __construct()
    {
        $this->$db = new DB();
    }




    public function get_students(): array
    {

        $students = [];
        $result = $this->db->submit_query("SELECT * FROM students");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {

                $students[] = $row;
            }
        }
        return $students;
    }   


    public function create($StudentInfo)
    {
        $validation = $this->validate_student_info($StudentInfo);
        if ($validation != true)
            return $validation;

        $name = $StudentInfo['name'];
        $dob = $StudentInfo['dob'];
        $gender = $StudentInfo['gender'];
        $phone = $StudentInfo['phone'];
        $email = $StudentInfo['email'];

        $this->db->submit_query("INSERT INTO students (full_name, dob, gender, phone, email) VALUES ('$name','$dob','$gender','$phone','$email')");
    }


    protected function validate_student_info($StudentInfo)
    {
        // validate student information
        if (empty($StudentInfo))
            return "Empty Student Information";
        if (!isset($StudentInfo['name']))
            return "Student name is required";
        if (!isset($StudentInfo['gender']))
            return "Student gender is required";
        if ($StudentInfo['gender'] != 'male' && $StudentInfo['gender'] != 'female')
            return "Student gender should be male or female";

        return true;
    }
}
