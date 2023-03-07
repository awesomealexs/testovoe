<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_name',
        'manager_id',
    ];


    public function manager(): HasOne
    {
        return $this->hasOne('Manager');
    }


    public function getOrdersWithManagerFullName(int $limit = null): array
    {
        $orders = self::all()->take($limit);
        $managers = Manager::all();

        $managersFullNames = [];
        foreach ($managers as $manager) {
            $attributes = $manager->attributes;
            $managersFullNames[$attributes['id']] = $attributes['name'] . ' ' . $attributes['last_name'];
        }

        $ordersWithManagerFullNames = [];
        foreach ($orders as $order) {
            $currentOrderAttributes = $order->attributes;
            $currentOrderAttributes['managerFullName'] = $managersFullNames[$currentOrderAttributes['manager_id']];

            $ordersWithManagerFullNames[] = $currentOrderAttributes;
        }

        return $ordersWithManagerFullNames;
    }

}
