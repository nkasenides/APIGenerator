<?php


/**********************************************************************************/
/*** THIS FILE HAS BEEN AUTOMATICALLY GENERATED BY THE PANICKAPPS API GENERATOR ***/

/*                It is HIGHLY suggested that you do not edit this file.          */

//  DATABASE:     easybusiness
//  FILE:         API/create/index.php
//  TABLE:        _old_products
//  DATETIME:     2018-01-25 01:22:22pm
//  DESCRIPTION:  N/A

/**********************************************************************************/
			


                
/*
        ~~~~~~ API Endpoint Instructions ~~~~~~
        
        This endpoint is not public and requires a Session ID to be provided for authorization.
        
        Sample call for API/_old_products/Create:

            API/_old_products/Create?Id...&Name...&Price...&Product_type_id...&Bar_code...&Best_before_range...&Recipe_id...&SessionID=...

        /----------------------------------------------------------------/

        User Types/Levels who can access this endpoint:
         Administrator (1), Manager(2), Employee(6), Delivery(7)

        Call Parameters List:
        
		Id (int)
		Name (String)
		Price (double)
		Product_type_id (int)
		Bar_code (String)
		Best_before_range (int)
		Recipe_id (int)
		SessionID (String)

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
            --> "Message": "Invalid parameters. Expected Parameters: Id (int), Name (String), Price (double), Product_type_id (int), Bar_code (String), Best_before_range (int), Recipe_id (int), SessionID (String)"

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
        
        include_once("../../../Scripts/Entity Classes/PHP/_old_products.php");
        $object = new _old_products($_POST["Id"], $_POST["Name"], $_POST["Price"], $_POST["Product_type_id"], $_POST["Bar_code"], $_POST["Best_before_range"], $_POST["Recipe_id"]);
        $result = _old_products::create($object);
        if ($result) die(json_encode($JSON_ADD_SUCCESS));
        else {
            if (_old_products::$hasUniqueFields) die(json_encode($JSON_EXISTS_ERROR));
            else die (json_encode($JSON_ADD_ERROR));
        }
    }
    
    /*!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! DO NOT EDIT CODE BELOW THIS POINT !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!*/
    //Editing the code below will compromise the reliability and security of your API.
    
    
    //Locals:
    const ENDPOINT_NAME = "API/_old_products/Create";
                
    //Statuses:
    const STATUS_ERROR = "Error";
    const STATUS_OK = "OK";

    //Titles/Messages:
    const STATUS = "Status";
    const TITLE = "Title";
    const MESSAGE = "Message";
    const DATA = "Data";
    const INVALID_PARAMS_TITLE = "Invalid Parameters";
    const INVALID_PARAMS_MESSAGE = "Invalid parameters. Expected Parameters: Id (int), Name (String), Price (double), Product_type_id (int), Bar_code (String), Best_before_range (int), Recipe_id (int), SessionID (String)";
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

	if (!isset($_POST["Id"]) || $_POST["Id"] == "") die(json_encode($JSON_INVALID_PARAMS));
	if (!isset($_POST["Name"]) || $_POST["Name"] == "") die(json_encode($JSON_INVALID_PARAMS));
	if (!isset($_POST["Price"]) || $_POST["Price"] == "") die(json_encode($JSON_INVALID_PARAMS));
	if (!isset($_POST["Product_type_id"]) || $_POST["Product_type_id"] == "") die(json_encode($JSON_INVALID_PARAMS));
	if (!isset($_POST["Bar_code"]) || $_POST["Bar_code"] == "") die(json_encode($JSON_INVALID_PARAMS));
	if (!isset($_POST["Best_before_range"]) || $_POST["Best_before_range"] == "") die(json_encode($JSON_INVALID_PARAMS));
	if (!isset($_POST["Recipe_id"]) || $_POST["Recipe_id"] == "") die(json_encode($JSON_INVALID_PARAMS));
	if (!isset($_POST["SessionID"]) || $_POST["SessionID"] == "") die(json_encode($JSON_INVALID_PARAMS));
	include_once("../../../Scripts/DBLogin.php");
     
	//-- SECURITY CHECKS

    //Allowed user levels:
    $allowedUserLevelIDs = array(1, 2, 6, 7);

    //Validate session if a session is required (not public)
    $sessionID = $_POST["SessionID"];
    $conn = dbLogin();
    $sqlSessions = "SELECT * FROM Sessions WHERE SessionID = '" . $sessionID . "'";
    $result = $conn->query($sqlSessions);
    if ($result === FALSE) die(json_encode($JSON_AUTHORIZATION_ERROR));
    else {
        $session = $result->fetch_object();
        if (!$session) die(json_encode($JSON_AUTHORIZATION_ERROR));
        $sqlGetUser = "SELECT UserLevelID FROM Users WHERE UserID = " . $session->UserID;
        $result = $conn->query($sqlGetUser);
        $user = $result->fetch_object();
        $allowed = false;
        foreach ($allowedUserLevelIDs as $id) {
            if ($user->UserLevelID == $id) {
                $allowed = true; break;
            }//end if match
        }//end foreach UserLevelID
        if (!$allowed) die(json_encode($JSON_AUTHORIZATION_ERROR));
    }//end if session found
    $conn->close();
    

	onRequest(); 

?>