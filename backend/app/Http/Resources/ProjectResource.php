<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'               => $this->slug,
            'dbId'             => $this->id,
            'name'             => $this->name,
            'category'         => $this->category,
            'year'             => $this->year,
            'role'             => $this->role,
            'timeline'         => $this->timeline,
            'tools'            => $this->tools ?? [],
            'problemStatement' => $this->problem_statement,
            'psLabel'          => $this->ps_label ?? 'Problem Statement',
            'prototypeUrl'     => $this->prototype_url,
            'solutions'        => $this->solutions,
            'heroImage'        => $this->hero_image,
            'pageImages'       => $this->page_images ?? [],
            'sortOrder'        => $this->sort_order,
        ];
    }
}
