@extends("layouts.staff-layout")
@section("title", "Staff Password")
@section("content")
    <div class="my-container" style="text-align: center">
        <div class="wrapper-dashboard" style="max-width: 600px; margin: 0 auto;">
            <div class="" style="text-align: center">
                <img id="profile-image" width="200px" height="200px " src="{{asset("img/imgkri/download.jpg")}}">
                <form method="POST" action="{{route('cambia_password')}}">
                    @csrf
                    <h4>Change Your Password</h4>
                    <div class="">
                        <div class="cell-pssw">
                            <label for="old_password">Password:</label>
                            <input type="password" name="old_password" placeholder="Password" required >
                        </div>
                        <div class="cell-pssw">
                            <label for="new_password">New Password:</label>
                            <input type="password" name="new_password" placeholder="NewPassword" required>
                        </div>
                        <div class="cell-pssw">
                            <label for="confirm_new_password">Confirm New Password:</label>
                            <input type="password" name="confirm_password" placeholder="Confirm" required >
                        </div>
                        <div class="cell-pssw" id="btn-cont">
                            <button class="btn btn-blue" type="submit">Change Password</button>
                            <button class="btn btn-light" type="reset">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
