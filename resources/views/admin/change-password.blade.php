@include('admin.header')

<div class="main-content">

    <div class="page-header">
        <div>
            <h1>Change Password</h1>
            <p class="text-muted mb-0">Update your admin account password</p>
        </div>
    </div>

    <div class="stat-card">

        {{-- Alerts --}}
        @if(session('success'))
            <div style="background:#d4edda;color:#155724;padding:10px;border-radius:5px;margin-bottom:15px;">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div style="background:#f8d7da;color:#721c24;padding:10px;border-radius:5px;margin-bottom:15px;">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.change.password.post') }}" method="POST"
              style="display:flex;flex-direction:column;gap:15px;">
            @csrf


            <div style="position:relative;">
                <label><strong>Current Password</strong></label>
                <input type="password" name="current_password" id="current_password" required
                       style="width:100%;padding:10px 40px 10px 10px;border:1px solid #ccc;border-radius:5px;">
                <span class="toggle-password" toggle="#current_password" style="position:absolute;top:38px;right:15px;cursor:pointer;">
                    <i class="bi bi-eye-slash" id="eye_current_password"></i>
                </span>
                @error('current_password')
                    <small style="color:red;">{{ $message }}</small>
                @enderror
            </div>

            <div style="position:relative;">
                <label><strong>New Password</strong></label>
                <input type="password" name="new_password" id="new_password" required
                       style="width:100%;padding:10px 40px 10px 10px;border:1px solid #ccc;border-radius:5px;">
                <span class="toggle-password" toggle="#new_password" style="position:absolute;top:38px;right:15px;cursor:pointer;">
                    <i class="bi bi-eye-slash" id="eye_new_password"></i>
                </span>
                @error('new_password')
                    <small style="color:red;">{{ $message }}</small>
                @enderror
            </div>

            <div style="position:relative;">
                <label><strong>Confirm New Password</strong></label>
                <input type="password" name="new_password_confirmation" id="new_password_confirmation" required
                       style="width:100%;padding:10px 40px 10px 10px;border:1px solid #ccc;border-radius:5px;">
                <span class="toggle-password" toggle="#new_password_confirmation" style="position:absolute;top:38px;right:15px;cursor:pointer;">
                    <i class="bi bi-eye-slash" id="eye_new_password_confirmation"></i>
                </span>
            </div>

            <button type="submit"
                style="background:#007bff;color:white;padding:12px;border:none;border-radius:5px;font-size:16px;">
                Update Password
            </button>
        </form>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.js"></script>
<script>
    document.querySelectorAll('.toggle-password').forEach(function(toggle) {
        toggle.addEventListener('click', function() {
            var input = document.querySelector(this.getAttribute('toggle'));
            var icon = this.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            } else {
                input.type = 'password';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            }
        });
    });
</script>

@include('admin.footer')
