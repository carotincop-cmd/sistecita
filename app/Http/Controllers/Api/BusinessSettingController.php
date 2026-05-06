<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BusinessSetting;

class BusinessSettingController extends Controller
{
    public function index()
    {
        $setting = BusinessSetting::first();

        return response()->json([
            'success' => true,
            'data' => $setting
        ]);
    }
}