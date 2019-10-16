<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use DateTime;

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
        $reqDate = new DateTime('now');
        $reqDate = $reqDate->modify('0 days');
        return [
            'name' => 'required|max:10',
            'information' => 'required|max:300',
            'deadline' => "after_or_equal:".$reqDate->format('Y-m-d'),
            'type' => 'required|regex:/[1-3]/',
            'status' => 'required|regex:/[1-5]/',
        ];
    }
}
