<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const IGNORE = ['_token', 'created_at', 'updated_at', 'deleted_at', 'id', 'created_by', 'updated_by'];

    protected function handleApiError(\Throwable $ex)
    {
        report($ex);
        return response('something went wrong', 400);
    }

    public function health()
    {
        return response('ok');
    }
}
