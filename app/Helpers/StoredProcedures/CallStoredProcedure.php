<?php
/**
 * Created by PhpStorm.
 * User: DLAN
 * Date: 31/10/2018
 * Time: 13:49
 */

namespace App\Helpers\StoredProcedures;


use Illuminate\Support\Facades\Log;

class CallStoredProcedure
{
    public function __construct()
    {
    }

    public static function callProcedure($action, $input)
    {
        $input = self::removeNullValues($input);

        if (is_array($input) && isset($input["error"]) && $input["error"] === true) {
            Log::info('error in call stored procedure');
            return json_encode($input);
        } else {
            $json = json_encode($input, JSON_UNESCAPED_UNICODE);
            $callLocation = env('DB_CONNECTION');

            Log::info($json);
            if ($callLocation === "db2") {
                $output =  CallFromServer::callProcedure($action, $json);
                return $output;
            } elseif ($callLocation === "db2_odbc") {
                $output = CallFromLocal::callProcedure($action, $json);
                return $output;
            } else {
                Log::info('dd error');
                dd("Unknown call location");
            }
        }
    }

    static function removeNullValues($input)
    {
        foreach ($input as $key => $value) {
            if (is_array($value)) {
                $input[$key] = self::removeNullValues($input);
            }else if ($value === null) {
                $input[$key] = "";
            }
        }
        return $input;
    }

}
