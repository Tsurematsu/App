let element = document.getElementsByTagName('h1')[0];
element.innerHTML = element.innerHTML.replace('%user%', $_POST['username']);

function js_create(params) {
    console.log(params);
}

function js_read(params) {
    console.log(params);
}

function js_update(params) {
    console.log(params);
}

function js_delete(params) {
    console.log(params);
}