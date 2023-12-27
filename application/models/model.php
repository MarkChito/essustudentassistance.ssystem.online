<?php

class model extends CI_Model
{
    /*============================== SELECT QUERIES ==============================*/
    public function MOD_GET_NOTIFICATION_COUNT($primary_key)
    {
        $sql = "SELECT COUNT(*) AS unread_notifications FROM tbl_studentassistance_notifications WHERE `student_primary_key`=? AND `status` = 'unread'";
        $query = $this->db->query($sql, array($primary_key));

        return $query->result();
    }
    
    public function MOD_GET_NOTIFICATION_BADGE($primary_key)
    {
        $sql = "SELECT * FROM tbl_studentassistance_notificationbadge WHERE `student_primary_key`=? AND `status` = 'unclicked'";
        $query = $this->db->query($sql, array($primary_key));

        return $query->result();
    }

    public function MOD_GET_USERACCOUNT_DATA($primary_key)
    {
        $sql = "SELECT * FROM `tbl_studentassistance_useraccounts` WHERE `primary_key`=?";
        $query = $this->db->query($sql, array($primary_key));

        return $query->result();
    }

    public function MOD_GET_ADMIN_DATA()
    {
        $sql = "SELECT * FROM `tbl_studentassistance_useraccounts` WHERE `user_type`='admin'";
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function MOD_GET_NOTIFICATIONS_DATA($primary_key)
    {
        $sql = "SELECT * FROM `tbl_studentassistance_notifications` WHERE `student_primary_key`=? ORDER BY `primary_key` DESC ";
        $query = $this->db->query($sql, array($primary_key));

        return $query->result();
    }

    public function MOD_CHECK_USERNAME($username)
    {
        $sql = "SELECT * FROM `tbl_studentassistance_useraccounts` WHERE `username`=?";
        $query = $this->db->query($sql, array($username));

        return $query->result();
    }

    public function MOD_CHECK_RFID_NUMBER($rfid_number)
    {
        $sql = "SELECT * FROM `tbl_studentassistance_useraccounts` WHERE `rfid_number`=?";
        $query = $this->db->query($sql, array($rfid_number));

        return $query->result();
    }

    public function MOD_CHECK_STUDENT_NUMBER($student_number)
    {
        $sql = "SELECT * FROM `tbl_studentassistance_students` WHERE `student_number`=?";
        $query = $this->db->query($sql, array($student_number));

        return $query->result();
    }

    public function MOD_APPLICATION_DATA_STATUS($status)
    {
        $sql = "SELECT * FROM `tbl_studentassistance_applications` WHERE `status`=?";
        $query = $this->db->query($sql, array($status));

        return $query->result();
    }

    public function MOD_APPLICATION_DATA($primary_key)
    {
        $sql = "SELECT * FROM `tbl_studentassistance_applications` WHERE `student_primary_key`=?";
        $query = $this->db->query($sql, array($primary_key));

        return $query->result();
    }
    
    public function MOD_CHECK_APPLICATIONS()
    {
        $sql = "SELECT * FROM `tbl_studentassistance_applications`";
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function MOD_CHECK_APPLICATION_STUDENT($primary_key)
    {
        $sql = "SELECT * FROM `tbl_studentassistance_applications` WHERE `primary_key`=?";
        $query = $this->db->query($sql, array($primary_key));

        return $query->result();
    }

    public function MOD_GET_STUDENT_DATA($primary_key)
    {
        $sql = "SELECT * FROM `tbl_studentassistance_students` WHERE `login_primary_key`=?";
        $query = $this->db->query($sql, array($primary_key));

        return $query->result();
    }

    public function MOD_PROCEDURES_DATA()
    {
        $sql = "SELECT * FROM `tbl_studentassistance_procedures` ORDER BY `primary_key` DESC";
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function MOD_TRANSACTIONS_DATA()
    {
        $sql = "SELECT * FROM `tbl_studentassistance_transactions` ORDER BY `primary_key` DESC";
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function MOD_SINGLE_TRANSACTIONS_DATA($student_primary_key)
    {
        $sql = "SELECT * FROM `tbl_studentassistance_transactions` WHERE `student_primary_key`=? ORDER BY `primary_key` DESC";
        $query = $this->db->query($sql, array($student_primary_key));

        return $query->result();
    }

    public function MOD_SPECIFIC_PROCEDURES_DATA($category)
    {
        $sql = "SELECT * FROM `tbl_studentassistance_procedures` WHERE `category`=? ORDER BY `primary_key` ASC";
        $query = $this->db->query($sql, array($category));

        return $query->result();
    }

    public function MOD_SPECIFIC_REQUIREMENTS_DATA($category)
    {
        $sql = "SELECT * FROM `tbl_studentassistance_requirements` WHERE `category`=? ORDER BY `primary_key` ASC";
        $query = $this->db->query($sql, array($category));

        return $query->result();
    }

    public function MOD_SPECIFIC_SLOTS_DATA($category)
    {
        $sql = "SELECT * FROM `tbl_studentassistance_slots` WHERE `category`=? ORDER BY `primary_key` ASC";
        $query = $this->db->query($sql, array($category));

        return $query->result();
    }

    public function MOD_REQUIREMENTS_DATA()
    {
        $sql = "SELECT * FROM `tbl_studentassistance_requirements` ORDER BY `primary_key` DESC";
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function MOD_SLOTS_DATA()
    {
        $sql = "SELECT * FROM `tbl_studentassistance_slots` ORDER BY `category` ASC";
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function MOD_CHECK_SLOT($category)
    {
        $sql = "SELECT * FROM `tbl_studentassistance_slots` WHERE `category`=?";
        $query = $this->db->query($sql, array($category));

        return $query->result();
    }

    public function MOD_CHECK_CATEGORY($category)
    {
        $sql_1 = "SELECT * FROM `tbl_studentassistance_requirements` WHERE category=?";
        $query_1 = $this->db->query($sql_1, array($category));

        $result_1 = $query_1->result();

        $sql_2 = "SELECT * FROM `tbl_studentassistance_procedures` WHERE category=?";
        $query_2 = $this->db->query($sql_2, array($category));

        $result_2 = $query_2->result();

        if ($result_1 || $result_2) {
            return true;
        } else {
            return false;
        }
    }

    public function MOD_GET_STUDENTS_DATA()
    {
        $sql = "SELECT * FROM `tbl_studentassistance_students` ORDER BY `primary_key` DESC";
        $query = $this->db->query($sql);

        return $query->result();
    }

    /*============================== INSERT QUERIES ==============================*/
    public function MOD_ADD_USERACCOUNT($rfid_number, $name, $username, $password, $user_type)
    {
        $sql = "INSERT INTO `tbl_studentassistance_useraccounts` (`rfid_number`, `name`, `username`, `password`, `user_type`) VALUES (?,?,?,?,?)";

        $this->db->query($sql, array($rfid_number, $name, $username, $password, $user_type));
    }

    public function MOD_ADD_STUDENT($login_primary_key, $student_number, $first_name, $middle_name, $last_name, $sex, $mobile_number, $address)
    {
        $sql = "INSERT INTO `tbl_studentassistance_students` (`login_primary_key`, `student_number`, `first_name`, `middle_name`, `last_name`, `sex`, `mobile_number`, `address`) VALUES (?,?,?,?,?,?,?,?)";

        $this->db->query($sql, array($login_primary_key, $student_number, $first_name, $middle_name, $last_name, $sex, $mobile_number, $address));
    }

    public function MOD_ADD_PROCEDURE($category, $description)
    {
        $sql = "INSERT INTO `tbl_studentassistance_procedures` (`category`, `description`) VALUES (?,?)";

        $this->db->query($sql, array($category, $description));
    }

    public function MOD_ADD_REQUIREMENT($category, $description)
    {
        $sql = "INSERT INTO `tbl_studentassistance_requirements` (`category`, `description`) VALUES (?,?)";

        $this->db->query($sql, array($category, $description));
    }

    public function MOD_ADD_SLOT($category, $slot)
    {
        $sql = "INSERT INTO `tbl_studentassistance_slots` (`category`, `slot`) VALUES (?,?)";

        $this->db->query($sql, array($category, $slot));
    }

    public function MOD_ADD_APPLICATION($student_primary_key, $category, $progress, $status)
    {
        $sql = "INSERT INTO `tbl_studentassistance_applications` (`student_primary_key`, `category`, `progress`, `status`) VALUES (?,?,?,?)";

        $this->db->query($sql, array($student_primary_key, $category, $progress, $status));
    }

    public function MOD_ADD_TRANSACTION($student_primary_key, $date_now, $time_now, $event)
    {
        $sql = "INSERT INTO `tbl_studentassistance_transactions` (`student_primary_key`, `date`, `time`, `event`) VALUES (?,?,?,?)";

        $this->db->query($sql, array($student_primary_key, $date_now, $time_now, $event));
    }

    public function MOD_ADD_NOTIFICATION($student_id, $admin_id, $date_now, $time_now, $message, $notification_status)
    {
        $sql = "INSERT INTO `tbl_studentassistance_notifications` (`student_primary_key`, `admin_primary_key`, `date`, `time`, `message`, `status`) VALUES (?,?,?,?,?,?)";

        $this->db->query($sql, array($student_id, $admin_id, $date_now, $time_now, $message, $notification_status));
    }

    public function MOD_ADD_NOTIFICATION_BADGE($status, $student_primary_key)
    {
        $sql = "INSERT INTO `tbl_studentassistance_notificationbadge` (`status`, `student_primary_key`) VALUES (?,?)";

        $this->db->query($sql, array($status, $student_primary_key));
    }

    /*============================== UPDATE QUERIES ==============================*/
    public function MOD_UPDATE_USERACCOUNT($name, $rfid_number, $username, $password, $primary_key)
    {
        $sql = "UPDATE `tbl_studentassistance_useraccounts` SET `name`=?, `rfid_number`=?, `username`=?, `password`=? WHERE `primary_key`=?";

        $this->db->query($sql, array($name, $rfid_number, $username, $password, $primary_key));
    }

    public function MOD_UPDATE_PROCEDURE($category, $description, $primary_key)
    {
        $sql = "UPDATE `tbl_studentassistance_procedures` SET `category`=?, `description`=? WHERE `primary_key`=?";

        $this->db->query($sql, array($category, $description, $primary_key));
    }

    public function MOD_UPDATE_REQUIREMENT($category, $description, $primary_key)
    {
        $sql = "UPDATE `tbl_studentassistance_requirements` SET `category`=?, `description`=? WHERE `primary_key`=?";

        $this->db->query($sql, array($category, $description, $primary_key));
    }

    public function MOD_UPDATE_SLOT($slot, $primary_key)
    {
        $sql = "UPDATE `tbl_studentassistance_slots` SET `slot`=? WHERE `primary_key`=?";

        $this->db->query($sql, array($slot, $primary_key));
    }

    public function MOD_UPDATE_SLOT_CATEGORY($available_slots, $category)
    {
        $sql = "UPDATE `tbl_studentassistance_slots` SET `slot`=? WHERE `category`=?";

        $this->db->query($sql, array($available_slots, $category));
    }

    public function MOD_UPDATE_NOTIFICATION_STATUS($primary_key)
    {
        $sql = "UPDATE `tbl_studentassistance_notifications` SET `status`='read' WHERE `primary_key`=?";

        $this->db->query($sql, array($primary_key));
    }
     
    public function MOD_UPDATE_APPLICATION_STATUS($primary_key)
    {
        $sql = "UPDATE `tbl_studentassistance_applications` SET `status`='Received' WHERE `primary_key`=?";

        $this->db->query($sql, array($primary_key));
    }
    
    public function MOD_UPDATE_NOTIFICATION_BADGE($status, $student_primary_key)
    {
        $sql = "UPDATE `tbl_studentassistance_notificationbadge` SET `status`=? WHERE `student_primary_key`=?";

        $this->db->query($sql, array($status, $student_primary_key));
    }

    public function MOD_UPDATE_APPLICATION($date_now, $time_now, $progress, $status, $student_primary_key)
    {
        $sql = "UPDATE `tbl_studentassistance_applications` SET `date`=?, `time`=?, `progress`=?, `status`=? WHERE `student_primary_key`=?";

        $this->db->query($sql, array($date_now, $time_now, $progress, $status, $student_primary_key));
    }

    public function MOD_UPDATE_APPLICATION_ADMIN($date_now, $time_now, $admin_id, $progress, $status, $student_id)
    {
        $sql = "UPDATE `tbl_studentassistance_applications` SET `date`=?, `time`=?, `admin_primary_key`=?, `progress`=?, `status`=? WHERE `student_primary_key`=?";

        $this->db->query($sql, array($date_now, $time_now, $admin_id, $progress, $status, $student_id));
    }

    public function MOD_UPDATE_USERACCOUNT_NAME($name, $rfid_number, $primary_key)
    {
        $sql = "UPDATE `tbl_studentassistance_useraccounts` SET `name`=?, `rfid_number`=? WHERE `primary_key`=?";

        $this->db->query($sql, array($name, $rfid_number, $primary_key));
    }

    public function MOD_UPDATE_USER_IMAGE($user_image, $student_primary_key)
    {
        $sql = "UPDATE `tbl_studentassistance_students` SET `user_image`=? WHERE `login_primary_key`=?";

        $this->db->query($sql, array($user_image, $student_primary_key));
    }

    public function MOD_UPDATE_INDIGENCY_IMAGE($indigency_image, $student_primary_key)
    {
        $sql = "UPDATE `tbl_studentassistance_students` SET `indigency_image`=? WHERE `login_primary_key`=?";

        $this->db->query($sql, array($indigency_image, $student_primary_key));
    }

    public function MOD_UPDATE_COE_IMAGE($coe_image, $student_primary_key)
    {
        $sql = "UPDATE `tbl_studentassistance_students` SET `coe_image`=? WHERE `login_primary_key`=?";

        $this->db->query($sql, array($coe_image, $student_primary_key));
    }

    public function MOD_UPDATE_PSA_IMAGE($psa_image, $student_primary_key)
    {
        $sql = "UPDATE `tbl_studentassistance_students` SET `psa_image`=? WHERE `login_primary_key`=?";

        $this->db->query($sql, array($psa_image, $student_primary_key));
    }

    public function MOD_UPDATE_VALID_ID_IMAGE_FRONT($valid_id_image_front, $student_primary_key)
    {
        $sql = "UPDATE `tbl_studentassistance_students` SET `valid_id_image_front`=? WHERE `login_primary_key`=?";

        $this->db->query($sql, array($valid_id_image_front, $student_primary_key));
    }

    public function MOD_UPDATE_VALID_ID_IMAGE_BACK($valid_id_image_back, $student_primary_key)
    {
        $sql = "UPDATE `tbl_studentassistance_students` SET `valid_id_image_back`=? WHERE `login_primary_key`=?";

        $this->db->query($sql, array($valid_id_image_back, $student_primary_key));
    }

    public function MOD_UPDATE_TOR_IMAGE($tor_image, $student_primary_key)
    {
        $sql = "UPDATE `tbl_studentassistance_students` SET `tor_image`=? WHERE `login_primary_key`=?";

        $this->db->query($sql, array($tor_image, $student_primary_key));
    }

    public function MOD_UPDATE_REPORT_CARD_IMAGE($report_card_image, $student_primary_key)
    {
        $sql = "UPDATE `tbl_studentassistance_students` SET `report_card_image`=? WHERE `login_primary_key`=?";

        $this->db->query($sql, array($report_card_image, $student_primary_key));
    }

    public function MOD_UPDATE_PERSONAL_INFORMATION($first_name, $middle_name, $last_name, $student_number, $sex, $user_image, $student_primary_key)
    {
        $sql = "UPDATE `tbl_studentassistance_students` SET `first_name`=?, `middle_name`=?, `last_name`=?, `student_number`=?, `sex`=?, `user_image`=? WHERE `primary_key`=?";

        $this->db->query($sql, array($first_name, $middle_name, $last_name, $student_number, $sex, $user_image, $student_primary_key));
    }

    public function MOD_UPDATE_PERSONAL_INFORMATION_STEP_1($first_name, $middle_name, $last_name, $student_number, $sex, $mobile_number, $address, $school_name, $school_address, $father_name, $father_occupation, $mother_name, $mother_occupation, $primary_key)
    {
        $sql = "UPDATE `tbl_studentassistance_students` SET `first_name`=?, `middle_name`=?, `last_name`=?, `student_number`=?, `sex`=?, `mobile_number`=?, `address`=?, `school_name`=?, `school_address`=?, `father_name`=?, `father_occupation`=?, `mother_name`=?, `mother_occupation`=? WHERE `login_primary_key`=?";

        $this->db->query($sql, array($first_name, $middle_name, $last_name, $student_number, $sex, $mobile_number, $address, $school_name, $school_address, $father_name, $father_occupation, $mother_name, $mother_occupation, $primary_key));
    }

    public function MOD_UPDATE_CONTACT_INFORMATION($mobile_number, $address, $school_name, $school_address, $father_name, $father_occupation, $mother_name, $mother_occupation, $student_primary_key)
    {
        $sql = "UPDATE `tbl_studentassistance_students` SET `mobile_number`=?, `address`=?, `school_name`=?, `school_address`=?, `father_name`=?, `father_occupation`=?, `mother_name`=?, `mother_occupation`=? WHERE `primary_key`=?";

        $this->db->query($sql, array($mobile_number, $address, $school_name, $school_address, $father_name, $father_occupation, $mother_name, $mother_occupation, $student_primary_key));
    }

    /*============================== DELETE QUERIES ==============================*/
    public function MOD_DELETE_ADMIN($primary_key)
    {
        $sql = "DELETE FROM `tbl_studentassistance_useraccounts` WHERE `primary_key`=?";

        $this->db->query($sql, array($primary_key));
    }

    public function MOD_DELETE_PROCEDURE($primary_key)
    {
        $sql = "DELETE FROM `tbl_studentassistance_procedures` WHERE `primary_key`=?";

        $this->db->query($sql, array($primary_key));
    }

    public function MOD_DELETE_REQUIREMENT($primary_key)
    {
        $sql = "DELETE FROM `tbl_studentassistance_requirements` WHERE `primary_key`=?";

        $this->db->query($sql, array($primary_key));
    }

    public function MOD_DELETE_SLOT($category)
    {
        $sql = "DELETE FROM `tbl_studentassistance_slots` WHERE `category`=?";

        $this->db->query($sql, array($category));
    }

    public function MOD_DELETE_STUDENT($primary_key)
    {
        $sql = "DELETE FROM `tbl_studentassistance_useraccounts` WHERE `primary_key`=?";
        $this->db->query($sql, array($primary_key));      
    }
    
    public function MOD_DELETE_STUDENT_ACCOUNT($primary_key)
    {
        $sql = "DELETE FROM `tbl_studentassistance_useraccounts` WHERE `primary_key`=?";
        $this->db->query($sql, array($primary_key));
    }
}
