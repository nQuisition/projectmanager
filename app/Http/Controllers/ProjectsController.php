<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Tag;

class ProjectsController extends Controller
{
    public function create(Request $request) {
        $request->validate([
            'name' => 'required|string'
        ]);
        $project = new Project([
            'name' => $request->name,
            'description' => isset($request->description) ? $request->description : null,
            'owner_id' => $request->user()->id
        ]);
        $project->save();
        return response()->json([
            'message' => 'Successfully created project!',
            'project' => $project
        ], 201);
    }

    public function delete($projectId = null, Request $request) {
        if(is_null($projectId)) {
            return response()->json([
                'message' => 'Id was not specified'
            ], 400);
        }
        $project = Project::where('id', $projectId)
            ->where('owner_id', $request->user()->id)
            ->first();
        if(is_null($project)) {
            return response()->json([
                'message' => 'Project not found'
            ], 404);
        }
        $project->delete();
        return response()->json([
            'message' => 'Project deleted successfully',
            'project' => $project
        ]);
    }

    public function list($projectId = null, Request $request) {

        $projects = null;
        if(is_null($projectId)) {
            $projects = Project::with(['owner'])->where('owner_id', $request->user()->id)->get();
        } else {
            $projects = Project::with(['owner', 'tags'])->where('id', $projectId)->first();
        }
        if(is_null($projects)) {
            return response()->json([
                'message' => 'Project not found'
            ], 404);
        }
        return response()->json($projects);
    }

    public function createTag($projectId, Request $request) {
        $request->validate([
            'name' => 'required|string',
            'color' => 'required|string'
        ]);
        $project = Project::where('id', $projectId)
            ->where('owner_id', $request->user()->id)
            ->first();
        if(is_null($project)) {
            return response()->json([
                'message' => 'Project not found'
            ], 404);
        }
        $tag = new Tag([
            'name' => $request->name,
            'description' => isset($request->description) ? $request->description : null,
            'project_id' => $projectId, 
            'color' => $request->color
        ]);
        $tag->save();
        return response()->json([
            'message' => 'Successfully created tag!',
            'tag' => $tag
        ], 201);
    }

    public function listTags($projectId, Request $request) {
        $tags = Tag::where('project_id', $projectId)->get();
        return response()->json([
            'tags' => $tags
        ]);
    }
}
