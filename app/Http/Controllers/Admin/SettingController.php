<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    function UpdatePusherSetting(Request $request) : RedirectResponse {
        $validateData = $request->validate([
            'pusher_app_id' => ['required'],
            'pusher_key' => ['required'],
            'pusher_secret' => ['required'],
            'pusher_cluster' => ['required'],
        ]);
        
        foreach($validateData as $key => $value){
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
            $settingsService = app(SettingsService::class);
            $settingsService->clearCachedSettings();
        
        return redirect()->back;

        }
}
