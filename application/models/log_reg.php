<?php

class Log_Reg extends CI_Model {

	function register_user($user)
	{
		$query = "INSERT INTO users (first_name, last_name, email, password, created_on, updated_on) VALUES (?, ?, ?, ?, NOW(), NOW())";
		$value = array($user["first_name"], $user["last_name"], $user["email"], $user["password"]);
		$this->db->query($query, $value);
	}

	function login_user($login)
	{
		return $this->db->query("SELECT * FROM users WHERE email = ?", array($login))->row_array();
	}
	
}

?>