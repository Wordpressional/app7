<?php

namespace App\Http\Requests\Admin;

use App\Rules\CanBeAuthor;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class PagesRequest extends FormRequest
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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'name' => str_slug($this->input('display_name'))
        ]);

        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'display_name' => 'required',
            'content' => 'required',
           
            'author_id' => ['required', 'exists:users,id', new CanBeAuthor],
            'name' => 'unique:pages,name,' . (optional($this->page)->id ?: 'NULL'),
            
        ];
    }
}
