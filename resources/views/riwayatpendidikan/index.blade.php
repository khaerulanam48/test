@extends('riwayatpendidikan.main')

@section('content')
<div class="container">
    <!-- Page Content goes here -->
    <center>
        <h4>Riwayat Pendidikan</h4>
    </center>


    <hr>
    <div class="row">
        <div class="col s6 ">
            <a href="{{route ('riwayatpendidikan.create')}}" class="btn-floating btn-medium waves-effect waves-light red"><i class="material-icons">add</i></a>
        </div>

        <div class="col s6 ">
        <form action="/searchriwayatpendidikan" method="get">
            <div class="col s6">
                <input placeholder="Search" name="searchriwayatpendidikan" type="search" required>
            </div>
            
            <div class="col s4">
                <button id="searchriwayatpendidikan" class="btn-medium waves-effect waves-light btn red" type="submit" name="action">Cari
                    <i class="material-icons right">search</i>
                </button>
            </div>
            </form>
        </div>
    </div>
    
    <div class="row">
    <table class="responsive-table highlight">
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA</th>
                <th>PENDIDIKAN TERAKHIR</th>
                <th>TAHUN LULUS</th>
                <th>ACTION</th>
            </tr>
        </thead>

        <tbody>
            
            @foreach ($pegawai as $no => $value )

            <tr>
                <td>{{ ++$no + ($pegawai->currentPage()-1) * $pegawai->perPage() }}</td>
                <td>{{ $value->nama}}</td>
                <td>{{ $value->pendidikanterakhir}}</td>
                <td>{{ $value->tahunlulus}}</td>
                <td>
                    <div class="row">
                        <div class="col s2">
                            <a class="btn-floating waves-effect btn-small waves-light red" href="{{ route('riwayatpendidikan.show', $value->id) }}"><i class="material-icons">visibility</i></a>
                        </div>
                        <div class="col s2">
                            <a class="btn-floating waves-effect btn-small waves-light red" href="{{ route('riwayatpendidikan.edit', $value->id) }}"><i class="material-icons">edit</i></a>
                        </div>
                        <div class="col s2">
                            <form action="{{ route('riwayatpendidikan.destroy', $value->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-floating waves-effect btn-small waves-light red"><i class="material-icons">delete</i></button>
                                
                            </form>
                        </div>
                    </div>

                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    </div>

    <ul class="pagination">
    {{$pegawai->links()}}
    </ul>
    
            
</div>
@endsection