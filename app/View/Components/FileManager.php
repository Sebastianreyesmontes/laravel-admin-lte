<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FileManager extends Component
{
    public $projectName;

    public function __construct($projectName)
    {
        $this->projectName = $projectName;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.file-manager');
    }
}
