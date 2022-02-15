<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user_id = $this->user->id ?? null;
        return [
            "name" => "required|string|max:100",
            "firstname" => "required|string|max:100",
            "username" => "required|string|unique:users|max:100",
            "age" => "required|integer|max:100",
            "email" => "required|unique:users".(isset($user_id) ? ",email,".$user_id : ""),
            "password" => "required|min:8"
        ];
    }
}
