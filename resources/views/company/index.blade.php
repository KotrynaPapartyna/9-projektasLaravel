@extends('layouts.app')

@section('content')
    <div class="container">

    <form action="{{route("company.search")}}" method="GET">
        @csrf

        <input type="text" name="search" placeholder="Enter searc key"/>
        <button type="submit">search</button>

    </form>


    <form action="{{route('company.index')}}" method="GET">
        @csrf
        <select name="collumnname">

            {{--jeigu gautas kintamasis yra id- jis turi buti pazymetas--}}
            @if ($collumnName == 'id')
                <option value="id" selected>ID</option>
                {{--kitu atveju- jis nera pazymetas--}}
                @else
                <option value="id">ID</option>
            @endif


            @if ($collumnName == 'title')
             <option value="title" selected>Title</option>
            @else
                <option value="title">Title</option>
            @endif

            @if ($collumnName == 'description')
                <option value="description" selected>Description</option>
            @else
                <option value="description">Description</option>
            @endif

            @if ($collumnName == 'type_id')
                <option value="type_id" selected>Type</option>
            @else
                <option value="type_id">Type</option>
            @endif

        </select>

        <select name="sortby">
            @if ($sortby == "asc")
                <option value="asc" selected>ASC</option>
                <option value="desc">DESC</option>
            @else
                <option value="asc">ASC</option>
                <option value="desc" selected>DESC</option>
            @endif
        </select>

        <button type="submit">SORT</button>

    </form>
    <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Type</th>
                </tr>
                @foreach ($companies as $company)
                    <tr>
                        <td> {{$company->id }}</td>
                        <td> {{$company->title }}</td>
                        <td> {!!$company->description !!}</td>
                        <td> {{$company->companyType->title }}</td>
                    </tr>
                @endforeach
    </table>

    {{-- {{ $companies->links() }} --}}

    {{--itraukt prarastus kintamuosius i companijas}}--}}
   {!! $companies->appends(Request::except('page'))->render() !!}

</div>
@endsection
