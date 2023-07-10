let html_element = document.getElementById('lista_categorias');


if (typeof $_categorias !== 'undefined') {
    console.log($_categorias);
    $_categorias.forEach(element => {
        console.log(element);
        // let html_item = document.createElement('li');
        // html_item.textContent = 'Este es un nuevo párrafo';

        // html_element.appendChild(html_item);

    });


}
if (typeof $_elementos !== 'undefined') {
    console.log($_elementos);
}