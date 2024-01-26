<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Services\ConsoleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class BroadcastApiController extends Controller
{

    public function __construct(private ConsoleService $consoleService)
    {
    }


    /**
     * リクエストからメッセージを取得して
     * コンソールサービスを使ってブロードキャストで送信する
     */
    public function broadcast(Request $request): JsonResponse
    {
        $message = $request->input('message');
        $this->consoleService->broadcast($message);
        return response()->json(['message' => 'ok']);
    }
}
