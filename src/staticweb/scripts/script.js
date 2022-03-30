// register
function getRegister() {
    const name = document.getElementById('reg-name').value;
    const role = document.getElementById('reg-role').value;
    const username = document.getElementById('reg-user').value;
    const password = document.getElementById('reg-pass').value;

    if (name == '' || role == 'null' || username == '' || password == '') {
        alert('Data masih kosong!');
    } else {
        password.length < 8
            ? alert('password minimal 8 karakter!')
            : (localStorage.setItem('NAME', name), localStorage.setItem('ROLE', role), localStorage.setItem('USERNAME', username), localStorage.setItem('PASS', password), alert('Register berhasil'), window.open('login.html'));
    }
}

// login
function getLogin() {
    // get data from local storage
    const role = localStorage.getItem('ROLE');
    const username = localStorage.getItem('USERNAME');
    const password = localStorage.getItem('PASS');

    const getRole = document.getElementById('log-role').value;
    const getUsername = document.getElementById('log-user').value;
    const getPassword = document.getElementById('log-pass').value;

    getRole == 'null' || getUsername == '' || getPassword == ''
        ? alert('Data masih kosong!')
        : getRole === role && getPassword === password && getUsername === username
        ? (window.open('index.html'), alert('Login berhasil'))
        : alert('username atau password atau role salah');
}

// add siswa
function addSiswa() {
    const nis = document.getElementById('add-nis').value;
    const name = document.getElementById('add-ns').value;
    const kelas = document.getElementById('add-class').value;
    const periode = document.getElementById('add-ta').value;
    const cost = document.getElementById('add-spp').value;
    const dueDate = document.getElementById('add-jt').value;
    const statues = document.getElementById('add-t').value;

    nis == '' || name == '' || kelas == 'null'
        ? alert('Data masih kosong!')
        : (localStorage.setItem('NIS', nis),
          localStorage.setItem('SNAME', name),
          localStorage.setItem('CLASS', kelas),
          localStorage.setItem('PERIODE', periode),
          localStorage.setItem('COST', cost),
          localStorage.setItem('DUEDATE', dueDate),
          localStorage.setItem('STATUES', statues),
          alert('data siswa berhasil ditambahkan'),
          window.open('showSiswa.html'));
}

// get siswa name
function getName() {
    return localStorage.getItem('SNAME');
}

// add wali kelas
function addWalkas() {
    const kelas = document.getElementById('add-wclass').value;
    const name = document.getElementById('add-walkas').value;

    kelas == 'null' || name == 'null' ? alert('Pilih kelas dan walikelas!') : (localStorage.setItem('WCLASS', kelas), localStorage.setItem('WNAME', name), alert('data walikelas berhasil ditambahkan'), window.open('showWalkas.html'));
}

// show siswa
function showSiswa() {
    document.getElementById('result-nis').innerHTML = localStorage.getItem('NIS');
    document.getElementById('result-name').innerHTML = localStorage.getItem('SNAME');
    document.getElementById('result-class').innerHTML = localStorage.getItem('CLASS');
    document.getElementById('result-ta').innerHTML = localStorage.getItem('PERIODE');
    document.getElementById('result-spp').innerHTML = localStorage.getItem('COST');
    document.getElementById('result-jt').innerHTML = localStorage.getItem('DUEDATE');
}

// show walikelas
function showWalkas() {
    document.getElementById('result-wclass').innerHTML = localStorage.getItem('WCLASS');
    document.getElementById('result-namewk').innerHTML = localStorage.getItem('WNAME');
}

// show walikelas
function showUser() {
    document.getElementById('result-uname').innerHTML = localStorage.getItem('NAME');
    document.getElementById('result-username').innerHTML = localStorage.getItem('USERNAME');
    document.getElementById('result-role').innerHTML = localStorage.getItem('ROLE');
}

// show transaction
function showTransaction() {
    document.getElementById('result-statues').innerHTML = localStorage.getItem('STATUES');
    document.getElementById('result-nis').innerHTML = localStorage.getItem('NIS');
    document.getElementById('result-name').innerHTML = localStorage.getItem('SNAME');
    document.getElementById('result-class').innerHTML = localStorage.getItem('CLASS');
    document.getElementById('result-namewk').innerHTML = localStorage.getItem('WNAME');
}

// add transaction
function addTransaction() {
    const statues = document.getElementById('update-t').value;

    statues == 'null' ? alert('Pilih status!') : (localStorage.setItem('STATUES', statues), alert('Status berhasil diupdate!'), window.open('transaksi.html'));
}

// clear data
function clearData() {
    confirm('Anda yakin akan menghapus data?') ? (localStorage.clear(), alert('Data berhasil dihapus!')) : alert('Data gagal dihapus!');
}
