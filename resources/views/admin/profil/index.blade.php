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

        /* .profile-container:hover .camera-icon {
            display: flex;
        } */
        
        .editProfileForm {
          display: none;
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
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
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
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#profil" data-toggle="tab">Edit Profil</a></li>
                  <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Ubah Password</a></li>
                </ul>
              </div>

            <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="profil">
                    <div class="text-danger">
                        {{ session()->get('error1') }}
                    </div>  
                    <div class="completeProfil" id="completeProfil">
                      <div class="col-sm-12">
                        <button id="editProfilBtn" class="btn btn-sm btn-danger" style="margin-bottom: 16px"><i class="fas fa-user-edit"></i></button>
                      </div>
                      <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" value="{{ Auth::user()->name }}" class="form-control" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" value="{{ Auth::user()->email }}" class="form-control" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" value="{{ Auth::user()->username }}" class="form-control" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="editProfileForm" id="editProfileForm">
                      <div class="col-sm-12 form-group">
                        <button id="bioProfilBtn" class="btn btn-sm btn-danger"><i class="fas fa-user"></i></button>
                      </div>
                      <form class="form-horizontal" action="{{ route('update.profil') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group">
                          <input type="file" id="fileInput" accept=".jpg,.png" class="file-input" name="avatar">
                          </div>
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-10">
                            <input type="text" name="nama" class="form-control @error('nama')
                            is-invalid
                        @enderror" id="inputName" placeholder="Name" value="{{ Auth::user()->name }}">
                            @error('nama')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="email" name="email" class="form-control @error('email')
                            is-invalid
                            @enderror" id="inputEmail" placeholder="Email" value="{{ Auth::user()->email }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Username</label>
                          <div class="col-sm-10">
                            <input type="text" name="username" class="form-control @error('username')
                            is-invalid
                        @enderror" id="inputUsername" placeholder="Username" value="{{ Auth::user()->username }}">
                          @error('username')
                              <div class="text-danger">{{ $message }}</div>
                          @enderror    
                      </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                          <div class="col-sm-10">
                            <input type="password" name="password" class="form-control @error('password')
                            is-invalid
                        @enderror" id="inputPassword" placeholder="Password">
                              @error('password')
                                  <div class="text-danger">{{ $message }}</div>
                              @enderror                        
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-dark">Ubah</button>
                          </div>
                        </div>
                      </form>
                    </div>  
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="password">
                    <form class="form-horizontal" action="{{ route('update.password') }}" method="POST">
                        @csrf

                        @session('error')
                        <div class="text-danger">
                            {{ session('error2') }}
                        </div>
                        @endsession

                        @session('success')
                        <div class="text-success">
                            {{ session('success2') }}
                        </div>
                        @endsession
                          
                      <div class="form-group row">
                        <label for="inputNewPass" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                          <input type="password" name="newpassword" class="form-control @error('newpassword')
                          is-invalid
                      @enderror" id="InputNewPass" placeholder="New Password">
                          @error('newpassword')
                              <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputRePass" class="col-sm-2 col-form-label">Re Password</label>
                        <div class="col-sm-10">
                          <input type="password" name="repassword" class="form-control @error('repassword')
                          is-invalid
                      @enderror" id="InputRePass" placeholder="Re Enter Password">
                          @error('repassword')
                              <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Current Password</label>
                        <div class="col-sm-10">
                          <input type="password" name="currentpassword" class="form-control @error('currentpassword')
                          is-invalid
                          @enderror " id="inputPassword" placeholder="Current Password">
                          @error('currentpassword')
                              <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-dark">Ubah</button>
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

  let editProfileForm = document.getElementById('editProfileForm');
  let completeProfil = document.getElementById('completeProfil');
  let btnEditProfil = document.getElementById('editProfilBtn');
  let bioProfilBtn = document.getElementById('bioProfilBtn');
  let profileContainer = document.querySelector('.profile-container');
  let cameraIcon = document.querySelector('.camera-icon');

  console.log(profileContainer);
  console.log(cameraIcon);

  btnEditProfil.addEventListener('click',function(){
    editProfileForm.style.display = 'inherit';
    completeProfil.style.display = 'none';

    profileContainer.addEventListener('mouseover',function(e){
      cameraIcon.style.display = 'flex';
    })

    profileContainer.addEventListener('mouseout',function(e){
      cameraIcon.style.display = 'none';
    })
    
  }) 

  bioProfilBtn.addEventListener('click',function(){
    editProfileForm.style = 'none';
    completeProfil.style = 'inherit';
    cameraIcon.style.display = 'none';

    profileContainer.addEventListener('mouseover',function(e){
      cameraIcon.style.display = 'none';
    })

    profileContainer.addEventListener('mouseout',function(e){
      cameraIcon.style.display = 'none';
    })

  })

  btnEditProfil.addEventListener('click',function(){
    editProfileForm.style.display = 'inherit';
    completeProfil.style.display = 'none';
  }) 

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