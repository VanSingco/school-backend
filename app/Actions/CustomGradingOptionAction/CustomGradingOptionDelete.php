<?php

namespace App\Actions\CustomGradingOptionAction;

use App\Models\CustomGradingOption;
use Lorisleiva\Actions\Concerns\AsAction;

class CustomGradingOptionDelete
{
    use AsAction;
    
    protected $customGradingOption;

    public function __construct(CustomGradingOption $customGradingOption) {
        $this->customGradingOption = $customGradingOption;
    }

    public function handle($id)
    {
        $model = $this->customGradingOption->find($id);
        $model->delete();

        return $model;
    }
}
