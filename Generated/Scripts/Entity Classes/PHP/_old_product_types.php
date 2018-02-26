<?php


/**********************************************************************************/
/*** THIS FILE HAS BEEN AUTOMATICALLY GENERATED BY THE PANICKAPPS API GENERATOR ***/

/*                It is HIGHLY suggested that you do not edit this file.          */

//  DATABASE:     easybusiness
//  FILE:         _old_product_types.php
//  TABLE:        _old_product_types
//  DATETIME:     2018-01-25 01:20:25pm
//  DESCRIPTION:  N/A

/**********************************************************************************/
			

class _old_product_types implements JsonSerializable {

	//-------------------- Attributes --------------------

    private $id;
    private $product_type_name;

	//-------------------- Constructor --------------------

    public function __construct(
		$id, 
		$product_type_name
		) {
        $this->id = $id;
		$this->product_type_name = $product_type_name;
    }

	//-------------------- Reflectors --------------------

	public static $allFields = array(
		"id", 
		"product_type_name"
	);

	public static $hasUniqueFields = false;

	//-------------------- Getter Methods --------------------

	/**
     * @return int(10) unsigned
     */
     public function getId() { return $this->id; }

	/**
     * @return varchar(100)
     */
     public function getProduct_type_name() { return $this->product_type_name; }


    /**
     * @return int(10) unsigned
     */
     public function getObjectID() { return $this->id; }


	//-------------------- Setter Methods --------------------

	/**
     * @param $value varchar(100)
     */
     public function setProduct_type_name($value) { $this->product_type_name = $value; }


	//-------------------- Static (Database) Methods --------------------

            
            
    /**
     * Creates a database entry with the given object's data.
     * @param $t1_object _old_product_types
     * @return bool
     */
    public static function create($_old_product_types_object) {
        $conn = dbLogin();
        $sql = "INSERT INTO _old_product_types (product_type_name) VALUES (\"" . $_old_product_types_object->product_type_name . "\")";
        if ($conn->query($sql) === TRUE) return true;
        else return false;
    }


     /**
     * Retrieves a database entry matching the ID value provided.
     * @param $id int(10) unsigned
     * @return bool|_old_product_types
     */
    public static function getByID($id) {
        $conn = dbLogin();
        $sql = "SELECT * FROM _old_product_types WHERE id = " . $id;
        $result = $conn->query($sql);
        $sqlRowItemAsAssocArray = null;
        if ($result->num_rows > 0) {
            $sqlRowItemAsAssocArray = $result->fetch_assoc();
            $object = new _old_product_types(
				$sqlRowItemAsAssocArray["id"], 
				$sqlRowItemAsAssocArray["product_type_name"]);
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
        $sql = "SELECT * FROM _old_product_types";
        if ($limit > 0) $sql .= " LIMIT " . $limit;
        $result = $conn->query($sql);
        $itemsArray = array();
        if ($result->num_rows > 0) {
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $object = new _old_product_types(
				$row["id"], 
				$row["product_type_name"]);
                    array_push($itemsArray, $object);
                }
            }
            return $itemsArray;
        }
        return false;
    }


    /**
     * Updates a database entry with the given object's data.
     * @param $t1_object _old_product_types
     * @return bool
     */
    public static function update($_old_product_types_object) {
        $conn = dbLogin();
        $sql = "UPDATE _old_product_types SET product_type_name = \"" . $_old_product_types_object->getProduct_type_name() . "\" WHERE id = " . $_old_product_types_object->getId();
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
        $sql = "DELETE FROM _old_product_types WHERE id = \"" . $id . "\"";
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
        $sql = "SHOW TABLE STATUS WHERE Name = \"_old_product_types\"";
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
        
        $sql = "SELECT * FROM _old_product_types WHERE " . $combinedWhereClause;
        $result = $conn->query($sql);
        if (!$result) return false;
        $itemsArray = array();
        while ($row = $result->fetch_assoc()) {
            $object = new _old_product_types(
				$row["id"], 
				$row["product_type_name"]);
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
        $jsonStr = "{\"id\": $this->id, \"product_type_name\": \"" . $this->product_type_name. "\" }";
        return $jsonStr;
    }
    
    /**
     * Converts an array of _old_product_types objects to a JSON Array.
     * @param $_old_product_types_array _old_product_types Array
     * @return bool|string
     */
    public static function toJSONArray($_old_product_types_array) {
        $strArray = "[ ";
        foreach ($_old_product_types_array as $i) {
            $strArray .= $i->jsonSerialize() . ", ";
        }
        $strArray = substr($strArray, 0, strlen($strArray) - 3);
        $strArray .= "} ] ";
        return $strArray;
    }

}

?>