<?php
/**
 * Created by PhpStorm.
 * User: KILENGA
 * Date: 2/10/2019
 * Time: 8:32 PM
 */

namespace App\Helpers;
use App\Models\Setups\LogActivity as LogActivityModel;

use Illuminate\Support\Facades\Request;

class LogActivity
{
    public static function addToLog($subject,$action)
    {
        $log = [];

        $log['subject'] = $subject;

        $log['url'] = Request::fullUrl();

        $log['method'] = Request::method();

        $log['action'] = $action;

        $log['ip'] = Request::ip();

        $log['agent'] = Request::header('user-agent');

        $log['user_id'] = auth()->check() ? auth()->user()->id : 1;

        LogActivityModel::create($log);

    }

    public static function logActivityLists()
    {
        return LogActivityModel::latest()->get();
    }
}