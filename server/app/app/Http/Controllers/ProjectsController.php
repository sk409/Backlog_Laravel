<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectJoinRequest;
use App\Http\Requests\ProjectStoreRequest;
use App\Services\ProjectService;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProjectsController extends Controller
{

    private $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function join(ProjectJoinRequest $request)
    {
        return $this->projectService->join((int) $request->projectId, (int) $request->userId);
    }

    public function show(int $id): View
    {
        $project = $this->projectService->findById($id);
        return view("projects.show", [
            "project" => $project
        ]);
    }

    public function store(ProjectStoreRequest $request)
    {
        $project = $this->projectService->save($request->name, $request->outline, "");
        $directory = "public/projects/$project->id";
        Storage::makeDirectory($directory);
        $thumbnail = $request->file("thumbnail");
        if (!is_null($thumbnail)) {
            $filename = "thimbnail." . $thumbnail->getClientOriginalExtension();
            $thumbnail->storeAs($directory, $filename);
            $thumbnailPath = "storage/projects/$project->id/$filename";
            $this->projectService->update($project->id, ["thumbnail_path" => $thumbnailPath]);
        }
        return $project;
    }
}
