<div class="card mb-3">
    <img src="https://allea.org/wp-content/uploads/2019/06/shutterstock_520698799small-1500x430.jpg" class="card-img-top" alt="...">
    <div class="card-body">
        <h2 class="card-title" style="font-weight: bold;">Daftar Siswa</h2>
        <a class="btn btn-sm btn-info active" href="{{ route('students.create') }}" style="float:right;">Tambah Data</a>
    </div>
    <table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">NIK</th>
            <th scope="col" class="col-md-2">Nama</th>
            <th scope="col">Handphone</th>
            <th scope="col">Jurusan</th>
            <th scope="col">Status</th>
            <th scope="col">Option</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td> {{ $student->nik }} </td>
            <td> {{ $student->fullname }} </td>
            <td> {{ $student->phone }} </td>
            <td> {{ $student->speciality }} </td>
            @if($student->status == 1)
            <td> Aktif </td>
            @elseif($student->status == 0)
            <td> Lulus </td>
            @endif
            <td>
                <a href="{{ route('students.show', [$student->id]) }}" class="btn btn-sm btn-info"> Tampilkan </a>
            </td> 
        </tr>
        @endforeach
      </tbody>
    </table>
</div>