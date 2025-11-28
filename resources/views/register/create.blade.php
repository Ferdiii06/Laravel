
<!DOCTYPE html>
<html>
<head><script src="https://cdn.tailwindcss.com"></script></head>
<body>
  <div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
      <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>
      @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
          <ul>
            @foreach($errors->all() as $err) <li>{{ $err }}</li> @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('register.store') }}" method="POST">@csrf
        <div class="mb-4">
          <label class="block text-sm font-medium mb-1">Name</label>
          <input name="name" value="{{ old('name') }}" required class="mt-1 w-full px-3 py-2 border rounded" />
        </div>

        <div class="mb-4">
          <label class="block text-sm font-medium mb-1">Email</label>
          <input type="email" name="email" value="{{ old('email') }}" required class="mt-1 w-full px-3 py-2 border rounded" />
        </div>

        <div class="mb-4 relative">
          <label class="block text-sm font-medium mb-1">Password</label>
          <input id="password" type="password" name="password" required class="mt-1 w-full px-3 py-2 border rounded pr-10" />
          <button type="button" id="togglePassword" aria-label="Toggle password visibility"
                  class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700 p-1 rounded focus:outline-none focus:ring-2 focus:ring-indigo-200">
            <!-- eye icon (closed by default => 'eye' that indicates hidden) -->
            <svg id="iconPassword" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
            </svg>
          </button>
        </div>

        <div class="mb-6 relative">
          <label class="block text-sm font-medium mb-1">Confirm Password</label>
          <input id="password_confirmation" type="password" name="password_confirmation" required class="mt-1 w-full px-3 py-2 border rounded pr-10" />
          <button type="button" id="togglePasswordConfirm" aria-label="Toggle confirm password visibility"
                  class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700 p-1 rounded focus:outline-none focus:ring-2 focus:ring-indigo-200">
            <svg id="iconPasswordConfirm" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
            </svg>
          </button>
        </div>

        <button class="w-full bg-green-600 text-white py-2 rounded">Register</button>
      </form>
    </div>
  </div>

  <script>
    (function () {
      const pw = document.getElementById('password');
      const pwBtn = document.getElementById('togglePassword');
      const iconPw = document.getElementById('iconPassword');

      const pwc = document.getElementById('password_confirmation');
      const pwcBtn = document.getElementById('togglePasswordConfirm');
      const iconPwc = document.getElementById('iconPasswordConfirm');

      const eye = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>';
      const eyeOff = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.958 9.958 0 012.185-3.552"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"d="M3 3l18 18"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.5 10.5a3 3 0 004.5 4.5"/>';

      pwBtn.addEventListener('click', () => {
        const shown = pw.type === 'text';
        pw.type = shown ? 'password' : 'text';
        iconPw.innerHTML = shown ? eye : eyeOff;
      });

      pwcBtn.addEventListener('click', () => {
        const shown = pwc.type === 'text';
        pwc.type = shown ? 'password' : 'text';
        iconPwc.innerHTML = shown ? eye : eyeOff;
      });
    })();
  </script>
</body>
</html>