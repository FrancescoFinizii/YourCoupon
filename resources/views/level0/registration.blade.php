@extends("layouts.public-layout")
@section("title", "Registration")
@section("content")
    <div class="my-container" style="background-image:url({{url('img/background.jpg')}});">
        <div class="card">
            <div class="icon-container">
                <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" fill="currentColor" viewBox="0 0 16 16"
                     class="bi bi-person">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                </svg>
            </div>
            <label class="errorLabel">Error Label</label>
            <form class="myform" method="post">
                <input type="text" id="nome" placeholder="Name" required maxlength="15">
                <input type="text" id="cognome" placeholder="Surname" required maxlength="15">
                <input type="email" id="email" placeholder="Email" maxlength="30" required pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$">
                <input type="text" id="dataNascita" placeholder="Date of birth" onfocus="(this.type='date')" onblur="(this.type='text')" required>
                <input type="tel" id="telefono" placeholder="Phone" maxlength="13" required pattern="[0-9]{10}">
                <input type="text" id="username" placeholder="Username" maxlength="10" required>
                <input type="password" id="password" placeholder="Password" required minlength="8" maxlength="15">
                <input type="password" id="confirmPassword" placeholder="Confirm password" minlength="8" maxlength="15" required>
                <div class="radio-container">
                    <input type="radio" id="male-input" name="genere">
                    <label for="male-input">Male</label>
                </div>
                <div class="radio-container">
                    <input type="radio" id="female-input" name="genere">
                    <label for="female-input">Female</label>
                </div>
                <button class="btn btn-blue btn-large" type="submit">Create</button>
            </form>
            <p>Already a member?  <a class="std-link" href="{{url("/login")}}">Log in</a></p>
        </div>
    </div>
@endsection
