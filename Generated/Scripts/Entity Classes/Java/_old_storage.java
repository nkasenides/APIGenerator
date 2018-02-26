


/**********************************************************************************/
/*** THIS FILE HAS BEEN AUTOMATICALLY GENERATED BY THE PANICKAPPS API GENERATOR ***/

/*                It is HIGHLY suggested that you do not edit this file.          */

//  DATABASE:     easybusiness
//  FILE:         _old_storage.java
//  TABLE:        _old_storage
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


class _old_storage implements Serializable {


	//-------------------- Supporting Finals --------------------

	final SimpleDateFormat DATE_FORMAT = new SimpleDateFormat("yyyy-MM-dd");
	final SimpleDateFormat TIME_FORMAT = new SimpleDateFormat("HH:mm:ss");
	final SimpleDateFormat TIMESTAMP_FORMAT = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");


	//-------------------- Attributes --------------------

    private int id;
    private String name;
    private int storage_type_id;
    private int quantity_type_id;
    private double quantity;
    private  price;

	//-------------------- Constructor --------------------

    public _old_storage(
		int id, 
		String name, 
		int storage_type_id, 
		int quantity_type_id, 
		double quantity, 
		 price
		) {
        this.id = id;
		this.name = name;
		this.storage_type_id = storage_type_id;
		this.quantity_type_id = quantity_type_id;
		this.quantity = quantity;
		this.price = price;
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
     * @return int
     */
     public int getStorage_type_id() { return this.storage_type_id; }

	/**
     * @return int
     */
     public int getQuantity_type_id() { return this.quantity_type_id; }

	/**
     * @return double
     */
     public double getQuantity() { return this.quantity; }

	/**
     * @return 
     */
     public  getPrice() { return this.price; }


	//-------------------- Setter Methods --------------------

	/**
     * @param value varchar(255)
     */
     public void setName(String value) { this.name = value; }

	/**
     * @param value int(11)
     */
     public void setStorage_type_id(int value) { this.storage_type_id = value; }

	/**
     * @param value int(11)
     */
     public void setQuantity_type_id(int value) { this.quantity_type_id = value; }

	/**
     * @param value double
     */
     public void setQuantity(double value) { this.quantity = value; }

	/**
     * @param value double(10,2)
     */
     public void setPrice( value) { this.price = value; }


	//-------------------- JSON Generation Methods --------------------

    /**
     * Specifies how objects of this class should be converted to JSON format.
     * @return String
     */
    public String toJSON() {
        return "\r\n{\r\n\t\"id\": " + this.id + ",\r\n\t\"name\": \"" + this.name+ "\",\r\n\t\"storage_type_id\": " + this.storage_type_id + ",\r\n\t\"quantity_type_id\": " + this.quantity_type_id + ",\r\n\t\"quantity\": " + this.quantity + ",\r\n\t\"price\": " + this.price + "\r\n}";
    }
    
    /**
     * Converts an array of _old_storage objects to a JSON Array.
     * @param _old_storage_array
     * @return String
     */
    public static String toJSONArray(_old_storage [] _old_storage_array) {
        StringBuilder strArray = new StringBuilder("[ ");
        for (final _old_storage i : _old_storage_array) {
            strArray.append(i.toJSON());
            strArray.append(", ");
        }
        strArray = new StringBuilder(strArray.substring(0, strArray.length() - 3));
        strArray.append("} ] ");
        return strArray.toString();
    }
    
    /**
     * Converts an ArrayList of _old_storage objects to a JSON Array.
     * @param _old_storage_arraylist ArrayList of _old_storage to convert to JSON.
     * @return String
     */
    public static String toJSONArray(ArrayList<_old_storage> _old_storage_arraylist) {
        StringBuilder strArray = new StringBuilder("[ ");
        for (final _old_storage i : _old_storage_arraylist) {
            strArray.append(i.toJSON());
            strArray.append(", ");
        }
        strArray = new StringBuilder(strArray.substring(0, strArray.length() - 3));
        strArray.append("} ] ");
        return strArray.toString();
    }
    
    /**
     * Converts an Vector of _old_storage objects to a JSON Array.
     * @param _old_storage_vector Vector of _old_storage to convert to JSON.
     * @return String
     */
    public static String toJSONArray(Vector<_old_storage> _old_storage_vector) {
        StringBuilder strArray = new StringBuilder("[ ");
        for (final _old_storage i : _old_storage_vector) {
            strArray.append(i.toJSON());
            strArray.append(", ");
        }
        strArray = new StringBuilder(strArray.substring(0, strArray.length() - 3));
        strArray.append("} ] ");
        return strArray.toString();
    }
    
    /**
     * Converts a List of _old_storage objects to a JSON Array.
     * @param _old_storage_list List of _old_storage to convert to JSON.
     * @return String
     */
    public static String toJSONArray(List<_old_storage> _old_storage_list) {
        StringBuilder strArray = new StringBuilder("[ ");
        for (final _old_storage i : _old_storage_list) {
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

