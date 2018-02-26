


/**********************************************************************************/
/*** THIS FILE HAS BEEN AUTOMATICALLY GENERATED BY THE PANICKAPPS API GENERATOR ***/

/*                It is HIGHLY suggested that you do not edit this file.          */

//  DATABASE:     easybusiness
//  FILE:         _old_production.java
//  TABLE:        _old_production
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


class _old_production implements Serializable {


	//-------------------- Supporting Finals --------------------

	final SimpleDateFormat DATE_FORMAT = new SimpleDateFormat("yyyy-MM-dd");
	final SimpleDateFormat TIME_FORMAT = new SimpleDateFormat("HH:mm:ss");
	final SimpleDateFormat TIMESTAMP_FORMAT = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");


	//-------------------- Attributes --------------------

    private int id;
    private Date date;
    private int product_id;
    private int total_quantity;

	//-------------------- Constructor --------------------

    public _old_production(
		int id, 
		String date, 
		int product_id, 
		int total_quantity
		) {
        this.id = id;
		try { this.date = DATE_FORMAT.parse(date); }
		catch (ParseException e) { e.printStackTrace(); }
		this.product_id = product_id;
		this.total_quantity = total_quantity;
    }

	//-------------------- Getter Methods --------------------

	/**
     * @return int
     */
     public int getId() { return this.id; }

	/**
     * @return Date
     */
     public Date getDate() { return this.date; }

	/**
     * @return int
     */
     public int getProduct_id() { return this.product_id; }

	/**
     * @return int
     */
     public int getTotal_quantity() { return this.total_quantity; }


	//-------------------- Setter Methods --------------------

	/**
     * @param value date
     */
     public void setDate(Date value) { this.date = value; }

	/**
     * @param value int(11)
     */
     public void setProduct_id(int value) { this.product_id = value; }

	/**
     * @param value int(11)
     */
     public void setTotal_quantity(int value) { this.total_quantity = value; }


	//-------------------- JSON Generation Methods --------------------

    /**
     * Specifies how objects of this class should be converted to JSON format.
     * @return String
     */
    public String toJSON() {
        return "\r\n{\r\n\t\"id\": " + this.id + ",\r\n\t\"date\": \"" + this.date+ "\",\r\n\t\"product_id\": " + this.product_id + ",\r\n\t\"total_quantity\": " + this.total_quantity + "\r\n}";
    }
    
    /**
     * Converts an array of _old_production objects to a JSON Array.
     * @param _old_production_array
     * @return String
     */
    public static String toJSONArray(_old_production [] _old_production_array) {
        StringBuilder strArray = new StringBuilder("[ ");
        for (final _old_production i : _old_production_array) {
            strArray.append(i.toJSON());
            strArray.append(", ");
        }
        strArray = new StringBuilder(strArray.substring(0, strArray.length() - 3));
        strArray.append("} ] ");
        return strArray.toString();
    }
    
    /**
     * Converts an ArrayList of _old_production objects to a JSON Array.
     * @param _old_production_arraylist ArrayList of _old_production to convert to JSON.
     * @return String
     */
    public static String toJSONArray(ArrayList<_old_production> _old_production_arraylist) {
        StringBuilder strArray = new StringBuilder("[ ");
        for (final _old_production i : _old_production_arraylist) {
            strArray.append(i.toJSON());
            strArray.append(", ");
        }
        strArray = new StringBuilder(strArray.substring(0, strArray.length() - 3));
        strArray.append("} ] ");
        return strArray.toString();
    }
    
    /**
     * Converts an Vector of _old_production objects to a JSON Array.
     * @param _old_production_vector Vector of _old_production to convert to JSON.
     * @return String
     */
    public static String toJSONArray(Vector<_old_production> _old_production_vector) {
        StringBuilder strArray = new StringBuilder("[ ");
        for (final _old_production i : _old_production_vector) {
            strArray.append(i.toJSON());
            strArray.append(", ");
        }
        strArray = new StringBuilder(strArray.substring(0, strArray.length() - 3));
        strArray.append("} ] ");
        return strArray.toString();
    }
    
    /**
     * Converts a List of _old_production objects to a JSON Array.
     * @param _old_production_list List of _old_production to convert to JSON.
     * @return String
     */
    public static String toJSONArray(List<_old_production> _old_production_list) {
        StringBuilder strArray = new StringBuilder("[ ");
        for (final _old_production i : _old_production_list) {
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
