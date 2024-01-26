<div>
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->


    <table border="1">
        <tr>
            @foreach($list as $row)
                <td>

                    {{ $row['name'] }}
                </td>
                <td>

                    {{ $row['playeruid'] }}
                </td>
                <td>

                    {{ $row['steamid'] }}
                </td>
            @endforeach
        </tr>
    </table>
</div>
