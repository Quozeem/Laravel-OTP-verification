<?php

namespace App\Http\Livewire;
use App\Models\Contacts;
use Livewire\Component;
use Illuminate\Pagination\Paginator;
use Livewire\WithPagination;
class Pagination extends Component
{
    use WithPagination;
    public $searchTerm,$data;
    public $openModal=false;
    public $currentPage = 1;

    public function render()
    {
    	//$query = '%'.$this->searchTerm.'%';
    		$users=	Contacts::where(function($sub_query){
    							$sub_query->where('name', 'like', '%'.$this->searchTerm.'%')
    									  ->orWhere('email', 'like', '%'.$this->searchTerm.'%')
                                          ->orWhere('id', 'like', '%'.$this->searchTerm.'%');
    						})->paginate(2);
                     return view('livewire.pagination', ['users'=>$users]);
       
    }
    
    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function(){
            return $this->currentPage;
        });
    }
    
}
