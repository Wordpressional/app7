<?php

namespace App\Rules;

use App\User;
use Illuminate\Contracts\Validation\Rule;

class CanBePoster implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $author = User::find($value);
        return $author->canBeAuthor() || $author->canBeAdmin() || $author->canBeEditor() || $author->canBeSAdmin() || $author->canBeDemo() || $author->canBeSuperadmin();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.can_be_author');
    }
}
