<div class="col-sm-12 mt-3">
    <input type="text"
           class="form-control @error('name') is-invalid @enderror"
           id="name"
           name="name"
           placeholder="Nazwa"
           @if(isset($user) && $user->name)
               value="{{ $user->name  }}"
           @else
               value=""
        @endif
    >
    @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
</div>

<div class="col-sm-12 mt-3">
    <input type="text"
           class="form-control @error('email') is-invalid @enderror"
           id="email"
           name="email"
           placeholder="Email"
           @if(isset($user) && $user->email)
               value="{{ $user->email  }}"
           @else
               value=""
        @endif
    >
    @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
    @endif
</div>

<div class="col-sm-12 mt-3">
    <input type="password"
           class="form-control @error('password') is-invalid @enderror"
           id="password"
           name="password"
           placeholder="Hasło"
           @if(isset($user) && $user->password)
               value="{{ $user->password  }}"
           @else
               value=""
        @endif
    >
    @if ($errors->has('password'))
        <span class="text-danger">{{ $errors->first('password') }}</span>
    @endif
</div>

<div class="col-sm-12 mt-3">
    <select id="role"
            class="form-select @error('role') is-invalid @enderror"
            aria-label="Roles"
            name="role"
            data-placeholder="Uprawnienia"
            style="width: 100%">

        @forelse ($availableRoles as $role)
            <option
                value="{{ $role->id }}"
                @if(isset($user) && $user->hasRole($role->name))
                    selected
                @endif
            >
                {{ $role->name }}
            </option>
        @empty

        @endforelse

    </select>
    @if ($errors->has('role'))
        <span class="text-danger">{{ $errors->first('role') }}</span>
    @endif
</div>
