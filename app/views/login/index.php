<div class="center-container">
    <div class="card">
        <div class="container">
            <div class="header-login">
                Welcome to
                <span class="bolded-text">Engi</span>ma!
            </div>
            <div class="form-input">
                <label for="email">Email</label>
                <input id="email" placeholder="john@doe.com" type="text" />
            </div>
            <div class="form-input">
                <label for="password">Password</label>
                <input id="password" placeholder="your password" type="password" />
            </div>
            <div id="login-message"></div>
            <button id="login-btn" class="btn-full-blue">Login</button>
            <div class="register-notice">
                <span>Don't have an account?</span> <a href="<?= BASEURL . 'register' ?>">Register Here</a>
            </div>
        </div>
    </div>
</div>