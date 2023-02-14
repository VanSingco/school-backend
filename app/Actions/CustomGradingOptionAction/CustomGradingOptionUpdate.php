<?php

namespace App\Actions\CustomGradingOptionAction;

use App\Models\CustomGradingOption;
use Lorisleiva\Actions\Concerns\AsAction;

class CustomGradingOptionUpdate
{
    use AsAction;

    protected $customGradingOption;

    public function __construct(CustomGradingOption $customGradingOption) {
        $this->customGradingOption = $customGradingOption;
    }

    public function handle($id, $data)
    {
        return $this->customGradingOption->where('id', $id)->update($data->all());
    }
}
