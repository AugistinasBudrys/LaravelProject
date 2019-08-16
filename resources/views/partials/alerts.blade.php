<div class='container'>
@if(session('success'))
    <div class='alert alert-primary' role='alert'>
        {{session('success')}}
    </div>
@endif
@if(session('warning'))
    <div class='alert alert-danger' role='alert'>
        {{session('warning')}}
    </div>
@endif
@error('email')
<span class='invalid-feedback' role='alert'>
                            <strong>whoop</strong>
                        </span>
@enderror
</div>