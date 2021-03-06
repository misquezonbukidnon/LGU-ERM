<table>
    <thead>
    <tr>
        <th>Employee ID</th>
        <th>Lastname</th>
        <th>Firstname</th>
        <th>Middlename</th>
        <th>Suffix</th>
        <th>Position</th>
        <th>Office</th>
        <th>Classification</th>
        <th>Address</th>
        <th>Contact Number</th>
        <th>Employment Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($employees as $employee)
        <tr>
            <td>{{ $employee->employee_number }}</td>
            <td>{{ $employee->lastname }}</td>
            <td>{{ $employee->firstname}}</td>
            <td>{{ $employee->middlename}}</td>
            <td>{{ $employee->suffix}}</td>
            <td>{{ $employee->positions->name}}</td>
            <td>{{ $employee->offices->name}}</td>
            <td>{{ $employee->statuses->name}}</td>
            <td>{{ $employee->address}}</td>
            <td>{{ $employee->contact_number}}</td>
            <td>{{ $employee->employmentstatuses->name}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
