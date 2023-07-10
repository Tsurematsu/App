let html_element = document.getElementById('lista_categorias');


if (typeof $_categorias !== 'undefined') {
    $_categorias.forEach(element => {
        let html_item = document.createElement('li');
        html_item.textContent = element['nombre'];
        html_element.appendChild(html_item);
    });


}
if (typeof $_elementos !== 'undefined') {
    console.log($_elementos);
}