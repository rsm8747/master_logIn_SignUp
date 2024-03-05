@include('layouts.app')
@section('content')
<h3><i><b>Profile Details are as:</b></i></h3>
@if(Session::get('status'))
<div class="alert alert-success" role="alert">
    {{Session::get('status')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<div class="container">
    <table class="table table-striped">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->address }}</td>
                </tr>

        </tbody>
        @endforeach
    </table>
    {{-- @endsection --}}
</div>
