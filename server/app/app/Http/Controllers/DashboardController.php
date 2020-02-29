<?php

namespace App\Http\Controllers;

use App\Services\ProjectService;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{

    private $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index(): View
    {
        $projects = $this->projectService->findByUserId(Auth::user()->id);
        return view("dashboard", [
            "projects" => $projects
        ]);
    }
}
