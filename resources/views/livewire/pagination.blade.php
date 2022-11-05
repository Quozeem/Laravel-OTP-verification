
<div>
    <div class="container">
	    <div class="row">
	        <div class="col-md-12">	  
           
          
               
	            <input type="text"  class="form-control" placeholder="Search" wire:model="searchTerm" />      
    @if (count($users) == null)
              @include('livewire.text')
          @elseif($searchTerm != null)
            @include('livewire.table')
              @endif
             

	        </div>


	    </div>
	</div>
</div>
