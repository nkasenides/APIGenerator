<?php


/**********************************************************************************/
/*** THIS FILE HAS BEEN AUTOMATICALLY GENERATED BY THE PANICKAPPS API GENERATOR ***/

/*                It is HIGHLY suggested that you do not edit this file.          */

//  DATABASE:     easybusiness
//  FILE:         API/searchByField/index.php
//  TABLE:        productionbatches
//  DATETIME:     2018-01-25 01:22:22pm
//  DESCRIPTION:  N/A

/**********************************************************************************/
			


                
/*
        ~~~~~~ API Endpoint Instructions ~~~~~~
        
        This endpoint is not public and requires a Session ID to be provided for authorization.
        
        Sample call for API/Productionbatches/SearchByField:

            API/Productionbatches/SearchByField?Fields=...Values=...&SessionID=...

        /----------------------------------------------------------------/

        User Types/Levels who can access this endpoint:
         Administrator (1), Manager(2), Employee(6), Delivery(7)

        Call Parameters List:
        
		Fields (String list)
		Values (Mixed type list)
		SessionID (String)

        /----------------------------------------------------------------/


        This endpoint responds with JSON data in the following ways.

        Response Format:

        1) Response OK

            --> "Status": "OK"
            --> "Title": "Item(s) retrieved."
            --> "Message": "Item(s) retrieved successfully."

        2) Response ERROR
        
                (No items)
        
            --> "Status": "Error"
            --> "Title": "Failed to retrieve item(s)."
            --> "Message": "Failed to retrieve item(s). Make sure that all your fields are correctly formatted and match their corresponding values."
            
                (Fields and Values size mismatch)
                
            --> "Status": "Error"
            --> "Title": "Size mismatch."
            --> "Message": "The size of the fields list and values list is not the same. Please make sure you correctly format your call."
            
                (Invalid field name)
                
            --> "Status": "Error"
            --> "Title": "Invalid Field found."
            --> "Message": "Your call contains a field that does not exist for this class."

                (Invalid parameters)

            --> "Status": "Error"
            --> "Title": "Invalid Parameters"
            --> "Message": "Invalid parameters. Expected Parameters: Fields (String list), Values (Mixed type list)SessionID (String)"

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
        $JSON_BYFIELD_SUCCESS = array(STATUS => STATUS_OK, TITLE => BYFIELD_SUCCESS_TITLE, MESSAGE => BYFIELD_SUCCESS_MESSAGE);
        $JSON_BYFIELD_ERROR = array(STATUS => STATUS_ERROR, TITLE => BYFIELD_ERROR_TITLE, MESSAGE => BYFIELD_ERROR_MESSAGE);
        $JSON_SIZE_MISMATCH = array(STATUS => STATUS_ERROR, TITLE => BYFIELD_SIZE_MISMATCH_TITLE, MESSAGE => BYFIELD_SIZE_MISMATCH_MESSAGE);
        $JSON_NO_ITEMS = array(STATUS => STATUS_ERROR, TITLE => "No items found.", MESSAGE => "Your call has return 0 results.");
        $JSON_INVALID_FIELDS = array(STATUS => STATUS_ERROR, TITLE => "Invalid field found.", MESSAGE => "Your call contains a field that does not exist for this class.");
        
        include_once("../../../Scripts/Entity Classes/PHP/Productionbatches.php");
        
        $fieldsArray = explode(",", $_POST["Fields"]);
        $valuesArray = explode(",", $_POST["Values"]);
        
        if (sizeof($fieldsArray) != sizeof($valuesArray)) die(json_encode($JSON_SIZE_MISMATCH));
        
        $assocArray = array();
        
        foreach ($fieldsArray as $field) {
            $exists = false;
            foreach (Productionbatches::$allFields as $classField) {
                if (strtolower($field) == strtolower($classField)) {
                    $exists = true;
                    break;
                }   
            }
            if (!$exists) die(json_encode($JSON_INVALID_FIELDS));
        }
        
        for ($i = 0; $i < sizeof($fieldsArray); $i++) {
            $field = $fieldsArray[$i];
            $value = $valuesArray[$i];
            $assocArray[$field] = $value;
        }
        
        $objects = Productionbatches::searchByFields($assocArray);
        
        if (!$objects) die(json_encode($JSON_BYFIELD_ERROR));
        if (sizeof($objects) <= 0) die(json_encode($JSON_NO_ITEMS));
        
        $returnArray = $JSON_BYFIELD_SUCCESS;
        $statusJson = json_encode($returnArray);
        $statusJson = substr($statusJson, 0, strlen($statusJson) - 1);
        $objectData = ", \"Data\": " . Productionbatches::toJSONArray($objects) . "}";
        $combinedReturn = $statusJson . $objectData;
        die ($combinedReturn);
    }
    
    /*!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! DO NOT EDIT CODE BELOW THIS POINT !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!*/
    //Editing the code below will compromise the reliability and security of your API.
    
    
    //Locals:
    const ENDPOINT_NAME = "API/Productionbatches/SearchByField";
                
    //Statuses:
    const STATUS_ERROR = "Error";
    const STATUS_OK = "OK";

    //Titles/Messages:
    const STATUS = "Status";
    const TITLE = "Title";
    const MESSAGE = "Message";
    const DATA = "Data";
    const INVALID_PARAMS_TITLE = "Invalid Parameters";
    const INVALID_PARAMS_MESSAGE = "Invalid parameters. Expected Parameters: Fields (String list), Values (Mixed type list)SessionID (String)";
    const TECHNICAL_ERROR_TITLE = "Technical Error";
    const TECHNICAL_ERROR_MESSAGE = "A technical error has occured. Please consult the system's administrator.";
    const AUTHORIZATION_ERROR_TITLE = "Authorization Error";
    const AUTHORIZATION_ERROR_MESSAGE = "You are not authorized to access this procedure. If you think you should be able to do so, please consult your system's administrator.";
    const BYFIELD_SUCCESS_TITLE = "Item(s) retrieved.";
    const BYFIELD_SUCCESS_MESSAGE = "Item(s) retrieved successfully.";
    const BYFIELD_ERROR_TITLE = "Failed to retrieve item(s).";
    const BYFIELD_ERROR_MESSAGE = "Failed to retrieve item(s). Make sure that all your fields are correctly formatted and match their corresponding values.";
    const BYFIELD_SIZE_MISMATCH_TITLE = "Size mismatch.";
    const BYFIELD_SIZE_MISMATCH_MESSAGE = "The size of the fields list and values list is not the same. Please make sure you correctly format your call.";
    

    //JSON returns:
    $JSON_INVALID_PARAMS = array(STATUS => STATUS_ERROR, TITLE => INVALID_PARAMS_TITLE, MESSAGE => INVALID_PARAMS_MESSAGE);
    $JSON_TECHNICAL_ERROR = array(STATUS => STATUS_ERROR, TITLE => TECHNICAL_ERROR_TITLE, MESSAGE => TECHNICAL_ERROR_MESSAGE);
    $JSON_AUTHORIZATION_ERROR = array(STATUS => STATUS_ERROR, TITLE => AUTHORIZATION_ERROR_TITLE, MESSAGE => AUTHORIZATION_ERROR_MESSAGE);
    

	//-- PARAMETER CHECKS

	if (!isset($_POST["Fields"]) || $_POST["Fields"] == "") die(json_encode($JSON_INVALID_PARAMS));
	if (!isset($_POST["Values"]) || $_POST["Values"] == "") die(json_encode($JSON_INVALID_PARAMS));
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