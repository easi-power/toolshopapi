<?php
/**
 * Created by PhpStorm.
 * User: DLAN
 * Date: 31/10/2018
 * Time: 13:50
 */

namespace App\Helpers\StoredProcedures;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CallFromLocal
{

    public static function callProcedure($action, $json)
    {
        $db = DB::connection()->getPdo();
        $output = '';
        Log::info($json);
        $power = config('app.power');
        $stmt = $db->prepare("call $power.ALGRQS01_EXECUTEACTION(?, ?, ?)"); // ? = parameter

        $stmt->bindParam(1, $action , \PDO::PARAM_STR|\PDO::PARAM_INPUT_OUTPUT);
        $stmt->bindParam(2, $json , \PDO::PARAM_STR|\PDO::PARAM_INPUT_OUTPUT);
        $stmt->bindParam(3, $output, \PDO::PARAM_STR|\PDO::PARAM_INPUT_OUTPUT);
        try{
            $stmt->execute();
        }
        catch(\PDOException $err)
        {
            dd($err);
        }

        $db = null;
        Log::info($output);
        return json_decode($output);
    }



}
