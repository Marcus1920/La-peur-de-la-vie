<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            'role'              => 'required|not_in:0',
            'title'             => 'required|not_in:0',
            'name'              => 'required|alpha|different:surname',
            'surname'           => 'required|alpha|different:name',
            'language'          => 'required|not_in:0',
            'gender'            => 'required|not_in:0',
            'department'        => 'required|not_in:0',
            'position'          => 'required|not_in:0',
            'affiliation'       => 'required|not_in:0',

            'cellphone'         => 'required|digits:10|unique:users,cellphone',
            'email'             => 'required|email|unique:users,email',

            'id_number'         => 'required|unique:users,id_number|digits:13',
            'company'           => 'required',
            'alt_email'        => 'different:email|unique:users,email',
        ];


    }

    public function messages()
    {
        return [
            'title.not_in'               => 'Please select title',
            'language.not_in'            => 'Please select language',
            'role.not_in'                => 'Please select role',
            'gender.not_in'              => 'Please select gender',
            'department.not_in'          => 'Please select department',
            'position.not_in'            => 'Please select position',
            'affiliation.not_in'         => 'Please select affilitiation',

            'id_number.required'        =>  'Please enter 13 digits ID Number',
            'name.required'             =>  'Please enter name',
            'surname.required'          =>  'Please enter surname',
            'cellphone.required'        =>  'Please enter cell phone number',
            'company.required'          =>  'Please enter company name',
            'email.required'            =>  'Please enter email address',

            'email.email'               =>  'This email address is not valid',
            'alt_email.different'       =>  'Alternative and email address must be different',

        ];


    }
}