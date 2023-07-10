const item_template = document.getElementById('template_card').innerHTML;

let html_element = document.getElementById('lista_categorias');


if (typeof $_categorias !== 'undefined') {
    $_categorias.forEach(element => {
        let html_item = document.createElement('li');
        html_item.textContent = element['nombre'];
        html_item.addEventListener("click", () => load_filtrado(element));
        html_element.appendChild(html_item);
    });


}

function defaul() {
    document.getElementById('observacion').innerHTML = "";
    if (typeof $_elementos !== 'undefined') {
        template('template_card', $_elementos, item_template);
    }
}
defaul();

function load_filtrado(name) {
    template('template_card', $_elementos, item_template, ['referencias', name['nombre']]);
    document.getElementById('observacion').innerHTML = " Descripción: " + name['descripcion'];
}


function template(elementID, arrayItem, template, filtro = []) {
    document.getElementById(elementID).innerHTML = "";
    arrayItem.forEach(elemento => {
        let tmp = template;
        let boot = false;
        for (let key in elemento) {
            let value = elemento[key];
            tmp = tmp.replace("%" + key + "%", value);
            if (filtro.length > 0 && key == filtro[0] && value == filtro[1]) { boot = true; }
        }
        if (boot || filtro.length <= 1) {
            document.getElementById(elementID).innerHTML += tmp;
        }
    });
}