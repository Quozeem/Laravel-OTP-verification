
<div>
    <div class="form-group">
        <label for="exampleInputPassword1">Enter Name</label>
        <input type="text" wire:model="name" class="form-control input-sm"  placeholder="Name">
    </div>
    <div class="form-group">
        <label>Enter Email</label>
        <input type="email" class="form-control input-sm" placeholder="Enter email" wire:model="email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Enter Title</label>
        <input type="text" wire:model="title" class="form-control input-sm"  placeholder="Name">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Enter description</label>
        <input type="text" wire:model="description" class="form-control input-sm"  placeholder="description">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Enter Post_id</label>
        <input type="text" wire:model="post_id" class="form-control input-sm"  placeholder="description">
    </div>
    <button wire:click="store()" class="btn btn-primary">Submit</button>
</div>
