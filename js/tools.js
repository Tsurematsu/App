function removeAllEventListeners(element) {
    const listeners = element.cloneNode().eventListenerList || [];
    listeners.forEach((listener) => {
        const {
            type,
            listener: eventListener,
            options
        } = listener;
        element.removeEventListener(type, eventListener, options);
    });
}

window.addEventListener("load", async() => {
    let formularios = document.getElementsByTagName("form");
    [...formularios].forEach(form => {
        removeAllEventListeners(form);
        form.setAttribute("data-value", form.action);
        form.addEventListener("submit", async(event) => {
            form.action = form.getAttribute("data-value");

            if (event.submitter.getAttribute('action')) {
                form.action = event.submitter.getAttribute('action');
            }

            if (event.submitter.getAttribute('type') != "submit") {
                event.preventDefault();
                if (typeof window[event.submitter.getAttribute('type')] === "function") {
                    let res = await call_Funcs(form);
                    window[event.submitter.getAttribute('type')](res);
                }
            }

        })
    })
});

async function call_Funcs(form, action = null) {
    let retorno = "nothing";
    await fetch(action == null ? form.action : action, {
            method: form.method,
            body: new FormData(form)
        }).then(response => response.text())
        .then(data => {
            retorno = data;
        })
    return retorno;
};