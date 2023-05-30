@extends("layouts.staff-layout")
@section("title", "Staff Password")
@section("content")
    <div class="my-container" style="text-align: center">
        <div class="wrapper-dashboard" style="max-width: 600px; margin: 0 auto;">
            <div class="" style="text-align: center">
                <img id="profile-image" width="200px" height="200px " src="{{asset("img/imgkri/download.jpg")}}">
                <form>
                    <h4>Change Your Password</h4>
                    <div class="">
                        <div class="cell-pssw">
                            <label>Password:</label>
                            <input type="password" id="password" placeholder="Password" required maxlength="15">
                        </div>
                        <div class="cell-pssw">
                            <label>New Password:</label>
                            <input type="password" id="newpassword" placeholder="NewPassword" required maxlength="15">
                        </div>
                        <div class="cell-pssw">
                            <label>Confirm New Password:</label>
                            <input type="password" id="confirmnewpassword" placeholder="Confirm" required maxlength="15">
                        </div>
                        <div class="cell-pssw" id="btn-cont">
                            <button class="btn-blue" type="submit">Change Password</button>
                            <button class="btn-light1" type="reset">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
