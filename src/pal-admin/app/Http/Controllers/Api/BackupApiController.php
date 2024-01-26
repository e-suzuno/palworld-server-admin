<?php

namespace app\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Services\ConsoleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BackupApiController extends Controller
{

    public function __construct(private ConsoleService $consoleService)
    {
    }


    /**
     * セーブデータの手動backup
     */
    public function backup(Request $request): JsonResponse
    {
        $res = $this->consoleService->backup();

        if (!$res) {
            return response()->json([
                'message' => 'backup command has not been sent.'
            ]);
        }
        return response()->json([
            'message' => 'backup command has been sent.'
        ]);
    }
}
