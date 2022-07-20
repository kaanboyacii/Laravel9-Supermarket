@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <Button type="button" class="close" data-dismiss="alert">x</Button>
    <strong>{{ $message }}</strong>
</div>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <Button type="button" class="close" data-dismiss="alert">x</Button>
    <strong>{{ $message }}</strong>
</div>
@endif
@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
    <Button type="button" class="close" data-dismiss="alert">x</Button>
    <strong>{{ $message }}</strong>
</div>
@endif
@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
    <Button type="button" class="close" data-dismiss="alert">x</Button>
    <strong>{{ $message }}</strong>
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger alert-block">
    <Button type="button" class="close" data-dismiss="alert">x</Button>
    Check the following errors :(
</div>
@endif
