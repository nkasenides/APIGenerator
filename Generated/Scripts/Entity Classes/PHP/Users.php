<?php


/**********************************************************************************/
/*** THIS FILE HAS BEEN AUTOMATICALLY GENERATED BY THE PANICKAPPS API GENERATOR ***/

/*                It is HIGHLY suggested that you do not edit this file.          */

//  DATABASE:     TestDB
//  FILE:         users.php
//  TABLE:        users
//  DATETIME:     2018-01-24 01:38:32pm
//  DESCRIPTION:  N/A

/**********************************************************************************/
			

class Users implements JsonSerializable {

	//-------------------- Attributes --------------------

    private $UserID;
    private $Username;
    private $Password;
    private $UserLevelID;

	//-------------------- Constructor --------------------

    public function __construct(
		$UserID, 
		$Username, 
		$Password, 
		$UserLevelID
		) {
        $this->UserID = $UserID;
		$this->Username = $Username;
		$this->Password = $Password;
		$this->UserLevelID = $UserLevelID;
    }

	//-------------------- Reflectors --------------------

	public static $allFields = array(
		"UserID", 
		"Username", 
		"Password", 
		"UserLevelID"
	);

	public static $hasUniqueFields = true;

	//-------------------- Getter Methods --------------------

	/**
     * @return int(10) unsigned
     */
     public function getUserID() { return $this->UserID; }

	/**
     * @return varchar(100)
     */
     public function getUsername() { return $this->Username; }

	/**
     * @return varchar(255)
     */
     public function getPassword() { return $this->Password; }

	/**
     * @return int(10) unsigned
     */
     public function getUserLevelID() { return $this->UserLevelID; }


    /**
     * @return int(10) unsigned
     */
     public function getID() { return $this->UserID; }


	//-------------------- Setter Methods --------------------

	/**
     * @param $value varchar(100)
     */
     public function setUsername($value) { $this->Username = $value; }

	/**
     * @param $value varchar(255)
     */
     public function setPassword($value) { $this->Password = $value; }

	/**
     * @param $value int(10) unsigned
     */
     public function setUserLevelID($value) { $this->UserLevelID = $value; }


	//-------------------- Static (Database) Methods --------------------

            
            
    /**
     * Creates a database entry with the given object's data.
     * @param $t1_object Users
     * @return bool
     */
    public static function create($users_object) {
        $conn = dbLogin();
        $sql = "INSERT INTO users (Username, Password, UserLevelID) VALUES (\"" . $users_object->Username . "\", \"" . $users_object->Password . "\", $users_object->UserLevelID)";
        if ($conn->query($sql) === TRUE) return true;
        else return false;
    }


     /**
     * Retrieves a database entry matching the ID value provided.
     * @param $id int(10) unsigned
     * @return bool|Users
     */
    public static function getByID($id) {
        $conn = dbLogin();
        $sql = "SELECT * FROM users WHERE UserID = " . $id;
        $result = $conn->query($sql);
        $sqlRowItemAsAssocArray = null;
        if ($result->num_rows > 0) {
            $sqlRowItemAsAssocArray = $result->fetch_assoc();
            $object = new Users(
				$sqlRowItemAsAssocArray["UserID"], 
				$sqlRowItemAsAssocArray["Username"], 
				$sqlRowItemAsAssocArray["Password"], 
				$sqlRowItemAsAssocArray["UserLevelID"]);
            return $object;
        }
        else return false;
    }


    /**
     * Returns a database entry matching the unique field value provided.
     * @param $indexValue varchar(100)
     * @return bool|Users
     */
    public static function getByUsername($indexValue) {
        $conn = dbLogin();
        $sql = "SELECT * FROM users WHERE Username = '" . $indexValue . "'";
        $result = $conn->query($sql);
        $sqlRowItemAsAssocArray = null;
        if ($result->num_rows > 0) {
            $sqlRowItemAsAssocArray = $result->fetch_assoc();
            $object = new Users(
				$sqlRowItemAsAssocArray["UserID"], 
				$sqlRowItemAsAssocArray["Username"], 
				$sqlRowItemAsAssocArray["Password"], 
				$sqlRowItemAsAssocArray["UserLevelID"]);
            return $object;
        }
        else return false;
    }


