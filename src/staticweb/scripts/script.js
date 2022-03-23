// register
function getRegister() {
    const name = document.getElementById('reg-name').value;
    const role = document.getElementById('reg-role').value;
    const username = document.getElementById('reg-user').value;
    const password = document.getElementById('reg-pass').value;

    localStorage.setItem('NAME', name);
    localStorage.setItem('ROLE', role);
    localStorage.setItem('USERNAME', username);
    localStorage.setItem('PASS', password);

    alert('Register berhasil');
}

// function getRole() {
//     const role = document.getElementById('reg-role').value;
//     var val;

//     if (role[0].checked) {
//         val = role[0].value;
//     } else if (role[1].checked) {
//         val = role[1].value;
//     } else if (role[2].checked) {
//         val = role[2].value;
//     }

//     return val;
// }

// login
function getLogin() {
    // get data from local storage
    const role = localStorage.getItem('ROLE');
    const username = localStorage.getItem('USERNAME');
    const password = localStorage.getItem('PASS');

    const getRole = document.getElementById('log-role').value;
    const getUsername = document.getElementById('log-user').value;
    const getPassword = document.getElementById('log-pass').value;

    getRole === role && getPassword === password && getUsername === username ? alert('Login berhasil') : alert('username atau password atau role salah');
}
