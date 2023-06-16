<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class loginRequesr extends FormRequest
{
    /**
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     *
     * @return array
     */
    public function rulls()
    {
        return[
            'email' => ['required', 'string', 'email'],
            'password' =>['required', 'string'],
        ];
    }

    /**
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate()
    {
        $this->ensurelsNotRatelimited();

        if (! Auth:: attempt($this->only('email', 'password'), $this->boolean('remember'))){
            RateLimiter::hit($this->throttlekey());

            throw ValidationException::withMessages([
                'email' => ('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttlekey);
    }

    /**
     *
     * @return void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensurelsNotRatelimited()
    {
        if(! RateLimiter::tooManyAttempts($this->throttlekey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttlekey());

        throw ValidationException::withMessages([
            'email' => trans ('auth.throttle', [
                'second' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     *
     * @return string
     */
    public function throttlekey()
    {
        return Str::lower($this->input('email')). '|'.$this->ip();
    }
}
