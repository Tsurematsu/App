let html_element = document.getElementById('lista_categorias');


if (typeof $_categorias !== 'undefined') {
    $_categorias.forEach(element => {
        let html_item = document.createElement('li');
        html_item.textContent = element['nombre'];
        html_element.appendChild(html_item);
    });


}

if (typeof $_elementos !== 'undefined') {
    template('template_card', $_elementos);
}

function template(elementID, arrayItem) {
    let template = document.getElementById(elementID).innerHTML;
    document.getElementById(elementID).innerHTML = "";
    arrayItem.forEach(elemento => {
        let tmp = template;
        for (let key in elemento) {
            let value = elemento[key];
            tmp = tmp.replace("%" + key + "%", value);
        }
        document.getElementById(elementID).innerHTML += tmp;
    });
}