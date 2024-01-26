<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Services\ConsoleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PlayerInfoApiController extends Controller
{

    public function __construct(private ConsoleService $consoleService)
    {
    }


    /**
     * セーブデータの手動backup
     */
    public function backup(Request $request): JsonResponse
    {

        $res = $this->consoleService->showPlayers();
        return response()->json([
            "players" => $res
        ]);


    }
}
