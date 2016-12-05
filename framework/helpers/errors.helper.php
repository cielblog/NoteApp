<?php
defined('FRAMEWORK_PATH') OR die('No direct script access allowed.');

if (!function_exists('error_handle'))
{

    function error_handle($type, $custom_message = NULL)
    {
        $errors_stack = [
            'ControllerDoesNotExists',
            'MethodDoesNotExists'
        ];

        if (in_array($type, $errors_stack))
        {

            $error_details = [];

            // #
            switch ($type)
            {
                case 'ControllerDoesNotExists':
                    $error_details['Name'] = "Page Not Found";
                    $error_details['Type'] = "404";
                    $error_details['Msg']  = "The page you are looking for is not found, or it is under maintenance.";
                    break;

                case 'MethodDoesNotExists':
                    $error_details['Name'] = "Wrong Action.";
                    $error_details['Type'] = "Bad Client Request";
                    $error_details['Msg']  = "The action you requested for does not correct.";
                    break;

                default:

            }

            // For test reason
            #print_r($error_details);

            // Print error page
            App::$view->render('errors'. DS. 'error', $error_details, TRUE);
        }
        else
        {
            echo $type;
            exit;
        }
    }
}