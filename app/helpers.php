<?php
    function helper_encr($number)
    {
        $number = $number . '';
        $result = '';
        $stringAl = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'K', 'I'];
        $result .= $stringAl[rand(0, 9)];
        for ($i = 0; $i < strlen($number); $i++) {
            $result .= $stringAl[$number[$i]];
        }
        $result .= $stringAl[rand(0, 9)];
        return $result;
    }

    function helper_decr($stringData)
    {
        $result = '';
        $stringAl = 'ABCDEFGHKI';

        for ($i = 1; $i < strlen($stringData) - 1; $i++) {
            $result .= strpos($stringAl, $stringData[$i]);
        }
        return (int)$result;
    }

    function helper_tasks($api_key) : array {
        $tasks = explode('.',$api_key);
        array_shift($tasks);
        return $tasks;
    }


    function helper_de_tasks($tasks) : array {
        $tasksId = [];
        for($i = 0; $i < count($tasks); $i++){
            array_push($tasksId,helper_decr($tasks[$i]));
        }
        return $tasksId;
    }



?>