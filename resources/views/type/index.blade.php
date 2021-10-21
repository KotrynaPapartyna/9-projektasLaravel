@extends('layouts.app')

@section('content')

    <table class="table table-striped">
                <tr>
                    {{--stulpeliu pavadinimas--}}
                    {{--<th>ID</th>--}}
                    <th>@sortablelink('id', 'ID')</th>
                    <th>@sortablelink('title', 'TITLE')</th>  {{--'stulpelio pavadinimas', 'pavadinimas- kuris atsivaizduoja'--}}
                    <th>@sortablelink('description', 'DESCRIPTION' )</th>
                </tr>

                @foreach ($types as $type)
                    <tr>
                        {{--duomenu pavadinimai su kintamasiais--}}
                        <td> {{$type->id }}</td>
                        <td> {{$type->title }}</td>
                        <td> {{$type->description }}</td>
                    </tr>
                @endforeach
    </table>
    {{--puslapiavimo idejimas. kita dalis- dedama i Controlleri--}}
    {!! $types->appends(Request::except('page'))->render() !!}
</div>
@endsection
