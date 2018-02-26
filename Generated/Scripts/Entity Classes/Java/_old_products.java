


/**********************************************************************************/
/*** THIS FILE HAS BEEN AUTOMATICALLY GENERATED BY THE PANICKAPPS API GENERATOR ***/

/*                It is HIGHLY suggested that you do not edit this file.          */

//  DATABASE:     easybusiness
//  FILE:         _old_products.java
//  TABLE:        _old_products
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


class _old_products implements Serializable {


	//-------------------- Supporting Finals --------------------

	final SimpleDateFormat DATE_FORMAT = new SimpleDateFormat("yyyy-MM-dd");
	final SimpleDateFormat TIME_FORMAT = new SimpleDateFormat("HH:mm:ss");
	final SimpleDateFormat TIMESTAMP_FORMAT = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");


	//-------------------- Attributes --------------------

    private int id;
    private String name;
    private double price;
    private int product_type_id;
    private String bar_code;
    private int best_before_range;
    private int recipe_id;

	//-------------------- Constructor --------------------

    public _old_products(
		int id, 
		String name, 
		double price, 
		int product_type_id, 
		String bar_code, 
		int best_before_range, 
		int recipe_id
		) {
        this.id = id;
		this.name = name;
		this.price = price;
		this.product_type_id = product_type_id;
		this.bar_code = bar_code;
		this.best_before_range = best_before_range;
		this.recipe_id = recipe_id;
    }

	//-------------------- Getter Methods --------------------

	/**
     * @return int
     */
     public int getId() { return this.id; }

	/**
     * @return String
     */
     public String getName() { return this.name; }

	/**
     * @return double
     */
     public double getPrice() { return this.price; }

	/**
     * @return int
     */
     public int getProduct_type_id() { return this.product_type_id; }

	/**
     * @return String
     */
     public String getBar_code() { return this.bar_code; }

	/**
     * @return int
     */
     public int getBest_before_range() { return this.best_before_range; }

	/**
     * @return int
     */
     public int getRecipe_id() { return this.recipe_id; }


	//-------------------- Setter Methods --------------------

	/**
     * @param value varchar(255)
     */
     public void setName(String value) { this.name = value; }

	/**
     * @param value double
     */
     public void setPrice(double value) { this.price = value; }

	/**
     * @param value int(11)
     */
     public void setProduct_type_id(int value) { this.product_type_id = value; }

	/**
     * @param value varchar(255)
     */
     public void setBar_code(String value) { this.bar_code = value; }

	/**
     * @param value int(11)
     */
     public void setBest_before_range(int value) { this.best_before_range = value; }

	/**
     * @param value int(11)
     */
     public void setRecipe_id(int value) { this.recipe_id = value; }


	//-------------------- JSON Generation Methods --------------------

    /**
     * Specifies how objects of this class should be converted to JSON format.
     * @return String
     */
    public String toJSON() {
        return "\r\n{\r\n\t\"id\": " + this.id + ",\r\n\t\"name\": \"" + this.name+ "\",\r\n\t\"price\": " + this.price + ",\r\n\t\"product_type_id\": " + this.product_type_id + ",\r\n\t\"bar_code\": \"" + this.bar_code+ "\",\r\n\t\"best_before_range\": " + this.best_before_range + ",\r\n\t\"recipe_id\": " + this.recipe_id + "\r\n}";
    }
    
    /**
     * Converts an array of _old_products objects to a JSON Array.
     * @param _old_products_array
     * @return String
     */
    public static String toJSONArray(_old_products [] _old_products_array) {
        StringBuilder strArray = new StringBuilder("[ ");
        for (final _old_products i : _old_products_array) {
            strArray.append(i.toJSON());
            strArray.append(", ");
        }
        strArray = new StringBuilder(strArray.substring(0, strArray.length() - 3));
        strArray.append("} ] ");
        return strArray.toString();
    }
    
    /**
     * Converts an ArrayList of _old_products objects to a JSON Array.
     * @param _old_products_arraylist ArrayList of _old_products to convert to JSON.
     * @return String
     */
    public static String toJSONArray(ArrayList<_old_products> _old_products_arraylist) {
        StringBuilder strArray = new StringBuilder("[ ");
        for (final _old_products i : _old_products_arraylist) {
            strArray.append(i.toJSON());
            strArray.append(", ");
        }
        strArray = new StringBuilder(strArray.substring(0, strArray.length() - 3));
        strArray.append("} ] ");
        return strArray.toString();
    }
    
    /**
     * Converts an Vector of _old_products objects to a JSON Array.
     * @param _old_products_vector Vector of _old_products to convert to JSON.
     * @return String
     */
    public static String toJSONArray(Vector<_old_products> _old_products_vector) {
        StringBuilder strArray = new StringBuilder("[ ");
        for (final _old_products i : _old_products_vector) {
            strArray.append(i.toJSON());
            strArray.append(", ");
        }
        strArray = new StringBuilder(strArray.substring(0, strArray.length() - 3));
        strArray.append("} ] ");
        return strArray.toString();
    }
    
    /**
     * Converts a List of _old_products objects to a JSON Array.
     * @param _old_products_list List of _old_products to convert to JSON.
     * @return String
     */
    public static String toJSONArray(List<_old_products> _old_products_list) {
        StringBuilder strArray = new StringBuilder("[ ");
        for (final _old_products i : _old_products_list) {
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

