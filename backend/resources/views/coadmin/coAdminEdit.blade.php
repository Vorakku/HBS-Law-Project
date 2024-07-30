<style>
        .container {
            margin-top: 20px;
            text-align: center;
        }

        .form-signin {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1); /* Add shadow effect */
            border-radius: 10px; /* Add border radius */
            background-color: grey; /* Add background color */
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .btn-primary {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            border: none;
        }
    </style>

    <div class="container">
        <h1>Edit Your Profile</h1>

        @if(session('fail'))
            <div class="alert alert-danger">{{ session('fail') }}</div>
        @endif

        <div class="layout_padding0">
            <div class="container">
                <main class="form-signin">
                    <form action="{{ route('coAdminUpdate') }}" method="POST">
                        @csrf

                        <input type="hidden" name="id" value="{{ $coadmin->id }}">

                        <div class="form-group">
                            <label for="firstName">First Name:</label>
                            <input type="text" id="firstName" name="firstName" value="{{ $coadmin->first_name }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="lastName">Last Name:</label>
                            <input type="text" id="lastName" name="lastName" value="{{ $coadmin->last_name }}" class="form-control">
                        </div>

                        

                        <!-- Add more form fields for other user attributes -->

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </main>
            </div>
        </div>
    </div>
    

