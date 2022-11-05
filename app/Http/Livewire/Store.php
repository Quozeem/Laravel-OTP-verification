<?php
namespace App\Http\Livewire;

use App\Models\Contacts;
use Livewire\Component;
use validator;
use Illuminate\Http\Request;
class Store extends Component
{
    
        public $posts, $title, $description, $post_id;
        public $updateMode = false;
        
       
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
      
        public function text()
        {
           //$this->posts = Contacts::all();
            return view('livewire.create');
        }
      
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        private function resetInputFields(){
            $this->title = '';
            $this->description = '';
        }
       
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        public function store(Request $request)
        {
            $validatedDate = $request->validate([
                'title' => 'required',
                'description' => 'required',
            ]);
            $validatedDate=$request->all();
            Contacts::create($validatedDate);
      
            session()->flash('message', 'Post Created Successfully.');
      
            $this->resetInputFields();
        }
      
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
    }
    ?>