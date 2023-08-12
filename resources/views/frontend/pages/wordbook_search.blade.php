<div class="table-responsive">
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Serial </th>
            <th scope="col">Bengali Word</th>
            <th scope="col">Arabic Word</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i=1;
            @endphp
            @foreach ($data as $wordbook)  
            <tr>
                <td>#{!! $i++ !!}</td>
                <td>{!! $wordbook->bengali_word !!}</td>
                <td>{!! $wordbook->arabic_word !!}</td>
            </tr>
            @endforeach    
        </tbody>
    </table>
</div>