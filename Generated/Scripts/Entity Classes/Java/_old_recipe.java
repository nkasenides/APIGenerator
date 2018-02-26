


/**********************************************************************************/
/*** THIS FILE HAS BEEN AUTOMATICALLY GENERATED BY THE PANICKAPPS API GENERATOR ***/

/*                It is HIGHLY suggested that you do not edit this file.          */

//  DATABASE:     easybusiness
//  FILE:         _old_recipe.java
//  TABLE:        _old_recipe
//  DATETIME:     2018-01-25 01:21:28pm
//  DESCRIPTION:  N/A

/**********************************************************************************/
			


import java.io.Serializable;
import java.sql.Time;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.ArrayList;
import java.util.List;
import java.util.Vector;


class _old_recipe implements Serializable {


	//-------------------- Supporting Finals --------------------

	final SimpleDateFormat DATE_FORMAT = new SimpleDateFormat("yyyy-MM-dd");
	final SimpleDateFormat TIME_FORMAT = new SimpleDateFormat("HH:mm:ss");
	final SimpleDateFormat TIMESTAMP_FORMAT = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");


	//-------------------- Attributes --------------------

    private int id;
    private int recipe_ingredients_id;

	//-------------------- Constructor --------------------

    public _old_recipe(
		int id, 
		int recipe_ingredients_id
		) {
        this.id = id;
		this.recipe_ingredients_id = recipe_ingredients_id;
    }

	//-------------------- Getter Methods --------------------

	/**
     * @return int
     */
     public int getId() { return this.id; }

	/**
     * @return int
     */
     public int getRecipe_ingredients_id() { return this.recipe_ingredients_id; }


	//-------------------- Setter Methods --------------------

	/**
     * @param value int(11)
     */
     public void setRecipe_ingredients_id(int value) { this.recipe_ingredients_id = value; }


	//-------------------- JSON Generation Methods --------------------

    /**
     * Specifies how objects of this class should be converted to JSON format.
     * @return String
     */
    public String toJSON() {
        return "\r\n{\r\n\t\"id\": " + this.id + ",\r\n\t\"recipe_ingredients_id\": " + this.recipe_ingredients_id + "\r\n}";
    }
    
    /**
     * Converts an array of _old_recipe objects to a JSON Array.
     * @param _old_recipe_array
     * @return String
     */
    public static String toJSONArray(_old_recipe [] _old_recipe_array) {
        StringBuilder strArray = new StringBuilder("[ ");
        for (final _old_recipe i : _old_recipe_array) {
            strArray.append(i.toJSON());
            strArray.append(", ");
        }
        strArray = new StringBuilder(strArray.substring(0, strArray.length() - 3));
        strArray.append("} ] ");
        return strArray.toString();
    }
    
    /**
     * Converts an ArrayList of _old_recipe objects to a JSON Array.
     * @param _old_recipe_arraylist ArrayList of _old_recipe to convert to JSON.
     * @return String
     */
    public static String toJSONArray(ArrayList<_old_recipe> _old_recipe_arraylist) {
        StringBuilder strArray = new StringBuilder("[ ");
        for (final _old_recipe i : _old_recipe_arraylist) {
            strArray.append(i.toJSON());
            strArray.append(", ");
        }
        strArray = new StringBuilder(strArray.substring(0, strArray.length() - 3));
        strArray.append("} ] ");
        return strArray.toString();
    }
    
    /**
     * Converts an Vector of _old_recipe objects to a JSON Array.
     * @param _old_recipe_vector Vector of _old_recipe to convert to JSON.
     * @return String
     */
    public static String toJSONArray(Vector<_old_recipe> _old_recipe_vector) {
        StringBuilder strArray = new StringBuilder("[ ");
        for (final _old_recipe i : _old_recipe_vector) {
            strArray.append(i.toJSON());
            strArray.append(", ");
        }
        strArray = new StringBuilder(strArray.substring(0, strArray.length() - 3));
        strArray.append("} ] ");
        return strArray.toString();
    }
    
    /**
     * Converts a List of _old_recipe objects to a JSON Array.
     * @param _old_recipe_list List of _old_recipe to convert to JSON.
     * @return String
     */
    public static String toJSONArray(List<_old_recipe> _old_recipe_list) {
        StringBuilder strArray = new StringBuilder("[ ");
        for (final _old_recipe i : _old_recipe_list) {
            strArray.append(i.toJSON());
            strArray.append(", ");
        }
        strArray = new StringBuilder(strArray.substring(0, strArray.length() - 3));
        strArray.append("} ] ");
        return strArray.toString();
    }
    
    @Override
    public String toString() {
        return toJSON();
    }

}

