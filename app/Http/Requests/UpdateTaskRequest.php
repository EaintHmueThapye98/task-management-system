<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
            'project_name' => 'required',
            'title' => 'required',
            'description' => 'string|max:255',
            'assignee_name' => 'required',
            'estimate_hr' => 'int',
            'estimate_start_date_time' => 'date_format:Y-m-d\TH:i',
            'estimate_finish_date_time' => 'date_format:Y-m-d\TH:i',
            'actual_hr' => 'int',
            'status' => 'int'
        ];
    }
}
