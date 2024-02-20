@extends('layouts.app')
@section('content')
    <h6>Add Employee</h6>
    <div class="card-body ">
        <form role="form text-left" method="POST" enctype="multipart/form-data" action="{{ route('Add Submit') }}">
            @csrf

            @if ($errors->any())
                @foreach ($errors as $error)
                    <li>{{ $error }}</li>
                @endforeach
            @endif

            @if (Session::get('error'))
                <li>{{ Session::get('error') }}</li>
            @endif

            @if (Session::get('success'))
                <li>{{ Session::get('success') }}</li>
            @endif

            <div class="mb-3 d-flex justify-content-center">
                <input type="text" class="form-control w-50" placeholder="First Name" aria-label="FirstName"
                    aria-describedby="first-name" name="first_name" required>
            </div>
            <div class="mb-3 d-flex justify-content-center">
                <input type="text" class="form-control w-50" placeholder="Last Name" aria-label="LastName"
                    aria-describedby="last-name" name="last_name" required>
            </div>
            <div class="mb-3 d-flex justify-content-center">
                <input type="text" class="form-control w-50" placeholder="Middle Name" aria-label="MiddleName"
                    aria-describedby="middle-name" name="middle_name" required>
            </div>
            <div class="mb-3 d-flex justify-content-center align-items-center flex-column">
                <label class="form-check-label" for="date_of_birth" required>Date Of Birth</label>
                <input type="date" class="form-control w-25" placeholder="Date of Birth" aria-label="DateOfBirth"
                    aria-details="date-of-birth" id="date_of_birth" name="date_of_birth" required>
            </div>
            <div class="mb-3 d-flex justify-content-center align-items-center">
                <div class="form-check">
                    <input class="form-check-input mx-1" type="radio" name="gender" id="gender" value="male"
                        required>
                    <label class="form-check-label" for="gender">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input mx-1" type="radio" name="gender" id="gender" value="female"
                        required>
                    <label class="form-check-label" for="gender">
                        Female
                    </label>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-center">
                <input type="textfield" class="form-control w-50" placeholder="Address" aria-label="Address"
                    aria-describedby="address" name="address" required>
            </div>
            <div class="mb-3 d-flex justify-content-center">
                <input type="email" class="form-control w-50" placeholder="Email" aria-label="Email"
                    aria-details="email-addon" name="email" required>
            </div>
            <div class="mb-3 d-flex justify-content-center">
                <input type="number" class="form-control w-50" placeholder="Phone Number" aria-label="PhoneNumber"
                    aria-describedby="phone-number" name="phone_number" required>
            </div>
            <div class="mb-3 d-flex justify-content-center">
                <select name="job_title" id="" class="form-control w-50" required>
                    <option value="">Select Job Title</option>
                    <option value="Web Developer">Web Developer</option>
                    <option value="Software Engineer">Software Engineer</option>
                    <option value="Data Analyst">Data Analyst</option>
                </select>
            </div>


            <div class="text-center">
                <button type="submit" class="btn bg-gradient-dark w-25 my-5 mb-2 mx-3">Confirm</button>
                <a href="{{ route('Employee List') }}" class="btn bg-gradient-danger w-25 my-5 mb-2 mx-3">Cancel</a>
            </div>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>
@endsection
