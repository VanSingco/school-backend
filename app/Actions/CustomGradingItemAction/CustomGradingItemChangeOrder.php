<?php

namespace App\Actions\CustomGradingItemAction;

use App\Models\CustomGradingItem;
use Lorisleiva\Actions\Concerns\AsAction;

class CustomGradingItemChangeOrder
{
    use AsAction;

    protected $customGradingItem;

    public function __construct(CustomGradingItem $customGradingItem) {
        $this->customGradingItem = $customGradingItem;
    }


    public function handle($data)
    {
        foreach ($data->custom_grading_items as $key => $value) {
            $this->customGradingItem->where('id', $value['id'])->update(['order' => $key]);
        }

        return $this->customGradingItem->where('custom_grading_id', $data->custom_grading_id)->orderBy('order', 'asc')->get();
    }
}
