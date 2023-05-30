@extends("TWEB DEFFF.YourCouponDefinitivo.resources.views.layouts.staff-layout")
@section("title", "Profilo Staff")
@section("content")
    <div class="my-container">
        <div class="wrapper-dashboard">
            <div id="profile-image-container">
                <div class="profile-img-cont">
                    <input id="file" type="file"/>
                    <label for="file">
                        <img id="profile-image" width="200px" height="200px"
                             src="img/download.jpg">
                        <div class="edit-profile-cont">
                            <span class="edit-profile-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-camera-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                    <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/>
                                </svg>
                            </span>
                            <span class="edit-profile-text">Edit Profile</span>
                        </div>
                    </label>
                </div>
            </div>
            <div class="" style="text-align: center">

                <form>
                    <div class="row-flex">
                        <div class="cell1-2">
                            <label>Nome:</label>
                            <input type="text" id="nome" placeholder="Name" required maxlength="15">
                        </div>
                        <div class="cell1-2">
                            <label>Cognome:</label>
                            <input type="text" id="cognome" placeholder="Surname" required maxlength="15">
                        </div>
                    </div>
                    <div class="row-flex">
                        <div class="cell1-2">
                            <label>Email:</label>
                            <input type="email" id="email" placeholder="Email" required maxlength="15">
                        </div>
                        <div class="cell1-2">
                            <label>Telefono:</label>
                            <input type="tel" id="telefono" placeholder="Phone" required maxlength="15">
                        </div>
                    </div>
                    <div class="row-flex">
                        <div class="cell1-2">
                            <label>Data di nascita:</label>
                            <input type="date" id="dataNascita" placeholder="Data di nascita" required maxlength="15">
                        </div>
                        <div class="cell1-2">
                            <label>Username:</label>
                            <input type="text" id="username" placeholder="Username" required maxlength="15">
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
                        <div class="cell-1of2" id="btn-cont">
                            <button class="btn-blue" type="submit">Submit</button>
                            <button class="btn-light" type="reset">Reset</button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection
