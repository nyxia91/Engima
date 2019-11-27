const re_email = new RegExp('(.+)@(.+){2,}\\.(.+){2,}');
const re_username = new RegExp('^(\\w)+$');
const re_phone = new RegExp('^([0-9]){9,12}$');

const email_msg = 'Email harus sesuai format username@domain.com';
const username_msg = 'Username hanya boleh berupa angka huruf dan underscore';
const phone_msg = 'Nomor telepon harus berupa angka dengan panjang 9-12';

const CHECK_UNIQUE_URL = 'http://3.0.90.7:80/tubes2wbd/Engima/register/checkunique';
const SUBMIT_URL = 'http://3.0.90.7:80/tubes2wbd/Engima/register/submit';

let validity_array = {};
validity_array['email'] = 0;
validity_array['username'] = 0;
validity_array['phone'] = 0;
validity_array['password'] = 0;
validity_array['picture'] = 0;

function validate_input(event) {
    const element = document.getElementById(event.target.id);
    let regex;
    let msg;
    switch (event.target.id) {
        case 'email':
            regex = re_email;
            msg = email_msg;
            break;
        case 'username':
            regex = re_username;
            msg = username_msg;
            break
        case 'phone':
            regex = re_phone;
            msg = phone_msg;
            break;
    }

    let verdict = regex.test(event.target.value);

    if (verdict) {
        let checking_data = {
            type: event.target.id,
            data: event.target.value
        };
        POST(CHECK_UNIQUE_URL, checking_data, (resp) => {
            console.log(checking_data)
            console.log(resp)
            if (!resp.unique) {
                verdict = false;
                msg = 'Credential anda sudah dipakai, coba lagi';
            }
        })
    }

    let warning_element = document.getElementById(`warning-${event.target.id}`);

    if (verdict) {
        validity_array[event.target.id] = 1;
        if (warning_element) {
            warning_element.remove();
        }
    } else {
        if (warning_element) {
            warning_element.remove()
        }
        warning_element = document.createElement('div');
        let text_node = document.createTextNode(msg);
        warning_element.setAttribute('class', `warning`);
        warning_element.setAttribute('id', `warning-${event.target.id}`);
        warning_element.appendChild(text_node);
        element.parentNode.insertBefore(warning_element, element.nextSibling);
    }
    validate_all();
}

const picture_input = document.getElementById('profile-picture');
const file_name_display = document.getElementById('profile-picture-display');

picture_input.addEventListener('change', (event) => {
    let data = event.srcElement;
    let files = data.files;
    let file_name = files[0].name;
    file_name_display.value = file_name;
    validity_array['picture'] = 1;
    validate_all();
});

const password_el = document.getElementById('password');
const confirmation_el = document.getElementById('confirmation');

function validate_password() {
    let warning_element = document.getElementById(`warning-password`);
    if (warning_element) {
        warning_element.remove()
    }
    if (confirmation_el.value !== password_el.value) {
        warning_element = document.createElement('div');
        let text_node = document.createTextNode('Password tidak sama');
        warning_element.setAttribute('class', `warning`);
        warning_element.setAttribute('id', `warning-password`);
        warning_element.appendChild(text_node);
        confirmation_el.parentNode.insertBefore(warning_element, confirmation_el.nextSibling);
    } else {
        validity_array['password'] = 1;
    }
    validate_all();
};

const username_el = document.getElementById('username');
const email_el = document.getElementById('email');
const phone_el = document.getElementById('phone');
const profile_el = document.getElementById('profile-picture');

function validate_all() {
    let total = 0;
    for (let key in validity_array) {
        total += validity_array[key];
    };

    if (total === 5) {
        document.getElementById("register-btn").disabled = false;
    } else {
        document.getElementById("register-btn").disabled = true;
    }
    console.log(total)
}

function submit_registration_data() {
    let form_data = new FormData();
    form_data.append('username', username_el.value);
    form_data.append('email', email_el.value);
    form_data.append('phone', phone_el.value);
    form_data.append('password', password_el.value);
    form_data.append('profile_pic', profile_el.files[0]);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', SUBMIT_URL, false);

    xhr.onload = function() {
        if (this.status == 200) {
            redirect_to_home();
        };
    };

    xhr.send(form_data);
}