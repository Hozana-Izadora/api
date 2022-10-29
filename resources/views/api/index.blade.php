<x-index title="Melhores Opções">
    
    <table class="table" id="myTable">
        <thead>
            <tr>
                @foreach($options as $key=>$option)
                <th>{{$key}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
            @foreach($options as $option)
                <td>{{$option}}</td>
                @endforeach
            </tr>
        </tbody>
    </table>
</x-index>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>