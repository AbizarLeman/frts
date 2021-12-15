@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="{{ url('/report/filter/') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Output Type</label>
                        <input name="employeeID" type="text" class="form-control" placeholder="01-999999" required>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>First Name</label>
                                <input name="firstName" type="text" class="form-control" placeholder="First Name" required>
                            </div>
                            <div class="col">
                                <label>Last Name</label>
                                <input name="lastName" type="text" class="form-control" placeholder="Last Name" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Gender</label>
                                <select name="gender" class="form-control" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col">
                                <label>Date of Birth</label>
                                <input name="dob" type="date" class="form-control" required>
                            </div>
                            <div class="col">
                                <label>Contact No</label>
                                <input name="contact" type="number" class="form-control" placeholder="8888888" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email address</label>
                        <input name="email" type="email" class="form-control" placeholder="name@example.com" required>
                    </div>
                    <div class="form-group">
                        <label>Home address</label>
                        <textarea name="address" class="form-control" row="3"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Department</label>
                                <input name="department" type="text" class="form-control" placeholder="Department" required>
                            </div>
                            <div class="col">
                                <label>Designation</label>
                                <input name="designation" type="text" class="form-control" placeholder="Designation" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Start Date</label>
                                <input name="startDate" type="date" class="form-control" required>
                            </div>
                            <div class="col">
                                <label>Salary</label>
                                <input name="salary" type="number" class="form-control" placeholder="123" required>
                            </div>
                            <div class="col">
                                <label>Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="Active">Active</option>
                                    <option value="Not Active">Not Active</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="reset" class="btn btn-warning" value="Reset">
                    <input type="submit" class="btn btn-info" value="Save">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
