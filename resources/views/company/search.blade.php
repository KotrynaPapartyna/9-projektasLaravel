@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="{{route("company.search")}}" method="GET">
            @csrf

            <input type="text" name="search" placeholder="Enter searc key"/>
            <button type="submit">search</button>
        </form>

    <table class="table table-striped">
                <tr>
                    <th>@sortablelink('id', 'ID')</th>
                    <th>@sortablelink('title', 'TITLE')</th>
                    <th>@sortablelink('description', 'DESCRIPTION' )</th>
                    <th>@sortablelink('tyoe_id', 'TYPE' )</th>
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

