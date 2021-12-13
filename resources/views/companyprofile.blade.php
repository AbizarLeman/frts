<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Company ID</th>
            <th scope="col">Company Name</th>
            <th scope="col">ROCBN</th>
            <th scope="col">District</th>
            <th scope="col">Mukim</th>
            <th scope="col">Village</th>
            <th scope="col">Street Address</th>
            <th scope="col">Rice</th>
            <th scope="col">Broiler</th>
            <th scope="col">Vegetables</th>
            <th scope="col">Fruits</th>
            <th scope="col">Buffaloes</th>
            <th scope="col">Cattle</th>
            <th scope="col">Goats</th>
            <th scope="col">Cut Flowers</th>
            <th scope="col">Egg</th>
            <th scope="col">Ornamental Horticulture</th>
            <th scope="col">Miscellaneous</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $company->id }}</td>
            <td>{{ $company->company_name }}</td>
            <td>{{ $company->rocbn }}</td>
            <td>{{ $company->district }}</td>
            <td>{{ $company->mukim }}</td>
            <td>{{ $company->village }}</td>
            <td>{{ $company->street_address }}</td>
            <td>{{ $company->rice }}</td>
            <td>{{ $company->broiler }}</td>
            <td>{{ $company->vegetable }}</td>
            <td>{{ $company->fruit }}</td>
            <td>{{ $company->buffalo }}</td>
            <td>{{ $company->cattle }}</td>
            <td>{{ $company->egg }}</td>
            <td>{{ $company->ornamental_horticulture }}</td>
            <td>{{ $company->miscellaneous_string }}</td>
            <td>
                {{-- <a href="{{ url('/company/edit/'.$employee->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <a href="{{ url('/company/destroy/'.$employee->id) }}" class="btn btn-sm btn-danger">Delete</a> --}}
                <a href="#" class="btn btn-sm btn-warning">Edit</a>
                <a href="#" class="btn btn-sm btn-danger">Delete</a>
            </td>
        </tr>     
    </tbody>
</table>