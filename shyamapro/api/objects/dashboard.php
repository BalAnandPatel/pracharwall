<?php
class Dashboard
{

    private $conn;
    private $table_name = "registration";
    private $table_exam="exam";

    public $id, $full_name, $father_name, $mother_name, $spouse_name, $marital_status, $status, $result, $admit_card, $password, $gender, $dob, $mobile, $alternate_mobile, $email, $address1, $address2, $address3, $cor_address, $district, $state, $pincode, $religion, $category, $nationality, $h_qualification, $subject, $passing_date, $h_percentage, $grade, $languages, $is_read, $is_write, $is_speak, $zone, $post, $postcode, $disability_cat, $disability_type, $ex_serviceman, $exam_name, $serving_defence_per, $service_period, $created_by, $created_on, $registration_no, $updated_by, $updated_on, $state_exam1, $state_exam2, $center_exam1, $center_exam2;

    public function __construct($db){
        $this->conn = $db;
    }


    //Total Registration Count

    function total_reg_count(){

        if ($this->status == 0) {
            $query = "SELECT COUNT(id) as reg_count FROM " . $this->table_name . " where status=0";
            $stmt = $this->conn->prepare($query);
            // $stmt->bindParam(":status", $this->status);
        } else if ($this->status == 1) {
            $query = "SELECT COUNT(id) as reg_count FROM " . $this->table_name . " where status=1";
            $stmt = $this->conn->prepare($query);
        } else if ($this->status == 2) {
            $query = "SELECT COUNT(id) as reg_count FROM " . $this->table_name . " where status=2";
            $stmt = $this->conn->prepare($query);
        }
        // execute query
        $stmt->execute();
        return $stmt;
    }

    //Total vacancy count

    function total_vacancy_count(){

        $query = "SELECT COUNT(exam_name) as exam_count FROM ". $this->table_exam ." where status=1";
        $stmt = $this->conn->prepare($query);
        // $stmt->bindParam(":status", $this->status);

        // execute query
        $stmt->execute();
        return $stmt;
    }
}
