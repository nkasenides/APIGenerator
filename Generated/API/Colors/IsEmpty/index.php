<?php


/**********************************************************************************/
/*** THIS FILE HAS BEEN AUTOMATICALLY GENERATED BY THE PANICKAPPS API GENERATOR ***/

/*                It is HIGHLY suggested that you do not edit this file.          */

//  DATABASE:     TestDB
//  FILE:         API/isEmpty/index.php
//  TABLE:        colors
//  DATETIME:     2018-01-24 01:49:01pm
//  DESCRIPTION:  N/A

/**********************************************************************************/
			


                
/*
        ~~~~~~ API Endpoint Instructions ~~~~~~
        
        This endpoint is public and requires no authorization.
        
        Sample call for API/Colors/IsEmpty:

            API/Colors/IsEmpty

        /----------------------------------------------------------------/

        User Types/Levels who can access this endpoint:
         Administrator (1), Manager(2), Public(4), User(3)

        Call Parameters List:
        

        /----------------------------------------------------------------/


        This endpoint responds with JSON data in the following ways.

        Response Format:

        1) Response OK

            --> "Status": "OK"
            --> "Title": "Table-Type empty.";
            --> "Message": "The table-type is empty.";

        2) Response ERROR
        
            --> "Status": "Error"
            --> "Title": "Failed.";
            --> "Message": "Failed to retrieve if table-type is empty.";

                (Invalid parameters)

            --> "Status": "Error"
            --> "Title": "Invalid Parameters"
            --> "Message": "Invalid parameters. Expected Parameters: ."

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
        $JSON_ISEMPTY_ERROR = array(STATUS => STATUS_ERROR, TITLE => ISEMPTY_ERROR_TITLE, MESSAGE => ISEMPTY_ERROR_MESSAGE);
        $JSON_ISEMPTY_SUCCESS = array(STATUS => STATUS_OK, TITLE => ISEMPTY_SUCCESS_TITLE, MESSAGE => ISEMPTY_SUCCESS_MESSAGE);    
           
        include_once("../../../Scripts/Entity Classes/PHP/Colors.php");
;
        $result = Colors::getSize();
       
        if ($result === false) die(json_encode($JSON_ISEMPTY_ERROR));
        
        if ($result == 0) {
            $returnArray = $JSON_ISEMPTY_SUCCESS;
            $statusJson = json_encode($returnArray);
            $statusJson = substr($statusJson, 0, strlen($statusJson) - 1);
            $objectData = ", \"IsEmpty\": true }";
            $combinedReturn = $statusJson . $objectData;
            die ($combinedReturn);
        }
        else {
            $returnArray = $JSON_ISEMPTY_SUCCESS;
            $statusJson = json_encode($returnArray);
            $statusJson = substr($statusJson, 0, strlen($statusJson) - 1);
            $objectData = ", \"IsEmpty\": false }";
            $combinedReturn = $statusJson . $objectData;
            die ($combinedReturn);
        }
    }
    
    /*!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! DO NOT EDIT CODE BELOW THIS POINT !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!*/
    //Editing the code below will compromise the reliability and security of your API.
    
    
    //Locals:
    const ENDPOINT_NAME = "API/Colors/IsEmpty";
                
    //Statuses:
    const STATUS_ERROR = "Error";
    const STATUS_OK = "OK";

    //Titles/Messages:
    const STATUS = "Status";
    const TITLE = "Title";
    const MESSAGE = "Message";
    const DATA = "Data";
    const INVALID_PARAMS_TITLE = "Invalid Parameters";
    const INVALID_PARAMS_MESSAGE = "Invalid parameters. Expected Parameters: .";
    const TECHNICAL_ERROR_TITLE = "Technical Error";
    const TECHNICAL_ERROR_MESSAGE = "A technical error has occured. Please consult the system's administrator.";
    const AUTHORIZATION_ERROR_TITLE = "Authorization Error";
    const AUTHORIZATION_ERROR_MESSAGE = "You are not authorized to access this procedure. If you think you should be able to do so, please consult your system's administrator.";
    const ISEMPTY_SUCCESS_TITLE = "Table-Type empty.";
    const ISEMPTY_SUCCESS_MESSAGE = "The table-type is empty.";
    const ISEMPTY_ERROR_TITLE = "Failed.";
    const ISEMPTY_ERROR_MESSAGE = "Failed to retrieve if table-type is empty.";
    

    //JSON returns:
    $JSON_INVALID_PARAMS = array(STATUS => STATUS_ERROR, TITLE => INVALID_PARAMS_TITLE, MESSAGE => INVALID_PARAMS_MESSAGE);
    $JSON_TECHNICAL_ERROR = array(STATUS => STATUS_ERROR, TITLE => TECHNICAL_ERROR_TITLE, MESSAGE => TECHNICAL_ERROR_MESSAGE);
    $JSON_AUTHORIZATION_ERROR = array(STATUS => STATUS_ERROR, TITLE => AUTHORIZATION_ERROR_TITLE, MESSAGE => AUTHORIZATION_ERROR_MESSAGE);
    

	//-- PARAMETER CHECKS

	include_once("../../../Scripts/DBLogin.php");

	onRequest(); 

?>