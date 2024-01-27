<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Services\ConsoleService;
use App\Services\PalWorldSettingService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SettingController extends Controller
{


    public function __construct(
        private PalWorldSettingService $palWorldSettingService,
        private ConsoleService $consoleService
    )
    {

    }


    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {

        $setting = $this->palWorldSettingService->readSettingFile();

        return view('setting.index', [
            "setting" => $setting
        ]);

    }


    public function update(Request $request): RedirectResponse
    {

        $setting  = $request->all();
        // _tokenだけ除去
        unset($setting["_token"]);

        $this->palWorldSettingService->updateSettingFile($setting);
        $this->consoleService->shutdown();


        return redirect()->route('setting');

    }


}
