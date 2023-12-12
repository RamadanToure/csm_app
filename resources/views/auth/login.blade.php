@extends('layouts.app')

@section('content')


<div class="auth-page-wrapper pt-5 " >
    <!-- auth page bg -->
    <!-- <div class="auth-one-bg-position auth-one-bg"  id="auth-particles">
        <div class="bg-overlay"></div>
        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
            </svg>
        </div>
    </div> -->

    <!-- auth page content -->
    <div class="auth-page-content" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mt-sm-5 mb-4 text-white-50">
                        <div>
                        </div>
                        <!-- <p class="mt-3 fs-15 fw-medium" style="color:white">{{config('app.name')}}</p>
                        <p class="mt-3 fs-15 fw-medium">{{config('app.descrApp')}}</p> -->
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <!-- FIN -->
                    <div class="step-arrow-nav mt-n3 mx-n3 mb-3">

                        <ul class="nav nav-pills nav-justified custom-nav" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fs-15 p-3 active" id="pills-bill-info-tab" data-bs-toggle="pill" data-bs-target="#pills-bill-info" type="button" role="tab" aria-controls="pills-bill-info" aria-selected="true">
                                    <i class="ri-user-2-line fs-16 p-2 bg-primary-subtle text-primary rounded-circle align-middle me-2"></i> S'authentifier
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fs-15 p-3" id="pills-bill-address-tab" data-bs-toggle="pill" data-bs-target="#pills-bill-address" type="button" role="tab" aria-controls="pills-bill-address" aria-selected="false">
                                    <i class="ri-file-line fs-16 p-2 bg-primary-subtle text-primary rounded-circle align-middle me-2"></i> Suivre un courrier
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="pills-bill-info" role="tabpanel" aria-labelledby="pills-bill-info-tab">
                            <!-- Fin -->
                            <div class="card mt-4">
                                <!-- auth-bg-cover -->
                                <div class="card-body p-4 ">  
                                    <div class="text-center mt-2">
                                        <h5 class="text-primary">Bienvenue sur {{config('app.name')}} !</h5>
                                        <p class="text-muted">Connectez-vous</p>
                                    </div>
                                    <div class="p-2 mt-4">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="email" class="form-label">{{ __('E-mail') }}</label>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="password-input">{{ __('Mot de passe') }}</label>
                                                <div class="position-relative auth-pass-inputgroup mb-3">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="mt-4 text-center">
                                                <button type="submit" class="btn btn-dark w-100 rounded-pill"> {{ __('Se connecter') }} </button>
                                                @if (Route::has('password.request'))
                                                    <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Mot de passe oublié ?') }}
                                                    </a> -->
                                                @endif
                                            </div>

                                        </form>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- Fin -->
                        </div>
                        <!-- end tab pane -->
                        <div class="tab-pane fade" id="pills-bill-address" role="tabpanel" aria-labelledby="pills-bill-address-tab">
                            <!-- Fin -->
                            <div class="card mt-4">
                                <!-- auth-bg-cover -->
                                <div class="card-body p-4 ">
                                    <strong><div class="msgAction"></div></strong>
                                    <div class="text-center mt-2">
                                        <h5 class="text-primary">Veuillez renseigner le code de suivi du courrier</h5>
                                    </div>
                                    <div class="p-2 mt-4">
                                        <label for="refCourrier" class="form-label">Code du courrier</label>
                                        <input id="refCourrier" type="refCourrier" class="form-control" name="refCourrier" value="{{ old('refCourrier') }}"  autocomplete="off" autofocus>
                                        <span class="text-danger" id="refCourrierError"></span>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <button type="button" id="valider" class="btn btn-success w-100 rounded-pill btnCheck" onclick="CheckCode();"> Vérifier l'évolution du courrier</button>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- Fin -->
                            
                        </div>
                        <!-- end tab pane -->
                    </div>
                    <!-- FIN -->
                    <!-- end card -->
                    <div class="mt-4 text-center">
                        <p class="mb-0 text-white">Vous n'avez pas de compte ?  
                            <a href="{{ route('register') }}" class="text-white fw-semibold text-primary text-decoration-underline"> S'inscrire </a>
                        </p>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->

    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center text-white">
                    <p class="mb-0 text-muted"><span class="text-white">&copy; <script>document.write(new Date().getFullYear())</script> {{config('app.name')}}.</span></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
</div>
@endsection

    <script src="{{ url('assets/js/jquery.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        function CheckCode(){
            ref = $('#refCourrier').val();
            if(ref == ''){return;}

            $('#valider').attr("disabled",!0);
            $('#valider .flex-shrink-0').addClass("spinner-border");
            $("div.msgAction").html('').hide(200);
            $('#refCourrierError').addClass('d-none');
            $.ajax({
                type: 'GET',
                url: '{{ url("courrier/levelExacution/") }}/'+ref,
                success: function(data) {
                    $('#valider').attr("disabled",!1);
                    $('#valider .flex-shrink-0').removeClass("spinner-border");
                    if(data.response!=1){
                        $.each(data.response, function(Key, value){
                            var ErrorID = '#'+Key+'Error';
                            $(ErrorID).removeClass('d-none');
                            $(ErrorID).text(value);
                        })
                    }else{
                        if(data.fichier){
                            $("div.msgAction").html('<div class="alert alert-success alert-border-left alert-dismissible fade show" role="alert">'+data.message+data.fichier+'</div>').show(200);
                        }else{
                            $("div.msgAction").html('<div class="alert alert-warning alert-border-left alert-dismissible fade show" role="alert">'+data.message+'</div>').show(200);
                        }
                    }
                },
                error: function(data) {}
            });
        }
    </script>
    