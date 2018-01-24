<?php


/**********************************************************************************/
/*** THIS FILE HAS BEEN AUTOMATICALLY GENERATED BY THE PANICKAPPS API GENERATOR ***/

/*                It is HIGHLY suggested that you do not edit this file.          */

//  DATABASE:     TestDB
//  FILE:         API/getSize/index.php
//  TABLE:        userlevels
//  DATETIME:     2018-01-24 01:49:01pm
//  DESCRIPTION:  N/A

/**********************************************************************************/
			


                
/*
        ~~~~~~ API Endpoint Instructions ~~~~~~
        
        This endpoint is not public and requires a Session ID to be provided for authorization.
        
        Sample call for API/Userlevels/GetSize:

            API/Userlevels/GetSize?SessionID=...

        /----------------------------------------------------------------/

        User Types/Levels who can access this endpoint:
         Administrator (1)

        Call Parameters List:
        
		SessionID (String)

        /----------------------------------------------------------------/


        This endpoint responds with JSON data in the following ways.

        Response Format:

        1) Response OK

            --> "Status": "OK"
            --> "Title": "Size retrieved.";
            --> "Message": "Size of specified table-type retrieved successfully.";

        2) Response ERROR
        
            --> "Status": "Error"
            --> "Title": "Size retrieval failed.";
            --> "Message": "Failed to retrieve table-type size.";

                (Invalid parameters)

            --> "Status": "Error"
            --> "Title": "Invalid Parameters"
            --> "Message": "Invalid parameters. Expected Parameters: SessionID (String)"

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
        $JSON_GETSIZE_ERROR = array(STATUS => STATUS_ERROR, TITLE => GETSIZE_ERROR_TITLE, MESSAGE => GETSIZE_ERROR_MESSAGE);
        $JSON_GETSIZE_SUCCESS = array(STATUS => STATUS_OK, TITLE => GETSIZE_SUCCESS_TITLE, MESSAGE => GETSIZE_SUCCESS_MESSAGE);    
           
        include_once("../../../Scripts/Entity Classes/PHP/Userlevels.php");
;
        $result = Userlevels::getSize();
        if ($result !== false) {
        
            $returnArray = $JSON_GETSIZE_SUCCESS;
            $statusJson = json_encode($returnArray);
            $statusJson = substr($statusJson, 0, strlen($statusJson) - 1);
            $objectData = ", \"Size\": " .$result. "}";
            $combinedReturn = $statusJson . $objectData;
            die ($combinedReturn);
        }
        else die (json_encode($JSON_GETSIZE_ERROR));
    }
    
    /*!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! DO NOT EDIT CODE BELOW THIS POINT !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!*/
    //Editing the code below will compromise the reliability and security of your API.
    
    
    //Locals:
    const ENDPOINT_NAME = "API/Userlevels/GetSize";
                
    //Statuses:
    const STATUS_ERROR = "Error";
    const STATUS_OK = "OK";

    //Titles/Messages:
    const STATUS = "Status";
    const TITLE = "Title";
    const MESSAGE = "Message";
    const DATA = "Data";
    const INVALID_PARAMS_TITLE = "Invalid Parameters";
    const INVALID_PARAMS_MESSAGE = "Invalid parameters. Expected Parameters: SessionID (String)";
    const TECHNICAL_ERROR_TITLE = "Technical Error";
    const TECHNICAL_ERROR_MESSAGE = "A technical error has occured. Please consult the system's administrator.";
    const AUTHORIZATION_ERROR_TITLE = "Authorization Error";
    const AUTHORIZATION_ERROR_MESSAGE = "You are not authorized to access this procedure. If you think you should be able to do so, please consult your system's administrator.";
    const GETSIZE_SUCCESS_TITLE = "Size retrieved.";
    const GETSIZE_SUCCESS_MESSAGE = "Size of specified table-type retrieved successfully.";
    const GETSIZE_ERROR_TITLE = "Size retrieval failed.";
    const GETSIZE_ERROR_MESSAGE = "Failed to retrieve table-type size.";
    

    //JSON returns:
    $JSON_INVALID_PARAMS = array(STATUS => STATUS_ERROR, TITLE => INVALID_PARAMS_TITLE, MESSAGE => INVALID_PARAMS_MESSAGE);
    $JSON_TECHNICAL_ERROR = array(STATUS => STATUS_ERROR, TITLE => TECHNICAL_ERROR_TITLE, MESSAGE => TECHNICAL_ERROR_MESSAGE);
    $JSON_AUTHORIZATION_ERROR = array(STATUS => STATUS_ERROR, TITLE => AUTHORIZATION_ERROR_TITLE, MESSAGE => AUTHORIZATION_ERROR_MESSAGE);
    

	//-- PARAMETER CHECKS

	if (!isset($_POST["SessionID"]) || $_POST["SessionID"] == "") die(json_encode($JSON_INVALID_PARAMS));
	include_once("../../../Scripts/DBLogin.php");
     
	//-- SECURITY CHECKS

    //Allowed user levels:
    $allowedUserLevelIDs = array(1);

    //Validate session if a session is required (not public)
    $sessionID = $_POST["SessionID"];
    $conn = dbLogin();
    $sqlSessions = "SELECT * FROM Sessions WHERE SessionID = '" . $sessionID . "'";
    $result = $conn->query($sqlSessions);
    if ($result->num_rows <= 0) die(json_encode($JSON_AUTHORIZATION_ERROR));
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