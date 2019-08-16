@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row event-padding-block justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{trans('users.manage_users')}}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">{{trans('users.name')}}</th>
                                <th scope="col">{{trans('users.email')}}</th>
                                <th scope="col">{{trans('users.roles')}}</th>
                                <th scope="col">{{trans('users.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    @if($user->hasAnyRole('admin')!='user')
                                        <th>{{ $user->name }}</th>
                                        <th>{{ $user->email }}</th>
                                        <th>{{ implode(', ',$user->roles()->get()->pluck('name')->toArray()) }}</th>
                                        <th>
                                            <a href="{{route('users.edit', $user->id)}}" class="float-left">
                                                <button type="button"
                                                        class="btn btn-primary mr-2">{{trans('users.btn_edit')}}</button>
                                            </a>
                                            <form action="{{route('users.destroy',$user->id)}}" method="POST"
                                                  class="float-left">
                                                {{method_field('DELETE')}}
                                                @csrf
                                                <button type="submit"
                                                        class="btn btn-danger btn-sn">{{trans('users.btn_delete')}}</button>
                                            </form>
                                        </th>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
