@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Il mio account</h1>
            <p>
                <strong>Username: </strong> {{Auth::user()->name}}
            </p>
            <p>
                <strong>Email: </strong> {{Auth::user()->email}}
            </p>
            <p>
                @if(Auth::user()->api_token)
                <strong>Api Token: </strong> {{Auth::user()->api_token}}
            @else
                <form action="{{route('admin.generate_token')}}" method="post">
                    @csrf
                    <input type="submit" name="" value="Genera API token">
                </form>
            @endif
            </p>
        </div>
    </div>
</div>
@endsection
