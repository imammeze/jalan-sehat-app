<?php

namespace App\Rules;

use Closure;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\Validation\ValidationRule;

class ReCaptcha implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('GOOGLE_RECAPTCHA_SECRET_KEY'),
            'response' => $value,
            'remoteip' => request()->ip(),
        ])->json();
        
        if (!isset($response['success']) || !$response['success']) {
            $fail('Gagal melakukan validasi reCAPTCHA. Silakan coba lagi.');
        }
    }
}