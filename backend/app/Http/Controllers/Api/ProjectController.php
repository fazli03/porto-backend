<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $projects = Project::orderBy('sort_order')->orderBy('id')->get();

        return ProjectResource::collection($projects);
    }

    public function store(Request $request): ProjectResource
    {
        $data = $request->validate([
            'name'             => 'required|string|max:255',
            'slug'             => 'nullable|string|max:255|unique:projects',
            'category'         => 'nullable|string|max:100',
            'year'             => 'nullable|string|max:10',
            'role'             => 'nullable|string|max:255',
            'timeline'         => 'nullable|string|max:255',
            'tools'            => 'nullable|array',
            'tools.*'          => 'string|max:100',
            'problemStatement' => 'nullable|string',
            'prototypeUrl'     => 'nullable|url|max:2000',
            'codeUrl'          => 'nullable|url|max:2000',
            'solutions'        => 'nullable|string',
            'heroImage'        => 'nullable|string|max:1000',
            'pageImages'       => 'nullable|array',
            'pageImages.*'     => 'string|max:1000',
            'sortOrder'        => 'nullable|integer|min:0',
        ]);

        $project = Project::create([
            'slug'              => $data['slug'] ?? Project::generateSlug($data['name']),
            'name'              => $data['name'],
            'category'          => $data['category'] ?? null,
            'year'              => $data['year'] ?? null,
            'role'              => $data['role'] ?? null,
            'timeline'          => $data['timeline'] ?? null,
            'tools'             => $data['tools'] ?? [],
            'problem_statement' => $data['problemStatement'] ?? null,
            'prototype_url'     => $data['prototypeUrl'] ?? null,
            'code_url'          => $data['codeUrl'] ?? null,
            'solutions'         => $data['solutions'] ?? null,
            'hero_image'        => $data['heroImage'] ?? null,
            'page_images'       => $data['pageImages'] ?? [],
            'sort_order'        => $data['sortOrder'] ?? 0,
        ]);

        return new ProjectResource($project);
    }

    public function show(Project $project): ProjectResource
    {
        return new ProjectResource($project);
    }

    public function update(Request $request, Project $project): ProjectResource
    {
        $data = $request->validate([
            'name'             => 'sometimes|required|string|max:255',
            'category'         => 'nullable|string|max:100',
            'year'             => 'nullable|string|max:10',
            'role'             => 'nullable|string|max:255',
            'timeline'         => 'nullable|string|max:255',
            'tools'            => 'nullable|array',
            'tools.*'          => 'string|max:100',
            'problemStatement' => 'nullable|string',
            'prototypeUrl'     => 'nullable|url|max:2000',
            'codeUrl'          => 'nullable|url|max:2000',
            'solutions'        => 'nullable|string',
            'heroImage'        => 'nullable|string|max:1000',
            'pageImages'       => 'nullable|array',
            'pageImages.*'     => 'string|max:1000',
            'sortOrder'        => 'nullable|integer|min:0',
        ]);

        $project->update([
            'name'              => $data['name']              ?? $project->name,
            'category'          => array_key_exists('category', $data)          ? $data['category']          : $project->category,
            'year'              => array_key_exists('year', $data)               ? $data['year']              : $project->year,
            'role'              => array_key_exists('role', $data)               ? $data['role']              : $project->role,
            'timeline'          => array_key_exists('timeline', $data)           ? $data['timeline']          : $project->timeline,
            'tools'             => array_key_exists('tools', $data)              ? $data['tools']             : $project->tools,
            'problem_statement' => array_key_exists('problemStatement', $data)   ? $data['problemStatement']  : $project->problem_statement,
            'prototype_url'     => array_key_exists('prototypeUrl', $data)       ? $data['prototypeUrl']      : $project->prototype_url,
            'code_url'          => array_key_exists('codeUrl', $data)            ? $data['codeUrl']           : $project->code_url,
            'solutions'         => array_key_exists('solutions', $data)          ? $data['solutions']         : $project->solutions,
            'hero_image'        => array_key_exists('heroImage', $data)          ? $data['heroImage']         : $project->hero_image,
            'page_images'       => array_key_exists('pageImages', $data)         ? $data['pageImages']        : $project->page_images,
            'sort_order'        => array_key_exists('sortOrder', $data)          ? $data['sortOrder']         : $project->sort_order,
        ]);

        return new ProjectResource($project->fresh());
    }

    public function destroy(Project $project): Response
    {
        $project->delete();

        return response()->noContent();
    }
}
