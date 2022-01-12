function fetchDeliveries() {
    fetch("http://127.0.0.1:8000/api/entregas")
        .then(response => {
            if (!response.ok) {
                throw Error("Erro ao realizar requisição");
            }
            return response.json();
        }).then(data => {
            const html = data.data
                .map(entrega => {
                    return `
                    <div class="entrega">
                        <h2> Entrega de ${entrega.cliente}</h2>
                        <div class="coleta-destino">
                            <p class="coleta rounded-pill bg-dark">
                                ${entrega.ponto_coleta}
                            </p>
                            <p class="destino rounded-pill bg-grey">
                                ${entrega.ponto_destino}
                            </p>
                        </div>
                        <div class="buttons">
                            <button class="btn btn-primary">Editar</button>
                            <button class="btn btn-danger">Excluir</button>
                        </div>
                    </div>
                    `;
                })
                .join("");
            document.querySelector(".entregas-list").insertAdjacentHTML("beforeend", html);
        })
}
fetchDeliveries();

