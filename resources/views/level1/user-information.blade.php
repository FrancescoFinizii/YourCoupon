@extends("layouts.user-layout")
@section("title", "User - Profile")
@section("content")
    <div class="schede" id="profile-div">
        <h1>Account setting</h1>
        <form id="profile-info-form">
            <div class="row-flex">
                <div class="cell-1of2">
                    <label>Name:</label>
                    <input type="text" id="nome" placeholder="Name" required maxlength="15">
                </div>
                <div class="cell-1of2">
                    <label>Surname:</label>
                    <input type="text" id="cognome" placeholder="Surname" required maxlength="15">
                </div>
            </div>
            <div class="row-flex">
                <div class="cell-1of2">
                    <label>Email:</label>
                    <input class="form-control" type="email" id="email" placeholder="Email" maxlength="30"
                           required pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$">
                </div>
                <div class="cell-1of2">
                    <label>Phone number:</label>
                    <input class="form-control" type="tel" id="telefono" placeholder="Phone" maxlength="13"
                           required pattern="[0-9]{10}">
                </div>
            </div>
            <div class="row-flex">
                <div class="cell-1of2">
                    <label>Date of birth:</label>
                    <input class="form-control" id="dataNascita" placeholder="Data di nascita" type="date"
                           required>
                </div>
                <div class="cell-1of2">
                    <label>Username:</label>
                    <input class="form-control" type="text" id="username" placeholder="Username"
                           maxlength="10" required>
                </div>
            </div>
            <div class="row-flex">
                <div class="cell-1of2">
                    <div class="radio-container">
                        <input type="radio" id="male" name="genere">
                        <label for="male">Male</label>
                    </div>
                    <div class="radio-container">
                        <input type="radio" id="female" name="genere">
                        <label for="female">Female</label>
                    </div>
                </div>
                <div class="cell-1of2" id="info-btn-container">
                    <button class="btn btn-blue" type="submit">Submit</button>
                    <button class="btn btn-light" type="reset">Reset</button>
                </div>
            </div>
        </form>
    </div>
@endsection
