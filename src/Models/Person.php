<?php

declare(strict_types=1);

namespace App\Models;

use Yiisoft\Validator\Rule\AtLeast;
use Yiisoft\Validator\Rule\Email;
use Yiisoft\Validator\Rule\Length;
use Yiisoft\Validator\Rule\Number;
use Yiisoft\Validator\Rule\Required;
use Yiisoft\Validator\Validator;

#[AtLeast(['email', 'phone'])]
final class Person
{
    public function __construct(
        #[Required]
        #[Length(min: 2)]
        public ?string $name = null,

        #[Number(min: 21)]
        public ?int $age = null,

        #[Email]
        public ?string $email = null,

        public ?string $phone = null,
    ) {
    }
}