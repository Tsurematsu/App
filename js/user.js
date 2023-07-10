let element = document.getElementsByTagName('h1')[0];
element.innerHTML = element.innerHTML.replace('%user%', $_POST['username']);

function js_create(params) {
    console.log(params);
}

function js_read(params) {
    html_element = document.getElementById('elementos');
    [...JSON.parse(params)].forEach(element => {
        let html_item = document.createElement('li');
        let text = "";
        for (let key in element) {
            let value = element[key];
            text += key + ": " + value + "; "
        }
        html_item.textContent = text;
        html_item.addEventListener("click", () => load_element(element));
        html_element.appendChild(html_item);
    });
}

function js_update(params) {
    console.log(params);
}

function js_delete(params) {
    console.log(params);
}

async function default_Load() {
    let res = await call_Funcs(document.getElementsByTagName("form")[0], "backEnd/CRUD_products.php?tipo_consulta=read");
    js_read(res);
}
setTimeout(() => {
    default_Load();
}, 300);

function load_element(element) {
    let inp = document.getElementsByTagName('input');
    [...inp].forEach(elementIN => {
        for (let key in element) {
            let value = element[key];
            if ((elementIN.name == key) || elementIN.name == "#" + key) {
                elementIN.value = value;
            }
        }
    });
}