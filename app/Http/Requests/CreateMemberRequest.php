<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use DateTime;

class CreateMemberRequest extends FormRequest
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
        $reqDate = $reqDate->modify('-60 years')->format('Y-m-d');
        return [
            'name' => 'required|max:50',
            'information' => 'max:300',
            'phone_number' => 'required|max:20|regex:/^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)(.)]*$/',
            'date_of_birth' => 'required|date|before:today|after_or_equal:'.$reqDate,
            'avatar' => 'file|mimes:jpeg,png,jpg,git|max:10240',
            'position' => 'required|regex:/[1-7]/',
            'gender' => 'required|regex:/[1-2]/',
        ];
    }
}
