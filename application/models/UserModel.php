<?php
class UserModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Check if user exists
    public function check_user($email, $password) {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        
        if ($query->num_rows() > 0) {
            $user = $query->row_array();
            if (password_verify($password, $user['password'])) {
                return $user;
            } 
        }
        return false;
    }
}
?>
