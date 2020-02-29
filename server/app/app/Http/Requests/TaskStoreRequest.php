<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskStoreRequest extends FormRequest
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
            "actualTime" => "required|numeric",
            "details" => "required|string|max:2048",
            "dueOn" => "required|date",
            "projectId" => "required|integer",
            "responsibleUserId" => "required|integer",
            "taskCategoryId" => "required|integer",
            "taskMilestoneId" => "required|integer",
            "taskPriorityId" => "required|integer",
            "taskTypeId" => "required|integer",
            "scheduledTime" => "required|numeric",
            "startOn" => "required|date",
            "subject" => "required|string|max:255",
        ];
    }
}
