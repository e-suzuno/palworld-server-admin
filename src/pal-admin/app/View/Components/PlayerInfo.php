<?php

namespace App\View\Components;

use App\Services\ConsoleService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PlayerInfo extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(private ConsoleService $consoleService)
    {
        //


    }


    public function list(): array
    {
        $plauers = $this->consoleService->showPlayers();

        return $plauers;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.player-info');
    }
}
