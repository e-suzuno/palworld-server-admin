@php
    $buttonClass ="px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-s-lg hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700";
@endphp

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
                    <x-player-info></x-player-info>
                </div>

                <div class="p-6 text-gray-900">

                    <div>Action Button</div>
                    <div class="inline-flex rounded-md shadow-sm" role="group">
                        <button type="button" class="reboot-button {{ $buttonClass }}">
                            再起動
                        </button>

                        <button type="button" class="backup-button {{ $buttonClass }}">
                            セーブの手動backup
                        </button>
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
                    alert("再起動の準備ができました。５分以内に実行されます。");
                })
                .catch(error => {
                    console.log(error);
                    alert(error.message);
                });
        });

        //手動バックアップを押した時の処理
        const backupButton = document.querySelector('.backup-button');
        backupButton.addEventListener('click', () => {
            //APIを投げる前に確認させる
            if (!confirm('セーブの手動backupを実行しますか？')) {
                return;
            }

            fetch('/api/backup', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            })
                .then(response => response.json())
                .then(data => {
                    alert("セーブの手動backupを実行しました。");
                })
                .catch(error => {
                    console.log(error);
                    alert(error.message);
                });
        });


    </script>
</x-app-layout>
