<?php

namespace App\Http\Requests;

use \Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateStudentRequest extends FormRequest
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
        $id = explode("/", $this->getRequestUri())[2];
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email',Rule::unique('students')->ignore($id)],
            'phone' => 'required|min:11',
            'address' => 'required',
            'major_id' => 'required'
        ];
    }
}
