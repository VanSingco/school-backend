<?php

namespace App\Actions\CustomGradingItemAction;

use App\Models\CustomGradingItem;
use Lorisleiva\Actions\Concerns\AsAction;

class CustomGradingItemUpdate
{
    use AsAction;

    protected $customGradingItem;

    public function __construct(CustomGradingItem $customGradingItem) {
        $this->customGradingItem = $customGradingItem;
    }

    public function handle($id, $data)
    {
        $this->customGradingItem->where('id', $id)->update($data->all());

        return $this->customGradingItem->find($id);
    }
}
