<?php
        
    if(! function_exists('isStartedText')) {
        function isStartedText($isStarted){
            return ($isStarted)  ? 'Oui' : 'Non';
        }
    }

    if(! function_exists('isStartedClass')) {
        function isStartedClass($isStarted){
            return ($isStarted)  ? 'badge-success' : 'badge-danger';
        }
    }

    if(! function_exists('format_date_ymd')) {
        function format_date_ymd($date)
        {
            $date = explode(" ", $date);
           return $date[0];
        }
    }