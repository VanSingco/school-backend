<?php

namespace App\Actions\CustomGradingItemAction;

use App\Models\CustomGrading;
use App\Models\CustomGradingItem;
use Lorisleiva\Actions\Concerns\AsAction;

class CustomGradingItemCreate
{
    use AsAction;

    protected $customGradingItem;

    public function __construct(CustomGradingItem $customGradingItem) {
        $this->customGradingItem = $customGradingItem;
    }

    public function handle($data)
    {
        $customGradingItemData = $data->all();

        $customGradingItem = $this->customGradingItem
                                ->where('custom_grading_id', $customGradingItemData['custom_grading_id'])
                                ->orderBy('order', 'DESC')
                                ->first();
                                
        if ($customGradingItem) {
            $customGradingItemData['order'] = $customGradingItem->order + 1;
        }

        return $this->customGradingItem->create($customGradingItemData);
    }
}
