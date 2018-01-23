<?php


/**********************************************************************************/
/*** THIS FILE HAS BEEN AUTOMATICALLY GENERATED BY THE PANICKAPPS API GENERATOR ***/

/*                It is HIGHLY suggested that you do not edit this file.          */

//  DATABASE:     Nicos
//  FILE:         API/create/index.php
//  TABLE:        users
//  DATETIME:     2018-01-23 10:36:49pm
//  DESCRIPTION:  N/A

/**********************************************************************************/
			


                
/*
        ~~~~~~ API Endpoint Instructions ~~~~~~
        
        This endpoint is public and requires no authorization.
        
        Sample call for API/Users/Create:

            API/Users/Create?UserID...&Username...&Password...&UserLevelID...

        /----------------------------------------------------------------/

        User Types/Levels who can access this endpoint:
         Administrator (1), Manager(2), Public(4), User(3)

        Call Parameters List:
        
		UserID (int)
		Username (String)
		Password (String)
		UserLevelID (int)

        /----------------------------------------------------------------/


        This endpoint responds with JSON data in the following ways.

        Response Format:

        1) Response OK

            --> "Status": "OK"
            --> "Title": "Item added."
            --> "Message": "Item added successfully."

        2) Response ERROR
        
            --> "Status": "Error"
            --> "Title": "Item exists."
            --> "Message": "The item you tried to create already exists."

                (Invalid parameters)

            --> "Status": "Error"
            --> "Title": "Invalid Parameters"
            --> "Message": "Invalid parameters. Expected Parameters: UserID (int), Username (String), Password (String), UserLevelID (int)."

                (Technical error)

            --> "Status": "Error"
            --> "Title": "Technical Error"
            --> "Message": "A technical error has occured. Please consult the system's administrator."

                (Invalid identification)

            --> "Status": "Error"
            --> "Title": "Authorization Error"
            --> "Message": "You are not authorized to access this procedure. If you think you should be able to do so, please consult your system's administrator."

    */
                
                
                
    
    //The onRequest() function is called once all security constraints are passed and all parameters have been verified.
    //Important Notice: This function has been automatically generated based on your database.
    //Editing this function is OK, but not recommended.                              
    function onRequest() {
        $JSON_ADD_SUCCESS = array(STATUS => STATUS_OK, TITLE => CREATE_SUCCESS_TITLE, MESSAGE => CREATE_SUCCESS_MESSAGE);
        $JSON_ADD_ERROR = array(STATUS => STATUS_ERROR, TITLE => CREATE_ERROR_TITLE, MESSAGE => CREATE_ERROR_MESSAGE);
        $JSON_EXISTS_ERROR = array(STATUS => STATUS_ERROR, TITLE => "Item exists.", MESSAGE => "The item you tried to create already exists."); 
        
        include_once("../../../Scripts/Entity Classes/PHP/Users.php");
        $object = new Users($_POST["UserID"], $_POST["Username"], $_POST["Password"], $_POST["UserLevelID"]);
        $result = Users::create($object);
        if ($result) die(json_encode($JSON_ADD_SUCCESS));
        else {
            if (Users::$hasUniqueFields) die(json_encode($JSON_EXISTS_ERROR));
            else die (json_encode($JSON_ADD_ERROR));
        }
    }
    
    /*!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! DO NOT EDIT CODE BELOW THIS POINT !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!*/
    //Editing the code below will compromise the reliability and security of your API.
    
    
    //Locals:
    const ENDPOINT_NAME = "API/Users/Create";
                
    //Statuses:
    const STATUS_ERROR = "Error";
    const STATUS_OK = "OK";

    //Titles/Messages:
    const STATUS = "Status";
    const TITLE = "Title";
    const MESSAGE = "Message";
    const DATA = "Data";
    const INVALID_PARAMS_TITLE = "Invalid Parameters";
    const INVALID_PARAMS_MESSAGE = "Invalid parameters. Expected Parameters: UserID (int), Username (String), Password (String), UserLevelID (int).";
    const TECHNICAL_ERROR_TITLE = "Technical Error";
    const TECHNICAL_ERROR_MESSAGE = "A technical error has occured. Please consult the system's administrator.";
    const AUTHORIZATION_ERROR_TITLE = "Authorization Error";
    const AUTHORIZATION_ERROR_MESSAGE = "You are not authorized to access this procedure. If you think you should be able to do so, please consult your system's administrator.";
    const CREATE_SUCCESS_TITLE = "Item added.";
    const CREATE_SUCCESS_MESSAGE = "Item added successfully.";
    const CREATE_ERROR_TITLE = "Item add failed.";
    const CREATE_ERROR_MESSAGE = "Failed to add item.";
    

    //JSON returns:
    $JSON_INVALID_PARAMS = array(STATUS => STATUS_ERROR, TITLE => INVALID_PARAMS_TITLE, MESSAGE => INVALID_PARAMS_MESSAGE);
    $JSON_TECHNICAL_ERROR = array(STATUS => STATUS_ERROR, TITLE => TECHNICAL_ERROR_TITLE, MESSAGE => TECHNICAL_ERROR_MESSAGE);
    $JSON_AUTHORIZATION_ERROR = array(STATUS => STATUS_ERROR, TITLE => AUTHORIZATION_ERROR_TITLE, MESSAGE => AUTHORIZATION_ERROR_MESSAGE);
    

	//-- PARAMETER CHECKS

	if (!isset($_POST["UserID"]) || $_POST["UserID"] == "") die(json_encode($JSON_INVALID_PARAMS));
	if (!isset($_POST["Username"]) || $_POST["Username"] == "") die(json_encode($JSON_INVALID_PARAMS));
	if (!isset($_POST["Password"]) || $_POST["Password"] == "") die(json_encode($JSON_INVALID_PARAMS));
	if (!isset($_POST["UserLevelID"]) || $_POST["UserLevelID"] == "") die(json_encode($JSON_INVALID_PARAMS));
	include_once("../../../Scripts/DBLogin.php");

	onRequest(); 

?>