<?php

namespace app\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Services\ConsoleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
