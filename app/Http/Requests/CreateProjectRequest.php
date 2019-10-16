<?php

namespace App\Http\Requests;

use DateTime;
use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
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
            'information' => 'required|max:300',
            'deadline' => 'after:yesterday',
            'type' => 'required|regex:/[1-3]/',
            'status' => 'required|regex:/[1-5]/',
        ];
    }
}