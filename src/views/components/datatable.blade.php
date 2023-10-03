<table class="table table-center table-hover datatable2">
    <thead class="thead-light">
        <tr>
            <!-- checkbox -->
            <th>
                <label class="custom_check">
                    <input type="checkbox" name="invoice">
                    <span class="checkmark"></span>
                </label>
            </th>
            @foreach($cols as $col)
            <th>{{$col['label']}}</th>
            @endforeach
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>