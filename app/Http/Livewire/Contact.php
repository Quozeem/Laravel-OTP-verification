<?php
namespace App\Http\Livewire;

use App\Models\Contacts;
use Livewire\Component;
class Contact extends Component
{
    public $data, $name, $email, $selected_id,$title,$description,$post_id;
    public $openModal = false; 
    public $openModalcreate=false;

    public function render()
    {
        $this->data = Contacts::all();
        return view('livewire.contact');
    }
    private function resetInput()
    {
        $this->name = null;
        $this->email = null;
        $this->title = null;
        $this->description = null;
        $this->post_id = null;
    }
    public function create()
    {
        $this->openModalcreate = true;
    }
    public function store()
    {
        $this->validate([
            'name' => 'required|min:5',
            'email' => 'required',
            'title' => 'required',
            'description' => 'required',
            'post_id' => 'required',
          //  'email' => 'required|email:rfc,dns'
        ]);
        Contacts::create([
            'name' => $this->name,
            'email' => $this->email,
            'description' => $this->description,
            'post_id' => $this->post_id,
            'title' => $this->title
        ]);
        $this->resetInput();
        $this->openModalcreate = false;
    }
    public function edit($id)
    {
        $record = Contacts::findOrFail($id);
        $this->selected_id = $id;
        $this->name = $record->name;
        $this->email = $record->email;
        $this->openModal = true;
    }
    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'name' => 'required|min:5',
            'email' => 'required',
        ]);
        if ($this->selected_id) {
            $record = Contacts::find($this->selected_id);
            $record->update([
                'name' => $this->name,
                'email' => $this->email
            ]);
            $this->resetInput();
            $this->openModal = false;
            session()->flash('message', 'Post Updated Successfully.');
        }
    }
    public function destroy($id)
    {
        if ($id) {
            $record = Contacts::where('id', $id);
            $record->delete();
           session()->flash('message', 'Post Deleted Successfully.');
        }
    }
}
    ?>