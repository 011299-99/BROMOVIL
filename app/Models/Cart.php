<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    protected $fillable = ['user_id', 'status', 'total'];

    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public function recalc(): void
    {
        $this->total = $this->items()->sum('subtotal');
        $this->save();
    }

    public static function openFor(int $userId): self
    {
        return static::firstOrCreate(
            ['user_id' => $userId, 'status' => 'open'],
            ['total' => 0]
        );
    }

    public function addOrIncByProduct(Product $p, int $qty = 1): void
    {
        $item = $this->items()->firstOrNew(
            ['sku' => $p->sku],
            ['title' => $p->title, 'price' => $p->price, 'qty' => 0, 'subtotal' => 0]
        );

        // Congelar datos visibles
        $item->title    = $p->title;
        $item->price    = $p->price;
        $item->qty      = max(1, $item->qty + $qty);
        $item->subtotal = $item->qty * $item->price;
        $item->save();

        $this->recalc();
    }

    public function updateQty(string $sku, int $qty): void
    {
        $it = $this->items()->where('sku', $sku)->firstOrFail();
        $it->qty      = max(1, $qty);
        $it->subtotal = $it->qty * $it->price;
        $it->save();

        $this->recalc();
    }

    public function removeItem(string $sku): void
    {
        $this->items()->where('sku', $sku)->delete();
        $this->recalc();
    }

    public function empty(): void
    {
        $this->items()->delete();
        $this->recalc();
    }
}
