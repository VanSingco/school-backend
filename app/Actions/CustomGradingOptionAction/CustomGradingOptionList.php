<?php

namespace App\Actions\CustomGradingOptionAction;

use App\Models\CustomGradingOption;
use Lorisleiva\Actions\Concerns\AsAction;

class CustomGradingOptionList
{
    use AsAction;

    protected $customGradingOption;

    public function __construct(CustomGradingOption $customGradingOption) {
        $this->customGradingOption = $customGradingOption;
    }

    public function handle()
    {
        // ...
    }
}
