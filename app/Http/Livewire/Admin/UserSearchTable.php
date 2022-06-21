<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination; // Paginate in real time

class UserSearchTable extends Component
{
    use WithPagination; // Paginate in real time
    protected $paginationTheme = 'bootstrap'; // Using styles of bootstrap
    public $search = ""; // Search input

    public function updatingSearch() //When the search input is updating
    {
        $this->resetPage(); // Reset the page
    }
   
    public function render()
    {
        $users = \App\Models\User::where('name','like','%'. $this->search .'%')
                                  ->orWhere('email','like','%'. $this->search .'%')
                                  ->latest('id')
                                  ->paginate('8');
        return view('livewire.admin.user-search-table', compact('users'));
    }
}
