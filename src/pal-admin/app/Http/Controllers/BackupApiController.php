<?php

namespace app\Http\Controllers;


use App\Http\Requests\ProfileUpdateRequest;
use App\Services\ConsoleService;
use Hamcrest\Core\JavaForm;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

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
