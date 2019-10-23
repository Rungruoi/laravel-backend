<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            'name' => 'required|max:10',
            'information' => 'max:300',
            'deadline' => 'after:yesterday',
            'type' => ['required', Rule::in(['lab', 'single', 'acceptance'])],
            'status' =>['required', Rule::in(['planned', 'junior', 'doing', 'done', 'cancelled'])]
        ];
    }
}
