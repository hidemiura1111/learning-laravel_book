<?php

namespace App\Http\Data;

use App\Models\User;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Optional;

class UserData extends Data
{
    // Validation list for Laravel-Data
    // https://spatie.be/docs/laravel-data/v3/advanced-usage/validation-attributes
    public function __construct(
        #[Rule('min:3')]
        public string $name,
        #[Email]
        public string $email,
        public ?string $email_verified_at,
        public string|Optional $password,
    ) {
    }

    public static function fromModel(User $user): self
    {
        return new self(
            "{$user->name} ({$user->id})",
            $user->email,
            $user->email_verified_at,
            'Hidden',
        );
    }
}