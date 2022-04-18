<?php
/**
 * Created by PhpStorm.
 * User: DLAN
 * Date: 31/10/2018
 * Time: 13:50
 */

namespace App\Helpers\StoredProcedures;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CallFromServer extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public static function callProcedure($action, $json)
    {
        $parameters = [];
        $default = Config::get("database.default");

        $parameters["database"] = Config::get("database.connections.$default.database");
        $parameters["library"] = Config::get("database.connections.$default.defaultLibraries");
        $parameters["schema"] = Config::get("database.connections.$default.schema");

        if(Session::get("database.username") != null and Session::get("database.password") != null){
            $parameters["username"] = Session::get("database.username");
            $parameters["password"] = Crypt::decrypt(Session::get("database.password"));
        }else{
            $parameters["username"] = Config::get("database.connections.$default.username");
            $parameters["password"] = Config::get("database.connections.$default.password");
        }

        $connection = \db2_connect($parameters["database"], $parameters["username"], $parameters["password"], ["i5_lib"=>$parameters["schema"], 'i5_libl' => $parameters["library"], 'i5_naming' => DB2_I5_NAMING_ON]);

        if(!$connection){
            Log::info('no connection');
            abort(403, db2_conn_error() . " " . db2_conn_errormsg()) ;
        }

        ${"param_1"} = $action;
        ${"param_2"} = $json;
        $output = '';

        Log::info('call '.$action.' for user '.$parameters["username"].' with json string: ');
        Log::info($json);

        $power = config('app.power');
        $query = db2_prepare($connection, "call $power.ALGRQS01_EXECUTEACTION(?, ?, ?)");
        db2_bind_param($query, 1, 'param_1', DB2_PARAM_IN);
        db2_bind_param($query, 2, 'param_2', DB2_PARAM_IN);
        db2_bind_param($query, 3, 'output', DB2_PARAM_OUT);

        try{
            db2_execute($query);
        }
        catch(\PDOException $err)
        {
            Log::info('pdo exception');
            dd($err);
        }

        if (db2_stmt_error()){
            Log::info('stmt error');
            abort(403, db2_stmt_error() . " " . db2_stmt_errormsg()) ;
        }

        db2_close($connection);

        Log::info($output);
        return json_decode($output);
    }

}
