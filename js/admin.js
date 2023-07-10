let element = document.getElementsByTagName('h1')[0];
element.innerHTML = element.innerHTML.replace('%user%', $_POST['username']);

function name(params) {
    console.log(params);
}