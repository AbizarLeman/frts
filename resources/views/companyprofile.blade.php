<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Company ID</th>
            <th scope="col">Company Description</th>
            <th scope="col">Type of produce list</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $company->id }}</td>

            <td><b>Company Name:</b>{{ $company->company_name }}<br>
                <b>ROCBN:</b>{{ $company->rocbn }}<br>
                <b>District:</b>{{ $company->district }}<br>
                <b>Mukim:</b>{{ $company->mukim }}<br>
                <b>Village:</b>{{ $company->village }}<br>
                <b>Street Address:</b>{{ $company->street_address }}<br>
            </td>

            <td><b>Rice:</b>{{ $company->rice }}<br>
                <b>Broiler:</b>{{ $company->broiler }}<br>
                <b>Vegetable:</b>{{ $company->vegetable }}<br>
                <b>Fruit:</b>{{ $company->fruit }}<br>
                <b>Buffalo:</b>{{ $company->buffalo }}<br>
                <b>Cattle:</b>{{ $company->cattle }}<br>
                <b>Egg:</b>{{ $company->egg }}<br>
                <b>Ornamental Horticulture:</b>{{ $company->ornamental_horticulture }}<br>
                <b>Miscellaneous:</b>{{ $company->miscellaneous_string }}<br>
            </td>

            <td>
                {{-- <a href="{{ url('/company/edit/'.$employee->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <a href="{{ url('/company/destroy/'.$employee->id) }}" class="btn btn-sm btn-danger">Delete</a> --}}
                <a href="#" class="btn btn-sm btn-warning">Edit</a>
                <a href="#" class="btn btn-sm btn-danger">Delete</a>
            </td>
        </tr>     
    </tbody>
</table>