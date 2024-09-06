@extends('lyouts.master-admin')

@section('content-admin')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <h1 style="color: black">
                    Hader
                </h1>
            </div>
        </div>
    </div>

<br><br>
    <table class="table  table-bordered">
        <tr>
            <td>ID</td>
            <td>Subtitle</td>
            <td>Titel</td>
            <td>Image path</td>
            <td>Bottun rad</td>
            <td>Bottun with</td>


        </tr>

      @foreach ($hader as $item)
            <tr>
                <td> {{ $item->id }}</td>
                <td>{{ $item->subtitle }}</td>
                <td>{{ $item->titel }}</td>
                <td>{{ $item->imagpath }}</td>
                <td>{{ $item->bottun_rad }}</td>
                <td>{{ $item->bottun_with }}</td>

                <td> <a href="/edithader/{{ $item->id }}" class="btn btn-primary"><i class="fas fa-pen"></i>
                        Edit</a>
                </td>


            </tr>
        @endforeach


    </table>
@endsection
