<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination; // Paginate in real time

class SearchPost extends Component
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
        $posts = Post::where('user_id', auth()->user()->id) // get posts of the current user
        ->where('title', 'like', '%' . $this->search . '%') // search by title
        ->latest('id') // order by id desc
        ->paginate(10); // paginate in 10 posts
        return view('livewire.admin.search-post', compact('posts')); // return view
    }
}
