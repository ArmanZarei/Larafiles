<form action="" method="POST" class="col-sm-12">
    @include('admin.partials.errors')
    {{ csrf_field() }}
    <div class="form-group">
        @php($user_name = isset($user) ? $user->name : '')
        <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{ old("name",$user_name) }}">
    </div>
    <div class="form-group">
        @php($user_email = isset($user) ? $user->email : '')
        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="{{ old("email",$user_email) }}">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
    <div class="form-row">
        <div class="col-sm-6 col-md-3">
            @php($user_wallet = isset($user) ? $user->wallet : 0)
            <label for="wallet">Wallet</label>
            <input type="number" class="form-control" id="wallet" name="wallet" value="{{ old("wallet",$user_wallet) }}" min="0">
        </div>
        <div class="col-sm-6 col-md-3">
            <label for="role">Role</label>
            @php($role = old('role', isset($user) ? $user->role : 1))
            <select name="role" id="role" class="form-control">
                <option value="1" {{ ($role == 1)?'selected':'' }}>Normal</option>
                <option value="2" {{ ($role == 2)?'selected':'' }}>Admin</option>
            </select>
        </div>
    </div>
    <button class="btn btn-primary mt-3" type="submit">Create User</button>
</form>