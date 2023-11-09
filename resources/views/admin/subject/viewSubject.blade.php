@extends('layout.layout')

@section('content')
    @include('layout.success-message')
    @include('layout.error-message')
    <h1 class="text-center">SUBJECT MANAGEMENT</h1>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        {{ Breadcrumbs::render('subject') }}
    </nav>
    <div>
        <div>
            <a class="btn btn-primary mt-3" href="{{ route('createSubject') }}">New Subject</a>
        </div>
        <table class="table">
            <tr class="text-center">
                <th>Id</th>
                <th>Name</th>
                <th>credit</th>
                <th>Notes</th>
                <th>Action</th>
            </tr>
            @foreach ($subjects as $item)
                <tr class="text-center">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->credits }}</td>
                    <td>{{ $item->notes }}</td>
                    <td>
                        <form action="{{ route('deleteSubject', [$item->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-primary" href="{{ route('editSubject', $item->id) }}">Edit</a>
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="pagination">
            {{ $subjects->links() }}
        </div>

    </div>
@endsection
