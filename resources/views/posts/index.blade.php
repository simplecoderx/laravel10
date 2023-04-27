
<x-app-layout>
    @extends('posts.layout')
{{-- @section('content') --}}
    <div class="card mt-5">
        <div class="card-header">
            <h2>PASSWORD MANAGER</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 mt-1 mr-1">
                    <div class="float-right">
                        <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Password</a>
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
                            <th>Platform</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th width="350px">Action</th>
                        </tr>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $post->account }}</td>
                            <td>{{ $post->username }}</td>
                            <td>{{ $post->password }}</td>
                            <td>
                                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                   
                                    <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>
                    
                                    <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                                    <a class="btn btn-primary" href="{{ route('posts.history',$post) }}">View History</a>
                                    {{-- <a href="{{ route('posts.history', $post) }}">View History</a> --}}

                   
                                    @csrf
                                    @method('DELETE')
                      
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {!! $posts->links() !!}
                </div>
            </div>
        </div>
    </div>
{{-- @endsection --}}
</x-app-layout> 