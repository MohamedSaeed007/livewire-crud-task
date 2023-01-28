<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            @if (!$mode)
            <button class="btn btn-primary" wire:click="$set('mode','create')">Add</button>
            <table class="table table-striped table-bordered mt-5">
                <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>
                            <button class="btn btn-success" wire:click="edit({{ $item->id }})">Update</button>
                            <button class="btn btn-danger" wire:click="delete({{ $item->id }})">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <button class="btn btn-primary mb-3" wire:click="$set('mode',null)">Back</button>
            <form wire:submit.prevent="{{ $mode }}">
                <label for="Name">Name</label>
                <input type="text" class="form-control" wire:model="name" value="{{ $mode =='update' ? $name : '' }}">
                @error('name')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                <label for="Price">Price</label>

                <input type="number" class="form-control" wire:model="price"
                    value="{{ $mode =='update' ? $price : '' }}">
                @error('price')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                <button class="btn btn-primary mt-3">{{ $mode }}</button>
            </form>
            @endif
        </div>
    </div>
</div>