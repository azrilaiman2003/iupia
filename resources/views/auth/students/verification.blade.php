@include('layouts.partials.head')
<section class="bg-gray-50 dark:bg-gray-900">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
          <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
          i-UPIA
      </a>
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  Login Verification
              </h1>
              <form id="tacForm" class="space-y-4 md:space-y-6" method="POST" action="{{ route('student.verify')}}">
                @csrf
                <div class="flex space-x-3"><em></em>
                    <input type="text" maxlength="1" name="digit1" class="pin-input block text-center border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" autofocus style="width: 50px;">
                    <input type="text" maxlength="1" name="digit2" class="pin-input block text-center border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" style="width: 50px;">
                    <input type="text" maxlength="1" name="digit3" class="pin-input block text-center border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" style="width: 50px;">
                    <input type="text" maxlength="1" name="digit4" class="pin-input block text-center border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" style="width: 50px;">
                    <input type="text" maxlength="1" name="digit5" class="pin-input block text-center border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" style="width: 50px;">
                    <input type="text" maxlength="1" name="digit6" class="pin-input block text-center border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" style="width: 50px;">
                    <input type="hidden" name="entered_tac" id="entered_tac">
                  </div>
                  <div class="flex items-center justify-between">
                      <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Not Receive The Code?</a>
                  </div>
                  <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      Don’t have an account yet? <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                  </p>
              </form>
          </div>
      </div>
  </div>
</section>

<script>
    const inputs = document.querySelectorAll('.pin-input');

    inputs.forEach((input, index) => {
      input.addEventListener('input', (e) => {
        const currentValue = e.target.value;
        if (currentValue.length === 1) {
          if (index < inputs.length - 1) {
            inputs[index + 1].focus();
          } else {
            const isAllFilled = [...inputs].every(input => input.value.length === 1);
            if (isAllFilled) {
                const entered_tac = Array.from(inputs).map(input => input.value).join('');
                console.log('Entered TAC:', entered_tac);
                document.getElementById('entered_tac').value = entered_tac;
                document.querySelector('form').submit();
            }
          }
        }
      });

      input.addEventListener('keydown', (e) => {
        const key = e.key;
        if (key === 'Backspace' && index > 0 && !input.value) {
          inputs[index - 1].focus();
        }
      });

      input.addEventListener('keypress', (e) => {
        const allowedChars = /^[0-9]$/;
        const keyPressed = e.key;

        if (!allowedChars.test(keyPressed)) {
          e.preventDefault();
        }
      });
    });
    </script>
