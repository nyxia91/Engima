LOGIN_URL = 'http://3.0.90.7:80/tubes2wbd/Engima/login/dologin';

document.getElementById('login-btn').addEventListener('click', () => {
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let message_login = document.getElementById('login-message');
    let login_data = {
        'email': email,
        'password': password
    };

    console.log(login_data);
    POST(LOGIN_URL, login_data, (resp) => {
        if (resp.status !== 0) {
            message_login.innerHTML = resp.message;
            message_login.style.display = "block";
        } else {
            redirect_to_home();
        }
    });
});