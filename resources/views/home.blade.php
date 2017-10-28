@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Наряд</th>
            @foreach($dutyNames as $name)
                <th scope="col">{!! $name !!}</th>
            @endforeach
            <th scope="col">Старший смены</th>
        </tr>
        </thead>
        <tbody>
        @foreach($duties as $duty)
            <tr>
                <th scope="row">{!! $duty->date !!}</th>
                @foreach ($dutyNames as $name)
                    @if ($userDuties[$duty->date->format('Y-m-d')] == null)
                        <td>-</td>
                    @else
                        @if ($userDuties[$duty->date->format('Y-m-d')]->name == $name)
                            <td>{!! $userDuties[$duty->date->format('Y-m-d')]->is_night ? 'Н' : 'Д' !!}</td>
                        @else
                            <td></td>
                        @endif
                    @endif
                @endforeach
                <td>{!! $duty->user->username !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
