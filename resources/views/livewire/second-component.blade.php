<div>
    <h2 class="text-center">
        Second Component Todo List
    </h2>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="addTodo" class="form">
        <div class="form-group">
            <label class="form-label">Title</label>
            <input type="text" wire:model="title" class="form-control">
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label">Description</label>
            <textarea wire:model="description" class="form-control"></textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Add Todo</button>
    </form>

    <div class="mt-4">
        <h4>
            Todo List
        </h4>
        <ul>
            @forelse ($allTodos as $todo)
                <li>
                    {{ $todo->title }}
                    <button wire:click="removeTodo({{ $todo->id }})">Remove</button>
                </li>
            @empty
                <li>
                    No Todos Found
                </li>
            @endforelse

            {{ $allTodos->links() }}
        </ul>
    </div>
</div>
