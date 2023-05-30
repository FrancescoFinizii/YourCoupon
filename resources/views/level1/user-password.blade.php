@extends("layouts.user-layout")
@section("title", "User - Password")
@section("content")
    <div class="schede" id="password-div">
        <h1>Password settings</h1>
        <form id="password-info-form">
            <div class="row-flex">
                <div class="cell-1of2" id="old-password-container">
                    <label>Old password:</label>
                    <input type="password" id="old-password" placeholder="Old password" required maxlength="15">
                </div>
                <div class="cell-1of2">
                </div>
            </div>
            <div class="row-flex">
                <div class="cell-1of2">
                    <label>New password:</label>
                    <input type="password" id="new-password" placeholder="New password" required maxlength="15">
                </div>
                <div class="cell-1of2">
                    <label>Confirm new password:</label>
                    <input type="password" id="confirm-new-password" placeholder="New password" required maxlength="15">
                </div>
            </div>
            <div class="row-flex">
                <div class="cell-1of2"></div>
                <div class="cell-1of2" id="password-btn-container">
                    <button class="btn btn-blue" type="submit">Submit</button>
                    <button class="btn btn-light" type="reset">Reset</button>
                </div>
            </div>
        </form>
    </div>
@endsection
