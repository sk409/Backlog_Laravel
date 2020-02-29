<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskMilestoneStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "details" => "required|string|max:2048",
            "endOn" => "required|date",
            "name" => "required|string|max:255",
            "projectId" => "required|integer",
            "startOn" => "required|date",
        ];
    }
}
