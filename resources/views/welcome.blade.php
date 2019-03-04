@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="/profile">
                            @csrf

                            <div class="form-group">
                                <label for="file">File:</label>
                                <input class="form-control-file" type="file" id="file" accept=".xlsx, .xls, .csv" />
                                <small id="emailHelp" class="form-text text-muted">Upload your excel file here.</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Import users</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
