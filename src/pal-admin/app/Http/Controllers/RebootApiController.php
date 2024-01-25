<?php

namespace App\Http\Controllers;


use App\Http\Requests\ProfileUpdateRequest;
use App\Services\ConsoleService;
use Hamcrest\Core\JavaForm;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RebootApiController extends Controller
{

    public function __construct(private ConsoleService $consoleService)
    {
    }


    /**
     * serverのOSの再起動を受け付けるAPI
     */
    public function reboot(Request $request): JsonResponse
    {
        $res = $this->consoleService->reboot();

        if (!$res) {
            return response()->json([
                'message' => 'reboot command has not been sent.'
            ]);
        }
        return response()->json([
            'message' => 'reboot command has been sent.'
        ]);
    }
}
