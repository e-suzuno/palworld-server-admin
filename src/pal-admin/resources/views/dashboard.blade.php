<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>

                <div class="p-6 text-gray-900">
                    <div>
                        <x-primary-button class="reboot-button">
                            再起動
                        </x-primary-button>
                    </div>
                </div>

            </div>
        </div>


    </div>

    <script>

        //再起動ボタンを押したらAPIを投げる バニラJSで書く
        const rebootButton = document.querySelector('.reboot-button');
        rebootButton.addEventListener('click', () => {
            //APIを投げる前に確認させる
            if (!confirm('再起動しますか？')) {
                return;
            }

            fetch('/api/reboot', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    alert(data.message);
                })
                .catch(error => {
                    console.log(error);
                    alert(error.message);
                });
        });


    </script>
</x-app-layout>
