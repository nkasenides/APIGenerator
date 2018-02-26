<?php


/**********************************************************************************/
/*** THIS FILE HAS BEEN AUTOMATICALLY GENERATED BY THE PANICKAPPS API GENERATOR ***/

/*                It is HIGHLY suggested that you do not edit this file.          */

//  DATABASE:     easybusiness
//  FILE:         _old_recipe_ingredients.php
//  TABLE:        _old_recipe_ingredients
//  DATETIME:     2018-01-25 01:20:25pm
//  DESCRIPTION:  N/A

/**********************************************************************************/
			

class _old_recipe_ingredients implements JsonSerializable {

	//-------------------- Attributes --------------------

    private $id;
    private $recipe_id;
    private $ingredient_id;
    private $quantity_type_id;
    private $quantity;

	//-------------------- Constructor --------------------

    public function __construct(
		$id, 
		$recipe_id, 
		$ingredient_id, 
		$quantity_type_id, 
		$quantity
		) {
        $this->id = $id;
		$this->recipe_id = $recipe_id;
		$this->ingredient_id = $ingredient_id;
		$this->quantity_type_id = $quantity_type_id;
		$this->quantity = $quantity;
    }

	//-------------------- Reflectors --------------------

	public static $allFields = array(
		"id", 
		"recipe_id", 
		"ingredient_id", 
		"quantity_type_id", 
		"quantity"
	);

	public static $hasUniqueFields = false;

	//-------------------- Getter Methods --------------------

	/**
     * @return int(10) unsigned
     */
     public function getId() { return $this->id; }

	/**
     * @return int(11)
     */
     public function getRecipe_id() { return $this->recipe_id; }

	/**
     * @return int(11)
     */
     public function getIngredient_id() { return $this->ingredient_id; }

	/**
     * @return int(11)
     */
     public function getQuantity_type_id() { return $this->quantity_type_id; }

	/**
     * @return double
     */
     public function getQuantity() { return $this->quantity; }


    /**
     * @return int(10) unsigned
     */
     public function getObjectID() { return $this->id; }


	//-------------------- Setter Methods --------------------

	/**
     * @param $value int(11)
     */
     public function setRecipe_id($value) { $this->recipe_id = $value; }

	/**
     * @param $value int(11)
     */
     public function setIngredient_id($value) { $this->ingredient_id = $value; }

	/**
     * @param $value int(11)
     */
     public function setQuantity_type_id($value) { $this->quantity_type_id = $value; }

	/**
     * @param $value double
     */
     public function setQuantity($value) { $this->quantity = $value; }


	//-------------------- Static (Database) Methods --------------------

            
            
    /**
     * Creates a database entry with the given object's data.
     * @param $t1_object _old_recipe_ingredients
     * @return bool
     */
    public static function create($_old_recipe_ingredients_object) {
        $conn = dbLogin();
        $sql = "INSERT INTO _old_recipe_ingredients (recipe_id, ingredient_id, quantity_type_id, quantity) VALUES ($_old_recipe_ingredients_object->recipe_id, $_old_recipe_ingredients_object->ingredient_id, $_old_recipe_ingredients_object->quantity_type_id, $_old_recipe_ingredients_object->quantity)";
        if ($conn->query($sql) === TRUE) return true;
        else return false;
    }


     /**
     * Retrieves a database entry matching the ID value provided.
     * @param $id int(10) unsigned
     * @return bool|_old_recipe_ingredients
     */
    public static function getByID($id) {
        $conn = dbLogin();
        $sql = "SELECT * FROM _old_recipe_ingredients WHERE id = " . $id;
        $result = $conn->query($sql);
        $sqlRowItemAsAssocArray = null;
        if ($result->num_rows > 0) {
            $sqlRowItemAsAssocArray = $result->fetch_assoc();
            $object = new _old_recipe_ingredients(
				$sqlRowItemAsAssocArray["id"], 
				$sqlRowItemAsAssocArray["recipe_id"], 
				$sqlRowItemAsAssocArray["ingredient_id"], 
				$sqlRowItemAsAssocArray["quantity_type_id"], 
				$sqlRowItemAsAssocArray["quantity"]);
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
        $sql = "SELECT * FROM _old_recipe_ingredients";
        if ($limit > 0) $sql .= " LIMIT " . $limit;
        $result = $conn->query($sql);
        $itemsArray = array();
        if ($result->num_rows > 0) {
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $object = new _old_recipe_ingredients(
				$row["id"], 
				$row["recipe_id"], 
				$row["ingredient_id"], 
				$row["quantity_type_id"], 
				$row["quantity"]);
                    array_push($itemsArray, $object);
                }
            }
            return $itemsArray;
        }
        return false;
    }


    /**
     * Updates a database entry with the given object's data.
     * @param $t1_object _old_recipe_ingredients
     * @return bool
     */
    public static function update($_old_recipe_ingredients_object) {
        $conn = dbLogin();
        $sql = "UPDATE _old_recipe_ingredients SET recipe_id = " . $_old_recipe_ingredients_object->getRecipe_id() . ", ingredient_id = " . $_old_recipe_ingredients_object->getIngredient_id() . ", quantity_type_id = " . $_old_recipe_ingredients_object->getQuantity_type_id() . ", quantity = " . $_old_recipe_ingredients_object->getQuantity() . " WHERE id = " . $_old_recipe_ingredients_object->getId();
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
        $sql = "DELETE FROM _old_recipe_ingredients WHERE id = \"" . $id . "\"";
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
        $sql = "SHOW TABLE STATUS WHERE Name = \"_old_recipe_ingredients\"";
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
        
        $sql = "SELECT * FROM _old_recipe_ingredients WHERE " . $combinedWhereClause;
        $result = $conn->query($sql);
        if (!$result) return false;
        $itemsArray = array();
        while ($row = $result->fetch_assoc()) {
            $object = new _old_recipe_ingredients(
				$row["id"], 
				$row["recipe_id"], 
				$row["ingredient_id"], 
				$row["quantity_type_id"], 
				$row["quantity"]);
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
        $jsonStr = "{\"id\": $this->id, \"recipe_id\": $this->recipe_id, \"ingredient_id\": $this->ingredient_id, \"quantity_type_id\": $this->quantity_type_id, \"quantity\": $this->quantity }";
        return $jsonStr;
    }
    
    /**
     * Converts an array of _old_recipe_ingredients objects to a JSON Array.
     * @param $_old_recipe_ingredients_array _old_recipe_ingredients Array
     * @return bool|string
     */
    public static function toJSONArray($_old_recipe_ingredients_array) {
        $strArray = "[ ";
        foreach ($_old_recipe_ingredients_array as $i) {
            $strArray .= $i->jsonSerialize() . ", ";
        }
        $strArray = substr($strArray, 0, strlen($strArray) - 3);
        $strArray .= "} ] ";
        return $strArray;
    }

}

?>