@extends('layouts.main')
@push('css')
    <style>
        .file-input {
            display: none; /* Sembunyikan elemen input file asli */
        }

        .profile-container {
            position: relative;
            width: 128px;
            height: 128px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto;
        }

        .profile-user-img {
            object-fit: cover;
            border-radius: 50%;
            width: 128px;
            height: 128px;
        }

        .camera-icon {
            position: absolute;
            width: 128px;
            height: 128px;
            display: none;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            color: white;
            cursor: pointer;
            justify-content: center;
            align-items: center;
            top: 0;
            left: 0;
        }

        .profile-container:hover .camera-icon {
            display: flex;
        }

    </style>
@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center profile-container">
                  @php
                    $avatars = Auth::user()->avatars == '' ? 'user-default.jpg' : Auth::user()->avatars;
                  @endphp
                  <center>
                    <img class="profile-user-img img-fluid img-circle"
                         src="{{ url('/assets/avatars/'.$avatars) }}"
                         alt="User profile picture"
                         id="profileImage">
                    <label for="fileInput" class="camera-icon">
                    <i class="fas fa-camera"></i>
                    </label>
                  </center>
                </div>
                <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                <p class="text-muted text-center">Administrator</p>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                <div class="">
                    <div class="text-danger">
                        {{ session()->get('message1') }}
                    </div>    
                </div>
                    <form class="form-horizontal" action="{{ route('update.profil') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                        <input type="file" id="fileInput" accept=".jpg,.png" class="file-input" name="avatar">
                        </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" style="@error('nama')
                              is-invalid
                          @enderror" name="nama" class="form-control" id="inputName" placeholder="Name" value="{{ Auth::user()->name }}">
                          @error('nama')
                              <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" style="@error('email')
                          is-invalid
                          @enderror" name="email" class="form-control" id="inputEmail" placeholder="Email" value="{{ Auth::user()->email }}">
                          @error('email')
                              <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" style="@error('username')
                              is-invalid
                          @enderror" name="username" class="form-control" id="inputUsername" placeholder="Username" value="{{ Auth::user()->username }}">
                        @error('username')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror    
                    </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" style="@error('password')
                              is-invalid
                          @enderror" name="password" class="form-control" id="inputPassword" placeholder="Password">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror                        
                         </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Ubah</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@push('scripts')
<script>

document.getElementById('fileInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        
        const validImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!validImageTypes.includes(file.type)) {
            alert('Format gambar tidak didukung! Harap pilih file gambar dengan ekstensi .jpeg, .png, atau .gif.');
            return;
        }
        
        const reader = new FileReader();
        reader.onload = function(e) {
            const profileImage = document.getElementById('profileImage');
            profileImage.src = e.target.result;
            profileImage.style.width = '128px';
            profileImage.style.height = '128px';
        }
        reader.readAsDataURL(file);
    }
});

</script>
@endpush