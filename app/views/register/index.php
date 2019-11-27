<div class="center-container">
    <div class="card">
        <div class="container">
            <div class="header-login">
                Welcome to
                <span class="bolded-text">Engi</span>ma!
            </div>
            <div class="form-input">
                <label for="username">Username</label>
                <input id="username" onkeyup="validate_input(event)" placeholder="john" type="text"/>
            </div>
            <div class="form-input">
                <label for="email">Email Address</label>
                <input id="email" onkeyup="validate_input(event)" placeholder="joe@email.com" type="text"/>
            </div>
            <div class="form-input">
                <label for="phone">Phone Number</label>
                <input id="phone"  onkeyup="validate_input(event)" placeholder="+62813xxxxxxx" type="number" />
            </div>
            <div class="form-input">
                <label for="password">Password</label>
                <input id="password" onkeyup="validate_password()" placeholder="strong password" type="password" />
            </div>
            <div class="form-input">
                <label for="confirmation">Confirm Password</label>
                <input id="confirmation" onkeyup="validate_password()" placeholder="same as above" type="password" />
            </div>
            <div class="form-input">
                <label for="profile_picture">Profile Picture</label>
                <div class="file-browse">
                    <input id="profile-picture" class="btn-full-grey" type="file" accept="image/x-png"/>
                    <input id="profile-picture-display" type="text" />
                    <label id="profile-picture-label" for="profile-picture" class="btn-full-grey">Browse</label>
                </div>
            </div>
            <div id="register-message"></div>
            <button id="register-btn" onclick="submit_registration_data()" disabled="true" class="btn-full-blue" >Register</button>
            <div class="register-notice">
                <span>Already have account?</span> <a href="<?php echo BASEURL . 'login' ?>">Login here</a>
            </div>
        </div>
    </div>
</div>