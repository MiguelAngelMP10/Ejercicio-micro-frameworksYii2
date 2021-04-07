import logo from "./logo.svg";
import "./bootstrap.min.css";
import "./App.css";
import { useState, useEffect } from "react";

function App() {
  const [clientes, setClientes] = useState([]);
  useEffect(() => {
    fetch("http://localhost:8081/clientes")
      .then((res) => res.json())
      .then((result) => {
        setClientes(result);
      });
  }, []);

  function getDetalles(e) {
    e.preventDefault();
    let idCliente = e.target.id;
    fetch(
      `http://localhost:8083/cliente-direcciones/direcciones/?idCliente=${idCliente}`
    )
      .then((res) => res.json())
      .then((result) => {
        let direccionesCliente = `
                <div class="table-responsive">

                    <table  class="table table-hover">
                     <tr>
                                <th>idCliente_direccciones</th>
                                <th>idCliente</th>
                                <th>calle</th>
                                <th>numero</th>
                                <th>municipio</th>
                                <th>estado</th>
                                <th>codigoPostal</th>
                            </tr> 
                    `;
        result.data.items.forEach((item) => {
          direccionesCliente += `
                            <tr>
                                <td>${item.idCliente_direccciones}</td>
                                <td>${item.idCliente}</td>
                                <td>${item.calle}</td>
                                <td>${item.numero}</td>
                                <td>${item.municipio}</td>
                                <td>${item.estado}</td>
                                <td>${item.codigoPostal}</td>
                            </tr> `;
        });

        direccionesCliente += ` </table>
          </div>
          `;

        document.querySelector(
          "#detalles-cliente-direcciones"
        ).innerHTML = direccionesCliente;

        //telefonos

        let telefonosCliente = `
                <div class="table-responsive">

                    <table  class="table table-hover">
                            <tr>
                                <th>idCliente_Telefonos</th>
                                <th>idCliente</th>
                                <th>telefono</th>
                            </tr> `;
        fetch(
          `http://localhost:8083/cliente-telefonos/telefonos/?idCliente=${idCliente}`
        )
          .then((res) => res.json())
          .then((result) => {
            result.data.items.forEach((item) => {
              telefonosCliente += `
                            <tr>
                                <td>${item.idCliente_Telefonos}</td>
                                <td>${item.idCliente}</td>
                                <td>${item.telefono}</td>
                            </tr> `;
            });

            telefonosCliente += ` </table>
          </div>
          `;
            console.log(telefonosCliente);
            document.querySelector(
              "#detalles-cliente-telefonos"
            ).innerHTML = telefonosCliente;
          });
      });
  }

  return (
    <div className="App">
      <header className="App-header">
        <img src={logo} className="App-logo" alt="logo" />
      </header>
      <div className="container-fluid">
        <div className="row">
          <div className="col-sm-12 col-md-6">
            <h1>Clientes</h1>
            <div className="table-responsive">
              <table className="table table-hover">
                <thead>
                  <tr>
                    <th>Id cliente</th>
                    <th>Nombres</th>
                    <th>apellidos</th>
                    <th>detalles</th>
                  </tr>
                </thead>

                <tbody>
                  {clientes.map((cliente) => (
                    <tr key={cliente.idCliente}>
                      <td>{cliente.idCliente}</td>
                      <td>{cliente.nombres}</td>
                      <td>{cliente.apellidos}</td>
                      <td>
                        <button
                          onClick={getDetalles}
                          id={cliente.idCliente}
                          className="btn btn-outline-info"
                        >
                          Detalles
                        </button>
                      </td>
                    </tr>
                  ))}
                </tbody>
              </table>
            </div>
          </div>

          <div className="col-sm-12 col-md-6">
            <h3>Detalles cliente</h3>

            <div className="card border-info">
              <div className="card-header h3">Direcciones</div>
              <div
                className="card-body"
                id="detalles-cliente-direcciones"
              ></div>
            </div>
            <div className="card border-info">
              <div className="card-header h3">Telefonos</div>
              <div className="card-body" id="detalles-cliente-telefonos"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default App;
