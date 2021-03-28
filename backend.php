<?php

if (isset($_POST)) {

    $input_number = intval($_POST['num']);
    $input_array = [];
    $response_array = [];

    if(is_numeric($input_number)){

        if($input_number <= 2046) {

            for($i = 1; $i <= $input_number ; $i++){
                array_push($input_array , $i);
            }

            foreach($input_array as $value){
                if($value % 3 == 0 && $value % 5 == 0){
                    array_push($response_array , "FizzBuzz");
                }else{
                    if($value % 3 == 0){
                        array_push($response_array , "Fizz");
                    }else{
                        if($value % 5 == 0){
                            array_push($response_array , "Buzz");
                        }else{
                            array_push($response_array , $value);
                        }
                    }
                }
            }

            //Success
            echo json_encode(array('success' => 1 , 'data' => $response_array)); 

        } else {
            //Limit Exceeded 
            echo json_encode(array('success' => 2)); 
        }
    }else {
        //Not numeric value 
        echo json_encode(array('success' => 3));
    }
    
} else {
    //Error on request
    echo json_encode(array('success' => 0));
}