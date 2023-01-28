<?php

namespace App\Http\Livewire;

use App\Models\InventoryItem;
use Livewire\Component;

class BasicCrud extends Component
{
    public $Id;
    public $name;
    public $price;
    public $mode = null;

    protected $rules = [
        'name' => 'required|string',
        'price' => 'required|numeric',
    ];
    public function create()
    {
        $this->validate();
        InventoryItem::create([
            'name' => $this->name,
            'price' => $this->price,
        ]);
        $this->mode = null;
    }
    public function edit($id)
    {
        $this->Id = $id;
        $item = InventoryItem::find($id);
        $this->name = $item->name;
        $this->price = $item->price;
        $this->mode = 'update';
    }
    public function update()
    {
        $this->validate();
        $item = InventoryItem::find($this->Id)->update([
            'name' => $this->name,
            'price' => $this->price,
        ]);
        $this->mode = null;
    }
    public function delete($id)
    {
        InventoryItem::find($id)->delete();
        $this->mode = null;
    }
    public function render()
    {
        $items = InventoryItem::all();
        return view('livewire.basic-crud', ['items' => $items]);
    }
}