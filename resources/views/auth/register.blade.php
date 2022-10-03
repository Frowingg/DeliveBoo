@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <div class="mb-4">I campi contrassegnati con * sono obbligatori</div>
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" oninput='password_confirmation.setCustomValidity(password_confirmation.value != password.value ? "Password di conferma ERRATA!" : "")'>
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome ristorante') }}*</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}*</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}*</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="VAT_number" class="col-md-4 col-form-label text-md-right">{{ __('Partita IVA (es.12345678910)') }}*</label>

                            <div class="col-md-6">
                                {{-- <input id="VAT_number" type="number" min="11" pattern="[0-9]{11}" class="form-control @error('VAT_number') is-invalid @enderror" name="VAT_number" value="{{ old('VAT_number') }}" required autocomplete="VAT_number" onKeyPress="if(this.value.length===11) return false;"> --}}
                                <input id="VAT_number" pattern="[0-9]{11}" type="text" inputmode="numeric" maxlength="11" minlength="11" class="form-control @error('VAT_number') is-invalid @enderror" name="VAT_number" value="{{ old('VAT_number') }}" required autocomplete="VAT_number">
                                @error('VAT_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user_cover" class="col-md-4 col-form-label text-md-right">{{ __('Immagine') }}</label>

                            <div class="col-md-6">
                                <input id="user_cover" type="file" class="form-control @error('user_cover') is-invalid @enderror" name="user_cover" value="{{ old('user_cover') }}" autocomplete="user_cover">
                                @error('user_cover')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        Categorie: *      
                        <div class="needs-validation">
                            @foreach($categories as $category)
                            <div class="form-check">
                                
                                <input class="form-check-input" type="checkbox" value="{{ $category->id }}" id="category-{{ $category->id }}" name="categories[]" >
                                <label class="form-check-label" for="category-{{ $category->id }}">
                                    {{ $category->name }}
                                </label>
                                
                            </div>
                            @endforeach     
                            <span id="error-check-category" style="background-color: red">
                                    
                            </span>  
                            @error('categories')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> 
                            @enderror        
                        </div> 

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}*</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}*</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>

        function handleData() {
                    let check_category = new FormData(document.querySelector("form"));
                    let categoryError = document.getElementById('error-check-category');
                    if(!check_category .has("categories[]")) {
                        categoryError.innerHTML = 'Seleziona almeno una categoria';
                        return false;
                    } else {
                        return true;
                    }
                }
            
        </script>
</div>

@endsection
