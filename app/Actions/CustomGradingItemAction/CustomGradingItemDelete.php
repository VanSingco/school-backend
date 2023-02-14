<?php

namespace App\Actions\CustomGradingItemAction;

use App\Models\CustomGradingItem;
use Lorisleiva\Actions\Concerns\AsAction;

class CustomGradingItemDelete
{
    use AsAction;

    protected $customGradingItem;

    public function __construct(CustomGradingItem $customGradingItem) {
        $this->customGradingItem = $customGradingItem;
    }

    public function handle($id)
    {
        $model = $this->customGradingItem->find($id);
        $model->delete();

        return $model;
    }
}
