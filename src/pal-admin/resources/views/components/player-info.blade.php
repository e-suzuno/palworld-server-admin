@php

    //   $tableClasses = 'ltr:origin-top-right rtl:origin-top-left end-0';
       $tableClasses = 'border border-gray-300';

@endphp

<div>
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->

    <div class="">現在のサーバのplayer状況</div>
    <table class="{{ $tableClasses }}">
        <tr>
            <th class="w-48 {{ $tableClasses }}">1</th>
            <th class="w-48 {{ $tableClasses }}">2</th>
            <th class="w-48 {{ $tableClasses }}">3</th>
        </tr>
        @foreach($list as $row)
            <tr>
                <td class="{{ $tableClasses }}">
                    {{ $row['name'] }}
                </td>
                <td class="{{ $tableClasses }}">

                    {{ $row['playeruid'] }}
                </td>
                <td class="{{ $tableClasses }}">
                    {{ $row['steamid'] }}
                </td>
            </tr>
        @endforeach
    </table>
</div>
