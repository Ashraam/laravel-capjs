<?php

namespace Ashraam\Capjs\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;

class Capjs implements Rule
{
    /**
     * @var string
     */
    protected $message;

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $response = Http::post(config('capjs.host').'/'.config('capjs.key').'/siteverify', [
            'secret' => config('capjs.secret'),
            'response' => $value
        ])->json();

        if(isset($response['success']) && $response['success'] === true) {
            return true;
        }

        if(isset($response['error'])) {
            $this->message = $response['error'];
        } else {
            $this->message = __('capjs::capjs.validation_failed');
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}