    /**
     * Retrieves all entries or up to a specified limit from the database. Use 0 or negative values as limit to retrieve all entries.
     * @param $limit int
     * @return array|bool
     */
    public static function getMultiple($limit) {
        $conn = dbLogin();
        $sql = "SELECT * FROM users";
        if ($limit > 0) $sql .= " LIMIT " . $limit;
        $result = $conn->query($sql);
        $itemsArray = array();
        if ($result->num_rows > 0) {
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $object = new Users(
				$row["UserID"], 
				$row["Username"], 
				$row["Password"], 
				$row["UserLevelID"]);
                    array_push($itemsArray, $object);
                }
            }
            return $itemsArray;
        }
        return false;
    }


    /**
     * Updates a database entry with the given object's data.
     * @param $t1_object Users
     * @return bool
     */
    public static function update($users_object) {
        $conn = dbLogin();
        $sql = "UPDATE users SET Username = \"" . $users_object->getUsername() . "\", Password = \"" . $users_object->getPassword() . "\", UserLevelID = " . $users_object->getUserLevelID() . " WHERE UserID = " . $users_object->getUserID();
        $conn->query($sql);
        if ($conn->affected_rows > 0) return true;
        else return false;
    }


    /**
     * Deletes an entry from the database given the object's data.
     * @param $id Int(10) unsigned
     * @return bool
     */
    public static function delete($id) {
        $conn = dbLogin();
        $sql = "DELETE FROM users WHERE UserID = \"" . $id . "\"";
        $result = $conn->query($sql);
        if ($conn->affected_rows > 0) return true;
        else return false;
    }


    /**
     * Returns the number of entries in the database.
     * @return int
     */
    public static function getSize() {
        $conn = dbLogin();
        $sql = "SHOW TABLE STATUS WHERE Name = \"users\"";
        $result = $conn->query($sql);
        if ($result) return $result->fetch_object()->Rows;
        else return false;
    }


    /**
     * Returns true if the database is empty or false otherwise.
     * @return bool
     */
    public static function isEmpty() {
        $size = self::getSize();
        return ($size == 0);
    }


    /**
     * Searches the database for matches in the given field-value pairs in the given associative array.
     * The array should be in the format FieldName -> ValueToSearch where both values are strings.
     * @return array|bool
     */
    public static function searchByFields($fieldsAndValuesAssocArray) {
        $conn = dbLogin();
        
        $combinedWhereClause = "";
        
        foreach ($fieldsAndValuesAssocArray as $field => $value) {
            $combinedWhereClause .= $field . " = \"" . $value . "\" AND ";
        }
        $combinedWhereClause = substr($combinedWhereClause, 0, strlen($combinedWhereClause) - 4);
        
        $sql = "SELECT * FROM users WHERE " . $combinedWhereClause;
        $result = $conn->query($sql);
        if (!$result) return false;
        $itemsArray = array();
        while ($row = $result->fetch_assoc()) {
            $object = new Users(
				$row["UserID"], 
				$row["Username"], 
				$row["Password"], 
				$row["UserLevelID"]);
            array_push($itemsArray, $object);
        }
        return $itemsArray;
    }

	//-------------------- JSON Generation Methods --------------------

    /**
     * Specifies how objects of this class should be converted to JSON format.
     * @return string
     */
    public function jsonSerialize() {
        $jsonStr = "{\"UserID\": $this->UserID, \"Username\": \"" . $this->Username. "\", \"Password\": \"" . $this->Password. "\", \"UserLevelID\": $this->UserLevelID }";
        return $jsonStr;
    }
    
    /**
     * Converts an array of Users objects to a JSON Array.
     * @param $Users_array Users Array
     * @return bool|string
     */
    public static function toJSONArray($Users_array) {
        $strArray = "[ ";
        foreach ($Users_array as $i) {
            $strArray .= $i->jsonSerialize() . ", ";
        }
        $strArray = substr($strArray, 0, strlen($strArray) - 3);
        $strArray .= "} ] ";
        return $strArray;
    }

}

?>