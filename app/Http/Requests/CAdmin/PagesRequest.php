<?php

namespace App\Http\Requests\Admin;

use App\Rules\CanBePoster;
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
            'name' => str_slug($this->input('name1'))
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
            'name1' => 'required',
            'display_name' => 'required',
            'content' => 'required',
           
            'author_id' => ['required', 'exists:users,id', new CanBePoster],
            'name' => 'unique:pages,name,' . (optional($this->page)->id ?: 'NULL'),
            
        ];
    }
}
