<div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Login</div>
                <div card="card-body" style="margin: 10px">
                    <form wire:submit.prevent="loginUser">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" wire:model.defer="email">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="email" placeholder="********" wire:model.defer="password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember" wire:model.defer="remember">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Login</button>
                        </div>
                        <a href="{{route('password.request') }}" class="d-block text-primary">Lupa Password?</a>
                        <a href="{{route('register') }}" class="text-primary">Belum punya akun?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
