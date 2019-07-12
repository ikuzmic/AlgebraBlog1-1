@if(session()->has('flash_message'))
<div class="alert alert-success alert-dismissible">
    {{ session()->get('flash_message') }}
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
@endif