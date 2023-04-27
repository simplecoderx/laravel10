<x-app-layout>

    @extends('posts.layout')
    <br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="font-size:25px">Post History
                            <span>
                                <div class="float-right">
                                    <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
                                </div>
                            </span>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Platform</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Changed At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($postHistory as $history)
                                        <tr>
                                            <td>{{ $history->account }}</td>
                                            <td>{{ $history->username }}</td>
                                            <td>{{ $history->password }}</td>
                                            <td>{{ $history->changed_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>