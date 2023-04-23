@extends('password.layout')
 
@section('content')
    <div class="card mt-5">
        <div class="card-header">
            <h2>Laravel 10 CRUD Example from scratch - NiceSnippets.com</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 mt-1 mr-1">
                    <div class="float-right">
                        <a class="btn btn-success" href="{{ route('password.create') }}"> Create New Post</a>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                </div>
                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($password as $password)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $password->account }}</td>
                            <td>{{ $password->username }}</td>
                            <td>{{ $password->password }}</td>
                            <td>
                                <form action="{{ route('password.destroy',$password->id) }}" method="POST">
                   
                                    <a class="btn btn-info" href="{{ route('password.show',$password->id) }}">Show</a>
                    
                                    <a class="btn btn-primary" href="{{ route('password.edit',$password->id) }}">Edit</a>
                   
                                    @csrf
                                    @method('DELETE')
                      
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {!! $password->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection