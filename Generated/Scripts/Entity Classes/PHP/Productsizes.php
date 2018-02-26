<?php


/**********************************************************************************/
/*** THIS FILE HAS BEEN AUTOMATICALLY GENERATED BY THE PANICKAPPS API GENERATOR ***/

/*                It is HIGHLY suggested that you do not edit this file.          */

//  DATABASE:     easybusiness
//  FILE:         productsizes.php
//  TABLE:        productsizes
//  DATETIME:     2018-01-25 01:20:25pm
//  DESCRIPTION:  N/A

/**********************************************************************************/
			

class Productsizes implements JsonSerializable {

	//-------------------- Attributes --------------------

    private $ID;
    private $Name;
    private $UnitTypeID;

	//-------------------- Constructor --------------------

    public function __construct(
		$ID, 
		$Name, 
		$UnitTypeID
		) {
        $this->ID = $ID;
		$this->Name = $Name;
		$this->UnitTypeID = $UnitTypeID;
    }

	//-------------------- Reflectors --------------------

	public static $allFields = array(
		"ID", 
		"Name", 
		"UnitTypeID"
	);

	public static $hasUniqueFields = false;

	//-------------------- Getter Methods --------------------

	/**
     * @return int(10) unsigned
     */
     public function getID() { return $this->ID; }

	/**
     * @return varchar(255)
     */
     public function getName() { return $this->Name; }

	/**
     * @return int(11)
     */
     public function getUnitTypeID() { return $this->UnitTypeID; }


    /**
     * @return int(10) unsigned
     */
     public function getObjectID() { return $this->ID; }


	//-------------------- Setter Methods --------------------

	/**
     * @param $value varchar(255)
     */
     public function setName($value) { $this->Name = $value; }

	/**
     * @param $value int(11)
     */
     public function setUnitTypeID($value) { $this->UnitTypeID = $value; }


	//-------------------- Static (Database) Methods --------------------

            
            
    /**
     * Creates a database entry with the given object's data.
     * @param $t1_object Productsizes
     * @return bool
     */
    public static function create($productsizes_object) {
        $conn = dbLogin();
        $sql = "INSERT INTO productsizes (Name, UnitTypeID) VALUES (\"" . $productsizes_object->Name . "\", $productsizes_object->UnitTypeID)";
        if ($conn->query($sql) === TRUE) return true;
        else return false;
    }


     /**
     * Retrieves a database entry matching the ID value provided.
     * @param $id int(10) unsigned
     * @return bool|Productsizes
     */
    public static function getByID($id) {
        $conn = dbLogin();
        $sql = "SELECT * FROM productsizes WHERE ID = " . $id;
        $result = $conn->query($sql);
        $sqlRowItemAsAssocArray = null;
        if ($result->num_rows > 0) {
            $sqlRowItemAsAssocArray = $result->fetch_assoc();
            $object = new Productsizes(
				$sqlRowItemAsAssocArray["ID"], 
				$sqlRowItemAsAssocArray["Name"], 
				$sqlRowItemAsAssocArray["UnitTypeID"]);
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
        $sql = "SELECT * FROM productsizes";
        if ($limit > 0) $sql .= " LIMIT " . $limit;
        $result = $conn->query($sql);
        $itemsArray = array();
        if ($result->num_rows > 0) {
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $object = new Productsizes(
				$row["ID"], 
				$row["Name"], 
				$row["UnitTypeID"]);
                    array_push($itemsArray, $object);
                }
            }
            return $itemsArray;
        }
        return false;
    }


    /**
     * Updates a database entry with the given object's data.
     * @param $t1_object Productsizes
     * @return bool
     */
    public static function update($productsizes_object) {
        $conn = dbLogin();
        $sql = "UPDATE productsizes SET Name = \"" . $productsizes_object->getName() . "\", UnitTypeID = " . $productsizes_object->getUnitTypeID() . " WHERE ID = " . $productsizes_object->getID();
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
        $sql = "DELETE FROM productsizes WHERE ID = \"" . $id . "\"";
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
        $sql = "SHOW TABLE STATUS WHERE Name = \"productsizes\"";
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
        
        $sql = "SELECT * FROM productsizes WHERE " . $combinedWhereClause;
        $result = $conn->query($sql);
        if (!$result) return false;
        $itemsArray = array();
        while ($row = $result->fetch_assoc()) {
            $object = new Productsizes(
				$row["ID"], 
				$row["Name"], 
				$row["UnitTypeID"]);
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
        $jsonStr = "{\"ID\": $this->ID, \"Name\": \"" . $this->Name. "\", \"UnitTypeID\": $this->UnitTypeID }";
        return $jsonStr;
    }
    
    /**
     * Converts an array of Productsizes objects to a JSON Array.
     * @param $Productsizes_array Productsizes Array
     * @return bool|string
     */
    public static function toJSONArray($Productsizes_array) {
        $strArray = "[ ";
        foreach ($Productsizes_array as $i) {
            $strArray .= $i->jsonSerialize() . ", ";
        }
        $strArray = substr($strArray, 0, strlen($strArray) - 3);
        $strArray .= "} ] ";
        return $strArray;
    }

}

?>