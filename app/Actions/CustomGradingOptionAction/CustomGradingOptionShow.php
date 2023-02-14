<?php

namespace App\Actions\CustomGradingOptionAction;

use App\Models\CustomGradingOption;
use Lorisleiva\Actions\Concerns\AsAction;

class CustomGradingOptionShow
{
    use AsAction;

    protected $customGradingOption;

    public function __construct(CustomGradingOption $customGradingOption) {
        $this->customGradingOption = $customGradingOption;
    }

    public function handle($id)
    {
        return $this->customGradingOption->find($id);
    }
}
