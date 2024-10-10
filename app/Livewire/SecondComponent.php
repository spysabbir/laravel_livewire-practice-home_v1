<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Todo;
use Livewire\WithPagination;

class SecondComponent extends Component
{
    use WithPagination;
    public $title;
    public $description;

    public function render()
    {
        $allTodos = Todo::latest()->paginate(5);
        return view('livewire.second-component', compact('allTodos'));
    }

    public function addTodo()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        Todo::create([
            'title' => $this->title,
            'description' => $this->description,
            'completed' => false
        ]);

        $this->title = '';
        $this->description = '';

        session()->flash('message', 'Todo added successfully.');
    }

    public function removeTodo($id)
    {
        Todo::destroy($id);
        session()->flash('message', 'Todo deleted successfully.');
    }
}
